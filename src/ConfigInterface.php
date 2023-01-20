<?php declare(strict_types=1);

namespace slvler\PosnetPaymentService;

interface ConfigInterface
{
    /**
     * @param string $url URL
     * @return void
     * @see curl_init()
     *
     */

    public function __construct(Array $value);

    public function getPostUrl(): string;

    public function getApiUrl(): string;

    public function setMid($value);

    public function getMid(): string;

    public function setTid($value);

    public function getTid(): string;

    public function setClientId($value);

    public function getClientId(): string;

    public function setClientUser($value);

    public function getClientUser(): string;

    public function setClientPass($value);

    public function getClientPass(): string;

    public function setEncKey($value);

    public function getEncKey(): string;



}