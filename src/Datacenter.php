<?php

namespace risaltte\DcMonitor;

class Datacenter
{
    private int $temperaturaDC;

    public function __construct()
    {
        $this->temperaturaDC = rand(15, 35);
    }

    public function temperaturaDC(): int
    {
        $this->temperaturaDC = rand(15, 35);
        
        return $this->temperaturaDC;
    }

    public function temperatura(): int
    {
        return $this->temperaturaDC;
    }
}