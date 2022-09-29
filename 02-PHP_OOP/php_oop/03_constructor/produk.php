<?php

class Produk {
  public $judul, $penulis, $penerbit, $harga;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0){
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }

  public function copyright(){
    return "$this->penulis, $this->penerbit";
  }
}

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
$produk2 = new Produk("GTA 5", "John Stones", "Rockstars Games", 150000);

echo "Penulis dan Penerbit : " . $produk1->copyright();
echo "<br>";
echo "Penulis dan Penerbit : " . $produk2->copyright();