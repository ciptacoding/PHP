<?php

$first = [
  "name" => "Budi",
  "age" => 20,
];

$second = [
  "name" => "Raharjo",
  "alamat" => "Br. Kelodan Punggul",
];
// menggabungkan
$full = $first + $second;
var_dump($full);


$a = [
  "name" => "Cipta",
  "age" => 20,
];
$b = [
  "age" => 20,
  "name" => "Cipta",
];

$result = $a == $b;
var_dump($result);