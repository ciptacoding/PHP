<?php
  require "../logic/logic.php";

  if(hapus($_GET["id"]) > 0){
  echo "
  <script>
    alert('Data berhasil dihapus!');
    document.location.href = '../index.php';
  </script>
  ";
  }else{
  echo "
  <script>
    alert('Data belum dihapus!');
    document.location.href = '../index.php';
  </script>
  ";
  }
?>