<?php

use PhpMqtt\Client\MQTTClient;
use risaltte\DcMonitor\Datacenter;
use risaltte\DcMonitor\Sensor;


require __DIR__ . "/../vendor/autoload.php";

$dataCenter = new Datacenter();
$sensor = new Sensor();

$ehParaExecutar = true;
while($ehParaExecutar) {

    for ($i = 1; $i < 11; $i++) {
        // sensor medindo a temperatura do Datacenter
        $sensor->medirTemperatura($dataCenter->temperaturaDC());

        // exibir temperatura do Datacenter e temperatura coletada pelo sensor
        echo "{$i} - Temperatura DC: {$dataCenter->temperatura()} , Medição sensor: {$sensor->temperatura()}\n";

        // Publicar temperatura no brocker com o MQTT
        $dcMqttPub = new MQTTClient('192.168.0.8', 1883, 'dcMqttPub');
        $dcMqttPub->connect('sensores', 'senha123');
        $dcMqttPub->publish('/Datacenter/temperatura', $sensor->temperatura(), 0);
        $dcMqttPub->close();

        // pausa o código por um tempo (em segundos)
        sleep(10);
    }

    $executar = readline("Deseja continuar a execução? (s/n) : ");
    $ehParaExecutar = $executar !== 's' ? false : true;
}
