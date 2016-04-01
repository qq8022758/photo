<?php
$id=$_GET['id'];
$xiangpian=array();
$i=0;
require_once('../config.php');
$con=mysql_connect($configs['db_host_sn'],$configs['db_user_sn'],$configs['db_pass_sn']);
mysql_select_db($configs['db_name_sn']);
mysql_query("SET NAMES UTF8");
$sql="SELECT *
FROM `comments`
WHERE `image_id` =".$id."
LIMIT 0 , 30";
$result = mysql_query($sql,$con);
while ($row = mysql_fetch_object($result)){
  $xiangpian[$i]=$row;
 
	  $i++;   
 
}
echo json_encode($xiangpian);
mysql_close($con);
?>