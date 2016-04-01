
<link href="view/area/album/css/creatalbumPop.css" rel="stylesheet" rev="stylesheet" type="text/css"/>
<div class='creatalbum'>
<div class='top'>
<div class='title'>新建相册信息</div>
<div class='closepop'></div>
</div>
<div class='middle'>
<div class='item'>
<div class='left'>相册名称</div>
<div class='right'><input class="albumNamePop" type="text" /><label class="Limit">0/20</label></div>
<div class='clear'></div>
</div>
<div class='item'>
<div class='left'>相册描述</div>
<div class='right'><textarea class="descriptionPop"></textarea><label class="Limit">0/330</label></div>
<div class='clear'></div>
</div>
<div class='item'>
<div class='left'>分类</div>
<div class='right'>
     <select class="classificationPop" name="classificationPop">
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
    <select class="statusPop" name="statusPop">
         <option value="public">公共</option>
         <option value="friend">友好</option>
         <option value="private">私人</option>
    </select>
</div>
<div class='clear'></div>
</div>
</div>
<div class='bottom'>
<div class='wanchengPop' id="wanchengPop">完成</div>
<!--<div class='quxiao'>取消</div>-->
<div class='clear'></div>
</div>
</div>
<script>
	$(".closepop").unbind('click').bind('click',function(){
		$('.pop').empty();
		$('.popframe').hide();
	});
    
	
	$(".wanchengPop").click(function(){
	  var AlbumJson={};
	  AlbumJson.user_id=config.user.id;
	  AlbumJson.name=$('input.albumNamePop').val();
	  AlbumJson.description=$('textarea.descriptionPop').val();
	  //alert(AlbumJson.description);
	  AlbumJson.classification=$("select[name='classificationPop']").val();
	  AlbumJson.status=$("select[name='statusPop']").val();
	  var url ="http://localhost/shisui/index.php?route=Album/creatNewAlbum";
		 $.post(url,AlbumJson,function(data){
			 var data=eval(data);
			 var divdata = data[0].data;  	 		  
			  if(data[0].data!=""){
				 alert("恭喜，新建相册成功！");
             /*---------为界面添加新增的数据---------*/	   
              $.fn.ModReloadAlbumInfo();		   
			 }else{
				 alert("新建相册失败，请重新操作！");	
			 }
			$('.pop').empty();
		    $('.popframe').hide();
	  });
	  }
  ); 
    
    
 </script>
