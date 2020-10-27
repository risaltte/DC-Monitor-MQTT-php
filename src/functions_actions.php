<?php

use risaltte\DcMonitor\Arcondicionado;

function verificarCondicoesTemperaturaAmbiente(int $temperatura): string
{
    if ($temperatura <= 17) {
        return 'MUITO_BAIXA';
    }

    if ($temperatura >= 18 && $temperatura <= 27) {
        return 'BOA';
    }

    if ($temperatura >= 28) {
        return 'MUITO_ALTA';
    }
}

function tratarAmbiente(string $status_temperatura_ambiente, Arcondicionado $arcondicionado): void
{
    if ($status_temperatura_ambiente === 'BOA') {
        echo "\tA temperatura está BOA. \n\tNenhuma ação será necessária.\n";
        echo $arcondicionado->infoArcondicionado();
        return;
    }

    if ($status_temperatura_ambiente === 'MUITO_BAIXA') {
        echo "\tALERTA: temperatura está MUITO BAIXA. \n\tConfigurar o ar condicionado\n.";
        $arcondicionado->desligarArConcidionado();
        echo $arcondicionado->infoArcondicionado();
        return;
    }

    if ($status_temperatura_ambiente === 'MUITO_ALTA') {
        echo "\tALERTA: temperatura está MUITO ALTA. \n\tConfigurar o ar condicionado.\n";
        $arcondicionado->ligarArCondicionado();
        echo $arcondicionado->infoArcondicionado();
        return;
    }
}