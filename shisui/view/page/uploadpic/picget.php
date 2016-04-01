
<?php
		error_reporting(E_ALL^E_NOTICE^E_WARNING);
		if(!empty($_FILES['upfile'][name])){
			if($_FILES['upfile']['error']>0){
				echo "上传错误";
			}
			else{
				if(!is_dir("../../images/uploads/")){
					mkdir("../../images/uploads/");
				}
				$shangchuanshijian=time();
				$path='../../images/uploads/'.$shangchuanshijian.strstr($_FILES['upfile']['name'],'.');
				
					if(!move_uploaded_file($_FILES['upfile']['tmp_name'],$path)){
						echo "上传失败";
					}else{
						echo "文件".time().$_FILES['upfile']['name']."上传成功，大小为：".$_FILES['upfile']['size'];
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
		//alert(\"".$path."\")
		//**********************修改#Avatar的背景		
        var NewPath = \"http://localhost/shisui/view/images/uploads/".$shangchuanshijian.strstr($_FILES['upfile']['name'],'.')."\";
		$(window.parent.document).find('".$_POST[obj]."').css('background-image','url('+NewPath+')'); 
	//	$(window.parent.document).find('".$_POST[obj]."').children('img').attr('src',NewPath); 
		var strs = $(window.parent.document).find('#touxiangiframe').attr('src').split('&');
		var NewPath2 = strs[4].substring(0,5)+\"http://localhost/shisui/view/images/uploads/".$shangchuanshijian.strstr($_FILES['upfile']['name'],'.')."\";
		strs[4]=NewPath2;
		$(window.parent.document).find('#touxiangiframe').attr('src',strs);

		
		var path=NewPath2.replace('path=','');
		
		window.location.href=\"http://localhost/shisui/view/page/uploadpic/pic.php?h=".$_POST[h]."&obj=".$_POST[obj]."&w=".$_POST[w]."&r=".$_POST[r]."&path=".path."\";
		
	
 	     
		
		</script>";
	

?>
