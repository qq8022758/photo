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
FROM `users`
ORDER BY `attention` DESC
LIMIT 0 , 19";
$result = mysql_query($sql,$con);
//mysql_fetch_object() 函数从结果集（记录集）中取得一行作为对象。
while ($row = mysql_fetch_object($result))
  {
	  $guangzhu[$i]=new user;
	  $guangzhu[$i]->id=$row->id;
	  $guangzhu[$i]->name=$row->username;
	  $guangzhu[$i]->img=$row->avater;
	  $guangzhu[$i]->attention=$row->attention;
	  
  $i++;
  }
echo json_encode($guangzhu);
mysql_close($con);
?>