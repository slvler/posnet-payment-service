<?php declare(strict_types=1);

namespace Qwerty\PosnetPaymentService;



interface ResponseInterface
{
    /**
     * @param string $url URL
     * @return void
     * @see curl_init()
     *
     */
    public function __construct($requestClass);

    public function getRequestClassSimpleXml();

    public function getRequestClassJson();

    public function getRequestClass();

    public function ResponseRequest();




}