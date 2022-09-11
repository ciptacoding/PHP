<?php
// local variable berlaku hanya dalam sekali eksekusi
function increment(){
  $counter = 1;
  echo "Counter Ke-$counter".PHP_EOL;
  $counter++;
}

increment();
increment();
increment();