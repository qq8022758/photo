<?php 

$filename="http://localhost/shisui/uploadpic/uploads/1398179682.jpg";//获取参数 
header('Content-type: image/jpeg;charset=UTF8'); 
header("charset=utf-8"); print $filename;
header("Content-Disposition: attachment; filename='$filename'"); 
//注意：header函数前确保没有任何输出 

exit;//结束程序 

?>