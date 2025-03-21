<!DOCTYPE html>
<?php
    $server="localhost";
    $user="root";
    $password="";
    $link=mysqli_connect($server, $user, $password, "ahs");

    if(isset($_POST['btn'])){
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $level=$_POST['level'];
        $sql="INSERT INTO user(username, password, userlevel) VALUES ('$username', '$password', '$level')";
        $result=mysqli_query($link, $sql);
    }
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE FROM user WHERE id=$id";
        $result=mysqli_query($link, $sql);
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Min databas fuck yeah!</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
    }
</style>
<body>
    <h1>Skapa användare:</h1>
    <?php
        $sql="SELECT * FROM user ORDER BY userlevel ASC";
        $result=mysqli_query($link, $sql);
        while($rad=mysqli_fetch_assoc($result)){ ?>
            <p>Användarnamn:&nbsp;<?=$rad["username"]?></p>
            <p>Lösenord:&nbsp;<?=$rad["password"]?></p>
            <p>Level:&nbsp;<?=$rad["userlevel"]?></p>
            <a href="db.php?id=<?=$rad['id']?>">Delete</a>
            <p><br></p>
        <?php }
    ?>
    <form action="db.php" method="POST">
        <input type="text" name="username" placeholder="Användarnamn">
        <input type="password" name="password" placeholder="Lösenord">
        <input type="number" name="level" placeholder="Level">
        <input type="submit" name="btn" value="Skicka">
    </form>
</body>
</html>