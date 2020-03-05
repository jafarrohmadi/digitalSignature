<?php

namespace Modules\DigitalSignatureGenerateQr\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Modules\DigitalSignatureGenerateQr\Entities\Signature;

class DigitalSignatureGenerateQrController extends Controller
{
    public function getGenerateQrCode()
    {
        $data = [
            'modelId'         => 16,
            'modelType'       => "Modules\WorkOrder\Entities\WorkOrder",
            'redirectAfterQr' => url('/home'),
        ];

        return $this->generateQrCode(base64_encode(json_encode($data)));
    }

    public function generateQrCode($redirect)
    {
        $request = json_decode(base64_decode($redirect));

        if (!isset($request->modelType) || !isset($request->modelId) || !isset($request->redirectAfterQr)) {
            abort(403);
        }

        $modelType       = $request->modelType;
        $modelId         = $request->modelId;
        $redirectAfterQr = $request->redirectAfterQr;
        $url             = $this->generateIdxFromScan(Auth::user()->uid);

        $signature       =
            Signature::where([
                'model_type' => $modelType,
                'model_id'   => $modelId,
                'user_id'    => Auth::id(),
            ])->first();

        if (!$signature) {
            $signature             = new Signature();
            $signature->model_type = $modelType;
            $signature->model_id   = $modelId;
            $signature->user_id    = Auth::id();
            $signature->save();
        }

        if ($signature->status === 1) {
            return redirect($redirectAfterQr);
        }

        $data = base64_encode(json_encode([
            'link'   => url('/api/digitalsignature/addSignature') . '/' . $signature->id,
            'module' => $modelType,
            'code'   => $url,
        ]));

        return view('digitalsignaturegenerateqr::qr-code', compact('data', 'signature'));
    }

    public function getIDXfromScan($code)
    {
        if ($code) {
            $decode = base64_decode(base64_decode($code));
            $arr    = explode('.', $decode);
            if (isset($arr[1])) {
                return $arr[1];
            }
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function addSignature(Request $request, $id)
    {
        $storagePath    = 'clouds/signature';
        $outputFilename = 'SG' . strtoupper(Str::random(20)) . '.png';
        $img            = str_replace('data:image/png;base64,', '', $request->img);
        $image          = Image::make(base64_decode($img));
        $image->save($storagePath . '/' . $outputFilename);

        $outputFilename = url('clouds/signature/') . '/' . $outputFilename;

        $signature = Signature::find($id);
        if ($signature) {
            $signature->signature = $outputFilename;
            $signature->status    = 1;
            $signature->save();
            $res['message'] = "save success";
        } else {
            $res['message'] = 'Data not found';
        }

        return response($res);
    }

    /**
     * @param $id
     * @return string
     */
    private function generateIdxFromScan($id)
    {
        return base64_encode($id);
    }
}
