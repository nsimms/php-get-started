<!DOCTYPE html>
<html>
<head>
	<title>database</title>
</head>
<body>
<?php

$db = mysqli_connect('localhost', 'root', '', 'test');

$result = mysqli_query($db, "select * from users");

foreach ($result as $row) {
	$value = $row['name'];
	echo $value;
}

mysqli_close($db);

?>
</body>