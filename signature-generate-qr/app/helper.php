<?php

use Illuminate\Support\Facades\File;
use Modules\User\Entities\User;
use Modules\User\Entities\UserChecksum;

if (!function_exists('admin__add_user')) {
    function admin__add_user($response)
    {
        $user = User::where('email', $response['email'])->first();

        if (!$user) {
            // register
            $user = User::create([
                'uid'          => $response['uid'],
                'nik'          => $response['nik'],
                'division'     => $response['division'],
                'department'   => $response['department'],
                'designation'  => $response['designation'],
                'name'         => $response['name'],
                'nickname'     => $response['nickname'],
                'email'        => $response['email'],
                'password'     => bcrypt(bcrypt($response['email'])),
                'actual'       => strtotime(now()),
                // 'access' => json_encode($access),
                'ayoohris'     => 1,
                'client_cid'   => $response['client_cid'],
                'company_code' => $response['company_code'],
                'photo'        => $response['photo'],
            ]);
        }

        $user = User::where('email', $response['email'])->where('actual', $response['actual'])->first();

        if (!$user) {

            // sync update
            $user = User::where('email', $response['email'])->first();

            $user->uid          = $response['uid'];
            $user->nik          = $response['nik'];
            $user->division     = $response['division'];
            $user->department   = $response['department'];
            $user->designation  = $response['designation'];
            $user->name         = $response['name'];
            $user->nickname     = $response['nickname'];
            $user->actual       = $response['actual'];
            $user->ayoohris     = 1;
            $user->client_cid   = $response['client_cid'];
            $user->company_code = $response['company_code'];
            $user->photo        = $response['photo'];
            $user->save();
        }
        return $user;

    }
}

if (!function_exists('add_all_user')) {
    function add_all_user($response)
    {
        if (count($response) > 0) {
            $storage_path = 'clouds/avatars/';

            for ($i = 0, $iMax = count($response); $i < $iMax; $i++) {
                $path[$i]     = $response[$i]['photo'];
                $filename[$i] = strtotime(date('YmdHis')) . basename($path[$i]);
                Image::make($path[$i])->save($storage_path . $filename[$i]);
                //Insert new user
                $user[$i] = User::where('email', $response[$i]['email'])->first();
                if (!$user[$i]) {
                    $user_data              = new User;
                    $user_data->uid         = $response[$i]['uid'];
                    $user_data->name        = $response[$i]['name'];
                    $user_data->email       = $response[$i]['email'];
                    $user_data->nik         = $response[$i]['nik'];
                    $user_data->designation = $response[$i]['designation'];
                    $user_data->division    = $response[$i]['division'];
                    $user_data->department  = $response[$i]['department'];
                    $user_data->phones      = $response[$i]['phones'];
                    $user_data->photo       = $filename[$i];
                    $user_data->ayoohris    = 1;
                    $user_data->password    = bcrypt(bcrypt($response[$i]['email']));
                    $user_data->actual      = strtotime(now());
                    $user_data->save();
                }
            }
        }
    }
}
