<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>brother_b的登录页面</title>
    <link href="css/login.css" type="text/css" rel="stylesheet">

</head>

<body>
    <!-- 判断是否登录 -->
    <?php if (isset($_SESSION['is_login'])&& $_SESSION['is_login']):?>
    <?php header("Location:backend.php");?>
    <?php else:?>
    <!-- 判断是否登录 -->

    <div id="box">

        <form action="check.login.php" autocomplete="off" autofocus="true" method="post"
            onsubmit="if (document.getElementById('pswinfo').innerHTML!=''||document.getElementById('info').innerHTML!=''){return false};">

            <ul style="list-style: none">
                <li>
                    <h2>登录系统</h2>
                </li>
                <!-- 姓名 -->
                <li>
                    <img src="pictures/name.png" class="icon">
                    <input type="text" name="name" class="input"
                        onblur="if (value==''){document.getElementById('nameinfo').innerHTML='username is required';}else {document.getElementById('nameinfo').innerHTML=''}">
                </li>
                <!-- 报错 -->
                <li class="info" id="nameinfo"></li>

                <!-- 账号 -->
                <li>
                    <img src="pictures/user.ico" class="icon">
                    <input type="text" name="username" class="input"
                        onblur="if (value==''){document.getElementById('userinfo').innerHTML='account is required';}else {document.getElementById('userinfo').innerHTML=''}">
                </li>
                <!-- 账号报错 -->
                <li class="info" id="userinfo"></li>
                <!-- 密码 -->
                <li>
                    <img src="pictures/password1.ico" class="icon">
                    <input type="password" name="password" id="password" class="input"
                        onblur="if (value==''){document.getElementById('pswinfo').innerHTML='password is required';}else{document.getElementById('pswinfo').innerHTML=''}">
                </li>
                <!-- 密码报错 -->
                <li class="info" id="pswinfo"></li>

                <!-- 密码显示隐藏，用js控制 -->
                <li>
                    <img id="eye" src="pictures/eyecl.ico">
                </li>

                <br>

                <li>
                    <button type="submit" class="button" name="登录" value="确定登录">登录</button>
                    <br><br>
                    <a href="register.php">
                        <button type="button" class="button" onclick="Location.href='register.php'">注册</button></a>
                </li>

                <li></li>

                <!-- 登录失败报错信息 -->
                <?php if (isset($_SESSION['errorinfo'])):?>
                <li class="info">
                    <?php echo $_SESSION['errorinfo'];?>
                </li>
                <?php endif;?>
                <!-- 登录失败报错信息 -->
            </ul>
        </form>
        <?php endif;?>
    </div>

</body>

<script type="text/javascript" src="functions.js"></script>

</html>

<?php
    unset($_SESSION['userinfo']);
    unset($_SESSION['pswinfo']);
    unset($_SESSION['nameinfo']);
    unset($_SESSION['errorinfo']);
    if ($_POST["登录"]=="确定登录") {
        header("Location:check.login.php");
    }
