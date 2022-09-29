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

class CetakInfoProduk{
  public function cetak(Produk $produk){
    $str = "{$produk->judul} | {$produk->copyright()} | ({$produk->harga})";
    return $str;
  }
}

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
$produk2 = new Produk("GTA 5", "John Stones", "Rockstars Games", 150000);

echo "Penulis dan Penerbit : " . $produk1->copyright();
echo "<br>";
echo "Penulis dan Penerbit : " . $produk2->copyright();
echo "<br>";

$infoProduk1 = new CetakInfoProduk();
$infoProduk2 = new CetakInfoProduk();

echo $infoProduk1->cetak($produk1);
echo "<br>";
echo $infoProduk2->cetak($produk2);
