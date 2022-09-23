<?php
$conn = mysqli_connect("localhost", "root", "", "mahasiswa");

// function query
function query($query){
  global $conn;
  $result = mysqli_query($conn, $query);

  $students = [];
  while($data = mysqli_fetch_assoc($result)){
    $students[] = $data;
  }
  return $students;
};


// function add 
function add($post){
  global $conn;

  $nim = htmlspecialchars($post["nim"]);
  $nama = htmlspecialchars($post["nama"]);
  $prodi = htmlspecialchars($post["prodi"]);
  $angkatan = htmlspecialchars($post["angkatan"]);
  $email = htmlspecialchars($post["email"]);

  $foto = upload();
  if($foto === false){
    return false;
  }

  $query = "INSERT INTO identitas VALUES
  ('','$nim','$nama','$prodi','$angkatan','$email','$foto')";

  mysqli_query($conn, $query);

  // mengembalikan baris penambahan data di dbms
  return mysqli_affected_rows($conn);
}

// function upload
function upload(){
  $namaFile = $_FILES["foto"]["name"];
  $ukuranFile = $_FILES["foto"]["size"];
  $error = $_FILES["foto"]["error"];
  $temporaryFile = $_FILES["foto"]["tmp_name"];

  if($error === 4){
    echo "
    <script>
      alert('Silahkan pilih gambar terlebih dahulu!');
    </script>
    ";
    return false;
  }

  $ekstensiValid = ["png" , "jpg" , "jpeg"];
  $ekstensiNamaFile = explode(".", $namaFile);
  $ekstensiNamaFile = strtolower(end($ekstensiNamaFile));
  
  if(! in_array($ekstensiNamaFile, $ekstensiValid)){
    echo "
    <script>
      alert('Tolong masukan ekstensi file jpg, png, jpeg!');
    </script>
    ";
    return false;
  }

  if($ukuranFile > 5000000){
    echo "
    <script>
      alert('Ukuran file terlalu besar!');
    </script>
    ";
    return false;
  }

  $namaFileBaru = uniqid();
  $namaFileBaru .= ".";
  $namaFileBaru .= $ekstensiNamaFile;

  move_uploaded_file($temporaryFile, '../img/'.$namaFileBaru);

  return $namaFileBaru;
}


// function hapus
function hapus($get){
  global $conn;
  mysqli_query($conn, "DELETE FROM identitas WHERE id = '$get' ");
  return mysqli_affected_rows($conn);
}
?>
