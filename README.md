# Teplotni-analyza
Dokumentace





    Program Teplotní analýza poskytuje přehled o teplotách v několika australských městech ve státě Queensland.  Vybrala jsem města z různých částí státu Queensland. Například město Gold Coast na jihovýchodě státu leží v subtropické oblasti, oproti tomu Seisia a Karumba na severu státu leží v tropické oblasti.  Program sleduje období od 1. října do 31. října 2023. Stát Queensland jsem zvolila proto, že se mi jeví zajímavým místem pro sledování klimatických podmínek. 
     Tento program byl vytvořen s důrazem na přehlednost a jednoduchost. Využívá principy OOP (Objektově Orientovaného Programování) k organizaci a správě dat. 
      Program generuje výsledky, jako je průměrná maximální  teplota ve všech sledovaných městech, nejvyšší teplota v každém městě, nejvyšší teplota celkem a průměrná maximální teplota ze všech měst.  Načítá teplotní data ze souboru temperatures.php a provádí analýzu teplot. Výsledky jsou prezentovány na webové stránce generované souborem index.php.


Struktura programu:

Soubor index.php je hlavním souborem, který určuje třídy a generuje výsledky analýzy pro zobrazení na webové stránce. Obsahuje programovací jazyk PHP a programovací jazyk HTML a CSS pro prezentaci výsledků.
Soubor temperatures.php obsahuje teplotní data ke zpracování pro každý den a město ve formátu asociativních polí. Zkratky měst jsou převedeny na jejich plné názvy pomocí asociativního pole.
Soubor CityTemperature.php obsahuje třídu CityTemperature, která slouží k prezentaci teplotních dat pro každé město. Tato třída obsahuje metody pro výpočet průměrné a maximální teploty.
Soubor TemperatureAnalyzer.php obsahuje třídu TemperatureAnalyzer, která slouží k analýze teplot ve všech sledovaných městech. Tato třída zpracovává data z třídy CityTemperature a poskytuje výsledky analýzy, jako je celkový průměr a nejvyšší teplota.
Soubor style.css obsahuje styly pro vizuální prezentaci webové stránky generované programem Teplotní Analýza. Používá sans-serif font pro text na stránce, styly pro nadpisy h1 a h2 – barva textu a velikost písma. Dále styly pro additional info neboli doplňující informace. Styly pro pozadí – používá obrázek s názvem 'Gold Coast2.jpg' jako pozadí stránky. Background-size:cover; zajistí, aby se obrázek přizpůsobil velikosti okna prohlížeče. Background-position: center; nastaví pozici obrázku na střed. Background-repeat: no-repeat; zabrání opakování obrázku na pozadí. 
Tyto styly přispívají ke vzhledu a čitelnosti webové stránky, zdůrazňují nadpisy pomocí velikosti a barev textu. Obrázek 'Gold Coast2.jpg' přidává vizuální prvek. 
Samozřejmě, že v programu se zaměřením na OOP není tak důležitý vzhled stránky, ale spíše část programu, která se věnuje OOP. 


Program využívá koncepty několika klíčových tříd a objektů:

CityTemperature
Třída reprezentující teplotní data pro každé město.
Obsahuje vlastnosti pro název města ($name) a teploty ($temperatures).

TemperatureAnalyzer
Třída TemperatureAnalyzer slouží k analýze teplot v jednotlivých městech. Obsahuje pole objektů CityTemperature, která reprezentují teplotní data pro každé město. Poskytuje metody pro výpočet celkového průměru teplot ze všech měst a nejvyšší teploty z celé analýzy.

Result
Třída Result v souboru TemperatureAnalyzer slouží k uchování výsledků analýzy pro každé město. Obsahuje vlastnosti pro název města ($cityName), průměrnou teplotu ($averageTemperature) a maximální teplotu ($maxTemperature). 
Public function getResults() - Postupně se vytváří objekty třídy Result pro každé město a ukládají se do pole $results, které je poté vráceno jako výstup metody getResults().






Příklad kódu ze souboru index.php

Tato část kódu v souboru index.php obsahuje tři řádky, které mají za úkol načíst potřebné třídy a data ze souborů. 

include 'CityTemperature.php';
Tento řádek zahrnuje obsah souboru CityTemperature.php do aktuálního kódu.

include 'TemperatureAnalyzer.php';
Tento řádek zahrnuje obsah souboru TemperatureAnalyzer.php do aktuálního kódu.



$temperatures = require 'temperatures.php';
Tento řádek načte teplotní data ze souboru temperatures.php a přiřadí je proměnné $temperatures. Předpokládá se, že v souboru temperatures.php jsou vložena teplotní data pro jednotlivá města a dny v asociativním poli.



Vytvoření zkratek měst

     Za účelem snazší práce s daty byly v programu vytvořeny zkratky měst. Zkratky slouží k jednoznačné identifikaci měst a byly vytvořeny pomocí asociativního pole v souboru `index.php`. Zde je kód pro vytvoření tohoto mapování:

/* Asociativní pole $cityAbbreviations, neboli datová struktura, kde klíčem je zkratka města a hodnotou je název města. * /

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

 Závěr    

     Program Teplotní Analýza je nejen nástrojem pro prezentaci teplot, ale také používá principy OOP pro organizaci a správu dat. OOP vytváří modulární a snadno udržovatelný kód, což zvyšuje celkovou kvalitu programu.





