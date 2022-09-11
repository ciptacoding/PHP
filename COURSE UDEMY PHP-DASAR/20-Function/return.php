<?php

function finalScore(int $score):string{
  if($score >= 85){
    return "A";
  }else if($score >= 75){
    return "B";
  }else if($score >= 65){
    return "C";
  }else if($score >= 55){
    return "D";
  }else{
    return "E";
  }
}

$result = finalScore(80);
echo $result;