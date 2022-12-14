<?php 
namespace builder;


interface Builder{
    public function setMilk($milkType);
    public function setTea($tea);
    public function setTemperature(int $temp);
    public function setHavePearl(bool $color);
    public function setHavePlankCake(bool $plank);
    public function setSize($size);
    public function build();
}

?>