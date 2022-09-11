<?php

// menampilkan todo list

function showTodoList(){
  global $todoList;
  echo "TODO LIST".PHP_EOL;
  foreach($todoList as $number => $value){
    echo "$number. $value" . PHP_EOL;
  }
}