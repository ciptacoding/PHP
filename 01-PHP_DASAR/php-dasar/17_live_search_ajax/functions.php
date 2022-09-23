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

    // function upload
    $cover = upload();
    if($cover === false){
      return false;
    }

    // query insert data 
    $query = "INSERT INTO book VALUES('', '$title', '$author', '$year', '$publisher', '$cover')";

    // kirim data variabel query ke dbms
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }

  function upload(){
    // mengambil data dari $_FILES
    $namaFile = $_FILES["cover"] ["name"];
    $ukuranFile = $_FILES["cover"] ["size"];
    $error = $_FILES["cover"] ["error"];
    $temporary = $_FILES["cover"] ["tmp_name"];

    // cek jika tidak ada gambar yang di upload
    if($error === 4){
      echo 
      "<script>
        alert('PILIH GAMBAR TERLEBIH DAHULU');
      </script>";
      return false;
    }

    // cek ekstensi file gambar
    $ekstensiValid = ['jpg', 'png', 'jpeg'];
    $ekstensiNamaFile = explode('.' , $namaFile); //pecah
    $ekstensiNamaFile = strtolower(end($ekstensiNamaFile));
    if( ! in_array($ekstensiNamaFile, $ekstensiValid)){
      echo 
      "<script>
        alert('FILE YANG ANDA MASUKAN BUKAN GAMBAR!');
      </script>";
      return false;
    }

    // CEK UKURAN GAMBAR max 4mb
    if($ukuranFile > 4000000){
      echo 
      "<script>
        alert('UKURAN FILE TERLALU BESAR');
      </script>";
      return false;
    }

    // buat nama file gambar baru untuk mengatasi nama file yang sama
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiNamaFile; //.= untuk merangkai 

    // UPLOAD
    move_uploaded_file($temporary, 'assets/' . $namaFileBaru);
    // return $namaFileBaru agar masuk ke function tambah => insert 
    return $namaFileBaru;
  }



  // function ubah
  function ubah($data){
    global $conn;

    $id = $data["id"];
    $title = htmlspecialchars($data["title"]);
    $author = htmlspecialchars($data["author"]);
    $year = htmlspecialchars($data["year"]);
    $publisher = htmlspecialchars($data["publisher"]);
    $coverLama = htmlspecialchars($data["coverLama"]);

    // cek apakah user mengupload gambar baru
    if( $_FILES['cover']['error'] === 4){
      $cover = $coverLama;
    }else{
      $cover = upload();
    }
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


  // function register
  function register($data){
    global $conn;

    $username = mysqli_real_escape_string($conn, $data["username"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["confirmPassword"]);

    // cek username jika ada space
    if(trim($username)){
      echo "
        <script> 
          alert('Masukan username tanpa menggunakan spasi!');
        </script>
      ";
      return false;
    }

    // cek available username
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
      echo "
        <script> 
          alert('username sudah terdaftar');
        </script>
      ";
      return false;
    }

    // cek validasi password
    if($password !== $password2){
      echo "
      <script> 
        alert('Password Harus Sama');
      </script>
      ";
      return false;
    }

    // encription password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // tambahkan ke database
    mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
  }
?>