<?php

// reference variable
$name = "Eko";
$callName = &$name;
echo $callName.PHP_EOL;

// pass by reference function
function increment(int &$value){
  $value++;
}
// parameter yang dikirim
$counter = 2;
increment($counter);
echo $counter;
