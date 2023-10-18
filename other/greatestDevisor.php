<?php

function greatestDevisor($num1, $num2){
    $list1 = findDevider($num1);
    $list2 = findDevider($num2);

    $numList = [];

    foreach ($list1 as $key => $value) {
        if (in_array($list1[$key], $list2)) {
            $numList[] = $value;
            unset($list2[$key]);
        }
    }

    if (count($numList) == 0) {
        return 'There is no common devider';
    }else{
        $maxDevider = $numList[0];
        unset($numList[0]);
        foreach ($numList as $key => $value) {
            $maxDevider *= $value;
        }
    }

    return $maxDevider;
}

function findDevider($num){
    $numList = [];
    $max = $num;
    if($max < 2){
        $numList[] = $num;
        return $numList;
    }
    
    $testnum = 2;
    while ($testnum != $max + 1) {

        if ($num % $testnum == 0) {
            $num = $num / $testnum;
            $numList[] = $testnum;
        }else{
            $testnum++;
        }
    }

    return $numList;
}

print_r(greatestDevisor(1,4));

?>