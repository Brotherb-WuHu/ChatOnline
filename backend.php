<?php
    session_start();
    require_once('database.php');
    include "./functions/phpfunctions.php";

    // for循环用封装的函数会有问题，这里加几条原生的连接
    $link = mysqli_connect('localhost', 'root', '123456', 'users');
    mysqli_set_charset($link, 'utf8');

    // 登录的时候保存当前用户名字
    $namelogin = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>brotherb的后台</title>
    <meta charset="utf-8">
    <link href="css/backend.css" type="text/css" rel="stylesheet">
    <script type="module">
        import datenow from "./functions/getTime.js"
    </script>

</head>

<body>
    <!-- 判断登录状态 -->
    <?php if (isset($_SESSION['is_login'])&& $_SESSION['is_login']):?>

    <div id="body">

        <div id="leftBody">
            <div id="lBtop">

                <!-- 聊天信息，用循环实现-->
                <!-- 1.循环message表的信息，全部打印 -->
                <!-- 2.根据$namelogin，if else判断用哪种模板 -->
                <!-- 3.用message表中的名字，去查找user表中的这个用户的全部信息并打印-->
                <?php
                $sql = "select * from message";
                $res = mysqli_query($link, $sql);
                $n = mysqli_num_rows($res);

                for ($i=0;$i<$n;$i++):

                $row= mysqli_fetch_array($res);
                $sql1 = "select * from user where name = '{$row['name']}'";
                $res1 = mysqli_query($link, $sql1);
                $row1 = mysqli_fetch_array($res1);?>

                <?php if ($row['name'] != $namelogin): ?>
                <div class="chattmp chattmp_oths">
                    <p class="date date_oths">
                        <?php echo $row['date']?>
                    </p>
                    <p class="chatName_oths">
                        <?php echo $row ['name']?>
                    </p>
                    <div class="chatone">
                        <?php echo '<img class="chatradius1" src="data:'.$row1['imgtype'].';base64,'.base64_encode($row1['img']) .'"/>';?>
                        <div class="chattext chattext_oths">
                            <?php echo $row['msg']?>
                        </div>
                    </div>
                </div>

                <?php elseif ($row['name'] == $namelogin):?>
                <div class="chattmp chattmp_me">
                    <p class="date date_me">
                        <?php echo $row['date']?>
                    </p>
                    <p class="chatName_me">
                        <?php echo $row ['name'];?>
                    </p>
                    <div class="chattwo">
                        <?php echo '<img class="chatradius2" src="data:'.$row1['imgtype'].';base64,'.base64_encode($row1['img']) .'"/>';?>
                        <div class="chattext chattext_me">
                            <?php echo $row['msg'];?>

                        </div>

                    </div>
                </div>

                <?php else:?>
                <?php endif;?>

                <?php endfor;?>
            </div>

            <form method="post" action="chatBox.php">
                <textarea id="inputBox" name="msg" type="text" placeholder="发一条友善的评论"></textarea>
                <!-- 将当前时间隐藏提交，不然又要绕半天圈子 -->
                <!-- 时间获取和添加在 js 里面 -->
                <textarea id="date" style="display: none;" name="date" type="text"></textarea>
                <button id="chatSend" value="确认发送">发送</button>
            </form>
        </div>

        <div id="rightBody">
            <?php
                $sql = "select * from online";
                $row = mysqli_excute_select($sql);
                for ($i=0;$i<count($row);$i++):
                ?>
            <div class="usertmp">
                <div class="radius2">
                    <?php
                        echo '<img class="userimg" src="data:'.$row[$i]['imgtype'].';base64,'.base64_encode($row[$i]['img']) .'"/>';
                    ?>
                </div>
                <p class="p2"><?php echo $row[$i]['name']?>
                </p>
            </div>
            <?php endfor;?>

        </div>
        <a href="logout.php" id="logout">退出登录</a>

        <div id="centreBody" class="disapear">
            <div id="leftCentreBody">
                <div id="windowuserimg">
                </div>
            </div>

            <div id="rightCentreBody">
                <div class="frame">
                </div><br><br>
                <div><br><br><br></div>

                <div class="frame">
                </div><br><br>
                <div><br><br><br></div>

                <div class="frame">
                </div><br><br>
                <div><br><br><br></div>
            </div>
            <div>
                <button id="closebtn"></button>
            </div>
        </div>
    </div>


    <?php else:?>
    <?php header("Location:login.php");?>
    <?php endif;?>
</body>
<script type="module" src="functions/backend.js"></script>

</html>