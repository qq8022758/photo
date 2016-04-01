<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>聚会▪婚庆</title>
</head>

<body>
<?php
		error_reporting(E_ALL^E_NOTICE^E_WARNING);
		if(!empty($_FILES['upfile'][name])){
			if($_FILES['upfile']['error']>0){
				echo "上传错误";
			}
			else{
				if(!is_dir("uploads/")){
					mkdir("uploads/");
				}
				$shangchuanshijian=time();
				$path='uploads/'.$shangchuanshijian.strstr($_FILES['upfile']['name'],'.');
				
					if(!move_uploaded_file($_FILES['upfile']['tmp_name'],$path)){
						echo "上传失败";
					}else{
						echo "".time().$_FILES['upfile']['name']."上传成功，大小为：".$_FILES['upfile']['size']."字节";
					}
				
			}
			
		}
		//$info=$_FILES['upfile'];
		//$dir='uploads/pic/';
		//$name=$info['name'];
		
		//$rand=rand(0,10000000);
		//$name=$_POST['picname'];
		//$path='uploads/pic/'.$name;
		//if(!is_dir($dir)){
			//mkdir($dir);
		//}
		//$move=move_uploaded_file($info['tmp_name'],$path);
		echo "<script src=\"jquery-1.10.2.js\" type=\"text/javascript\"></script>
		<script type=\"text/javascript\">
		alert(\"".$path."\")
		$(window.parent.document).find('.addpic').before('<div class=\"yishangchuantupian\"><img src=\"http://localhost/shisui/uploadpic/uploads/".$shangchuanshijian.strstr($_FILES['upfile']['name'],'.')."\"/></div>');
		var picnameee;
		if($(window.parent.document).find('.url').val()){picnameee=$(window.parent.document).find('.url').val()+'".$path."|'}
		else{picnameee='".$path."|'};
		$(window.parent.document).find('.url').val(picnameee);
		window.location.href=\"http://localhost/shisui/uploadpic/pic.php?h=".$_POST[h]."&w=".$_POST[w]."&r=".$_POST[r]."\";
		</script>";
	

?>
</body>
</html>