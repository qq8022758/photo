<?php

$id=$_GET['id'];
$note=$_GET['note'];
require_once('../config.php');
$con=mysql_connect($configs['db_host_sn'],$configs['db_user_sn'],$configs['db_pass_sn']);
mysql_select_db($configs['db_name_sn']);
mysql_query("SET NAMES UTF8");
$sql="UPDATE `shisui`.`users` SET `content` = '".$note."' WHERE `users`.`id` =".$id.";";

$result = mysql_query($sql,$con);
echo $id."|".$note."|".$result; 
/*while ($row = mysql_fetch_object($result))
  {
	  $re=new user;
	  $re->name=$row->username;
	  $re->img=$row->avater;
	  echo json_encode($re);
  
  }
echo $result;*/
mysql_close($con);
?>