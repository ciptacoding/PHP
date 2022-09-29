<?php

class Produk {
  public $judul = "judul";
  public $penulis = "penulis";
  public $penerbit = "penerbit";
  public $harga = 0;

  public function coverProduk(){
    return "$this->judul, $this->penulis, $this->penerbit, $this->harga";
  }
}

$produk1 = new Produk();
$produk1 -> judul = "Naruto";
$produk1 -> penulis = "Masashi Kishimoto";
$produk1 -> penerbit = "Shonen Jump";
$produk1 -> harga = 30000;

$produk2 = new Produk();
$produk2 -> judul = "GTA 5";
$produk2 -> penulis = "John Stones";
$produk2 -> penerbit = "Rockstars Games";
$produk2 -> harga = 150000;

echo "Komik : " . $produk1->coverProduk();
echo "<br>";
echo "Game : " . $produk2->coverProduk();