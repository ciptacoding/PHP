<?php
// goto tidak direkomendasikan penggunaannya
goto a;
echo "Hello World";

a:
echo "Hello GOTO A";

// goto di dalam perulangan
$value = 1;
while(true){
  echo "Nilai Ke-$value".PHP_EOL;
  $value++;

  if($value > 10){
    goto end;
  }
}

end:
echo "Looping End";
