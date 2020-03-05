<?php

namespace Modules\DigitalSignature\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DigitalSignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $userId = base64_decode($request->user);

        if ($userId != Auth::user()->uid) {
            abort(403);
        }

        return view('digitalsignature::index', compact('request'));
    }

    public function store(Request $request)
    {
        $client = new Client(['verify' => false]);
        $res    = $client->put($request->redirect, [
            'json' => [
                'img' => $request->img,
            ],
        ]);

        return json_decode($res->getBody(), true);
    }

    public function scanQrCode()
    {
        return view('digitalsignature::scan-qr-code');
    }

}
