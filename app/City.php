<?php

namespace App;

class City
{
    private string $name;
    private Weather $weather;
    private Coordinates $coordinate;

    public function __construct(string $name, Coordinates $coordinate, Weather $weather)
    {

        $this->name = $name;
        $this->weather = $weather;
        $this->coordinate = $coordinate;
    }

    public function __toString()
    {
        return (
            "City: $this->name\n" .
            "coordinates-> $this->coordinate \n" .
            "weather->{\n$this->weather}\n"
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCoordinate(): Coordinates
    {
        return $this->coordinate;
    }

    public function getWeather(): Weather
    {
        return $this->weather;
    }
}