<?php

namespace slvler\PosnetPaymentService;

trait Hash
{
    function StringHash($originalString){
        return base64_encode(hash('sha256',$originalString,true));
    }
}

?>