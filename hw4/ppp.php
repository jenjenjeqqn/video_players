<?php
$servername = "localhost";
$username = "jen";
$password = "1234";
$db = "test";

// 创立连接
$conn = mysqli_connect($servername, $username, $password, $db);

// 检测连接
if (mysqli_connect_errno()){
    echo "oh no! mysql connection error" . mysqli_connect_errno();
}

$usr = $_POST['usr'];
$pwd = md5(md5($_POST['pwd']) . "hahahaha");

/* 验证是否为空 */
// function checkEmpty($usr, $pwd){
    if ($usr == null || $pwd == null){
        echo '<html><head><Script Language="JavaScript">alert("用户名或密码为空");</Script></head></html>';
    }
// }

/* 验证用户是否存在 */
//function checkUser($usr, $pwd){
    $sql = "select * from user where usr = '{$usr}' and pwd = '{$pwd}'";
    $result = mysqli_query($conn, $sql);
    if ($result){
        while($row = mysqli_fetch_assoc($result)){
            echo $row["usr"]. "欢迎~";
        }
    }else{
        echo "用户不存在";
    }
//}

// 释放结果集
mysqli_free_result($result);
mysqli_close($con);
?>
