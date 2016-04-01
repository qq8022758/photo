
<div class="fans_album" id="fans_album">
               <h2 class='fans_name'>相册</h2>
               <ul id="portfolio">
					

					
                    
                    
                    
				</ul>
            </div>
<script>
$.each(config.friend,function(i,n){
	if(n.id==<?php
echo $_GET['id'];
?>){
	$(".fans_name").html(n.name+"的相册");
	if(n.album){
		if(n.album[0]){
			
			$.each(n.album,function(j,k){
		
		$("#portfolio").append(""+
	"<li class='service photography'>"+                 
					"<a aid='"+k.id+"' rel='prettyPhoto' alt='Preview'>"+
                    "<p><span class='albumName'>"+k.name+"</span><span class='photoNum'>"+k.pic_count+"</span><span class = 'miaoshu'>"+k.description+"</span></p><img src="+k.cover+" alt='' height='200' width='210' /></a>"+
                   " </li>"
						);
		})
			}
		}
	
		$("#portfolio li a").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/area/friend/fans_photo.php?id="+$(this).attr("aid"),function(data){
			   
			   $(".content").empty().append(data);
			   
			   });
	});
	}
	})

</script>