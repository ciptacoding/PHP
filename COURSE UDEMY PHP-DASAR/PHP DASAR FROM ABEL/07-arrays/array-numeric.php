<?php
/* Array
-----------------------------------------
- variabel yg dpt nempung banyak nilai
- jenis:
   * Array numeric
   * Array associative
---------------------------------------*/

// membuat array kosong
$buah = array();
$hobi = [];

// membuat array sekaligus mengisinya
$minuman = array("Kopi", "Teh", "Jus Jeruk");
$makanan = ["Nasi Goreng", "Soto", "Bubur"];

// membuat array dengan mengisi indeks tertentu
$anggota[1] = "Dian";
$anggota[2] = "Muhar";
$anggota[0] = "Petani Kode";

// membuat array
$barang = ["Buku Tulis", "Penghapus", "Spidol"];

// menampilkan isi array
echo $barang[0] . "<br>";
echo $barang[1] . "<br>";
echo $barang[2] . "<br>";

// membuat array
$barang = ["Buku Tulis", "Penghapus", "Spidol"];

// menampilkan isi array dengan perulangan for
for ($i = 0; $i < count($barang); $i++) {
	echo $barang[$i] . "<br>";
}

// menampilkan isi array dengan perulangan foreach
foreach ($barang as $isi) {
	echo $isi . "<br>";
}

echo "<hr>";

// menampilkan isi array dengan perulangan while
$i = 0;
while ($i < count($barang)) {
	echo $barang[$i] . "<br>";
	$i++;
}

// menghapus kucing
unset($barang[1]);

// membuat array
$hobi = [
	"Membaca",
	"Menulis",
	"Ngeblog"
];

// menambahkan isi pada idenks ke-3
$hobi[3] = "Coding";

// menambahkan isi pada indeks terakhir
$hobi[] = "Olahraga";

$email["subjek"] = "Apa Kabar?";
$email["pengirim"] = "dian@petanikode.com";
$email["isi"] = "Apa kabar? sudah lama tidak berjumpa";


/* 1. Array numeric
-------------------------------------- */
$days = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'); // old
$monthes = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']; // new
$arraies = ['text', 123, true];
$teachers = ['yoga', 'rian', 'abel'];

// Menampilkan semua array
// var_dump($days);
// print_r($monthes);

// Menampilkan 1 elemen pada array
// echo $arraies[0]; // output: text
// echo $days[1];

// Menambahkan elemen baru pada array
// print_r($teachers);
// array_push($teachers, 'edgar'); // old
// print_r($teachers);
// $teachers[] = 'andi'; // new
// print_r($teachers);

// Multiple array
$students = [
	['abel yoshuara', '3992', 'rpl', 'abelyoshuara@gmail.com'],
	['riyan erlangga', '3978', 'rpl', 'riyanerlangga@gmail.com'],
	['angga purnadita', '3935', 'rpl', 'anggapurnadita@gmail.com'],
	['eka purnama', '3968', 'rpl', 'ekapurnama@gmail.com']
];

// Menampilkan 1 elemem pada multiple array 
// echo $students[1][0]; // output : riyan erlangga

?>

<!DOCTYPE html>
<html>

<head>
	<title>Array Numeric</title>
	<style>
		.box {
			float: left;
			width: 60px;
			height: 60px;
			line-height: 60px;
			text-align: center;
			background-color: lightgreen;
			margin: 5px;
		}
	</style>
</head>

<body>
	<?php $numbers = [3, 2, 5, 1, 4, 6, 7]; ?>
	<?php for ($i = 0; $i < count($numbers); $i++) : ?>
		<div class="box"><?= $numbers[$i]; ?></div>
	<?php endfor; ?>

	<div style="clear: both;"></div>

	<?php foreach ($numbers as $number) { ?>
		<div class="box"><?= $number; ?></div>
	<?php } ?>

	<div style="clear: both;"></div>

	<?php foreach ($numbers as $number) : ?>
		<div class="box"><?= $number; ?></div>
	<?php endforeach; ?>

	<div style="clear: both;"></div>

	<h2>List Of Students</h2>
	<?php foreach ($students as $student) : ?>
		<ul>
			<li>Name : <?= $student[0]; ?></li>
			<li>NIS : <?= $student[1]; ?></li>
			<li>Major : <?= $student[2]; ?></li>
			<li>Email : <?= $student[3]; ?></li>
		</ul>
	<?php endforeach; ?>
</body>

</html>