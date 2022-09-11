<?php

// rekursif function
function rekursifFaktorial(int $value) :int
{
  if($value == 1){
    return 1;
  }else{
    return $value * rekursifFaktorial($value - 1);
  }
}
echo rekursifFaktorial(10).PHP_EOL;


// looping faktorial
function loopFaktorial(int $nilai) :int
{
  $total = 1;
  for($i = 1; $i <= $nilai; $i++ ){
    $total *= $i;
  }
  return $total;
}
echo loopFaktorial(3);