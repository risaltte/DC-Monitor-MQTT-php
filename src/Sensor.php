<?php

namespace risaltte\DcMonitor;

class Sensor 
{
    private int $temperatura;

    public function medirTemperatura(int $temperatura): void
    {
        $this->temperatura = $temperatura;
    }

    public function temperatura(): int
    {
        return $this->temperatura;
    }
}