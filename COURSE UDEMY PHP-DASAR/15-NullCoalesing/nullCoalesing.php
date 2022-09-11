<?php
// cara biasa
$myArray = [
  "NIM" => 200030282,
  "NAMA" => "Cipta Dwipajaya"
];

if(isset($myArray["NIM"])){
  $tampung = $myArray["NIM"];
}else{
  $tampung = "Nothing";
}
echo $tampung.PHP_EOL;


// cara null coalesing
$myDatabase = $myArray["NAMA"] ?? "Nothing";
echo $myDatabase;