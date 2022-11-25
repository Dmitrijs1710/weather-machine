<?php

namespace App\Models;

class City
{
    private string $name;
    private Weather $weather;
    private Coordinates $coordinate;
    private string $country;

    public function __construct(string $name, Coordinates $coordinate, Weather $weather, string $country)
    {

        $this->name = $name;
        $this->weather = $weather;
        $this->coordinate = $coordinate;
        $this->country = $country;
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

    public function getCountry(): string
    {
        return $this->country;
    }
}