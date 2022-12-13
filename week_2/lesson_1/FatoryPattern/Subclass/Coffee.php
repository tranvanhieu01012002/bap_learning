<?php
namespace subclass;
use drink\Drink;

class Coffee implements Drink{
    function getName(): string
    {
        return "this is Coffee";
    }
}


?>