<?php

namespace App\Models;

class Coordinates
{
    private float $lat;
    private float $lon;

    public function __construct(float $lat, float $lon)
    {
        $this->lat = $lat;
        $this->lon = $lon;
    }

    public function __toString()
    {
        return (
        "lat: $this->lat, lon: $this->lon"
        );
    }

    public function getLon(): float
    {
        return $this->lon;
    }


    public function getLat(): float
    {
        return $this->lat;
    }
}