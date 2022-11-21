<?php
require_once 'vendor/autoload.php';

use App\City;
use App\Weather\Description;
use App\Weather\Temperature;
use App\Weather;
use App\Weather\Wind;
use App\Coordinates;

$cityName = readline('Enter city name: ');
echo PHP_EOL;

$apiKey = 'cf535c3983a1e276f1b322a4f6afdd40';

$apiByCityUrl = "https://api.openweathermap.org/data/2.5/weather?q={$cityName}&appid={$apiKey}";

// Read JSON file
$jsonData = file_get_contents($apiByCityUrl);
// Decode JSON data into PHP array
$responseData = json_decode($jsonData);
$descriptions = [];
foreach($responseData->weather as $weather){
    $descriptions[] = new Description($weather->main, $weather->description);
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
    )
);
echo $city;