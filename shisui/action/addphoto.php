<?php

$ff=$_POST['url'];
require_once('../config.php');
$con=mysql_connect($configs['db_host_sn'],$configs['db_user_sn'],$configs['db_pass_sn']);
mysql_select_db($configs['db_name_sn']);
mysql_query("SET NAMES UTF8");
$sql="INSERT INTO `shisui`.`images` (
`id` ,
`file` ,
`date_available` ,
`name` ,
`author` ,
`hit` ,
`date_metadata_update` ,
`path` ,
`storage_category_id` ,
`status` ,
`collected_num` ,
`tab_id`
)
VALUES ";
foreach($ff as $upload){
	$sql.="(NULL , 'http://localhost/shisui/uploadpic/".$upload."', '".$_POST['changshijian']."', 'test', '".$_POST['username']."', '0', '".$_POST['duanshijian']."', 'http://localhost/shisui/uploadpic/".$upload."', '".$_POST["id"]."', '0', '0', '0'
),";
	}
$sql =  substr($sql,0,strlen($sql)-1);



$result = mysql_query($sql,$con);
return true; 
/*while ($row = mysql_fetch_object($result))
  {
	  $re=new user;
	  $re->name=$row->username;
	  $re->img=$row->avater;
	  echo json_encode($re);
  
  }
echo $result;*/
mysql_close($con);
?>