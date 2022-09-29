<?php

class Produk {
  public $judul, $penulis, $penerbit, $harga, $jmlHalaman, $waktuMain, $tipe;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $halaman = 0, $waktuMain = 0, $tipe = "tipe"){
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
    $this->jmlHalaman = $halaman;
    $this->waktuMain = $waktuMain;
    $this->tipe = $tipe;
  }

  public function copyright(){
    return "$this->penulis, $this->penerbit";
  }

  public function infoSemuaProduk(){
    $result = "{$this->tipe} : {$this->judul} | {$this->copyright()} ({$this->harga})";
    if($this->tipe == "komik"){
      $result .= " ~ {$this->jmlHalaman} Halaman.";
    }else if($this->tipe == "game"){
      $result .= " ~ {$this->waktuMain} Jam.";
    }
    return $result;
  }
}

class CetakInfoProduk{
  public function cetak(Produk $produk){
    $str = "{$produk->judul} | {$produk->copyright()} | ({$produk->harga})";
    return $str;
  }
}

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0, "komik");
$produk2 = new Produk("GTA 5", "John Stones", "Rockstars Games", 150000, 0, 50, "game");

echo $produk1->infoSemuaProduk();
echo "<br>";
echo $produk2->infoSemuaProduk();
