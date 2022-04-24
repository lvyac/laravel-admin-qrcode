<?php
namespace Lvyac\Qrcode;

use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeFacade;

class QrcodeService
{
    static public function getQrcode($value, $margin = 1, $size = 500)
    {
        return QrCodeFacade::encoding('UTF-8')->format('png')->margin($margin)->size($size)->generate($value);
    }

}