
	<script src="jquery-1.10.2.js" type="text/javascript"></script>
	
	<form action="picget.php" method="post" enctype="multipart/form-data" name="upload">
	<label for="aaa">
		<?php 
		error_reporting(E_ALL^E_NOTICE^E_WARNING);
		$h=$_GET['h'];
		$w=$_GET['w'];
		$r=$_GET['r'];
		$obj=$_GET['obj'];
		$local=$_GET['local'];
		$path=$_GET['path'];
		echo "
		<style>
		.pic{
		width:".$w."px;
		height:".$h."px;
		background-image:url('images/image.png');
		background-repeat:no-repeat;
		background-size:".$w."px ".$h."px;
		border-radius:".$r."px;
		position:absolute;
		top:0px;
		left:0px;
		z-index:1008611
		}
		#aaa,#picpath{position:absolute;
		top:10px;
		left:10px;
		width:2px;
		height:2px;
		border:0px;
		z-index:1}
		</style>
		"
		?>
		  <input id="aaa" type="file" name="upfile" size="1" />
		  </label>
		<?php 
		echo "<input type='text' hidden='' name='h' value='$h' />
		<input type='text' hidden='' name='w' value='$w' />
		<input type='text' hidden='' name='r' value='$r' />
		<input type='text' hidden='' name='local' value='$local' />
		<input type='text' hidden='' name='obj' value='$obj' />
		<input type='text' hidden='' name='path' value='$path' />";
		?>
	</form>
		<script type="text/javascript">
		//alert("<?php echo $path ?>")
		$("#aaa").change(
		function(){
			upload.submit();
			}
		)
		
		</script>

	