# 

## Yapikredi-Posnet-Service
[![Latest Stable Version](http://poser.pugx.org/qwerty/posnet-payment-service/v)](https://packagist.org/packages/qwerty/posnet-payment-service)
[![Latest Unstable Version](http://poser.pugx.org/qwerty/posnet-payment-service/v/unstable)](https://packagist.org/packages/qwerty/posnet-payment-service) 
[![License](http://poser.pugx.org/qwerty/posnet-payment-service/license)](https://packagist.org/packages/qwerty/posnet-payment-service) 
[![PHP Version Require](http://poser.pugx.org/qwerty/posnet-payment-service/require/php)](https://packagist.org/packages/qwerty/posnet-payment-service)


a Turkish YapiKredi Bank POS service connection for PHP.


#### Config

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



