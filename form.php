<!DOCTYPE html>
<html>
<head>
    <title>PHP  Form</title>
</head>
<body>

    <?php

    if (isset($_POST['submit']))
    {
        printf(
            'username: %s
            <br>Password: %s
            <br>Gender: %s
            <br>Colour: %s
            <br>Languages: %s
            <br>Comments: %s
                        <br>T&amp;C: %s
            '
            , $_POST['name'], $_POST['password'], $_POST['gender'], $_POST['colour']
            , implode(' ', $_POST['languages']), $_POST['comments'], $_POST['tc']
            );
    }

    ?>
    <form method="post" action="">
        User name: <input type="text" name="name"><br>
        Password: <input type="password" name="password"><br>
        Gender:
        <input type="radio" name="gender" value="f">female
        <input type="radio" name="gender" value="f">male<br>
        Favourite Colour:
        <select name="colour">
            <option value="#f00">red</option>
            <option value="#0f0">green</option>
            <option value="#00F">blue</option>
        </select><br>
        Languages spoken:
        <select name="languages[]" multiple size="3">
            <option value="en">English</option>
            <option value="fr">French</option>
            <option value="it">Italian</option>
        </select><br>
        Comments:<textarea name="comments"></textarea><br>
        <input type="checkbox" name="tc" values="ok">I accept the T&C<br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>