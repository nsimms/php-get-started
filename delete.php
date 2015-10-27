<?php
if(isset($_GET['id']) && ctype_digit($_GET['id'])){
	$id = $_GET['id'];
}
else
{
	header('location: select.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP database select</title>
</head>
<body>

<?php
    readfile('navigation-tmpl.html');

$db = mysqli_connect('localhost', 'root', '', 'test');

$sql = sprintf("DELETE from users where id = $id");

mysqli_query($db, $sql);

mysqli_close($db);

echo "User deleted!";

?>

</body>
</html>