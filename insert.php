<!DOCTYPE html>
<html>
<head>
    <title>PHP database insert</title>
</head>
<body>

    <?php
    readfile('navigation-tmpl.html');

    $name = '';
    $password = '';
    $gender = '';
    $colour = '';

    if (isset($_POST['submit']))
    {

        $ok = true;

        if(!isset($_POST['name']) || $_POST['name'] === ''){
            $ok = false;
        } else {
            $name = $_POST['name'];
        }
        if(!isset($_POST['password']) || $_POST['password'] === ''){
            $ok = false;
        } else {
            $password = $_POST['password'];
        }
        if(!isset($_POST['gender']) || $_POST['gender'] === ''){
            $ok = false;
        } else {
            $gender = $_POST['gender'];
        }
        if(!isset($_POST['colour']) || $_POST['colour'] === ''){
            $ok = false;
        } else {
            $colour = $_POST['colour'];
        }

        if($ok){

            $phash = password_hash($password, PASSWORD_DEFAULT);

            $db = mysqli_connect('localhost', 'root', '', 'test');

            $sql = sprintf("INSERT INTO users(name, gender, colour, password) VALUES ('%s', '%s', '%s', '%s')",
                mysqli_real_escape_string($db, $name),
                mysqli_real_escape_string($db, $gender),
                mysqli_real_escape_string($db, $colour),
                mysqli_real_escape_string($db, $phash)
                );

//echo $sql;

            mysqli_query($db, $sql);

            mysqli_close($db);

            echo '<p>User Added</p>';

        }

    }
    ?>
    <form method="post" action="">
        User name: <input type="text" name="name" value=<?php echo htmlspecialchars($name)?>><br>
        Password: <input type="text" name="password" ><br>
        Gender:
        <input type="radio" name="gender" value="f"
        <?php
        if($gender === 'f')
            {echo ' checked';}
        ?>>female
        <input type="radio" name="gender" value="m"
        <?php
        if($gender === 'm')
            {echo ' checked';}
        ?>>male<br>
        Favourite Colour:
        <select name="colour">
            <option value="">Please select...</option>
            <option value="#f00"
            <?php
            if($colour === '#f00')
                {echo ' selected';}
            ?>>red</option>
            <option value="#0f0"
            <?php
            if($colour === '#0f0')
                {echo ' selected';}
            ?>>green</option>
            <option value="#00f"
            <?php
            if($colour === '#00f')
                {echo ' selected';}
            ?>>blue</option>
        </select><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>