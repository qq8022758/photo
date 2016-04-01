<link href="view/area/album/css/classification.css" rel="stylesheet" rev="stylesheet" type="text/css"/>
<div class='classification'>
<div class='selectlabel'>
    <select name="classification">
       <option value="最爱">最爱</option>
       <option value="风景">风景</option>
       <option value="人物">人物</option>
       <option value="动物">动物</option>
       <option value="游记">游记</option>
       <option value="卡通">卡通</option>
       <option value="生活">生活</option>
       <option value="其他">其他</option>
    </select>
</div>
<div class='albumtype type'>
    <div class='title'>最爱</div>
    <div class='main'>
       <ul id="portfoliolin" class="portfolio">
					
                    
	  </ul>
    </div>

</div><!--end classification-->
<input id="RecordAlbumId" type="hidden" value=""/>   
<script>
	$.each(config.user.album,function(i,n){
			if(n.classification==$("select[name='classification']").val()){
				$("#portfoliolin").append(""+
		"<li class='service photography'>"+                 
						"<a aid='"+n.id+"' rel='prettyPhoto' alt='Preview'>"+
						"<p><span class='albumName'>"+n.name+"</span><span class='photoNum'>"+n.pic_count+"</span><span class = 'miaoshu'>"+n.description+"</span></p><img src="+n.cover+" alt='' height='200' width='210' /></a><span class='change'></span><span class='delete'></span>"+
					   " </li>");
				}
			
			});
	/*-------------------------------------------------------------------*/		
			
	$(".selectlabel select").unbind('change').bind('change',function(){
		$(".albumtype .title").html($("select[name='classification']").val())
		$("#portfoliolin").empty();
		$.each(config.user.album,function(i,n){
	    //alert(n.classification);
			if(n.classification==$("select[name='classification']").val()){
				$("#portfoliolin").append(""+
		"<li class='service photography'>"+                 
						"<a aid='"+n.id+"' rel='prettyPhoto' alt='Preview'>"+
						"<p><span class='albumName'>"+n.name+"</span><span class='photoNum'>"+n.pic_count+"</span></p><img src="+n.cover+" alt='' height='200' width='210' /></a><span class='change'></span><span class='delete'></span>"+
					   " </li>");
				}		
			});
  /*----------------------------------------------------------------------*/	
		$("#portfoliolin li a").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/area/friend/fans_photo.php?id="+$(this).attr("aid"),function(data){
			   
			   $(".content").empty().append(data);
			   
			   });
	})
	});
  /*----------------------------------------------------------------------*/
  
  $("#portfoliolin li a").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/page/photo.php?id="+$(this).attr("aid"),function(data){			   
			   $(".content").empty().append(data);
			   
			   });
	});
  
  
	
	
							
						/*************修改相册信息*****************/

	$(".portfolioshow li span.change").unbind('click').bind('click',function(){
		$("#RecordAlbumId").val($(this).siblings('a').attr('aid'));
		$.fn.popframe("http://localhost/shisui/view/area/album/ModifyAlbumInfo.php");	
		//$.fn.popframe("http://localhost/shisui/view/page/ModifyAlbumInfo.php");
		});
		
	/*************删除相册*****************/
	$(".portfolioshow li span.delete").unbind('click').bind('click',function(){
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
