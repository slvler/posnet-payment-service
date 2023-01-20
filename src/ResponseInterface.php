<?php declare(strict_types=1);

namespace slvler\PosnetPaymentService;

interface ResponseInterface
{
    public function __construct($requestClass);

    public function getRequestClassSimpleXml();

    public function getRequestClassJson();

    public function getRequestClass();

    public function ResponseRequest();

}