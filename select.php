<!DOCTYPE html>
<html>
<head>
	<title>PHP database select</title>
</head>
<body>
	<?php

	$db = mysqli_connect('localhost', 'root', '', 'test');

	$result = mysqli_query($db, "select * from users");

	foreach ($result as $row) {
	//$value = $row['name'];
	//echo $value;

		printf("<li><span style='color:%s'>%s (%s)</span> <a href='update.php?id=%s'>edit</a> <a href='delete.php?id=%s'>delete</a></li>",
			htmlspecialchars($row['colour']),
			htmlspecialchars($row['name']),
			htmlspecialchars($row['gender']),
			htmlspecialchars($row['id']),
			htmlspecialchars($row['id'])
			);
	}

	mysqli_close($db);

	?>
</body>