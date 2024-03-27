<?php
function searchTemperature($data, $targetTemperature, &$results) {
    foreach ($data as $date => $cityTemperatures) {
        foreach ($cityTemperatures as $cityAbbreviation => $temperature) {
            if ($temperature >= $targetTemperature) {
                // Uložení nalezené teploty a odpovídajících údajů
                $results[] = "$date {$GLOBALS['cityAbbreviations'][$cityAbbreviation]} $temperature °C";
            }
        }
    }
}
?>
