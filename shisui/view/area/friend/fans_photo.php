<div class="fans_photo" id="fans_photo">
                
                <div class="content_inner pf_col_2 portfolio">		
                <h2 class='xiangceming'>动态好友昵称相册》》相册名</h2>					
               <!--/ post-item-->
                
                <!--/ post-item-->
                
                <!--/ post-item-->
			</div><!--/ content_inner-->
</div>  
<script>
$.each(config.friend,function(i,n){
	$.each(
	n.album,function(j,k){
		if(k.id==
		<?php echo $_GET['id']
		?>
		){
			$(".xiangceming").html(n.name+">> >>"+k.name)
			
		var photourl="http://localhost/shisui/action/getphoto.php?id=<?php echo $_GET['id']?>";
				  	$.get(photourl,function(data){
						$.each(data,function(o,p){
							
							$(".portfolio").append(
							
							"<div class='post-item picture-icon'> " 
					+"<div class='post-thumb'>" 
					  +"<a class='zoomer' herf='"+p.path+"'>" 
						+"<img width='250' height='168' src='"+p.path+"' alt='' class='pic'>" 
	+"<div class='shareAndHit' style='display:none'><span class='shareToShiSuiQiang'></span><span class='hit'></span></div>" 
					  +"</a>	" 				
					+"</div><!--/ post-thumb-->	" 	
					
				+"</div>" 
							)
							})
							$(".post-item").unbind('click').bind('click',function(){
				 $.fn.popframe("http://localhost/shisui/view/area/photo/single.php?id=<?php echo $_GET['id']?>&friend=1");
				})
							},'json')
			
			}
		}
	)
	})
</script><a href="fans_photo.php"></a>