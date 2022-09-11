<?php
// static variable kebalikan dengan local variable, static tidak akan hangus dalam sekali eksekusi
function increment(){
  static $counter = 1;
  echo "Counter Ke-$counter".PHP_EOL;
  $counter++;
}

increment();
increment();
increment();
increment();
increment();