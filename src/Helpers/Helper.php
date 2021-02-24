<?php

namespace Kubpro\PulPal\Helpers;

use Kubpro\PulPal\PulPalService;
use function Symfony\Component\Translation\t;

trait Helper
{
    public $price;

    public $email;

    public $externalId;

    public $name = [
        'az' => null,
        'en' => null,
        'ru' => null,
    ];

    public $description = [
        'az' => null,
        'en' => null,
        'ru' => null,
    ];



    /**
     * @throws \Exception
     */
    public function checkParametrs(){
        foreach (config('pulpal.locale') as $locale){
            if (!array_key_exists($locale, $this->name)){
                $this->checkLocaleError('name');
            }

            if (!array_key_exists($locale, $this->description)){
                $this->checkLocaleError('description');
            }
        }
        if(empty($this->price)){
            throw new \Exception('Price should be number, you can use this function setPrice() ');
        }
        if(empty($this->externalId)){
            throw new \Exception('Please fill externalId ');
        }
    }



    private function setEpochTime()
    {
        $this->epochTime = intval((time()*1000) / 300000);
    }

    private function getEpochTime()
    {
        return $this->epochTime;
    }


    public function getName($locale){
        return $this->name[$locale];
    }

    public function getDescription($locale){
        return $this->description[$locale];
    }


    public function getMerchantId(): int
    {
        return $this->merchantId;
    }

    public function getUrl(){
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getExternalId(){
        return $this->externalId;
    }


    public function setExternalId($externalId){
        $this->externalId = $externalId;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * @param null $email
     * @return $this
     */
    public function setEmail($email = null){
        $this->email = $email;
        return $this;
    }


    public function getPrice(){
        return $this->price;
    }

    /**
     * @param $price
     * @return $this
     */
    public function setPrice($price)
    {
        if (!is_numeric($price)){
            throw new \Exception('Price should be number');
        }

        $this->price =  config('pulpal.penny') === true ? $price  :  $price * 100;

        return $this;
    }

    /**
     * @param $param
     * @param string $locale
     * @return $this
     * @throws \Exception
     */
    public function setName($param, $locale = 'az'){
        $this->paramException($param);

        if (is_array($param)){

            foreach ($param as $key => $value){
                $this->localeException($key);
                $this->name[$key]  = $value;
            }
        }else{
            $this->localeException($locale);

            $this->name[$locale] = $param;
        }


        return $this;
    }


    /**
     * @param $name
     * @return $this
     * @throws \Exception
     */
    public function setNameAz($name){
        $this->paramException($name);

        $this->name['ru'] = $name;

        return $this;
    }

    /**
     * @param $name
     * @return $this
     * @throws \Exception
     */
    public function setNameRu($name){
        $this->paramException($name);

        $this->name['ru'] = $name;

        return $this;
    }

    /**
     * @param $name
     * @return $this
     * @throws \Exception
     */
    public function setNameEn($name){
        $this->paramException($name);

        $this->name['en'] = $name;

        return $this;
    }




    /**
     * @param $param
     * @param string $locale
     * @return $this
     * @throws \Exception
     */
    public function setDescription($param, $locale = 'az'){
        $this->paramException($param);


        if (is_array($param)){

            foreach ($param as $key => $value){
                $this->localeException($key);
                $this->description[$key] = $value;

            }

        }else{
            $this->localeException($locale);
            $this->description[$locale] = $param;

        }
        return $this;
    }


    /**
     * @param $description
     * @return $this
     * @throws \Exception
     */
    public function setDescriptionAz($description){
        $this->paramException($description);

        $this->description['ru'] = $description;

        return $this;
    }

    /**
     * @param $description
     * @return $this
     * @throws \Exception
     */
    public function setDescriptionRu($description){
        $this->paramException($description);

        $this->description['ru'] = $description;

        return $this;
    }

    /**
     * @param $description
     * @return $this
     * @throws \Exception
     */
    public function setDescriptionEn($description){
        $this->paramException($description);

        $this->description['en'] = $description;

        return $this;
    }


    /**
     * @param $param
     * @throws \Exception
     */
    protected function paramException($param){
        if (empty($param))
            throw new \Exception('Please fill in the this field!');

    }

    /**
     * @param $locale
     * @throws \Exception
     */
    protected function localeException($locale){
        if (! in_array($locale, config('pulpal.locale')))
            throw new \Exception('Please enter one of these values: az, en, ru');
    }

    /**
     * @param $field
     * @throws \Exception
     */
    public function checkLocaleError($field){
        throw new \Exception('Please enter one of these values: (az, en, ru) for '.$field);
    }

}
