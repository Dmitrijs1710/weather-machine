<?php

namespace App\Controllers;


use App\ApiClass;
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
        $city=(new ApiClass)->getCityData($cityName);
        include_once 'views/city/index.php';
    }
}