<?php

// array normal
$nameStudent = ["Budi", "Ilham", "Tono", "Afif"];

foreach($nameStudent as $index => $names){
  echo "Data Ke-$index : $names" .PHP_EOL;
}

// array map
$nimStudent = [
  "Sari" => 200030111,
  "Andi" => 200010200,
  "Toni" => 200030282,
];
foreach($nimStudent as $key => $value){
  echo "Nim $key : $value" .PHP_EOL;
}