<?php

use PhpMqtt\Client\MQTTClient;

require __DIR__ . '/vendor/autoload.php';

$server   = '192.168.0.8';
$port     = 1883;
$clientId = 'publisher-php';

$mqtt = new MQTTClient($server, $port, $clientId);
$mqtt->connect('sensores', 'senha123');
$mqtt->publish('/teste', 'mensagem-mqtt-php-2', 0);
$mqtt->close();