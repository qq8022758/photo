<?php
$id=$_GET['id'];
require_once('../config.php');
$con=mysql_connect($configs['db_host_sn'],$configs['db_user_sn'],$configs['db_pass_sn']);
mysql_select_db($configs['db_name_sn']);
mysql_query("SET NAMES UTF8");
$sql="INSERT INTO `shisui`.`user_cache` (
`user_id` ,
`cache_update_time` ,
`forbidden_categories` ,
`nb_total_images` ,
`cat_id`
)
VALUES (
'".$id."', '0', '0', '0', NULL
);

";
$result = mysql_query($sql,$con);
while ($row = mysql_fetch_object($result))
  {
	  if($row->mail_address==$name&&$row->password==$password){
		  
		  echo  json_encode($row);
		  
		  };
  
  }

mysql_close($con);
?>