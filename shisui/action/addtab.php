<?php

require_once('../config.php');
$con=mysql_connect($configs['db_host_sn'],$configs['db_user_sn'],$configs['db_pass_sn']);
mysql_select_db($configs['db_name_sn']);
mysql_query("SET NAMES UTF8");
$sql="INSERT INTO `shisui`.`tab` (
`id` ,
`tab_name`
)
VALUES (
NULL , '".$_GET['tab']."'
);";
$result = mysql_query($sql,$con);
echo $_GET['tab'];
mysql_close($con);
?>