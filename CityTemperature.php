<?php

/* Třída reprezentující teplotní data jednoho města */

class CityTemperature
{
    public $name;
    public $temperatures;

    /* Konstruktor třídy CityTemperature pro nastavení názvu a teplot města. */

    public function __construct($name, $temperatures)
    {
        $this->name = $name;
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





























































































































































































