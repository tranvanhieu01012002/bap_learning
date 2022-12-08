<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    function giaiPTB2($a, $b, $c)
    {
        if ($a == "")
            $a = 0;
        if ($b == "")
            $b = 0;
        if ($c == "")
            $c = 0;

        echo "Phương trình: " . $a . "x2 + " . $b . "x + " . $c . " = 0";
        echo "<br>";

        if ($a == 0) {
            if ($b == 0) {
                echo ("Phương trình vô nghiệm!");
            } else {
                echo ("Phương trình có một nghiệm: " . "x = " . (-$c / $b));
            }
            return;
        }
   
        $delta = $b * $b - 4 * $a * $c;
        $x1 = "";
        $x2 = "";
        if ($delta > 0) {
            $x1 = (-$b + sqrt($delta)) / (2 * $a);
            $x2 = (-$b - sqrt($delta)) / (2 * $a);
            echo ("Phương trình có 2 nghiệm là: " . "x1 = " . $x1 . " và x2 = " . $x2);
        } else if ($delta == 0) {
            $x1 = (-$b / (2 * $a));
            echo ("Phương trình có nghiệm kép: x1 = x2 = " . $x1);
        } else {
            echo ("Phương trình vô nghiệm!");
        }
    }


    ?>
    <form action="#" method="post">
        <table>
            <tr>
                <td>Hệ số bậc 2, a</td>
                <td><input type="number" name="heso_a" value="" /></td>
            </tr>
            <tr>
                <td>Hệ số bậc 1, b</td>
                <td><input type="number" name="heso_b" value="" /></td>
            </tr>
            <tr>
                <td>Hệ số tự do, c</td>
                <td><input type="number" name="heso_c" value="" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Kết quả"></td>
            </tr>
        </table>
        <?php
        #EX 4 Giải phương trình bậc hai môt ẩn: ax2 + bx = c = 0. 
        if (isset($_POST['heso_a'])) {
            giaiPTB2($_POST['heso_a'],$_POST['heso_b'],$_POST['heso_c']);
        }
        ?>
    </form>
</body>

</html>