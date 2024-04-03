<?php

/* Třída reprezentující teplotní data jednoho města */

class CityTemperature
{
    public $name;
    public $abbreviation; // přidáno pro zkratku města
    public $temperatures;

    /* Konstruktor třídy CityTemperature pro nastavení názvu, zkratky a teplot města. */

    public function __construct($name, $abbreviation, $temperatures)
    {
        $this->name = $name;
        $this->abbreviation = $abbreviation; // přidáno pro zkratku města
        $this->temperatures = $temperatures;
    }

    /* Metoda averageTemperature pro výpočet průměrné teploty u města */

    public function averageTemperature()
    {
        return array_sum($this->temperatures) / count($this->temperatures);
    }

    /* Metoda maxTemperature vrací maximální teplotu z teplot města.3 */

    public function maxTemperature()
    {
        return max($this->temperatures);
    }
}

?>