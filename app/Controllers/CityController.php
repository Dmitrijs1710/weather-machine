<?php

namespace App\Controllers;


use App\Models\City;
use App\Models\Coordinates;
use App\Models\Weather;
use App\Models\Weather\Description;
use App\Models\Weather\Temperature;
use App\Models\Weather\Wind;

class CityController
{
    public function getCity(string $cityName = 'Riga')
    {
        $apiKey = 'cf535c3983a1e276f1b322a4f6afdd40';

        $apiByCityUrl = "https://api.openweathermap.org/data/2.5/weather?q=$cityName&appid=$apiKey&units=metric";

// Read JSON file
        $jsonData = file_get_contents($apiByCityUrl);

        if ($jsonData !== false) {
            // Decode JSON data into PHP array
            $responseData = json_decode($jsonData);
            $descriptions = [];
            foreach ($responseData->weather as $weather) {
                $descriptions[] = new Description($weather->main, $weather->description, $weather->id, $weather->icon);
            }

            $city = new City(
                $responseData->name,
                new Coordinates(
                    $responseData->coord->lat,
                    $responseData->coord->lon
                ),
                new Weather(
                    $descriptions,
                    new Wind(
                        $responseData->wind->speed,
                        $responseData->wind->deg
                    ),
                    new Temperature(
                        $responseData->main->temp,
                        $responseData->main->feels_like,
                        $responseData->main->temp_min,
                        $responseData->main->temp_max,
                        $responseData->main->pressure,
                        $responseData->main->humidity,
                    )
                ),
                $responseData->sys->country
            );
        }
        include_once 'views/city/index.php';
    }
}