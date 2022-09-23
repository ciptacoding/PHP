<?php

$hari = ["senin", "selasa", "rabu", "kamis", "jumat", "sabtu", "minggu"];
$bulan = ["januari", "februari", "maret", "april", "mei", "juni"];
$mahasiswa = [
  1 => "Budi",
  2 => "Tono",
  3 => "Andi",
  4 => "bayu",
  5 => "Dodi",
  6 => "Riski",
];
// menampilkan array dari hari
print_r($hari);
echo "<br>";
echo "<br>";
// menampilkan array dari bulan
print_r($bulan);
echo "<br>";
echo "<br>";
// menampilkan array dari mahasiswa key 1
echo $mahasiswa[1];

// menambah array 
$bulan[] = "juli";
$mahasiswa[]= "Doni";
?>