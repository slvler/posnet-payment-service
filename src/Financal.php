<?php

namespace slvler\PosnetPaymentService;

class Financal implements FinancalInterface
{

    private $EncKey;
    private $orderId;
    private $amount;
    private $curreny;
    private $bank_data;
    private $merchantPacket;
    private $sing;


    public function __construct(?array $financalClass = [])
    {
        if ($financalClass) {

            $this->setEncKey($financalClass['enckey']);
            $this->setOrderId($financalClass['orderId']);
            $this->setAmount($financalClass['amount']);

            $this->setCurreny($financalClass['curreny']);
            $this->setBankData($financalClass['bank_data']);

            $this->setMerchantPacket($financalClass['merchantPacket']);
            $this->setSing($financalClass['sing']);


        }
    }

    public function setEncKey($value)
    {
        return $this->EncKey = $value;
    }

    public function getEncKey(): string
    {
        return $this->EncKey;
    }

    public function setOrderId($value)
    {
        $this->orderId = $value;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function setAmount($value)
    {
        $this->amount = $value;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getFormatAmount(): int
    {
        return (int)str_replace('.', '', (string)($this->getAmount() * 100));
    }

    public function setCurreny($value)
    {
        return $this->curreny = $value;

    }

    public function getCurreny(): string
    {
        return $this->curreny;
    }

    public function setBankData($value)
    {
        return $this->bank_data = $value;
    }

    public function getBankData(): string
    {
        return $this->bank_data;
    }

    public function setMerchantPacket($value)
    {
        return $this->merchantPacket = $value;
    }

    public function getMerchantPacket(): string
    {
        return $this->merchantPacket;
    }

    public function setSing($value)
    {
        return $this->sing = $value;
    }

    public function getSing(): string
    {
        return $this->sing;
    }


}