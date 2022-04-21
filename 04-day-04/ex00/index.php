<?php
	session_start();
	if ($_GET["submit"] === "OK")
	{
		$_SESSION["login"] = $_GET["login"];
		$_SESSION["passwd"] = $_GET["passwd"];
	}
	// print_r($_GET);
	// print_r($_SESSION);
	// print_r($_COOKIE);
?>
<html><body>
<form name="index.php" method="get">
	Username: <input type="text" name="login" value="<?php echo $_SESSION["login"]; ?>" />
	<br />
	Password: <input type="password" name="passwd" value="<?php echo $_SESSION["passwd"]; ?>" />
	<input name="submit" type="submit" value="OK" />
</form>
</body></html>
