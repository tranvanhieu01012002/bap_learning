<?php

$string = " welcome to bap company ";
#EX 1 đếm các kí tự ( không tính kí tự trống )
function countWords(string $str):int{
    $chars = str_split($str);
    $count = 0;
    foreach ($chars as $char) {
       if ($char != ' ') {
            $count += 1;
       }
    }
    return $count;
}

function removeSpace(string $str):array{
    $str = str_split($str);
    $chars = array();
    foreach ($str as $char) {
        if ($char != ' ') {
            array_push($chars,$char);
        }
    }
    return $chars;
}
#Ex 2  tìm những kí tự lặp lại > 2.
function findRepeatWords($str):void{
    $str = removeSpace($str);
    for ($i=0; $i < count($str); $i++) { 
        $char = $str[$i];
        $count= 1;
        for ($j=$i+1; $j < count($str); $j++) { 
            if ($char == $str[$j] and $str[$j] != '0') {
                $count += 1;
                $str[$j] = '0';
            }
        }
        if ($count > 2 ) {
           echo "<p>".$char."</p>";
        }
    }
}
#Ex 3  thay thế  “ company” bằng “software”.
function replaceWord($sub1,$sub2,$string):string{
    return str_replace($sub1,$sub2,$string);

}


function printDay($day):string {
    $dayInWeek= array(
        2=>"MONDAY",
        3=>"TUESDAY",
        4=>"WEDNESDAY",
        5=>"THURSDAY",
        6=>"FRIDAY",
        7=>"SATURDAY",
        "CN"=>"SUNDAY"
    );
    if (array_key_exists($day,$dayInWeek)) {
        return $dayInWeek[$day];
    }
    else{
        return "invalid";
    }
}
// echo printDay("444");

// function ptb2($a,$b,$c){

// }