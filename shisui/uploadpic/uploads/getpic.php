<?php
//if(isset($_GET[filename])){ 
$filename= basename($_GET["filename"]);//获取参数

//echo basename($filename);
//$filename=iconv("utf-8","gb2312",$filename);
//$filename=iconv("gb2312","utf-8",$filename);
//$filename = "1457313676.jpg";
// header('Content-type: image/jpg'); 
// header("Content-Disposition: attachment; filename=$filename"); //注意：header函数前确保没有任何输出
// echo $filename;
// echo file_get_contents($filename);//写入图片信息
// echo "123";
// echo "Content-Disposition: attachment; filename=$filename";
// readfile($filename);

 header("Content-type: application/octet-stream" );
 header("Content-disposition:attachment;filename=".$filename.";");
 header("Content-Length:".filesize($filename));
 readfile($filename);


// exit;//结束程序 
//}
?>