<?php declare(strict_types=1);

namespace slvler\PosnetPaymentService;

interface FinancalInterface
{
    /**
     * @param string $url URL
     * @return void
     * @see curl_init()
     *
     */
    public function __construct(array $value);

    public function setEncKey($value);

    public function getEncKey(): string;

    public function setOrderId($value);

    public function getOrderId(): string;

    public function setAmount($value);

    public function getAmount(): float;

    public function getFormatAmount(): int;

    public function setCurreny($value);

    public function getCurreny(): string;

    public function setBankData($value);

    public function getBankData(): string;

    public function setMerchantPacket($value);

    public function getMerchantPacket(): string;

    public function setSing($value);

    public function getSing(): string;




}