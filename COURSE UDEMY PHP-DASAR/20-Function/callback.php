<?php

function sayHello(string $name, callable $filter){
  $finalName = $filter($name);
  echo "Hello $finalName".PHP_EOL;
}
// panggil
sayHello("budi", "strtoupper");
sayHello("budi", "strtolower");
// panggil degan anonymous
sayhello("eko", function(string $nama):string{
  return strtoupper($nama);
});
// panggil dengan arrow
sayHello("eko", fn(string $namamu) => strtolower($namamu));