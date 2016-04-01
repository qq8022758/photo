<?php
class user{
	var $name;
	var $img;
	};
$id=$_GET['id'];
$_SESSION['userId']=$id;
require_once('../config.php');
$con=mysql_connect($configs['db_host_sn'],$configs['db_user_sn'],$configs['db_pass_sn']);
mysql_select_db($configs['db_name_sn']);
mysql_query("SET NAMES UTF8");
$sql="SELECT *
FROM `users`
WHERE `id` =".$id;
$result = mysql_query($sql,$con);
while ($row = mysql_fetch_object($result))
  {
	  $re=new user;
	  $re->name=$row->username;
	  $re->img=$row->avater;
	  echo json_encode($re);
  
  }

mysql_close($con);
?>