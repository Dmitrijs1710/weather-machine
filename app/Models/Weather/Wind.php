<?php

namespace App\Models\Weather;

class Wind
{
    private float $speed;
    private int $degree;

    public function __construct(float $speed, int $degree)
    {

        $this->speed = $speed;
        $this->degree = $degree;
    }

    public function __toString()
    {
        return (
            "speed: $this->speed, " .
            "degree: $this->degree"
        );
    }

    public function getDegree(): int
    {
        return $this->degree;
    }

    public function getSpeed(): float
    {
        return $this->speed;
    }
}