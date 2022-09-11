<?php

function factorial(int $value) :int
{
  if($value == 1){
    return 1;
  }else{
    return $value * factorial($value - 1);
  }
}