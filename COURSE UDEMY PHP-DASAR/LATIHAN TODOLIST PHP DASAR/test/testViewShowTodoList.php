<?php

require_once "../logic/addTodoList.php";
require_once "../view/viewShowTodoList.php";

addTodoList("Belajar");
addTodoList("Mandi");
addTodoList("Lari");

viewShowTodoList();