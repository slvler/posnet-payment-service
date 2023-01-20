<?php

namespace slvler\PosnetPaymentService;


class OrderClass
{

    private $amount;
    private $installment;
    private $tranType;
    private $cardName;
    private $ccNo;
    private $expDate;
    private $cvc;
    private $currencyCode;

    private $client;

    public function __construct(?array $OrderClass = [])
    {

        if ($OrderClass) {

            $this->setAmount($OrderClass['amount']);
            $this->setInstallment($OrderClass['installment']);

            $this->setTranType($OrderClass['tranType']);
            $this->setCardName($OrderClass['cardName']);


            $this->setCCno($OrderClass['ccno']);
            $this->setExpDate($OrderClass['expDate']);
            $this->setCvc($OrderClass['cvc']);


            $this->setCurrencyCode($OrderClass['currencyCode']);
        }
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

    public function setInstallment($value)
    {
        $this->installment = $value;
    }

    public function getInstallment(): string
    {
        return $this->installment;
    }

    public function setTranType($value)
    {
        $this->tranType = $value;
    }

    public function getTrantype(): string
    {
        return $this->tranType;
    }

    public function setCardName($value)
    {
        $this->cardName = $value;
    }

    public function getCardName(): string
    {
        return $this->cardName;
    }

    public function setCCno($value)
    {
        $this->ccNo = $value;
    }

    public function getCcno(): string
    {
        return $this->ccNo;
    }

    public function getFormatCcno(): int
    {
        return (int)str_replace(' ', '', (string)($this->getCcno()));
    }

    public function setExpDate($value)
    {
        $this->expDate = $value;
    }

    public function getExpDate(): string
    {
        return $this->expDate;
    }

    public function setCvc($value)
    {
        $this->cvc = $value;
    }

    public function getCvc(): string
    {
        return $this->cvc;
    }

    public function setCurrencyCode($value)
    {
        $this->currencyCode = $value;
    }

    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }



}