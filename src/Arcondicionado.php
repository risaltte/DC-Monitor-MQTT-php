<?php

namespace risaltte\DcMonitor;

class Arcondicionado 
{
    private bool $powerOn;
    private int $temperatura;

    public function __construct()
    {
        $this->powerOn = true;
        $this->temperatura = 22;
    }

    public function infoArcondicionado(): string
    {
        $power = $this->arEstaLigado() ? 'On' : 'Off';
        $temperatura = $this->arEstaLigado() ? $this->temperatura : '';
       
        return "\tAr => Power: {$power}, Temperatura: {$temperatura}\n";
    }

    public function setTemperatura(int $valor): void 
    {
        $this->temperatura = $valor;
    }

    public function temperatura(): int
    {
        return $this->temperatura;
    }

    public function ligarArCondicionado(): void
    {
        if ($this->arEstaLigado()) {
            echo "\tO ar condicionado já está ligado, baixando a temperatura.\n";
            $this->setTemperatura($this->temperatura() - 2);
            if ($this->temperatura < 18) {
                $this->setTemperatura(18);
                echo "\tA temperartura já está no mínimo. Verifique a sala!!!\n";
            }
            return;
        }

        $this->powerOn = true;
    }

    public function desligarArConcidionado(): void
    {
        if (!$this->arEstaLigado()) {
            echo "\tO ar condicionado já está desligado. Verifique a sala!!!\n";
            return;
        }

        $this->setTemperatura(0);
        $this->powerOn = false;
    }

    private function arEstaLigado(): bool
    {
        return $this->powerOn;
    }
}