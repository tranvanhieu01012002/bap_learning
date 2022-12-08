<?php

function show(array $arr):void{
    foreach ($arr as $value) {
        echo "<p>".$value."</p>";
    }
}

# Ex1  viết chương trình tìm phần tử lớn nhất trong mảng.



function getMax(array $arr):int{
    $temp = $arr[0];
    foreach($arr as $value){
        if ($value > $temp) {
            $temp = $value;
        }
    }
    return $temp;
}
# Ex2 nhỏ nhất trong mảng.
function getMin(array $arr):int{
    $temp = $arr[0];
    foreach($arr as $value){
        if ($value < $temp) {
            $temp = $value;
        }
    }
    return $temp;
}

# Ex3 tìm phần tử lặp lại trong mảng.
function findDuplicate(array $arr):int{
    $arrInFunc = sortArray($arr);
    for ($i=1; $i < count($arrInFunc) -1 ; $i++) { 
        if ($arrInFunc[$i] == $arrInFunc[$i-1]) {
            return $arrInFunc[$i];
        }
    }
    return -1;

}

# Ex4 xóa phần tử có key = 1 khỏi mảng n
function removeKey(array $arr,int $index):array{
    $arrTemp = $arr;
    for ($i=0; $i < count($arrTemp); $i++) { 
        if ($i != $index) {
           array_push($arr,$arrTemp[$i]);
        }
    }
    return $arr;
}

# Ex5 cho các phần tử của mảng m vào n và sắp xếp mảng từ nhỏ → lớn.
function mergeArray(array $arr1,array $arr2):array{
   for ($i=0; $i < count($arr2); $i++) { 
        array_push($arr1,$arr2[$i]);
   }
   return $arr1;
}

function sortArray(array $arr):array{
    for ($i=0; $i < count($arr); $i++) { 
        $minIndex=$i;
        for ($j=$i; $j < count($arr); $j++) { 
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }
        $temp = $arr[$minIndex];
        $arr[$minIndex] = $arr[$i];
        $arr[$i] = $temp;
    }
    return $arr;
}


// $arr = array(6,2);

// echo getMax($array);

// echo getMin($array);

// echo removeKey($array,4);

// var_dump(removeKey($array,4));

// show(removeKey($array,4));

// show(sortArray(mergeArray($array,$arr)));

// show(mergeArray($array,$arr));
?>