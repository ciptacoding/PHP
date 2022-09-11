<?php

$myArray = array("Justin", "Sisca", 1, 2.3);
var_dump($myArray);

// mengubah data pada myArray
$myArray[1] = "Jesica";

// menghapus data pada myArray
unset($myArray[3]);

// menghitung jumlah data pada myArray
count($myArray);

// membuat array kosong
$mobil = [];

// menambah data pada array mobil
$mobil[]= "Avanza";

// mengakses data pada array mobil
$mobil[0];
var_dump($mobil);

var_dump($myArray);
var_dump($mobil);