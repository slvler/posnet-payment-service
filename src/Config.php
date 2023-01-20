<?php

namespace slvler\PosnetPaymentService;

class Config implements ConfigInterface
{

    private $postUrl;
    private $getApiUrl;

    private $Mid;
    private $Tid;
    private $ClientId;
    private $ClientUser;
    private $ClientPass;
    private $encKey;

    public function __construct(?array $config = [])
    {

        if ($config) {

            $this->getPostUrl();
            $this->getApiUrl();
            $this->setMid($config['mid']);
            $this->setTid($config['tid']);
            $this->setClientId($config['clientId']);
            $this->setClientUser($config['clientUser']);
            $this->setClientPass($config['clientPass']);
            $this->setEncKey($config['encKey']);

        }
    }

    public function getPostUrl(): string
    {
        $this->postUrl = "https://posnet.yapikredi.com.tr/3DSWebService/YKBPaymentService";
        return $this->postUrl;
    }

    public function getApiUrl(): string
    {
        $this->getApiUrl = "https://posnet.yapikredi.com.tr/PosnetWebService/XML";
        return $this->getApiUrl;
    }

    public function setMid($value)
    {
        return $this->Mid = $value;
    }

    public function getMid(): string
    {
        return $this->Mid;
    }

    public function setTid($value)
    {
        return $this->Tid = $value;
    }

    public function getTid(): string
    {
        return $this->Tid;
    }

    public function setClientId($value)
    {
        return $this->ClientId = $value;
    }

    public function getClientId(): string
    {
        return $this->ClientId;
    }

    public function setClientUser($value)
    {
        return $this->ClientUser = $value;
    }

    public function getClientUser(): string
    {
        return $this->ClientUser;
    }

    public function setClientPass($value)
    {
        return $this->ClientPass = $value;
    }

    public function getClientPass(): string
    {
        return $this->ClientPass;
    }

    public function setEncKey($value)
    {
        return $this->encKey = $value;
    }

    public function getEncKey(): string
    {
        return $this->encKey;
    }


}


?>