<?php

require_once('../config.php');
$con=mysql_connect($configs['db_host_sn'],$configs['db_user_sn'],$configs['db_pass_sn']);
mysql_select_db($configs['db_name_sn']);
mysql_query("SET NAMES UTF8");
$sql="UPDATE `shisui`.`images` SET `tab_id` = '".$_GET['tid']."' WHERE `images`.`id` =".$_GET['pid'].";";
$result = mysql_query($sql,$con);
echo json_encode($result);
mysql_close($con);
?>