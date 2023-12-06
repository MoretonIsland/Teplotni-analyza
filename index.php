<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Teplotni analyza</title>
</head>
<body>

<?php
include 'CityTemperature.php';
include 'TemperatureAnalyzer.php';

$temperatures = require 'temperatures.php';

 /* Asociativní pole $cityAbbreviations, neboli datová struktura, kde klíčem je zkratka města a hodnotou je název města. */


$cityAbbreviations = array(
    'BR' => 'Brisbane',
    'GC' => 'Gold Coast',
    'SC' => 'Sunshine Coast',
    'TSV' => 'Townsville',
    'CR' => 'Cairns',
    'GL' => 'Gladstone',
    'KB' => 'Karumba',
    'MI' => 'Mount Isa',
    'EM' => 'Emerald',
    'SG' => 'St.George',
    'SE' => 'Seisia',
);

/* Vytvoření objektů CityTemperature pro každé město */

$cities = [];
foreach ($temperatures as $day => $cityTemperatures) {
    foreach ($cityTemperatures as $cityAbbreviation => $temperature) {
        $cityName = $cityAbbreviations[$cityAbbreviation];
        $cities[$cityName] = new CityTemperature($cityName, []);
        $cities[$cityName]->temperatures[] = $temperature;
    }
}

/* Vytvoření objektu TemperatureAnalyzer */
$temperatureAnalyzer = new TemperatureAnalyzer();

/* Přidání měst do objektu TemperatureAnalyzer */
foreach ($cities as $city) {
    $temperatureAnalyzer->addCity($city);
}

/* Získání výsledků z objektu TemperatureAnalyzer */
$overallAverageTemperature = $temperatureAnalyzer->overallAverageTemperature();
$highestOverallTemperature = $temperatureAnalyzer->highestOverallTemperature();

?>

<!-- Prezentace výsledků teplotní analýzy na webové stránce -->

<!-- Výsledky teplotní analýzy -->
<h1>Temperature analysis from October 2023</h1>
<p>City temperatures in the state of Queensland</p>

<!-- Vkládání výsledků do kontejneru -->
<div id="results">

<h2>Average temperature:</h2>
<ul>
    <?php

    /* Kód, který řadí názvy měst podle abecedy pro průměrnou teplotu. */
    $sortedCities = $cities;
    usort($sortedCities, function ($a, $b) {
        return strcmp($a->name, $b->name);
    });

    foreach ($sortedCities as $city): ?>
        <li><?php echo $city->name . ': ' . number_format($city->averageTemperature(), 2) . ' °C'; ?></li>
    <?php endforeach; ?>
</ul>

<h2>Highest temperature:</h2>
<ul>
    <?php
    /* Kód, který řadí názvy měst podle abecedy pro nejvyšší teplotu. */
    $sortedCities = $cities;
    usort($sortedCities, function ($a, $b) {
        return strcmp($a->name, $b->name);
    });

    foreach ($sortedCities as $city): ?>
        <li><?php echo $city->name . ': ' . number_format($city->maxTemperature(), 2) . ' °C'; ?></li>
    <?php endforeach; ?>
</ul>

</div>

<!-- Celkový průměrný stav teplot -->
<h2>Overall average temperature:</h2>
<p><?php echo ucfirst('overall average temperature: ' . number_format($overallAverageTemperature, 2)) . ' °C'; ?></p>

<!-- Nejvyšší zaznamenaná teplota ze všech měst -->
<h2>Highest recorded temperature from all cities:</h2>
<p><?php echo ucfirst('highest recorded temperature from all cities: ' . number_format($highestOverallTemperature, 2)) . ' °C'; ?></p>

<!-- Dodatečné informace -->
<div id="additional-info">
    <p>Temperature analysis from October 2023</p>
    
</div>

</body>
</html>
