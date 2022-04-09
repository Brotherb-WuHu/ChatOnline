<?php
    session_start();

    // 连接数据库
    require_once('database.php');

    // 信息获取
    $name=$_POST["name"];
    $acc=$_POST["acc"];
    $psw=$_POST["psw"];
    $sex=$_POST["sex"];

    // 查询名字是否与数据库中的一致
    $sql="select * from user where name = '{$name}'";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);

    if (empty($row)) {
        $isrepeat= false;
    } else {
        $isrepeat = true;
    }

    // 获取图片信息
    $img = mysqli_real_escape_string($conn, file_get_contents($_FILES['pic']['tmp_name'])); //获取图片
    $imgType = $_FILES['pic']['type'];//获取图片格式

    // 判断信息是否非法
    if ($name=="请输入姓名"||$name==""||$acc=="请输入账号"||$acc==""||$psw=="请输入密码"||$psw==""||$sex==""||$img==""||$imgType=="") {
        echo "<script> alert('请把信息填写完整哦'); </script>";
        header("Location:register.php");
    } elseif ($isrepeat) {
        echo "<script> alert('用户名重复！')</script>";
        header("Location:register.php");
    } else {
        $sql = "INSERT INTO user (acc,psw,name,sex,imgType,img)
        VALUES ('$acc','$psw','$name','$sex','$imgType','$img')";
        $result=mysqli_query($conn, $sql);

        if ($result) {
            echo "<script> alert('注册成功') </script>";
            header('Location:login.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
