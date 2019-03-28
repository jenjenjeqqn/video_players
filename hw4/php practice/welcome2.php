亲爱的 <?php echo $_POST["usr"]; ?>，欢迎你！

<?php
 $servername = "188.131.152.113";
 $username = "root";
 $password = "jenjenjen888";
 $dbname = "test";
?>

<?php
 // Session需要先启动。
 session_start();

 //判断usr和pwd是否赋值
 if (isset($_POST['usr']) && isset($_POST['pwd'])){
  $name = $_POST['usr'];
  $pwd = $_POST['pwd'];
 //连接数据库
  $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
 }
 //验证内容是否与数据库的记录吻合。
 $sql = "SELECT * FROM user WHERE (usr='$name') AND (pwd='$pwd')";

 //执行上面的sql语句并将结果集赋给result。
 $result = $conn->query($sql);
 //判断结果集的记录数是否大于0
 if ($result->num_rows > 0) {
  $_SESSION['user_account'] = $name;
 
  // 输出每行数据
  while($row = $result->fetch_assoc()) {
  echo '<p>' . $row['student_nbr'] . '<br/>' . $row['usr'] . '(' . $row['sex'] . ')' . '<br/>' . $row['class'] . '<br/>' . $row['major'].'</p>';
  // <p><img src="student_images/CLASS/STUDENT_NBR.jpg" /></p>
  echo '<p><img src="student_images/' . $row['class'] . '/' . $row['student_nbr'] . '.jpg" /></p>';
  }
 } else {
  echo "没有您要的信息";
 }
 $conn->close(); 
 }
?>