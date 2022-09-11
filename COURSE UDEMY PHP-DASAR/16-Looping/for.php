<?php

// ketika nilai ganjil munculkan text "INI BILANGAN GANJIL"
for($i = 0; $i<=100; $i++){
  if($i % 2 == 1){
    echo "INI BILANGAN GANJIL".PHP_EOL;
  }else{
    echo $i.PHP_EOL;
  }
}