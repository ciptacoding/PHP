<?php

class Produk {
  public $judul, $penulis, $penerbit, $harga, $jmlHalaman, $waktuMain;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $halaman = 0, $waktuMain = 0){
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
    $this->jmlHalaman = $halaman;
    $this->waktuMain = $waktuMain;
  }

  public function copyright(){
    return "$this->penulis, $this->penerbit";
  }

  public function getInfoProduk(){
    $result = "{$this->judul} | {$this->copyright()} ({$this->harga})";
    return $result;
  }
}

// membuat child
class Komik extends Produk{
  
  public function getInfoProduk(){
    $str = "Komik => Judul : {$this->judul} | Penulis & Penerbit : {$this->copyright()} | Harga : {$this->harga} | - {$this->jmlHalaman} Halaman.";
    return $str;
  }
}

// membuat child
class Game extends Produk{

  public function getInfoProduk(){
    $str = "Game => Judul : {$this->judul} | Penulis & Penerbit : {$this->copyright()} | Harga : {$this->harga} | ~ {$this->waktuMain} Jam.";
    return $str;
  }
}

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0);
$produk2 = new Game("GTA 5", "John Stones", "Rockstars Games", 150000, 0, 50,);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();