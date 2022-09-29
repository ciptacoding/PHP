<?php

// class
class Produk {
  // property
  public $judul = "judul";
  public $penulis = "penulis";
  public $penerbit = "penerbit";
  public $harga = 0;

  // method
  public function cover(){
    return "$this->judul, $this->harga";
  }
}

// object
$produk1 = new Produk();
$produk1 -> judul = "naruto"; // timpa/manipulasi isi property judul
$produk1 -> harga = 10000; // timpa/manipulasi isi property harga
echo $cover = "komik : " . $produk1->cover(); // cara memanggil method


// $produk2 = new Produk();
// $produk2 -> tambahProperti = "tambah"; // cara menambah properti