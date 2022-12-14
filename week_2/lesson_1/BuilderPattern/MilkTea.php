<?php

namespace build;

class MilkTea
{
    public $size;
    private $havePlankCake;
    private $temperate;
    private $havePearl;
    private $milk;
    private $tea;

    public function __construct($size, $havePearl, $temperate, $havePlankCake, $milk, $tea)
    {
        $this->size = $size;
        $this->havePearl = $havePearl;
        $this->havePlankCake = $havePlankCake;
        $this->temperate = $temperate;
        $this->milk = $milk;
        $this->tea = $tea;
    }
    public function loadProperty()
    {
        return array(
            "Size" => $this->size,
            "Plank Cake" => $this->havePlankCake,
            "Temperature" => $this->temperate,
            "Pearl" => $this->havePearl,
            "Milk" => $this->milk,
            "Tea" => $this->tea
        );
    }
    public function information()
    {
        echo '<table style="width:100%"><tr>
        <th>Property</th>
        <th>Data</th>
        </tr>';
        foreach ($this->loadProperty() as $key => $value) {
            echo '<tr>
            <th>' . $key . '</th>
            <th>' . $value . '</th>
            </tr>';
        }
        echo " </table>";
    }
}
