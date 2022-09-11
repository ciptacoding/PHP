<?php

// nested array
// key => value
$dataDiriMahasiswa = [
  "nim" => 200030282,
  "nama" => "Cipta Dwipajaya",
  "prodi" => "Sistem Informasi",
  "alamat" => [
    "desa" => "Punggul",
    "kecamatan" => "Abiansemal",
    "kabupaten" => "Badung",
  ]
];
var_dump($dataDiriMahasiswa["nim"]);
var_dump($dataDiriMahasiswa["alamat"]["kecamatan"]);

// versi penulisan dengan ()
$profile = array(
  "nama" => "Budi",
  "umur" => 20,
  "alamat" => array(
    "desa" => "sibang",
    "kec" => "abiansemal"
  )
);
var_dump($profile["nama"]);
var_dump($profile["alamat"]["desa"]);
echo "Umur : ";
echo $profile["umur"];
