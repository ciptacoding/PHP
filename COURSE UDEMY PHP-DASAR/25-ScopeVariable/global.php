<?php
// global variable hanya bisa diakses didalam function ketika menggunakan keyword global
$studentName = "Budi";
$teacherName = "Dian";

function sayHello(){
  global $studentName;
  echo "Hello $studentName".PHP_EOL;

  echo "Hello {$GLOBALS["teacherName"]}";
}

sayHello();