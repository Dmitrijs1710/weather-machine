<?php

namespace App;

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

    /**
     * @return float
     */
    public function getLon(): float
    {
        return $this->lon;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }
}