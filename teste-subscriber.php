<?php

use PhpMqtt\Client\MQTTClient;

require __DIR__ . '/vendor/autoload.php';

$server   = '192.168.0.8';
$port     = 1883;
$clientId = 'subscriber-php';

$mqtt = new MQTTClient($server, $port, $clientId);
$mqtt->connect('sensores', 'senha123');

$mqtt->subscribe('/teste', function ($topic, $message) {
    echo sprintf("Mensagem recebida do tópico [%s]: %s\n", $topic, $message);
}, 0);

$mqtt->loop(true);