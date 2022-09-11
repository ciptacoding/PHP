<?php

for ($i = 1; $i <= 100; $i++){
  if($i % 2 == 0){
    continue;
  }else{
    echo "BLIANGAN KE-$i".PHP_EOL;
  }
}