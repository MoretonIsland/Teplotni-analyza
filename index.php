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
<img src="Australie.png" alt="Obrázek Australie" style="width: 100%; height: auto; display: block;"
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

/* Cyklus foreach pro yytvoření objektů měst CityTemperature */

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

/* Přidání měst do objektu TemperatureAnalyzer pomocí cyklu foreach */
foreach ($cities as $city) {
    $temperatureAnalyzer->addCity($city);
}

/* Získání výsledků z objektu TemperatureAnalyzer */
$overallAverageTemperature = $temperatureAnalyzer->overallAverageTemperature();
$highestOverallTemperature = $temperatureAnalyzer->highestOverallTemperature();

?>

// Výsledky teplotní analýzy na webové stránce -->
<h1>October 2023 temperatures - Cities in Queensland</h1>

<!-- Vkládání výsledků do kontejneru polem -->
<div id="results">

<hr id="results-hr">
<br>
<h2>Average temperature:</h2>
<ul>
    <?php

    /* Kód, který řadí názvy měst podle abecedy pro průměrnou teplotu, pole, cyklus. */
    $sortedCities = $cities;
    usort($sortedCities, function ($a, $b) {
        return strcmp($a->name, $b->name);
    });

    foreach ($sortedCities as $city): ?>
        <li><?php echo $city->name . ': ' . number_format($city->averageTemperature(), 2) . ' °C'; ?></li>
    <?php endforeach; ?>
</ul>
<br>
<h2>Highest temperature:</h2>
<ul>
    <?php
    /* Kód, který řadí názvy měst podle abecedy pro nejvyšší teplotu - pole, cyklus. */
    $sortedCities = $cities;
    usort($sortedCities, function ($a, $b) {
        return strcmp($a->name, $b->name);
    });

    foreach ($sortedCities as $city): ?>
        <li><?php echo $city->name . ': ' . number_format($city->maxTemperature(), 2) . ' °C'; ?></li>
    <?php endforeach; ?>
</ul>

</div>
<br>
<!-- Celkový průměrný stav teplot, proměnná-->
<h2>Overall average temperature:</h2>
<p><?php echo ucfirst('overall average temperature: ' . number_format($overallAverageTemperature, 2)) . ' °C'; ?></p>

<br>
<!-- Nejvyšší zaznamenaná teplota ze všech měst, proměnná -->
<h2>Highest recorded temperature from all cities:</h2>
<p><?php echo ucfirst('highest recorded temperature from all cities: ' . number_format($highestOverallTemperature, 2)) . ' °C'; ?></p>

<br>
<?php
// index.php
include 'SearchTemperatures.php';

// Načtení dat
$temperatures = include 'temperatures.php';

// Zkratky měst
$cityAbbreviations = [
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
];

// Hledaná teplota
$targetTemperature = 30;

// Pole pro uchování nalezených výsledků
$results = [];

// Spuštění rekurzivního vyhledávání
searchTemperature($temperatures, $targetTemperature, $results);


// Výstup výsledků
echo "<h2>Temperatures $targetTemperature °C and higher:</h2>";
echo "<ul>";
foreach ($results as $result) {
    echo "<li>$result</li>";
}
echo "</ul>";
?>


<br>  
<div class="image-grid">
    <img src="Cairns.jpg" alt="Cairns">
    <img src="Seisia.jpg" alt="Seisia">
    <img src="Gladstone.jpg" alt="Gladstone">
    <img src="Gladstone1.jpg" alt="Gladstone">
    <img src="Bird.jpg" alt="Bird">
</div>

<br>
<br>  
 <!-- Dodatečné informace -->
<div id="additional-info"> 
<p>Temperature analysis - Queensland - October 2023</p>
    
</div>
</body>
</html>
