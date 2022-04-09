<?php
    session_start();
    require_once('database.php');
    include "./functions/phpfunctions.php";

    $date = $_POST["date"];;

    $msg=$_POST["msg"];
    $name = $_SESSION['name'];

    $sql="INSERT INTO message (name,msg,date) value ('$name','$msg','$date')";
    $row=mysqli_excute_zsg($sql);


    header('Location:backend.php');
