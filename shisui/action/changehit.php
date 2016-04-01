<?php

$pid=$_GET['pid'];
$hit=$_GET['hit'];
require_once('../config.php');
$con=mysql_connect($configs['db_host_sn'],$configs['db_user_sn'],$configs['db_pass_sn']);
mysql_select_db($configs['db_name_sn']);
mysql_query("SET NAMES UTF8");
$sql="UPDATE `shisui`.`images` SET `hit` = '".$hit."' WHERE `images`.`id` =".$pid.";";

$result = mysql_query($sql,$con);
echo $pid."|".$hit."|".$result; 
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