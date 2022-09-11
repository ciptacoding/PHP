<?php

$valueStudent = 80;
$absentStudent = 75;

if($valueStudent>= 80 && $absentStudent >=80){
  echo "Selamat Anda Lulus!";
}else if($valueStudent>= 75 && $absentStudent >=75){
  echo "Anda Remidi!";
}else{
  "Anda Tidak Lulus";
}