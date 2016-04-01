<?php
$id=$_GET['id'];
require_once('../config.php');
$con=mysql_connect($configs['db_host_sn'],$configs['db_user_sn'],$configs['db_pass_sn']);
mysql_select_db($configs['db_name_sn']);
mysql_query("SET NAMES UTF8");
$sql="SELECT *
FROM `user_cache`
WHERE `user_id` =".$id."
LIMIT 0 , 1";
$result = mysql_query($sql,$con);
while ($row = mysql_fetch_object($result))
  {
	  echo  json_encode($row);
  
  }
mysql_close($con);
?>