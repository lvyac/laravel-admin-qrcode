<?php

namespace Lvyac\Qrcode\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Lvyac\Qrcode\QrcodeService;

class DownloadController extends BaseController
{
    /**
     * @param Request $request
     */
    public function download(Request $request)
    {
        $resource = $request->input('resource');
        $margin = $request->input('margin', 1);
        $size = $request->input('size', 500);
        $fileName = '二维码_'.\time() . '.png';

        if (!$resource) {
            abort(400, '参数错误');
        }

        
        $resource = \urldecode(trim($resource));
        //return QrcodeService::getQrcode($resource, $margin, $size);
        $resource = QrcodeService::getQrcode($resource, $margin, $size);
        return response()->streamDownload(function ()use($resource) {
            echo  $resource;
        }, $fileName);
    }
}
