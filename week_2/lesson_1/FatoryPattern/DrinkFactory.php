<?php
namespace drink;
use subclass\Coffee;
use subclass\MilkTea;
use drink\DrinkType;

class DrinkFactory{

    function __construct()
    {
        
    }
    public static final function getDrink($typeOfDrink){
        switch ($typeOfDrink) {
            case DrinkType::COFFEE :
                return new Coffee;      
            case  DrinkType::MILKTEA:
                return new MilkTea;        
            default:
                return new MilkTea; 
                
        }
    }
}


?>