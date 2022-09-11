<?php
require_once 'vendor/autoload.php';
$faker = Faker\Factory::create('id_ID');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Faker</title>
</head>
<body>
	<h2>Data Penduduk:</h2>
	<?php for ($i = 1; $i <= 10; $i++): ?>
		<ul>
			<li><?= $faker->name ?></li>
			<li><?= $faker->email ?></li>
			<li><?= $faker->address ?></li>
		</ul>
	<?php endfor ?>
</body>
</html>