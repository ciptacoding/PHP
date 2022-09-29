<?php

class Game extends Produk implements InfoProduk{
  public $waktuMain;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = "harga", $waktuMain = 0){
    parent::__construct($judul, $penulis, $penerbit, $harga);
    $this->waktuMain = $waktuMain;
  }

  public function getInfo(){
    $result = "{$this->judul} | {$this->copyright()} (Rp.{$this->harga})";
    return $result;
  }
  public function getInfoProduk(){
    $str = "Game : " . $this->getInfo() . " ~ {$this->waktuMain} Jam.";
    return $str;
  }
}