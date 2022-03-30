<?php
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $conn = mysqli_connect($servername, $username, $password);
    mysqli_select_db($conn, "users");
    mysqli_set_charset($conn, "utf8");
