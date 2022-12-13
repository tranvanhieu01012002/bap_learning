<?php
namespace subclass;
use drink\Drink;

class MilkTea implements Drink{
    function getName(): string
    {
        return "this is Milk tea";
    }
}


?>