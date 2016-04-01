<?php 
$doweload = $_POST["xiazai"];
//echo $doweload;
				$img = base64_decode($doweload);
				$a = file_put_contents('./'.time().'.jpg', $img);//返回的是字节数
				print_r($a);

				?>