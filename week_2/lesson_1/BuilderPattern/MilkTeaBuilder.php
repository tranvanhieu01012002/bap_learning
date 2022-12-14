<?php
namespace build;
use builder\Builder;
use build\MilkTea;

class MilkTeaBuilder implements Builder{
    private $size;
    private $havePlankCake;
    private $temperate;
    private $havePearl;
    private $milk;
    private $tea;

    public function setSize($size)
    {
        $this->size=$size;
        return $this;
    }
    public function setHavePlankCake(bool $plank)
    {
        $this->havePlankCake = $plank;
        return $this;
    }
    public function setHavePearl(bool $pearl)
    {
        $this->havePearl= $pearl;
        return $this;
    }
    public function setTemperature(int $temp)
    {
        $this->temperate=$temp;
        return $this;
    }
    public function setMilk($milk)
    {
        $this->milk = $milk;
        return $this;
    }
    public function setTea($tea)
    {
        $this->tea=$tea;
        return $this;
    }
    public function build()
    {
        return new MilkTea($this->size,$this->havePlankCake,$this->temperate,$this->havePearl,$this->milk,$this->tea);
    }
}

?>