<?php


namespace Kubpro\PulPal;


use Kubpro\PulPal\Helpers\Helper;
use phpDocumentor\Reflection\Types\Integer;

class PulPalService
{
    use Helper;

    public $url;

    public $merchantId;
    public $epochTime;

    public function generateUrl(){
        $this->checkParametrs();
        $this->generateConfigs();

        return $this->getUrl() . '?' . http_build_query($this->params());
    }


    public function params(){
        return [
            'merchantId'        => $this->getMerchantId(),
            'price'             => $this->getPrice(),
            'repeatable'        => config('pulpal.repeatable') ? "ture" : "false",
            'name_az'           => $this->getName('az'),
            'name_ru'           => $this->getName('ru'),
            'name_en'           => $this->getName('en'),
            'description_en'    => $this->getDescription('en'),
            'description_ru'    => $this->getDescription('ru'),
            'description_az'    => $this->getDescription('az'),
            'externalId'        => $this->getExternalId(),
            'email'             => $this->getEmail(),
            'signature2'        => $this->signature(),
        ];
    }


    private function signature()
    {
        $signature =  $this->getName('en')
            . $this->getName('az')
            . $this->getName('ru')
            . $this->getDescription('en')
            . $this->getDescription('ru')
            . $this->getDescription('az')
            . $this->getMerchantId()
            . $this->getExternalId()
            . $this->getPrice()
            . $this->getEpochTime()
            . config('pulpal.salt');



        return sha1($signature);
    }




    public function generateConfigs(){
        $this->merchantId   = config('pulpal.merchant.'.app()->environment());
        $this->url          = config('pulpal.url.'.app()->environment());
        $this->setEpochTime();
    }

}
