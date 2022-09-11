<?php
if (isset($_POST['submit'])) {
	if ($_POST['username'] == "admin" && $_POST['password'] == "admin") {
		echo "login success!";
	} else {
		echo "login failed!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>POST</title>
</head>
<body>
	<h2>Login Form</h2>
	<form method="post" action="">
		Username : <input type="text" name="username"> <br>
		Password : <input type="text" name="password"> <br>
		<button type="submit" name="submit">submit</button>
	</form>
</body>
</html>