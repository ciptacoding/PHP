<?php 
  // koneksi ke db
  $conn = mysqli_connect("localhost", "root", "", "bukuperpustakaan");

  // cara menampilkan data dari $result
  // mysqli_fetch_row() => mengembalikan array numerik
  // mysqli_fetch_assoc() => Mengembalikan array associative
  // mysqli_fetch_array() => mengembalikan array numerik dan associative
  // mysqli_fetch_object() => mengembalikan object


  // function query (READ data)
  function query($query){

    global $conn;

    // mengambil data dari parameter 
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



  // function tambah
  function tambah($data){
    global $conn;
    // htmlspecialchars berfungsi agar user tidak bisa menjalankan html di form
    // ambil data dari tiap elemen form
    $title = htmlspecialchars($data["title"]);
    $author = htmlspecialchars($data["author"]);
    $year = htmlspecialchars($data["year"]);
    $publisher = htmlspecialchars($data["publisher"]);
    $cover = htmlspecialchars($data["cover"]);

    // query insert data 
    $query = "INSERT INTO book VALUES('', '$title', '$author', '$year', '$publisher', '$cover')";

    // kirim data variabel query ke dbms
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }


  // function ubah
  function ubah($data){
    global $conn;

    $id = $data["id"];
    $title = htmlspecialchars($data["title"]);
    $author = htmlspecialchars($data["author"]);
    $year = htmlspecialchars($data["year"]);
    $publisher = htmlspecialchars($data["publisher"]);
    $cover = htmlspecialchars($data["cover"]);

    // query update data ke dbms
    $update = "UPDATE book SET 
                title = '$title',
                author = '$author',
                year = '$year',
                publisher = '$publisher',
                cover = '$cover'
              WHERE id = $id";

    mysqli_query($conn, $update);

    return mysqli_affected_rows($conn);
  }



  // function hapus
  function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM book WHERE id = $id");
    return mysqli_affected_rows($conn);
  }


  // function cari
  function cari($keyword){
    $search = "SELECT * FROM book WHERE 
                title LIKE '%$keyword%' OR
                author LIKE '%$keyword%' OR
                year LIKE '%$keyword%' OR
                publisher LIKE '%$keyword%'
                ";

    return query($search);
  }
?>