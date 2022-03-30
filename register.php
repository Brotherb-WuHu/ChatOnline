<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>注册页面</title>
    <link href="css/register.css" type="text/css" rel="stylesheet">

</head>

<body>

    <div id="box">

        <form action="check.register.php" method="post" enctype="multipart/form-data" οnchange="showImg()">

            <ul style="list-style: none">
                <li>
                    <h2>注册进行中</h2>
                </li>
                <!--  showImg()在js文件里面定义，实现实时预览图片 -->
                <li style="text-align: center;">
                    <input type="file" name="pic" id="pic" onchange="showImg()" accept="image/*">
                    <br>
                    <img src="pictures/man.png" id="preview">
                </li>
                <!-- 姓名 -->
                <li>
                    <img src="pictures/name.png" class="icon">
                    <input type="text" name="name" class="input" value="请输入姓名" onfocus="if(value=='请输入姓名') {value=''}"
                        onblur="if (value=='') {value='请输入姓名'}">
                </li>
                <!-- 账号 -->
                <li>
                    <img src="pictures/user.ico" class="icon">
                    <input type="text" name="acc" class="input" value="请输入账号" onfocus="if(value=='请输入账号') {value=''}"
                        onblur="if (value=='') {value='请输入账号'}">
                </li>
                <!-- 密码 -->
                <li>
                    <img src="pictures/password1.ico" class="icon">
                    <input type="text" name="psw" id="password" class="input" value="123456"
                        onblur="if (value=='') {value='请输入密码'}">
                </li>

                <!-- 性别 -->
                <li>
                    <div class="sex">
                        <img src="pictures/sex.png" class="icon" style="position:relative;left:11px;;">
                        <input type="radio" name="sex" value="male">男
                        <input type="radio" name="sex" value="female">女
                    </div>
                </li>
                <!-- 注册按钮 -->
                <br>
                <li>
                    <button type="submit" class="button" name="注册" value="确定注册">注册</button>
                </li>
            </ul>
        </form>
    </div>

</body>

<script type="text/javascript" src="functions.js"></script>

</html>

<?php
if ($_POST["注册"]=="确定注册") {
    header("Location:check.register.php");
}
