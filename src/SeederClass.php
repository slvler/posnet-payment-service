<?php

namespace slvler\PosnetPaymentService;


use DOMDocument;

class SeederClass extends Client implements SeederInterface
{

   use Hash;



    private $firstHash;
    private $SecondHash;

    private $order;

    private $const;

    private $error;



    private $orderkey;

    private $secondHash;


    /* Mac İşlemleri Valueler */

    private $financal;

    private $EncClientHash;

    /* Mac İşlemleri Valueler Son */


    public function setError()
    {
        return $this->error = "hata";
    }

    public function __construct(Config $config)
    {
        parent::__construct($config);

    }


    /* Success Mac İşlemleri */

    public function getFinancal(): Financal
    {
        return $this->financal;
    }

    public function setFinancal(Financal $value)
    {
        $this->financal = $value;

        return $this;
    }

    public function getEncClientHash()
    {

        //$store_key = "67943456";

        $value = $this->getEncKey().";".$this->getTid();
        $this->EncClientHash = $this->StringHash($value);
        return $this->EncClientHash;
    }

    public function getTotalClientHash()
    {

 

       $this->secondHash = $this->financal->getOrderId().";".$this->financal->getFormatAmount().";".$this->financal->getCurreny().";".$this->getMid().";".$this->getEncClientHash();

       return $this->StringHash($this->secondHash);
    }

    protected function generateHashFinancal()
    {
        try {
            $this->SecondHash[] =
                [
                    'bankdata' => $this->financal->getBankData(),
                    'merchantData' => $this->financal->getMerchantPacket(),
                    'sing' => $this->financal->getSing(),
                    'mac' => $this->getTotalClientHash()
                ];

            return $this->SecondHash;
        } catch (\Exception $e) {
            throw new $e->getMessage();
        }
    }

    public function bankdataTest()
    {
        return $this->financal->getBankData();
    }

    public function merchantDataTest()
    {
        return $this->financal->getMerchantPacket();

    }

    public function singTest()
    {
        return $this->financal->getSing();
    }

    public function macTest()
    {
        return $this->getTotalClientHash();
    }

    public function getCurrenyTest()
    {
        return $this->financal->getCurreny();
    }


   
    



    public function getXmlSecond()
    {

      
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->preserveWhiteSpace = false;
        $xml->formatOutput = true;

       

        $root = $xml->createElement("posnetRequest");
        $mid = $xml->createElement('mid', $this->getMid() );
        $tid = $xml->createElement('tid', $this->getTid() );

        $root->appendChild($mid);
        $root->appendChild($tid);

 

        foreach ($this->generateHashFinancal() as $hash) {
            $senderNode = $this->createPartySecond($xml, 'oosResolveMerchantData', $hash['bankdata'], $hash['merchantData'], $hash['sing'], $hash['mac']);

            $root->appendChild($senderNode);
        }


      
        $xml->appendChild($root);

        return $xml->saveXML();
    }

    private function createPartySecond(DOMDocument $xml, $elementName, $bankdata, $merchantPacket, $sing, $mac)
    {
        $node = $xml->createElement($elementName);

        $node->appendChild($xml->createElement("bankData", $bankdata));
        $node->appendChild($xml->createElement("merchantData", $merchantPacket));
        $node->appendChild($xml->createElement("sign", $sing));
        $node->appendChild($xml->createElement("mac", $mac));


        return $node;
    }

    /*  Succes Maç İşlemleri Sonu*/


    /* Order işlemler Başlangıç */

    public function getOrder(): OrderClass
    {
        return $this->order;
    }

    public function setOrder(OrderClass  $value)
    {
        $this->order = $value;
        return $this;
    }

    public function getXID()
    {

        $value = "XXX".strtoupper(substr(md5(microtime()), 0,17));

        return $this->orderkey = $value;

    }

    protected function generateHash()
    {
        try {
            $this->firstHash[] =
                [
                'posnetid' => $this->getClientId(),
                'XID' => $this->getXID(),
                'amount' => $this->order->getFormatAmount(),
                'currencyCode' => $this->order->getcurrencyCode(),
                'installment' => $this->order->getInstallment(),
                 'tranType' => $this->order->getTrantype(),
                'cardHolderName' => $this->order->getCardName(),
                'ccno' => $this->order->getFormatCcno(),
                'expDate' => $this->order->getExpDate(),
                'cvc' => $this->order->getCvc()
                ];

            return $this->firstHash;
        } catch (\Exception $e) {
            throw new $e->getMessage();
        }
    }

    public function getXml()
    {



        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->preserveWhiteSpace = false;
        $xml->formatOutput = true;




        $root = $xml->createElement("posnetRequest");
        $mid = $xml->createElement('mid', $this->getMid() );
        $tid = $xml->createElement('tid', $this->getTid() );


        $root->appendChild($mid);
        $root->appendChild($tid);


        foreach ($this->generateHash() as $hash) {
            $senderNode = $this->createParty($xml, 'oosRequestData', $hash['posnetid'] , $hash['XID'],$hash['amount'],$hash['currencyCode'],$hash['installment'],$hash['tranType'],$hash['cardHolderName'],$hash['ccno'],$hash['expDate'],$hash['cvc'] );

            $root->appendChild($senderNode);
        }

        $xml->appendChild($root);

        return $xml->saveXML();
    }

    private function createParty(DOMDocument $xml, $elementName, $posnetid, $XID, $amount, $currencyCode , $installment, $tranType, $cardHolderName, $ccno, $expDate, $cvc)
    {
        $node = $xml->createElement($elementName);

        $node->appendChild($xml->createElement("posnetid", $posnetid));
        $node->appendChild($xml->createElement("XID", $XID));
        $node->appendChild($xml->createElement("amount", $amount));
        $node->appendChild($xml->createElement("currencyCode", $currencyCode));
        $node->appendChild($xml->createElement("installment", $installment));
        $node->appendChild($xml->createElement("tranType", $tranType));
        $node->appendChild($xml->createElement("cardHolderName", $cardHolderName));
        $node->appendChild($xml->createElement("ccno", $ccno));
        $node->appendChild($xml->createElement("expDate", $expDate));
        $node->appendChild($xml->createElement("cvc", $cvc));

        return $node;
    }

    /* Finansal tamamlama */

    protected function generateHashEnd()
    {
        try {
            $this->ThreeHash[] =
                [
                    'bankdata' => $this->financal->getBankData(),
                    'mac' => $this->getTotalClientHash()
                ];

            return $this->ThreeHash;
        } catch (\Exception $e) {
            throw new $e->getMessage();
        }
    }

    public function getFinancalXml()
    {
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->preserveWhiteSpace = false;
        $xml->formatOutput = true;

        $root = $xml->createElement("posnetRequest");
        $mid = $xml->createElement('mid', $this->getMid() );
        $tid = $xml->createElement('tid', $this->getTid() );

        $root->appendChild($mid);
        $root->appendChild($tid);


        foreach ($this->generateHashEnd() as $hash) {
            $senderNode = $this->createPartyFinans($xml, 'oosTranData', $hash['bankdata'], $hash['mac']);

            $root->appendChild($senderNode);
        }

        $xml->appendChild($root);

        return $xml->saveXML();
    }

    private function createPartyFinans(DOMDocument $xml, $elementName, $bankdata, $mac)
    {
        $node = $xml->createElement($elementName);

        $node->appendChild($xml->createElement("bankData", $bankdata));
        $node->appendChild($xml->createElement("mac", $mac));


        return $node;
    }






}



?>