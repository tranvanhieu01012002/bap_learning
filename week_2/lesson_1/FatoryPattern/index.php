<?php
include_once "./autoLoad.php";

use drink\DrinkFactory;
use drink\DrinkType;
use subclass\MilkTea;
// $tea = DrinkFactory::getDrink(DrinkType::MILKTEA);
$tea = new MilkTea();
echo $tea->getName();


?>