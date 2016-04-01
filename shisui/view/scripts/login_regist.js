$(document).ready(function(e) {
	/* ================= 注册与登陆界面的切换 ================= */		
        $('.second').click(function(){
		  if($(this).text()=='注册NOW') {
			  $(this).text("登陆NOW");
			  $(".inputframe").empty();
			  $(".inputframe").append(
			  	"<div class='onlyforlogin'>"
                 +"<input name='email' value='EMAIL' onfocus=\"if(this.value=='EMAIL'){this.value='';}\" onblur=\"if(this.value=='') {this.value='EMAIL';}\" type='text' class='bar email' id='email'/>"
				 +"<input name='username' value='USERNAME' onfocus=\"if(this.value=='USERNAME'){this.value='';}\" onblur=\"if(this.value=='') {this.value='USERNAME';}\" type='username' class='bar username' id='username'/>"
                +"<select name='sex' id='sex'>"
                  +"<option value='female' selected='selected'>女</option>"
                  +"<option value='male'>男</option>"
                +"</select>"
                +"<input name='password' value='PASSWORD' onfocus=\"if(this.value=='PASSWORD') {this.value='';}\" onblur=\"if(this.value=='') {this.value='PASSWORD';}\" type='text' class='bar password' id='password' />"
                +"</div>"
			  );
		      $('.not_registed').children('span').eq(0).text("已有账号？");
			  $('#signIn_btn').css('display','none');
			  $('#regist_btn').css('display','block');

		  }else{	  	
			  $(this).text("注册NOW");
			  $(".inputframe").empty();
			  $(".inputframe").append(
			  	"<input name='email' value='EMAIL' onfocus=\"if(this.value=='EMAIL'){this.value='';}\" onblur=\"if(this.value=='') {this.value='EMAIL';}\" type='email' class='bar username' id='email'/>"
                +"<input name='password' value='PASSWORD' onfocus=\"if(this.value=='PASSWORD') {this.value='';}\" onblur=\"if(this.value=='') {this.value='PASSWORD';}\" type='text' class='bar password' id='password' />"
			  );		             			  
		      $('.not_registed').children('span').eq(0).text("还没梦幻账号？");
			  $('#signIn_btn').css('display','block');
			  $('#regist_btn').css('display','none');
		  }
	   });
	   //<!---end $('.second').click---->
	   
	   	 
	 /* ================= 注册与登陆按钮点击事件 ================= */
	 	$('#signIn_btn').click(function(){
		   var data={};
		   data.password=$('#password').val();
		   data.email=$('#email').val();   
           if($('#permission').prop('checked')==true){
			  data.permission="admin";  
		   }else{
			  data.permission="normal";
		   }
		  // alert(data.password+" "+data.email+" "+data.permission);
	       var url ="http://localhost/shisui/action/login.php?name="+data.email+"&password="+data.password;
	       $.get(url,function(data){
	       	//alert(data)
	       	if(data){
	       		$('.user').text(data.username);
					 if(data.sex=="female"){
						$('.sex').text("女");  
					 }else{
						$('.sex').text("男");   
					 }
				$('.userName').text(data.username);
				var str="";
				if(data.avater==""){str="http://localhost/shisui/view/images/gravatar.png"}
				var str=data.avater.replace(/\\/g,"");
			    $('.Avatar').css('background-image','url('+str+')');
					 $(".login_form").css('display','none');
				  $('.out').css('display','block');		
				  $('.personalTab').css('display','block');  
				  alert("登陆成功！");
				  config.user=data;
			     var caturl ="http://localhost/shisui/action/getcat.php?id="+config.user.id;
				  $.get(caturl,function(data){
				  	if(data){
				  		
				  		config.user.cat_id=data.cat_id;
				  		var albumurl="http://localhost/shisui/action/getcategoty.php?catid="+config.user.cat_id;
				  	$.get(albumurl,function(data){
				  		config.user.album=data;

				  		$("#albumNum").html(config.user.album.length);
				  		
				  	},'json')
				  	}				
				  	else{
				  		var creatcat="http://localhost/shisui/action/addcat.php?id="+config.user.id;
				  $.get(creatcat,function(dataA){
				  	var caturl ="http://localhost/shisui/action/getcat.php?id="+config.user.id;
				  $.get(caturl,function(data){
				  	config.user.cat_id=data.cat_id;
				  	var albumurl="http://localhost/shisui/action/getcategoty.php?catid="+config.user.cat_id;
				  	$.get(albumurl,function(data){
				  		config.user.album=data;

				  		$("#albumNum").html(config.user.album.length);
				  	
				  	},'json')
				  	},'json')
				  },'json')
				  	}
				  	
				  	//});
				  				  },'json');
					var attendurl="http://localhost/shisui/action/getattend.php?id="+config.user.id;
					$.get(attendurl,function(data){
						config.user.attend=data;
						$.each(data,function(i,n){
							$(".user_icon.clearfix[uid='"+n.attend_id+"']").hide();
						})
					},'json')		
		    var friendurl="http://localhost/shisui/action/getfriend.php?id="+config.user.id;
		    $.get(friendurl,function(data){
		    	config.friend=[];
		    	$.each(data,function(i,n){
		    		config.friend[i]={};
		    		config.friend[i].id=n;
		    		var friendname="http://localhost/shisui/action/getusername.php?id="+n;
		    		$.get(friendname,function(data){
		    			config.friend[i].name=data.name;
		    			config.friend[i].img=data.img;
		    		},'json')
		    	});
		    	$("#friendNum").html(config.friend.length);
		    },'json')
	       	}
	       	else{
	       		alert('email或者密码错误，请重新输入')
	       	}
	       },'json')
		});
		
				
		$('#regist_btn').click(function(){
		   var data={};
		   data.email=$('#email').val();
		   data.sex=$("select[name='sex']").val();
		   data.username=$('.username').val();
		   data.password=$('.password').val();
	       var url ="http://localhost/shisui/index.php?route=index/registing";
 	       $.post(url,data,function(data){ 
		  // alert(data);			  	  
 	 		   if(data==0){
				 alert("注册失败！");
 	 		   }
			   else{
				 alert("注册成功！"); 				
			   }
		   document.location.reload();
 	 	   });
	    });		
	     
});<!---end $(document).ready---->
	