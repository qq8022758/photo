<style type="text/css">
	ul li div p img{
		width:100%;
		height: 100%;
	}
</style>
<div class="fans_tab" id="fans_tab">
               <ul class="clearfix" style="display: block;">
                 
                 
                 
                 
               </ul>
            </div>
            <script>
			$.each(config.friend,function(i,n){
				var friendcat ="http://localhost/shisui/action/getcat.php?id="+n.id;
			    var friendnum;
			$.get("http://localhost/shisui/action/getfriend.php?id="+config.friend[i].id,function(data){
				  		friendnum=data.length;
							},'json');
				  $.get(friendcat,function(data){
				
				  	config.friend[i].cat_id=data.cat_id;
				  	var friendalbum="http://localhost/shisui/action/getcategoty.php?catid="+config.friend[i].cat_id;
					
				  	$.get(friendalbum,function(data){
				  		config.friend[i].album=data;

						
						
						
$(".fans_tab .clearfix").append( "<li fid='"+n.id+"'>"
                   +"<h3>相册<span class='xiangCeShuLiang'>"+config.friend[i].album.length+"</span></h3>"
                   
                     +"<div class='h_img user_img'>"
                      +" <p><img src="+config.friend[i].img+"></p>"
                     +"</div>"
                     +"<h4>"+config.friend[i].name+"</h4>"
                  
                   +"<div class='concern' style='display:none'>取消关注</div>"
				   
                  +" <p class='recommend_meta'>幻友团<span>"+friendnum+"</span>粒</p>"
                +" </li>");
				 
				 
				  		
				 $(".clearfix li[fid='"+n.id+"']").unbind('click').bind('click',function(){
				$.get("http://localhost/shisui/view/area/friend/fans_album.php?id="+n.id,function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
				})
				  	},'json')
				  				  },'json')
				})
           
            </script>