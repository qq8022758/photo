<?php
require_once('../config.php');
$con=mysql_connect($configs['db_host_sn'],$configs['db_user_sn'],$configs['db_pass_sn']);
mysql_select_db($configs['db_name_sn']);
mysql_query("SET NAMES UTF8");
$sql="UPDATE `shisui`.`categories` SET `pic_count` = '".$_GET['count']."' WHERE `categories`.`id` =".$_GET['id'].";
";
$result = mysql_query($sql,$con);
echo $result;
mysql_close($con);
?>