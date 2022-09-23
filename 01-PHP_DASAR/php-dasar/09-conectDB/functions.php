<?php 
  // koneksi ke db
  $conn = mysqli_connect("localhost", "root", "", "bukuperpustakaan");

  // cara menampilkan data dari $result
  // mysqli_fetch_row() => mengembalikan array numerik
  // mysqli_fetch_assoc() => Mengembalikan array associative
  // mysqli_fetch_array() => mengembalikan array numerik dan associative
  // mysqli_fetch_object() => mengembalikan object

  function query($query){
    global $conn;
    // mengambil data dari tabel book
    $result = mysqli_query($conn, $query);
    // membuat array kosong untuk menyimpan setiap perualangan
    $books = [];

    // melakukan perulangan ketika data dari variabel $result masih ada
    while($row = mysqli_fetch_assoc($result)){
      // memasukan hasil dari setiap perulangan ke dalam array $books
      $books[] = $row;
    }
    return $books;
  }
?>