<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

use Image;
use File;
use Modules\User\Entities\User;
use Modules\User\Entities\UserChecksum;


class ClientController extends Controller
{
    
    public function redirect()
    {
        $query = http_build_query([
	        'client_id' => config('app.client_id'),
	        'redirect_uri' => config('app.redirect_uri'),
	        'response_type' => 'code',
	        'scope' => '',
        ]);
        
	    return redirect(config('app.client_url').'oauth/authorize?'.$query);
    }
    



    public function callback(Request $request)
    {
        if(isset($_GET['error'])){
            return redirect('/');
        }
        
		$client = new Client;
        $res = $client->request('POST', config('app.client_url').'oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => config('app.client_id'),
                'client_secret' => config('app.client_secret'),
                'redirect_uri' => config('app.redirect_uri'),
                'code' => $request->code,
            ],
        ]);
        $resp = json_decode($res->getBody(), true);
        $at = $resp["access_token"];
        $response = $client->request('GET', config('app.client_url').'api/user', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$at,
            ],
        ]);
        
        Cookie::queue('bearer', $at, 60);
        $responseUsers = $this->getUserEmployeeData($at);
            
        $response = json_decode((string) $response->getBody(), true);
        
        // if(!$response['data']['access']['kerjasama']){
        //     //return redirect('/denied');
        //     return 'denied';	
		// }
        //return $response;

        // checksum //
        if(UserChecksum::count() > 0) {
            $check = UserChecksum::select('checksum_ayoohris')->first();
            if ($check['checksum_ayoohris'] != $responseUsers['checksum']) {
                $updateChecksum = UserChecksum::first();
                $updateChecksum->checksum_ayoohris = $responseUsers['checksum'];
                $updateChecksum->save();

                $user_data = add_all_user($responseUsers['data']);
            }
                   
        }else{
            $checksum = UserChecksum::create([
                'checksum_ayoohris' => $responseUsers['checksum']
            ]);

            $user_data = add_all_user($responseUsers['data']);
        }

        $user = admin__add_user($response['data']);
        
		Auth::login($user);
		return redirect('dashboard/');

    }

    public function getUserEmployeeData($at = null)
    {
        if (Cookie::has('bearer') || $at) {
            $client   = new Client();
            $response = $client->request('POST', config('app.client_url') . 'api/data/users', [
                    'headers' => [
                        'Accept'        => 'application/json',
                        'Authorization' => 'Bearer ' . $at ?? Cookie::get('bearer'),
                    ],
                ]
            );
            $response = json_decode((string)$response->getBody(), true);
            return $response;
        }
        return false;
    }

}
