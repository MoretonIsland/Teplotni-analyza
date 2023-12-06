<?php

/* Třída reprezentující teplotní data měst */

class CityTemperature
{
    public $name;
    public $temperatures;

    /* Nastavení třídy CityTemperature */

    public function __construct($name, $temperatures)
    {
        $this->name = $name;
        $this->temperatures = $temperatures;
    }

/* Metoda pro výpočet průměrné teploty u měst */

    public function averageTemperature()
    {
        return array_sum($this->temperatures) / count($this->temperatures);
    }

/* Metoda pro získání maximální teploty u měst */

    public function maxTemperature()
    {
        return max($this->temperatures);
    }
}

?>





























































































































































































