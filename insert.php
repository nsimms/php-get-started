<!DOCTYPE html>
<html>
<head>
    <title>PHP database insert</title>
</head>
<body>

    <?php
    $name = '';
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

 $db = mysqli_connect('localhost', 'root', '', 'test');

 $sql = sprintf("INSERT INTO users(name, colour) VALUES ('%s', '%s')", $name, $colour);

//echo $sql;

mysqli_query($db, $sql);

}
        
    }
    ?>
    <form method="post" action="">
        User name: <input type="text" name="name" value=<?php echo htmlspecialchars($name)?>><br>
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