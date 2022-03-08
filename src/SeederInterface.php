<?php declare(strict_types=1);


namespace Qwerty\PosnetPaymentService;

interface SeederInterface
{
    /**
     * @param string $url URL
     * @return void
     * @see curl_init()
     *
     */
    public function setError();

    public function __construct(Config $config);

    public function getFinancal(): Financal;

    public function setFinancal(Financal $value);

    public function getEncClientHash();

    public function getTotalClientHash();


    public function bankdataTest();

    public function merchantDataTest();

    public function singTest();

    public function macTest();

    public function getCurrenyTest();

    public function getXmlSecond();

    public function getOrder(): OrderClass;

    public function setOrder(OrderClass  $value);

    public function getXID();

    public function getXml();

    public function getFinancalXml();



}