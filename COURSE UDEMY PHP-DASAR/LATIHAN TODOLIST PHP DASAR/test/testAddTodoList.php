<?php
require_once "../model/todoList.php";
require_once "../logic/AddTodoList.php";

addTodoList("Eko");
addTodoList("Tono");
addTodoList("Budi");

var_dump($todoList);