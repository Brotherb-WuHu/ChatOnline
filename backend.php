<?php
    session_start();
    // !!!!!!!!这个 登录状态是测试用的！！！记得后面删掉
    $_SESSION['is_login']=true;

   require_once('database.php');
    
    //测试 获取数据库某一项数据
    $namelogin = $_SESSION['name'];

    $sql = "select * from user where name = '$namelogin'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);;

    echo $namelogin;
    echo $row['name'];
    echo $row['acc'];
    echo $row['sex'];

    // echo '<img src="data:'.$row['imgtype'].';base64,'.base64_encode($row['img']) .'"/>';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>brotherb的后台</title>
    <meta charset="utf-8">
    <link href="css/backend.css" type="text/css" rel="stylesheet">

</head>

<body>
    <!-- 判断登录状态 -->
    <?php if (isset($_SESSION['is_login'])&& $_SESSION['is_login']):?>

    <div id="body">

        <div id="leftBody">
            <div class="lBtop">
                <div id="chatBox">
                    <div class="chattmp">
                        <div class="chatone">
                            <div class="chatradius1">
                            </div>
                            <p class="chatp1"></p>
                        </div>
                    </div>
                    <div class="chattmp">
                        <div class="chattwo">
                            <div class="chatradius2">
                            </div>
                            <p class="chatp2">
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <textarea id="inputBox">

            </textarea>
            <button id="send">发送</button>

        </div>


        <div id="rightBody">

            <div class="usertmp">
                <div class="radius2">
                    <?php
                        echo '<img class="userimg" src="data:'.$row['imgtype'].';base64,'.base64_encode($row['img']) .'"/>';
                    ?>
                </div>
                <p class="p2"><?php echo $row['name']?>
                </p>
            </div>
        </div>

        <div id="centreBody">
            <div id="leftCentreBody">
                <div id="windowuserimg">
                    <?php
                        echo '<img class="windowuserimg" src="data:'.$row['imgtype'].';base64,'.base64_encode($row['img']) .'"/>';
                    ?>
                </div>
            </div>
            <div id="rightCentreBody">
                <div class="frame">
                    <?php echo $row['name']?>
                </div><br><br>
                <div><br><br><br></div>

                <div class="frame">
                    <?php echo $row['acc']?>
                </div><br><br>
                <div><br><br><br></div>

                <div class="frame">
                    <?php echo $row['sex']?>
                </div><br><br>
                <div><br><br><br></div>
            </div>
            <div>
                <button id="closebtn"></button>
            </div>
        </div>
    </div>
    <!-- 
    <button id="btn">点击增加</button> -->

    <div>
        <table>

        </table>
    </div>


    <a href="logout.php" style="display: block;position: absolute;top:85%;left: 45%">退出登录</a>
    <?php else:?>
    <?php header("Location:login.php");?>
    <?php endif;?>
    <!-- 判断登录状态 -->
</body>
<script type="text/javascript" src="functions/backend.js"></script>


</html>