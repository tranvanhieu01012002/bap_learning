<?php
#Ex 8 viết một class Caculator chấp nhận hai giá trị làm đối số, sau đó cộng, trừ, nhân hoặc chia chúng theo yêu cầu:
class Calculator{
    public $a;
    public $b;

    function __construct(int $a,int $b)
    {
        $this->a=$a;
        $this->b=$b;
    }
    public function add()
    {
        return $this->a + $this->b;
    }

    public function subtract()
    {
        return $this->a - $this->b;
    }
    public function multi()
    {
        return $this->a * $this->b;
    }
    public function divided()
    {
        if($this->b == 0){
            return "Can not division";
        }
        return $this->a / $this->b;
    }
}
$MyCal = new Calculator(10,5);
echo $MyCal->add();
echo "<br>";
echo $MyCal->subtract();
echo "<br>";
echo $MyCal->multi();
echo "<br>";
echo $MyCal->divided();


