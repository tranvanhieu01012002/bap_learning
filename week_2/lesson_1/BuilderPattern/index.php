<?php
namespace build;
include_once "./autoLoad.php";

use build\MilkTeaBuilder;

$milk = new MilkTeaBuilder();
$milk = $milk
        ->setSize("XL")
        ->setHavePearl(true)
        ->setMilk("VinaMilk")
        ->setTemperature(2)
        ->build();
$milk->information();
?>
