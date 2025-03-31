<?php
    session_start();
    $server="localhost";
    $user="root";
    $password="";
    $link=mysqli_connect($server, $user, $password, "mysticfixers");

    $id = $_GET['id'];
    $sql = "DELETE FROM blogposts WHERE id=$id";
    $result = mysqli_query($link, $sql);
    header("Location: index.php?location=blog");
?>