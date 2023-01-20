<?php 


namespace slvler\PosnetPaymentService;

interface RequestInterface
{
    /**
     * @param string $url URL
     * @return void
     * @see curl_init()
     *
     */
    public function getXmlUrl();

    public function setXmlUrl($value);

    public function xml_create_request($value);



}