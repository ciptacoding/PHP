<?php

class Komik extends Produk implements InfoProduk{
  public $jmlHalaman;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0){
    parent::__construct($judul, $penulis, $penerbit, $harga);
    $this->jmlHalaman = $jmlHalaman;
  }

  public function getInfo(){
    $result = "{$this->judul} | {$this->copyright()} (Rp.{$this->harga})";
    return $result;
  }
  public function getInfoProduk(){
    $str = "Komik : " . $this->getInfo() . " ~ {$this->jmlHalaman} Halaman.";
    return $str;
  }
}