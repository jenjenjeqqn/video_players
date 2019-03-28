<?php 
// 假定数据库用户名：root，密码：123456，数据库：RUNOOB 
$con=mysqli_connect("localhost","jen","1234","test"); 
if (mysqli_connect_errno($con)) 
{ 
    echo "连接 MySQL 失败: " . mysqli_connect_error(); 
} 
 
$sql="SELECT * FROM user";
$result=mysqli_query($con,$sql);
 
// 关联数组
$row=mysqli_fetch_assoc($result);
printf ("%s : %s)", $row["usr"], md5(md5($row["pwd"]) . "hahahaha"));
 
// 释放结果集
mysqli_free_result($result);
 
mysqli_close($con);
?>