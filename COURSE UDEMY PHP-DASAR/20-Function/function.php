<?php

function greeting($name){
  echo "Selamat Pagi $name".PHP_EOL;
}

greeting("Budi");


function plus($x,$y){
  $result = $x + $y;
  echo "Hasil Penjumlahan $x + $y = $result" ;
}
plus(20,30);