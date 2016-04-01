<?php
$xiangpian=array();
$i=0;
require_once('../config.php');
$con=mysql_connect($configs['db_host_sn'],$configs['db_user_sn'],$configs['db_pass_sn']);
mysql_select_db($configs['db_name_sn']);
mysql_query("SET NAMES UTF8");
$sql="INSERT INTO `shisui`.`comments` (
`id` ,
`image_id` ,
`date` ,
`author` ,
`email` ,
`author_id` ,
`anonymous_id` ,
`comment`
)
VALUES (
NULL , '".$_POST['pid']."', '".$_POST['time']."', '".$_POST['name']."', '".$_POST['email']."' , '".$_POST['id']."', '', '".$_POST['main']."'
);";
$result = mysql_query($sql,$con);
echo $result;
mysql_close($con);
?>