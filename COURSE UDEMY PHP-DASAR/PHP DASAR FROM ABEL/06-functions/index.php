<?php
/* Built-in Function [function yg telah disediakan oleh php]
=============================================================*/
// Function date
// echo date("l, d-M-Y");

// Function time
// echo time();

// Function mktime
// hour, minute, second, month, date, year
// echo mktime(); // NOW

// Function strtotime
// echo strtotime("10 august 2002");

// echo date("l", time()+60*60*24*2); // 2 hari lagi
// echo date("l", mktime(0, 0, 0, 8, 10, 2002)); // hari kelahiran
// echo date("l", strtotime("10 august 2002")); // hari kelahiran


/* User-Defined Function [function yg dibuat oleh user]
========================================================*/
// function sayHello($name = 'abel') {
// 	return "Hello, $name!";
// }

// echo sayHello();

// $x = 10;
// function showX() {
// 	global $x;
// 	echo $x;
// }

// showX();
// echo $x;

// membuat fungsi
function perkenalan($nama, $salam){
  echo $salam.", ";
  echo "Perkenalkan, nama saya ".$nama."<br/>";
  echo "Senang berkenalan dengan anda<br/>";
}

// memanggil fungsi yang sudah dibuat
perkenalan("Muhardian", "Hi");

echo "<hr>";

$saya = "Indry";
$ucapanSalam = "Selamat pagi";
// memanggilnya lagi
perkenalan($saya, $ucapanSalam);


// membuat fungsi mengembalikan nilali
function hitungUmur($thn_lahir, $thn_sekarang){
  $umur = $thn_sekarang - $thn_lahir;
  return $umur;
}

echo "Umur saya adalah ". hitungUmur(1994, 2015) ." tahun";
echo "<hr>";


/* Fungsi rekursif
Fungsi rekursif adalah fungsi yang memanggil dirinya sendiri. Fungsi ini biasanya digunakan untuk menyelesaikan masalah sepeti faktorial, bilangan fibbonaci, pemrograman dinamis, dll.*/
function faktorial($angka) {
  if ($angka < 2) {
    return 1;
  }
  return ($angka * faktorial($angka-1));
}

// memanggil fungsi
echo "faktorial 5 adalah " . faktorial(5);
?>