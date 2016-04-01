<!------------------start albumshowold.php------------------>
<link href="view/area/album/css/creatalbum.css" rel="stylesheet" rev="stylesheet" type="text/css"/>
<div class='albumshow '>
<ul id="portfolio" class="portfolio portfolioshowold">
					
				</ul>
</div>
<input id="RecordAlbumId" type="hidden" value=""/>  
<script>
var albumoldurl="http://localhost/shisui/action/getcategotyold.php?catid="+config.user.cat_id;
				  	$.get(albumoldurl,function(data){
				  		
						$.each(data,function(i,n){
	$("#portfolio").append(""+
	"<li class='service photography'>"+                 
					"<a aid='"+n.id+"' rel='prettyPhoto' alt='Preview'>"+
                    "<p><span class='albumName'>"+n.name+"</span><span class='photoNum'>"+n.pic_count+"</span><span class = 'miaoshu'>"+n.description+"</span></p><img src="+n.cover+" alt='' height='200' width='210' /></a><span class='change'></span><span class='delete'></span>"+
                   " </li>"
						);
	
	})
	$("#portfolio li a").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/page/photo.php?id="+$(this).attr("aid"),function(data){			   
			   $(".content").empty().append(data);
			   
			   });
	});
						},'json');
						
						
						
						
						
						
						
												
						/*************修改相册信息*****************/

	$(".portfolioshowold li span.change").unbind('click').bind('click',function(){
		$("#RecordAlbumId").val($(this).siblings('a').attr('aid'));
		$.fn.popframe("http://localhost/shisui/view/area/album/ModifyAlbumInfo.php");	
		//$.fn.popframe("http://localhost/shisui/view/page/ModifyAlbumInfo.php");
		});
		
	/*************删除相册*****************/
	$(".portfolioshowold li span.delete").unbind('click').bind('click',function(){
		var DataDelete={};
		DataDelete.aid=$(this).siblings('a').attr('aid');
		DataDelete.cat_id=config.user.cat_id;
		if($.fn.del()==true){
			
		   var url ="http://localhost/shisui/index.php?route=Album/DeleteAlbumInfo";
		   $.post(url,DataDelete,function(data){
 
 	 	    },"json");/*end post*/
		  alert("删除相册信息成功！");
				   $(".pop").empty();
		           $(".popframe").hide();
				   $.each(config.user.album,function(i,n){
					   if(n.id==DataDelete.aid){
						      config.user.album[i]=undefined;
						   }
					   })
				  $("#albumNum").html(Number($("#albumNum").html())-1)
				   $(this).parents('li').remove();
		}/*end if*/
		});

</script>
