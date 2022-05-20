<?php

namespace Lvyac\Qrcode;

use Encore\Admin\Admin;
use Encore\Admin\Grid\Displayers\AbstractDisplayer;
use Lvyac\Qrcode\QrcodeService;

class Qrcode extends AbstractDisplayer
{

    public function display($width = 120, $migrate = 1, $size = 500)
    {

        $img = QrcodeService::getQrcode($this->value, $migrate, $size);
        $base64 = chunk_split(base64_encode($img));

        Admin::script("$('[data-toggle=\"popover\"]').popover();");
        $href = url('/lvyac/qrcode/download?resource=' . urlencode($this->value) . '&margin=' . $migrate . '&size=' . $size);

        $html = "<div><img src='data:image/jpg/png/gif;base64,{$base64}' width='{$width}' /></div><div><a href='{$href}' class='btn btn-primary btn-block btn-sm' target='_blank'>下载</a></div>";
        return <<<EOT
        <div data-toggle="popover" data-placement="bottom" title="二维码" html="true" data-html="{$html}" data-content="{$html}" >
            <i class="fa fa-qrcode" style="font-size: 24px;"></i>
        </div>

EOT;

        return <<<EOT
        $image
        <a href="{$href}" target="_blank">下载</a>
EOT;
    }

        
}
