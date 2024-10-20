## Yapikredi-Posnet-Service

[![tests](https://github.com/slvler/posnet-payment-service/actions/workflows/tests.yml/badge.svg)](https://github.com/slvler/posnet-payment-service/actions/workflows/tests.yml)
[![Latest Stable Version](https://poser.pugx.org/slvler/posnet-payment-service/v)](https://packagist.org/packages/slvler/posnet-payment-service)
[![Latest Unstable Version](https://poser.pugx.org/slvler/posnet-payment-service/v/unstable)](https://packagist.org/packages/slvler/posnet-payment-service)
[![License](https://poser.pugx.org/slvler/posnet-payment-service/license)](https://packagist.org/packages/slvler/posnet-payment-service)
[![Total Downloads](https://poser.pugx.org/slvler/posnet-payment-service/downloads)](https://packagist.org/packages/slvler/posnet-payment-service)

a Turkish YapiKredi Bank POS service connection for PHP.
#### Composer
```bash
composer require slvler/posnet-payment-service
```
```php
<?php
$conf = [
    'mid' => 'xxxxxxxxxx',
    'tid' => 'xxxxxxxx',
    'clientId' => 'xxxx',
    'clientUser' => 'xxxxxxxx',
    'clientPass' => 'xxxxxxxx',
    'encKey' => 'x,xx,xx,xxx,xxx,xxx,xxx,xxx'
];

$config = new Config($conf); 
?>
```
```php
<?php
$orderData = [
    'amount' => "x",
    'installment' => 'x',
    'tranType' =>  'Sale',
    'cardName' => 'xxxxx xxxxxxxxx',
    'ccno' => 'xxxx xxxx xxxx xxxx',
    'expDate' => 'xxxx',
    'cvc' => 'xxx',
    'currencyCode' => 'TL'
];
$order = new OrderClass($orderData);
?>
```



