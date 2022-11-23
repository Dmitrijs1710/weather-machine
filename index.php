<?php
require_once 'vendor/autoload.php';

use App\City;
use App\Weather\Description;
use App\Weather\Temperature;
use App\Weather;
use App\Weather\Wind;
use App\Coordinates;

if (!empty($_GET) && !empty($_GET['city'])) {
    $cityName = $_GET['city'];
} else {
    $cityName = 'Riga';
}
echo PHP_EOL;

$apiKey = 'cf535c3983a1e276f1b322a4f6afdd40';

$apiByCityUrl = "https://api.openweathermap.org/data/2.5/weather?q=$cityName&appid=$apiKey&units=metric";

// Read JSON file
$jsonData = file_get_contents($apiByCityUrl);
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

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">

    <title>Weather Machine</title>
</head>
<body>
<div class="wrapper">
    <header id="header">
        <img id="header-img" src="assets/img/Weather.jpg" alt="logo">
    </header>
    <nav>
        <div class="nav-content">
            <a href="/?city=Riga">Riga</a>
        </div>
        <div class="nav-content">
            <a href="/?city=Tallinn">Tallinn</a>
        </div>
        <div class="nav-content">
            <a href="/?city=Vilnius">Vilnius</a>
        </div>
    </nav>
    <main>
        <?php if (!empty($city)) { ?>
            <div class="main-content">
                <div class="weather-content">
                    <div class="weather">
                        <img class="weather-img"
                             src="https://openweathermap.org/img/wn/<?php echo $city->getWeather()->getDescriptions()[0]->getIcon() ?>@2x.png"
                             alt="<?php echo $city->getWeather()->getDescriptions()[0]->getDescription() ?>">
                    </div>
                    <div class="temperature-content">
                        <div class="temperature">
                            <div id="temperature-data"><?php echo round($city->getWeather()->getTemperature()->getTemperature()) ?></div>
                            <button id="celsius-button">C</button>
                            <button id="fahrenheit-button">F</button>
                        </div>
                        <div class="feels-like-content">
                            (
                            <div id="feels-like-data"><?php echo round($city->getWeather()->getTemperature()->getFeelsLike()) ?></div>
                            <div id="feels-like-type">C</div>
                            )
                        </div>
                    </div>
                    <div class="additional-content">
                        <div class="humidity">
                            Humidity: <?php echo $city->getWeather()->getTemperature()->getHumidity() ?>
                            %
                        </div>
                        <div class="pressure">
                            Pressure: <?php echo $city->getWeather()->getTemperature()->getPressure() ?>
                            gPa
                        </div>
                        <div class="wind">
                            Wind : <?php echo $city->getWeather()->getWind()->getSpeed() ?> km/h
                            <img class="wind-arrow-img"
                                 style="rotate: <?php echo $city->getWeather()->getWind()->getDegree() ?>"
                                 src="./assets/img/wind-arrow.png" alt="wind arrow">
                        </div>
                    </div>
                </div>
                <div class="city-content">
                    <div class="city-name"><?php echo $city->getName() . ', ' . $city->getCountry() ?></div>
                    <div class="city-main"><?php echo $city->getWeather()->getDescriptions()[0]->getMain() ?></div>
                </div>
            </div>
            <form id="city-input-form">
                <label class='label' for='city'>Enter a city: </label>
                <br>
                <input class="input" type='text' id="city" name='city'>
                <br>
                <input class="input-button" type='submit' value='Submit'>
            </form>


        <?php } else { ?>
            <br>
            <div>Incorrect city input</div>
        <?php } ?>

    </main>
    <footer id="footer">
        2022 by Dmitrijs Fofanovs ©
    </footer>
</div>
<script src="assets/js/plugin.js"></script>
</body>
</html>



