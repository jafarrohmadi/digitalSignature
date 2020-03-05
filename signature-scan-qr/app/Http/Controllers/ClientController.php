<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function loginCallback(Request $request)
    {
        $client = new Client;

        $res = $client->request('POST', config('app.client_url') . 'api/login', [
            'form_params' => [
                'email'    => $request->email,
                'password' => $request->password,
            ],
        ]);

        $resp = json_decode($res->getBody(), true);

        if (!isset($resp['data']["token"])) {
            return back()->withErrors($resp['message']);
        }

        $at = $resp['data']["token"];

        $response = $client->request('GET', config('app.client_url') . 'api/user', [
            'headers' => [
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer ' . $at,
            ],
        ]);

        $response = json_decode((string)$response->getBody(), true);

        $user = admin__add_user($response['data']);
        Auth::login($user);
        return redirect('/');
    }
}
