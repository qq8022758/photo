<?php
$pid=$_GET['pid'];
$id=$_GET['id'];

require_once('../config.php');
$con=mysql_connect($configs['db_host_sn'],$configs['db_user_sn'],$configs['db_pass_sn']);
mysql_select_db($configs['db_name_sn']);
mysql_query("SET NAMES UTF8");
$sql="DELETE FROM comments WHERE image_id=".$pid." and author_id =".$id."";
$result = mysql_query($sql,$con);
echo $result;
mysql_close($con);
?>