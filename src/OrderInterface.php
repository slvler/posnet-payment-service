<?php declare(strict_types=1);

namespace slvler\PosnetPaymentService;

interface OrderInterface
{
    /**
     * @param string $url URL
     * @return void
     * @see curl_init()
     *
     */
    public function __construct(array $value);

    public function setAmount($value);

    public function getAmount(): float;

    public function getFormatAmount(): int;

    public function setInstallment($value);

    public function getInstallment(): string;

    public function setTranType($value);

    public function getTrantype(): string;

    public function setCardName($value);

    public function getCardName(): string;

    public function setCCno($value);

    public function getCcno(): string;

    public function getFormatCcno(): int;

    public function setExpDate($value);

    public function getExpDate(): string;

    public function setCvc($value);

    public function getCvc(): string;

    public function setCurrencyCode($value);

    public function getCurrencyCode(): string;



}