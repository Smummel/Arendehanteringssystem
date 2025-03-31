<?php
    session_start();
    $server="localhost";
    $user="root";
    $password="";
    $link=mysqli_connect($server, $user, $password, "mysticfixers");

    $id = $_SESSION['id'];
    $status = $_SESSION['status'];
    $sql="UPDATE tickets SET status='$status' WHERE id=$id";
    $result=mysqli_query($link, $sql);
    header("Location: index.php?location=login");
?>