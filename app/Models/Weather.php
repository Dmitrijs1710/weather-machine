<?php

namespace App\Models;

class Weather
{
    private array $descriptions;
    private Weather\Wind $wind;
    private Weather\Temperature $temperature;

    public function __construct(
        array               $descriptions,
        Weather\Wind        $wind,
        Weather\Temperature $temperature
    )
    {
        $this->descriptions = $descriptions;
        $this->wind = $wind;
        $this->temperature = $temperature;
    }

    public function __toString()
    {
        return (
            "descriptions-> [" . implode("], [", $this->descriptions) . "]\n" .
            "temperature-> $this->temperature\n" .
            "wind-> $this->wind\n"
        );
    }


    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    public function getWind(): Weather\Wind
    {
        return $this->wind;
    }


    public function getTemperature(): Weather\Temperature
    {
        return $this->temperature;
    }
}