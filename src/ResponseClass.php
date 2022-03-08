<?php

/*
 * requestlerden dönen verilerin çözülmesi
 *
 */

namespace Qwerty\PosnetPaymentService;

class ResponseClass implements ResponseInterface
{

    private $requestClass;
    private $requestArr = [];

    public function __construct($requestClass)
    {
        $this->requestClass = $requestClass;
    }

    public function getRequestClassSimpleXml()
    {
        return simplexml_load_string($this->requestClass);
    }

    public function getRequestClassJson()
    {
        $this->requestArr = json_decode(json_encode($this->getRequestClassSimpleXml()));
    }

    public function getRequestClass()
    {
        return $this->requestArr;
    }

    public function ResponseRequest()
    {
        $post = "https://posnet.yapikredi.com.tr/3DSWebService/YKBPaymentService";
              
             return $content = ' <!DOCTYPE html>
                <html lang="en" xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta charset="utf-8" />
                <title></title>
                <script type="text/javascript" src="yapikredi.js"></script>
                <script type="text/javascript">
                function moveWindow() {
                    document.pay_form.submit();
                }
                </script>
                </head>
                <body onLoad="javascript:moveWindow()">
                <form name="pay_form" method="post" action="'.$post.'" style="display:none;">
                <input name="mid" type="hidden" id="mid" value="xxxxxxxxxx" />
                <input name="posnetID" type="hidden" id="PosnetID" value="xxxx" />
                <input name="posnetData" type="hidden" id="posnetData" value="'.$this->requestArr->oosRequestDataResponse->data1.'" />
                <input name="posnetData2" type="hidden" id="posnetData2" value="'.$this->requestArr->oosRequestDataResponse->data2.'" />
                <input name="digest" type="hidden" id="sign" value="'.$this->requestArr->oosRequestDataResponse->sign.'" />
                <input name="vftCode" type="hidden" id="vftCode" value="" />
                <input name="merchantReturnURL" type="hidden" id=" merchantReturnURL" value="example/success.php" />
                <input name="lang" type="hidden" id="lang" value="tr" />
                <input name="url" type="hidden" id="url" value="example/success.php" />
                <input name="openANewWindow" type="hidden" id="openANewWindow" value="0" />
                <input type="submit" name="Submit" value="Doğrulama Yap" onclick="submitFormEx(formName, 0, "YKBWindow")" />
                </form>
                </body>
                </html>';
       
    }


 



}