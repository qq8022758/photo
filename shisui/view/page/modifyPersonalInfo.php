
    <div id="tab_modyfyPersonInfo"  class="tab_box">
          <div class="headBox">
            <label>修改个人信息</label>
            <div class="closepop" id="closepop"></div>
           </div>
   
          <form name="modifyPersonInfo_form">
              <div class="avaterBox">               
                  <label for="avater" class="avaterText">头像:</label>
                  <div class="avater ModifyAvater" id="ModifyAvater"></div> 
              </div>
                       
              <div class="emailBox">               
                  <label for="email" class="emailText">email:</label>
                  <input type="text" id="ModifyEmail" value=""/>
              </div>
              
             <div class="usernameBox">               
                  <label for="username" class="usernameText">用户名:</label>
                  <input type="text" id="ModifyUsername" value="" name="ModifyUsername"/>
              </div>
    
              <div class="passwordBox">               
                  <label for="password" class="passwordText">密码:</label>
                  <input type="text" id="ModifyPassword" value=""/>
              </div>
              
              <div class="sexBox">
                  <label for="sex" class="sexText">性别:</label>
                  <select id="ModifySex" name="sex">
                     <option value="male">男</option> 
                     <option value="female">女</option>
                  </select>              
              </div>

              <div class="buttonBox">
                  <button name="cancle" type="button" id="cancle">取消</button>
                  <button name="modify" type="button" id="submitAlbum">确定</button>
              </div>
          </form>
    </div>
<script type="text/javascript">

$('#tab_modyfyPersonInfo').ready(function(e) {
	/***
	***********初始化**********
	****/
	  $('#ModifyEmail').attr('disabled',true);//邮箱地址不可更改
	 var data={};
	 data.email=$('#email').val();
	 data.id=config.user.id; 
	 var url ="http://localhost/shisui/index.php?route=index/getUserInfoByEmail";
 	       $.post(url,data,function(data){
 	 	       var data=eval(data);//转化成对象类型的数据
 	    	   var divdata = data[0].data;  
			    if(divdata.length!=0){
 	 		 	  $.each(divdata, function(iedx, val){ 		  
 	 		   $('#ModifyEmail').val(val.mail_address);
			   $('#ModifyUsername').val(val.username);
			   $('#ModifyPassword').val(val.password);
			   if(val.sex=='male'){ 
			       $("#ModifySex").find("option").eq(0).attr("selected","selected");
				   }else{
					   $("#ModifySex").find("option").eq(1).attr("selected","selected");
				}
				var str=val.avater.replace(/\\/g,"");
					 $('#ModifyAvater').css('background-image','url('+str+')'); 
 	 	 		  });
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
	$('#cancle').click(function(){
		$(".pop").empty();
		$(".popframe").hide();
		}
	);
	
	/***
	***********确定按钮**********
	****/ 	
	 $('#submitAlbum').click(function(){
		 var ModifyUserInfoData={};
		 ModifyUserInfoData.mail_address=$('#ModifyEmail').val();
		 data.email=ModifyUserInfoData.mail_address;
		 ModifyUserInfoData.username=$('#ModifyUsername').val(); 
		 ModifyUserInfoData.password=$('#ModifyPassword').val(); 
		 ModifyUserInfoData.sex=$("select[name='sex']").val();
		 var avaterPath=$('#ModifyAvater').css('background-image').substring(4);
		 ModifyUserInfoData.avater=avaterPath.replace(")","");
		 var url ="http://localhost/shisui/index.php?route=index/ModifyUserInfo";
		 $.post(url,ModifyUserInfoData,function(data){
 	 	       var data=eval(data);//转化成对象类型的数据
 	    	   var divdata = data[0].data;  
               if(data[0].data==true){
				   alert("修改个人信息成功！");
				   $(".pop").empty();
		           $(".popframe").hide();
				   $('.user').text(ModifyUserInfoData.username); 
				   	 if(ModifyUserInfoData.sex=="female"){
						$('.sex').text("女");  
					 }else{
						$('.sex').text("男");   
					 }
				$('.userName').text(ModifyUserInfoData.username);
				var str=ModifyUserInfoData.avater.replace(/\\/g,"");
				$('#Avatar').css('background-image','url('+str+')'); 
				   
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
		 datajsonI.obj=".ModifyAvater";
		 datajsonI.local="";
	     $('#ModifyAvater').click(function(){$(this).ModDantushangchuan("1",datajsonI);});
	 
	
});

</script>