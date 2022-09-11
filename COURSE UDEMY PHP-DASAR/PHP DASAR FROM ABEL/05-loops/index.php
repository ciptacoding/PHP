<?php
/* Pengulangan / Looping
-----------------------------------------
- for
- while
- do while
- foreach => pengulangan khusus array
---------------------------------------*/

// for ($i = 1; $i <= 10; $i++) { 
// 	echo "Hello world : " . $i . "<br>";
// }

// $i = 10;
// while ($i >= 1) {
// 	echo "Hello world : " . $i . "<br>";
// $i--;
// }

// $i = 11;
// do {
// 	echo "Hello world : " . $i . "x <br>";
// $i++;
// } while ($i < 10);

// $str = "";
// for ($i=0; $i <= 10; $i++) { 
// 	for ($j=0; $j <= $i; $j++) { 
// 		$str .= "*";
// 	}
// 	$str .= "<br>";
// }
// echo $str;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Looping PHP</title>
</head>
<body>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<td>No</td>
			<?php for ($x = 1; $x <= 20; $x++): ?>
			<td style="background-color: lightblue;"><?= $x; ?></td>
			<?php endfor; ?>
		</tr>
		<?php for ($x = 1; $x <= 20; $x++): ?>
		<tr>
			<td style="background-color: lightgreen;"><?= $x; ?></td>
			<?php for ($j = 1; $j <= 20; $j++): ?>
				<?php if ($x == $j): ?>
					<td style="background-color: #ccc"><?= $x * $j; ?></td>
				<?php else: ?>
					<td><?= $x * $j; ?></td>
				<?php endif; ?>
			<?php endfor; ?>
		</tr>
		<?php endfor; ?>
	</table>
</body>
</html>