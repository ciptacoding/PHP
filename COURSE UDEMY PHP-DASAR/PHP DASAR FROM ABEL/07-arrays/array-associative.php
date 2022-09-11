<?php
/* 1. Array associative
-------------------------------------- */
$products = [
	'name' => 'laptop',
	'series' => 'x441m',
	'brand' => 'asus',
	'stock' => 400
];

// print_r($products);
// echo $products['series']; // output : x441m


$students = [
	[
		"name" => "abel yoshuara",
		"nis" => 3392,
		"major" => "rpl",
		"email" => "abelyoshuara@gmail.com"
	],
	[
		"name" => "riyan erlangga",
		"nis" => 3392,
		"major" => "rpl",
		"email" => "erlangga@gmail.com"
	],
	[
		"name" => "angga purnadita",
		"nis" => 3392,
		"major" => "rpl",
		"email" => "purnadita@gmail.com"
	],
	[
		"name" => "eka purnama",
		"nis" => 3392,
		"major" => "rpl",
		"email" => "ekapurnama@gmail.com"
	],
];

// print_r($students);
// echo $students[1]["name"]; // output : riyan erlangga
?>

<!DOCTYPE html>
<html>
<head>
	<title>Array Associative</title>
</head>
<body>
	<?php foreach ($students as $student): ?>
	<ul>
		<li>name : <?= $student['name']; ?></li>
		<li>nis : <?= $student['nis']; ?></li>
		<li>email : <?= $student['email']; ?></li>
		<li>major : <?= $student['major']; ?></li>
	</ul>
	<?php endforeach; ?>
</body>
</html>