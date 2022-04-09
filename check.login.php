<?php
session_start();

require_once('database.php');

// 开始查询数据库
mysqli_select_db($conn, "users");//选择要连接的数据库
mysqli_set_charset($conn, "utf8");//顺利查询中文英文

// 获取表单提交数据
$name=$_POST["name"];
$psw=$_POST["password"];
$acc=$_POST["username"];

//用户身份的 session,方便记录
$_SESSION['name']=$name;


// 查询数据库做比对
$login = "select * from user where  acc={$acc} and psw='{$psw}' and name='{$name}'";//选择要查询的数据
$result=mysqli_query($conn, $login);
$row=mysqli_fetch_assoc($result);




if (empty($row)) {
    $_SESSION['is_login'] = false;
    $_SESSION['errorinfo'] = '登录失败哦，请重新检查账号密码';
    header('Location:login.php');
} else {
    // 设置登录成功状态
    $_SESSION['is_login'] = true;
    $_SESSION['user1_login'] = true;

    // 将当前登录用户的数据插入表 online
    $sql1="INSERT INTO online SELECT * FROM user where name = '$name'";
    mysqli_query($conn, $sql1);


    
    header('Location:backend.php');
}
