<?php

$name = "I Gusti Ngurah Cipta";
$last = " Dwipajaya";
echo "Nama Lengkap : " . $name . $last . PHP_EOL;

// konversi 
$changeToInt = (int) "100";
var_dump($changeToInt);

$changeToString = (string) 150;
var_dump($changeToString);

$changeToFloat = (float) "50.5";
var_dump($changeToFloat);

// akses karakter
$name = "Budi";
echo $name[1]. PHP_EOL;
echo $name[0]. PHP_EOL;
echo $name[3]. PHP_EOL;
echo $name[2]. PHP_EOL;

// Parsing
echo "Selamat Datang $name".PHP_EOL;

// curly brace
echo "Terima Kasih {$name}s";
