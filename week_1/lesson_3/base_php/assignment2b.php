<?php
include "./assignment1.php";
#Ex 5 Viết chương trình PHP để loại bỏ các mục trùng lặp khỏi danh sách đã sắp xếp:
function removeDuplicate(array $arr):array{
    $arr1 = array($arr[0]);
    for($i = 1; $i < count($arr)-1;$i++){
        if($arr[$i]!=$arr[$i-1]){
            array_push($arr1,$arr[$i]);
        }
    }
    return $arr1;
}
$arr = array(1,2,2,2,3,4,5,5,6,6,7,9);
// show(removeDuplicate($arr));
function isPrime($int):int{
    if ($int < 1) {
        return -1;
    }
    else{
        for($i = 2; $i<= sqrt($int);$i++){
            if($int % $i == 0){
                return -1;
            }
        }
        return $int;
    }
    
}
# Ex 6 Viết chương trình PHP tính tổng các số nguyên tố nhỏ hơn 100
function sumOfPrime(int $int):int{
    $sum = 0;
    for ($i=2; $i < $int ; $i++) { 
        if(isPrime($i)!= -1){
            $sum +=  $i;
        }
    }
    return $sum;
}
// echo sumOfPrime(100);
# Ex7 Viết chương trình PHP để xác thực địa chỉ email
function validEmail(string $string):bool{
    return filter_var($string, FILTER_VALIDATE_EMAIL);
}
?>