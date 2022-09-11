<?php

require_once "../model/todoList.php";
require_once "../logic/addTodoList.php";
require_once "../logic/showTodoList.php";
require_once "../logic/removeTodoList.php";

addTodoList("Eko");
addTodoList("Tono");
addTodoList("Budi");
addTodoList("Andi");
addTodoList("Dika");

removeTodoList(3);
removeTodoList(4);

showTodoList();