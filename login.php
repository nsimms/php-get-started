<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Login</title>
</head>
<body>
    <?php

//echo phpversion();

    //echo phpinfo();

$loginMessage = '';

    readfile('navigation-tmpl.html');

    $name = '';
    $password = '';

    if(isset($_POST['submit']))
        $ok = true;

    if(!isset($_POST['name']) || $_POST['name'] === '')
    {
        $ok = false;
    }
    else {
        $name = htmlspecialchars($_POST['name']);
    }
    if(!isset($_POST['password']) || $_POST['password'] === '')
    {
        $ok = false;
    }   else {
        $password = htmlspecialchars($_POST['password']);
    }

    if($ok)
    {

        $db = mysqli_connect('localhost', 'root', '', 'test');

        $sql = sprintf("select * from users where name = '%s'",
            mysqli_real_escape_string($db, $name)
            );

        $result = mysqli_query($db, $sql);

//$phash = '';

        $row = mysqli_fetch_assoc($result);

        if($row){
            $phash = $row['password'];
            $isAdmin = $row['isAdmin'];
            echo "isAdmin equals".$isAdmin;
            if(password_verify($password, $phash))
            {
                $_SESSION['isAdmin'] = $isAdmin;
                $loginMessage = "login successful!";
            }
            else
            {
                $loginMessage = 'Login Failed 1';
            }
        }
        else
        {
           $loginMessage = 'Login Failed 2';

       }


       mysqli_close($db);
    echo "<p>$loginMessage</p>";


   }
   ?>
   <form method="post" action="">
    User: <input type="text" name="name" value="<?php echo $name ?>"></input><br>
    Password: <input type="password" name="password"></input><br>
    <input type="submit" name="submit" value="Login">


</form>
</body>