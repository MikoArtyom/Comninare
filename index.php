<?php
require "Permutation.php";
require "ValidateValueException.php";

$str = "111";
$length = 2;

try {
    $permute = new Permutation($str ,$length);
    $permute->printOnDisplay();
    echo "Количество комбинаций - " . $permute->getCountCombination();
    echo  "Count - " . $permute->countingOfPlacements();
}catch (ValidateValueException $e){
    $e->printMessage();
}



