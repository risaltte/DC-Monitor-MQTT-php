<?php

use PhpMqtt\Client\MQTTClient;
use risaltte\DcMonitor\Arcondicionado;

require __DIR__ . '/../vendor/autoload.php';

$arcondicionado = new Arcondicionado();

$mqtt = new MQTTClient('192.168.0.8', 1883, 'dcMqttSub');
$mqtt->connect('sensores', 'senha123');

$mqtt->subscribe('/Datacenter/temperatura', function (string $topic, string $message) use ($arcondicionado) {
    echo sprintf("Mensagem recebida do tópico [%s]: %s\n", $topic, $message);

    // converter string para int
    $temperatura = intval($message);

    $status_temperatura_ambiente = verificarCondicoesTemperaturaAmbiente($temperatura);
 
    echo "\tTratando o ambiente: \n";

    tratarAmbiente($status_temperatura_ambiente, $arcondicionado);

    echo "\n\n";

}, 0);

$mqtt->loop(true);
