<?php
    session_start();

    $_SESSION['name']= "123";


    require_once('database.php');

    $namelogin = $_SESSION['name'];

    $del = "delete from online where name = '$namelogin'";
    $result = mysqli_query($conn, $del);

    session_unset();


    header("Location:login.php");
