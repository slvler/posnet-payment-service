<?php

namespace slvler\PosnetPaymentService;


class RequestClass implements RequestInterface {
    private $params = array();

    private $XmlUrl;

    private $userAgent;



        public function getXmlUrl()
        {
            return $this->XmlUrl;
        }

        public function setXmlUrl($value)
        {
            $this->XmlUrl = $value;
            return $this;
        }

        private function getUserAgent()
        {
            return $this->userAgent = $_SERVER['HTTP_USER_AGENT'];
        }


    function xml_create_request($xml)
    {
       

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->getXmlUrl());
        curl_setopt($ch, CURLOPT_USERAGENT, $this->getUserAgent());
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            "xmldata=" . $xml);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;

    }



}