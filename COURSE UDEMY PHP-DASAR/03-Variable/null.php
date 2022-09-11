<?php

// null = variabel kosong
$name = "budi";
$name = null;

$hobby = null;

$age = 21;

// is_null = mengecek variabel mengembalikan nilai boolean
var_dump(is_null($name)); //true

// unset = menghapus variabel
unset($hobby);

// isset = mengecek variabel
var_dump(isset($hobby)); //false