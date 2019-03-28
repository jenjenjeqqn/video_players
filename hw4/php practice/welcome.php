<?php
  $usrname = htmlspecialchars($_GET["usr"]);
  $pwd = md5($_GET["pwd"]);

  if (isset($usrname)&&$usrname){
    echo "hello ".$usrname;
  }else{
    echo "请输入用户名"；
  }


  include 'conn_sql.php';
  //检测用户名及密码是否正确

  $check_query = mysql_query("select usr from user where usr='$usrname' and pwd='$pwd' limit 1");
  if($result = mysql_fetch_array($check_query)){
      //登录成功
      session_start();
      // echo session_id();
      // session_destroy();
      $_SESSION['usrname'] = $usrname;
      $_SESSION['usr'] = $result['usr'];
      echo $usrname,' 欢迎你！进入 <a href="my.php">用户中心</a><br />';
      echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';
      exit;
  } else {
      exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
  }
      
   
  //注销登录
  if($_GET['action'] == "logout"){
      unset($_SESSION['userid']);
      unset($_SESSION['usrname']);
      echo '注销登录成功！点击此处 <a href="login.html">登录</a>';
      exit;


?>


