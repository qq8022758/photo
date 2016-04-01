<link href="view/area/album/css/creatalbum.css" rel="stylesheet" rev="stylesheet" type="text/css"/>
<div class='creatalbumTab'>
<div class='top'>
<div class='title'>新建相册信息</div>
</div>
<div class='middle'>
<div class='item'>
<div class='left albumName'>相册名称</div>
<div class='right'><input class="albumName" type="text" /><label class="Limit">0/10</label></div>
<div class='clear'></div>
</div>
<div class='item'>
<div class='left'>相册描述</div>
<div class='right'><textarea class="description"></textarea><label class="Limit">0/330</label></div>
<div class='clear'></div>
</div>
<div class='item'>
<div class='left'>分类</div>
<div class='right'>
   <select class="classification" name="classification">
<!--       <option>全部</option>-->
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
<div class='clear'></div>
</div>
<div class='item'>
<div class='left'>权限</div>
<div class='right'>
    <select class="status" name="status">
         <option value="public">公共</option>
         <option value="friend">友好</option>
         <option value="private">私人</option>
    </select>
</div>
<div class='clear'></div>
</div>
</div>
<div class='bottom'>
<div class='wancheng' id="wancheng">完成</div>
<div class='clear'></div>
</div>
</div>
<script type="text/javascript">
  $(".wancheng").click(function(){
		var AlbumJson={};
		AlbumJson.user_id=config.user.id;
		AlbumJson.name=$('input.albumName').val();
		AlbumJson.description=$('textarea.description').val();
		AlbumJson.classification=$("select[name='classification']").val();
		AlbumJson.status=$("select[name='status']").val();
		var url ="http://localhost/shisui/index.php?route=Album/creatNewAlbum";
 	       $.post(url,AlbumJson,function(data){
 	 	       var data=eval(data);
 	    	   var divdata = data[0].data;  	 		  
 	 		    if(data[0].data!=""){
				   alert("恭喜，新建相册成功！");
	          /*-------刷新界面数据-------*/	   
              $.fn.ModReloadAlbumInfo();
			  $('input.albumName').val("");	
			  $('textarea.description').val("");
			  $("select[name='classification']").find("option").eq(0).attr("selected","selected");		  				   			  $("select[name='status']").find("option").eq(0).attr("selected","selected");	   
			   }else{
				   alert("新建相册失败，请重新操作！");	
			   }
 	 	});
		}
	); 
</script>


