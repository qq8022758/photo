<?php
$id=$_GET['id']
?>
<div class="fans_photo" id="fans_photo">
                
                <div class="content_inner pf_col_2 portfolio">		
                <h2 class='XiangCeMing'></h2>					
               <!--/ post-item-->
                
                <!--/ post-item-->
                
                <!--/ post-item-->
			</div><!--/ content_inner-->
            </div>
<script>
$.each(config.public,function(i,n){
	if(n.id==<?php echo $id ?>){
		$(".XiangCeMing").html(n.name)
		}
	})

var photourl="http://localhost/shisui/action/getphoto.php?id=<?php echo $id ?>";
				  	$.get(photourl,function(data){
						$(".XiangCeMing").html(data[0].author+">> >>"+$(".XiangCeMing").html());
						$.each(data,function(i,n){
							
							$(".portfolio").append(
							
							"<div class='post-item picture-icon'> " 
					+"<div class='post-thumb'>" 
					  +"<a class='zoomer'>" 
						+"<img width='250' height='168' src='"+n.path+"' alt='' class='pic'>" 
	+"<div class='shareAndHit' style='display:none'><span class='shareToShiSuiQiang'></span><span class='hit'></span></div>" 
					  +"</a>	" 				
					+"</div><!--/ post-thumb-->	" 	
					
				+"</div>" 
							)
							})
			$(".post-item").unbind('click').bind('click',function(){
				 $.fn.popframe("http://localhost/shisui/view/area/public/single.php?id=<?php echo $_GET['id']?>");
				})
							},'json')
</script>