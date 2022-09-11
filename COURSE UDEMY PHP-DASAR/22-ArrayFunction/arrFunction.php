<?php

$data = [1,2,3,4,5,6,7,8,9,10];

// array_map = mengubah data
$changeData = array_map(fn(int $value)=> $value * 10, $data);
var_dump($changeData);

// rsort = membalikan data
rsort($data);
var_dump($data);

// array keys = mengambil key
array_keys($data);
var_dump($data);

// array value = megambil value
array_values($data);
var_dump($data);