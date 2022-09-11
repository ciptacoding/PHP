<?php

$firstName = "Toni";
$fullName = "Saputra";
// arrow function
$mahasiswa = fn() => "Selamat Datang $firstName $fullName".PHP_EOL;

// versi anonymous function
$siswa = function() use($firstName, $fullName): string{
  return "Selamat Anda Lulus $firstName $fullName";
};


// panggil kedua function
echo $mahasiswa();
echo $siswa();