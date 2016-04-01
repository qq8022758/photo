<?php
require_once('../config.php');
$con=mysql_connect($configs['db_host_sn'],$configs['db_user_sn'],$configs['db_pass_sn']);
mysql_select_db($configs['db_name_sn']);
mysql_query("SET NAMES UTF8");
$sql="INSERT INTO `shisui`.`attend` (
`id` ,
`attend_id`
)
VALUES (
'".$_GET['id']."', '".$_GET['atid']."'
);
";
$result = mysql_query($sql,$con);
echo $result;
mysql_close($con);
?>