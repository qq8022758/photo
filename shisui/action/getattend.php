<?php
$guangzhu=array();
$i=0;
class user{
	var $name;
	var $img;
	var $attention;
	};
require_once('../config.php');
$con=mysql_connect($configs['db_host_sn'],$configs['db_user_sn'],$configs['db_pass_sn']);
mysql_select_db($configs['db_name_sn']);
mysql_query("SET NAMES UTF8");
$sql="SELECT *
FROM `attend`
WHERE `id` =".$_GET['id'];
$result = mysql_query($sql,$con);
while ($row = mysql_fetch_object($result))
  {
	  $guangzhu[$i]=$row;
	  
  $i++;
  }
echo json_encode($guangzhu);
mysql_close($con);
?>