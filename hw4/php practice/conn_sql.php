<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>sql connect</title>
    </head>
    <body>
        <?php
            /* Connect to a MySQL server  连接数据库服务器 */
            $link = mysql_connect(
                'localhost',  /* The host to connect to 连接MySQL地址 */
                'root',      /* The user to connect as 连接MySQL用户名 */
                'jenjenjen888',  /* The password to use 连接MySQL密码 */
                'test');    /* The default database to query 连接数据库名称*/

            if (!$link) {
                echo("Can't connect to MySQL Server. Errorcode: %s ", mysqli_connect_error());
            }else{
                // mysql_select_db('test', $link);
                // $result = mysql_query("select usr from user where usr='$usrname' and pwd='$pwd' limit 1");
                // $result_arr = mysql_fetch_array($result);
                // print_r($result_arr);
                echo "success!";
            }
            /* Close the connection 关闭连接*/
            /* mysqli_close($link); */


            $usr = $_POST['usr'];
            $pwd = $_POST['pwd'];

            /* 验证是否为空 */
            function checkEmpty($usr, $pwd){
                if ($usr == null || $pwd == null){
                    echo '<html><head><Script Language="JavaScript">alert("用户名或密码为空");</Script></head></html>';
                }
            }

            /* 验证用户是否存在 */
            function checkUser($usr, $pwd){

            }


            ?>
    </body>
</html>
