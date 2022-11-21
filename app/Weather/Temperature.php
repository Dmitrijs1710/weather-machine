<?php

namespace App\Weather;

class Temperature
{
    private float $temperature;
    private float $feelsLike;
    private float $tempMin;
    private float $tempMax;
    private int $pressure;
    private int $humidity;

    public function __construct
    (
        float $temperature,
        float $feelsLike,
        float $tempMin,
        float $tempMax,
        int $pressure,
        int $humidity
    )
    {
        $this->temperature = $temperature;
        $this->feelsLike = $feelsLike;
        $this->tempMin = $tempMin;
        $this->tempMax = $tempMax;
        $this->pressure = $pressure;
        $this->humidity = $humidity;
    }

    public function __toString()
    {
        return
            (
                "temperature: $this->temperature, " .
                "feels like: $this->feelsLike, " .
                "temperature min: $this->tempMin, " .
                "temperature max: $this->tempMax, " .
                "pressure: $this->pressure, " .
                "humidity: $this->humidity"
            );
    }


    public function getTemperature(): float
    {
        return $this->temperature;
    }


    public function getPressure(): int
    {
        return $this->pressure;
    }


    public function getHumidity(): int
    {
        return $this->humidity;
    }


    public function getFeelsLike(): float
    {
        return $this->feelsLike;
    }


    public function getTempMax(): float
    {
        return $this->tempMax;
    }


    public function getTempMin(): float
    {
        return $this->tempMin;
    }
}