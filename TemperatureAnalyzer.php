<?php

/* Třída TemperatureAnalyzer se používá k analýze teplot v jednotlivých městech. */

class TemperatureAnalyzer
{
    /* Pole pro uchování objektů měst. Každý prvek pole $cities obsahuje informace o jednom městě - jeho název a teplotní údaj. */
    public $cities = [];

    public function addCity($city)
    {
        $this->cities[] = $city;
    }
/* Metoda overallAverageTemperature vypočítává celkový průměr teplot ze všech měst.*/

    public function overallAverageTemperature()
    {
        $totalTemperatures = 0;
        $totalCount = 0;

        foreach ($this->cities as $city) {
            $totalTemperatures += array_sum($city->temperatures);
            $totalCount += count($city->temperatures);
        }

        return $totalTemperatures / $totalCount;
    }
/* Metoda highestOverallTemperature vypočítává nejvyšší teplotu ze všech měst. */
    public function highestOverallTemperature()
    {
        $highestTemperature = 0;

        foreach ($this->cities as $city) {
            $highestTemperature = max($highestTemperature, $city->maxTemperature());
        }

        return $highestTemperature;
    }

/* Metoda getResults získává výsledky analýzy teplot ve formě objektů typu Result. */

    public function getResults()
    {
        $results = [];
        foreach ($this->cities as $city) {
            $result = new Result(
                $city->name,
                $city->averageTemperature(),
                $city->maxTemperature()
            );

            $results[] = $result;
        }

        return $results;
    }
}
?>




























































































































































































