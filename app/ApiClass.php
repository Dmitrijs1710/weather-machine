<?php

namespace App;

use App\Models\City;
use App\Models\Coordinates;
use App\Models\Weather;
use App\Models\Weather\Description;
use App\Models\Weather\Temperature;
use App\Models\Weather\Wind;

class ApiClass{
    private string $apiKey;
    public function __construct()
    {

        $this->apiKey=$_ENV['API_KEY'];
    }

    public function getCityData(string $cityName) :?City
    {
        $apiByCityUrl = "https://api.openweathermap.org/data/2.5/weather?q=$cityName&appid=$this->apiKey&units=metric";

// Read JSON file
        $jsonData = file_get_contents($apiByCityUrl);

        if ($jsonData !== false) {
            // Decode JSON data into PHP array
            $responseData = json_decode($jsonData);
            $descriptions = [];
            foreach ($responseData->weather as $weather) {
                $descriptions[] = new Description($weather->main, $weather->description, $weather->id, $weather->icon);
            }

            return new City(
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
        return null;
    }
}