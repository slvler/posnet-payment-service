<?php

/*
 * sabit değişkenlerin ve verilerin kullanıldığı
 */


namespace Qwerty\PosnetPaymentService;


class Client implements ClientInterface {



    private $PostUrl;
    private $XmlUrl;

    private $Tid;
    private $Mid;

    private $ClientId;
    private $ClientPass;
    private $ClientUser;


    private $EncKey;

    public function __construct(Config $config)
    {
        $this->setPostUrl($config->getPostUrl());
        $this->setXmlUrl($config->getApiUrl());

        $this->setMid($config->getMid());
        $this->setTid($config->getTid());

        $this->setClientId($config->getClientId());
        $this->setClientUser($config->getClientUser());
        $this->setClientPass($config->getClientPass());

        $this->setEncKey($config->getEncKey());

    }

    function setPostUrl($value)
    {
        $this->PostUrl = $value;
    }

    function getPostUrl(): string
    {
        return $this->PostUrl;
    }

    function setXmlUrl($value)
    {
        $this->XmlUrl = $value;
    }

    function getXmlUrl(): string
    {
        return $this->XmlUrl;
    }

    function setTid($value)
    {
        return $this->Tid = $value;
    }

    function getTid(): string
    {
        return $this->Tid;
    }

    function setMid($value)
    {
        $this->Mid = $value;
    }

    function getMid(): string
    {
        return $this->Mid;
    }

    function setClientId($value)
    {
        return $this->ClientId = $value;
    }

    function getClientId(): string
    {
        return $this->ClientId;
    }

    function setClientPass($value)
    {
        return $this->ClientPass = $value;
    }

    function getClientPass(): string
    {
        return $this->ClientPass;
    }

    function setClientUser($value)
    {
        return $this->ClientUser = $value;
    }

    function getClientUser(): string
    {
        return $this->ClientUser;
    }

    function setEncKey($value)
    {
        return $this->EncKey = $value;
    }

    function getEncKey(): string
    {
        return $this->EncKey;
    }


}



?>