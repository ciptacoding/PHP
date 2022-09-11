<?php

// anonymous function
$greeting = function(string $name){
  echo "Selamat Pagi $name".PHP_EOL;
};
$greeting("Eko");


// cara lain dengan anonymous function
function sayGoodBye (string $name, $filter){
  $finalName = $filter($name);
  echo "Selamat Tinggal $finalName".PHP_EOL;
}
sayGoodBye("Eko", function($names){
  return strtoupper($names);
});


// cara mengakses variable global pada anonymous function dengan USE
$nickName = "Budi";
$fullName = "Nugraha Putra";

$mahasiswa = function() use($nickName, $fullName){
  echo "Selamat Datang Mahasiswa Baru Atas Nama $nickName $fullName";
};
// panggil function
$mahasiswa();