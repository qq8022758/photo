
<!--    <div id="tab_login"  class="grid_5 tab_box">
          <div class="headBox">
            <label>新建相册</label>
            <div class="closepop" id="closepop"></div>
           </div>
   
          <form name="login_form">             
              <div class="albumNameBox">               
                  <label for="albumName" class="albumNameText">相册名:</label>
                  <input type="text" id="albumName" value=""/>
                  <label class="Limit">0/20</label>
              </div>
              
              <div class="albumDesBox">
                  
                  <label for="albumDes" class="albumDesText">描述:</label>
                  <textarea id="albumDes" cols="30" rows="3" value=""></textarea>
                  <label class="Limit">0/330</label>
              </div>
    
              <div class="albumTypeBox">
                  <label for="albumType" class="albumTypeText">类型:</label>
                  <select id="classification">
                     <option>最爱</option> 
                     <option>风景</option>
                     <option>人物</option>
                     <option>动物</option>
                     <option>游记</option>
                     <option>卡通</option>
                     <option>生活</option>
                     <option>其他</option>
                  </select>              
              </div>
              
              <div class="albumStatusBox">
                  <label for="statusType" class="statusTypeText">权限:</label>
                  <select id="Status">
                     <option value="public">公共</option> 
                     <option value="friend">好友</option>
                     <option value="private">自己</option>
                  </select>              
              </div>
              
              <div class="buttonBox">
                  <button name="login" type="button" id="submitAlbum">确定</button>
              </div>
          </form>
    </div>-->
<!--<script type="text/javascript">
$(document).ready(function(e) {
	$(".closepop").click(function(){
		$(".pop").empty();
		$(".popframe").hide();
		}
	); 
	
	$("#submitAlbum").click(function(){
		var AlbumJson={};
		AlbumJson.name=$('input #albumName').val();
		AlbumJson.description=$('textarea #albumDes').val();
		AlbumJson.name=$('select #classification').val();
		var url ="http://localhost/shisui/index.php?route=index/demo";
 	       $.post(url,AlbumJson,function(data){
 	 	       alert(data);
 	 	       var data=eval(data);//转化成对象类型的数据
 	    	   var divdata = data[0].data;  	 		  
 	 			//初始化任务列表
 	 		   if(divdata.length!=0){
 	 		 	  $.each(divdata, function(iedx, val){
                     // alert(val.username+"  "+val.password);
 	 	 		  });
 	 		    }
 	 	});
		}
	); 
	
});-->

</script>