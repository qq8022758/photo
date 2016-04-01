<style type="text/css">
 .pop {
	   margin: 0px auto;
	   height:100%;
          }
		  
  .closepop{
	   position:fixed;

	   width:50px;
	   height:50px;
	   right:200px;
	   top:0;  
  }
  .pop .fangtude{width:960px;
  height:800px;
  margin:0px auto}
.pop iframe{margin:0px auto}
</style>  
<script type="text/javascript">
$(document).ready(function(e) {
	$(".closepop").click(function(){
		$(".pop").empty();
		$(".popframe").hide();
		}
	);
	
});

</script>

<div class="closepop" id="closepop"></div>
<div class='fangtude'></div>
<script>
$(".fangtude").append("<iframe width='960' id='singleid' height='800' scrolling='yes'  src='view/area/public/singleI.php?id=<?php echo $_GET['id']?>&friend=<?php echo isset($_GET['friend'])?$_GET['friend']:'0'?>'/><div class='geiiframeyongde'></div>");
$(".geiiframeyongde").unbind('click').bind('click',function(){
	//alert(1)
	var photourl="http://localhost/shisui/action/getphoto.php?id=<?php echo $_GET['id']?>";
				  	$.get(photourl,function(datap){
						//alert(2)
				$.get("http://localhost/shisui/action/changepic_count.php?id=<?php echo $_GET['id']?>&count="+datap.length)
				$.each(config.user.album,function(i,n){
					if(n.id==<?php echo $_GET['id']?>){
						//alert(3)
						config.user.album[i].pic_count=datap.length
						}
					})		
						},'json')
	})
</script>


