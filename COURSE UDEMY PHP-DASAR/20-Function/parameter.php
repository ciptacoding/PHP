<?php
// type declaration value
function sum(int $x, int $y){
  $result = $x + $y;
  echo "Hasil dari penjumlahan $x + $y = $result".PHP_EOL;
  return $result;
}
sum(30, 20);
sum("80", "20");
sum(true, false);



// type declaration array
function multiplyAll(array $values){
  $total = 1;
  foreach($values as $value){
    $total *= $value;
  }
  echo "Total " . implode(" * ", $values) . " = $total".PHP_EOL;
}
// mengirim data
multiplyAll([1,2,3,4,5]);



// parameter list argument
function sumAll(...$values){
  $total = 0;
  foreach($values as $value){
    $total += $value;
  }
  echo "Total ". implode(" + ", $values) . " = $total" .PHP_EOL;
}
// mengirim data
sumAll(2,4,6,8,10);

// jika sudah memiliki array, dibawah ini cara pengirimannya
$arrInteger = [1,2,3,4,5];
sumAll(...$arrInteger);
