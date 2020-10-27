<?php

use PhpMqtt\Client\MQTTClient;

require __DIR__ . '/../vendor/autoload.php';

$mqtt = new MQTTClient('192.168.0.8', 1883, 'dcMqttSub');
$mqtt->connect('sensores', 'senha123');

$mqtt->subscribe('/Datacenter/temperatura', function ($topic, $message) {
    echo sprintf("Mensagem recebida do tópico [%s]: %s\n", $topic, $message);
}, 0);

$mqtt->loop(true);