<?php

function greeting(){
  echo "Halo".PHP_EOL;
}
$newFunction = "greeting";
$newFunction();


// filter
function sayHello($name, $filter){
  $finalName = $filter($name);
  echo "Halo $finalName ". PHP_EOL;
}
function sampleFilter(string $name):string{
  return "salam kenal $name";
}
sayHello("Cipta", "sampleFilter");
sayHello("Budi", "strtoupper");
sayHello("Tono", "strtolower");
