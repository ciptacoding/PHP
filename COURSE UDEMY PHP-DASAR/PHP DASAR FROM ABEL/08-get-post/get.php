<?php
// print_r($_GET);
// if (isset($_GET['name']) && isset($_GET['nis'])) {
// 	echo "name : " . $_GET['name'] . "<br>";
// 	echo "nis : " . $_GET['nis'] . "<br>";
// }
?>
<!DOCTYPE html>
<html>
<head>
	<title>GET</title>
</head>
<body>
	<?php if (isset($_GET['submit'])): ?>
		<ul>
			<li>Name : <?= $_GET['name']; ?></li>
			<li>NIS : <?= $_GET['nis']; ?></li>
		</ul>
	<?php endif; ?>
	<form method="get" action="">
		name : <input type="text" name="name"> <br>
		nis : <input type="text" name="nis"> <br>
		<button type="submit" name="submit">submit</button>
	</form>
</body>
</html>