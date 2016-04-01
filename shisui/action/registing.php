<?php
$name=$_GET['name'];
$password=$_GET['password'];
require_once('../config.php');
$con=mysql_connect($configs['db_host_sn'],$configs['db_user_sn'],$configs['db_pass_sn']);
mysql_select_db($configs['db_name_sn']);
mysql_query("SET NAMES UTF8");
$sql="INSERT INTO `shisui`.`users` (
`id` ,
`username` ,
`password` ,
`sex` ,
`mail_address` ,
`permission` ,
`registration_date` ,
`avater` ,
`nb_friend` ,
`attention` ,
`content`
)
VALUES (
NULL , '酒魔高骜', '861106', 'female', 'jiumogaoao@163.com', 'admin', '2014-04-24 09:32:16', 'http://localhost/shisui/view/images/wand.png', '0', '0', ''
);";
$result = mysql_query($sql,$con);
while ($row = mysql_fetch_object($result))
  {
	  if($row->mail_address==$name&&$row->password==$password){
		  
		  echo  json_encode($row);
		  
		  };
  
  }

mysql_close($con);
?>