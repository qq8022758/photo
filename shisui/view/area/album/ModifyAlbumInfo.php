
<link href="view/area/album/css/ModifyAlbumInfo.css" rel="stylesheet" rev="stylesheet" type="text/css"/>
<div class='ModifyAlbumInfoTab' id="ModifyAlbumInfoTab">
    <div class='top'>
          <div class='title'>修改相册信息</div>
          <div class="closepop" id="closepop"></div>
    </div>
   


 <form name="ModifyAlbumInfo_form">
    <div class='middle'>
    
         <div class='item'>
               <div class='left'>相册封面</div>
               <div class="avater ModifyCover right" id="ModifyCover"></div>  
         </div>
         
         
         <div class='item'>
               <div class='left albumName'>相册名称</div>
               <div class='right'>
                    <input class="albumName ModifyAlbumName" type="text"  

name="ModifyAlbumName" value="" id="ModifyAlbumName"/>
                         <label class="Limit">0/10</label>
               </div>
               <div class='clear'></div>
          </div>
          
          
          <div class='item'>
              <div class='left'>相册描述</div>
              <div class='right'>
                     <textarea class="description"  id="ModifyDescription" 

name="ModifyDescription" value=""></textarea><label class="Limit">0/330</label>
              </div>
               <div class='clear'></div>
           </div>
           
         <div class='item'>
              <div class='left'>分类</div>
                  <div class='right'>
                     <select class="classification" name="ModifyClassification" id="ModifyClassification">
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
            <select class="status" name="ModifyStatus" id="ModifyStatus">
                 <option value="public">公共</option>
                 <option value="friend">友好</option>
                 <option value="private">私人</option>
            </select>
        </div>
    <div class='clear'></div>
    </div>
    
    </div><!--middle-->
    <div class='bottom'>
        <div class='wancheng ModifyAlbumWancheng' id="ModifyAlbumWancheng">完成

    </div>
    </form>

</div>


<script type="text/javascript">

$('.ModifyAlbumInfoTab').ready(function(e) {
	/***
	***********初始化**********
	****/
	var aid=$("#RecordAlbumId").val();
	$.each(config.user.album,function(index,value){			
			if(value.id==aid){
			  $('.ModifyCover').css('background-image','url('+value.cover+')'); 
			  $("input[name='ModifyAlbumName']").val(value.name);
			  $("textarea[name='ModifyDescription']").val(value.description);
			  $("select[name='ModifyClassification']").children("option[value='"+value.classification+"']").attr("selected","selected");
			  $("select[name='ModifyStatus']").children("option[value='"+value.status+"']").attr("selected","selected");
			  
			}
	});
	
		/***
	***********关闭按钮**********
	****/
	$(".closepop").click(function(){
		$(".pop").empty();
		$(".popframe").hide();
		}
	); 
	
	/***
	***********确定按钮**********
	****/ 	
	 $('.ModifyAlbumWancheng').unbind('click').bind('click',function(){
		 var Data={};
		 Data.name=$("#ModifyAlbumName").val();
		 Data.description=$("textarea[name='ModifyDescription']").val();
		 Data.classification=$("select[name='ModifyClassification']").val();
		 Data.status=$("select[name='ModifyStatus']").val();
		 var coverPath=$('.ModifyCover').css('background-image').substring(4);
		 Data.cover=coverPath.replace(")","");
		 Data.cat_id=config.user.cat_id;
		 Data.user_id=config.user.id;
		 Data.aid=aid;
		 //alert(Data.status);
		 var url ="http://localhost/shisui/index.php?route=Album/ModifyAlbumInfo";
		 $.post(url,Data,function(data){
 	 	       var data=eval(data);//转化成对象类型的数据
 	    	   var divdata = data[0].data;  
               if(data[0].data==true){
				   alert("修改相册信息成功！");
				   $(".pop").empty();
		           $(".popframe").hide();
				   $.fn.ModReloadAlbumInfo();
			   }	 	
 	 	    });
		 });
 	       
	/**************************************
	*   ********修改头像**********   */ 
	 var datajsonI={};
		 datajsonI.w=50;
		 datajsonI.h=50;
		 datajsonI.r=0;
		 datajsonI.url="http://localhost/shisui/view/images/gravatar.png";
		 datajsonI.obj=".ModifyCover";
		 datajsonI.local="";
	  $('.ModifyCover').click(function(){$(this).ModDantushangchuan("1",datajsonI);});

});


   


</script>

>script>