<?php

require_once "../model/todoList.php";
require_once "../logic/showTodoList.php";
require_once "../view/viewAddTodoList.php";
require_once "../view/viewRemoveTodoList.php";
require_once "../helper/input.php";

// menampilkan layar utama
function viewShowTodoList(){

  while(true){

    showTodoList();

    echo "Menu".PHP_EOL;
    echo "1. Tambah Todo".PHP_EOL;
    echo "2. Hapus Todo".PHP_EOL;
    echo "x. Keluar".PHP_EOL;

    $pilihan = input("Pilih");
    if ($pilihan == "1"){
      viewAddTodoList();
    }else if ($pilihan == "2"){
      viewRemoveTodoList();
    }else{
      break;
    }
  }
  echo "Sampai Jumpa".PHP_EOL;
}