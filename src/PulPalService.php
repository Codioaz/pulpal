<?php


namespace Kubpro\PulPal;


use Kubpro\PulPal\Helpers\Helper;

class PulPalService
{
    use Helper;

    public $url;

    public $merchantId;

    public function generateUrl(){
        $this->checkParametrs();
        $this->generateConfigs();

        dd($this);
    }

    public function generateConfigs(){
        $this->merchantId   = config('pulpal.merchant.'.app()->environment());
        $this->url          = config('pulpal.url.'.app()->environment());
    }

}
