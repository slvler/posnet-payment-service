# Yapikredi-Posnet-Service

------------

```php
Composer
composer require qwerty/posnet-payment-service dev-main

```






```php
<?php

$conf = array(
    'mid' => 'xxxxxxxxxx',
    'tid' => 'xxxxxxxx',
    'clientId' => 'xxxx',
    'clientUser' => 'xxxxxxxx',
    'clientPass' => 'xxxxxxxx',
    'encKey' => 'x,xx,xx,xxx,xxx,xxx,xxx,xxx'
);

  - $config = new Config($conf); 

?>
```


------------
```php
<?php

$orderData = array(
    'amount' => "x",
    'installment' => 'x',
    'tranType' =>  'Sale',
    'cardName' => 'xxxxx xxxxxxxxx',
    'ccno' => 'xxxx xxxx xxxx xxxx',
    'expDate' => 'xxxx',
    'cvc' => 'xxx',
    'currencyCode' => 'TL'
);


$order = new OrderClass($orderData);

?>
```



