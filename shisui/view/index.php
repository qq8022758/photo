<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>梦幻-用点滴回首过往</title>
    <link rel="stylesheet" href="view/styles/cssReset.css"/>
    <link rel="stylesheet" href="view/styles/background.css"/>
    <link rel="stylesheet" href="view/styles/layout.css"/>
    <link rel="stylesheet" href="view/styles/personalGider.css"/>
    <link rel="stylesheet" href="view/styles/content.css"/>
    <link rel="stylesheet" href="view/styles/photo.css"/>
    <link rel="stylesheet" href="view/styles/setUpAlbum.css"/>
    <link rel="stylesheet" href="view/styles/modifyPersonalInfo.css"/>
    <link rel="stylesheet" href="view/styles/shisuiqiang.css"/>
    <link rel="stylesheet" href="view/styles/friend.css"/>
    <script type="text/javascript" src="view/scripts/jquery.1.9.0.min.js"></script>
     <script type="text/javascript" src="view/scripts/jquery-migrate-1.2.1.js"></script>
    <script type="text/javascript" src="view/scripts/DD_belatedPNG_0.0.8a.js"></script>
    <script type="text/javascript" src="view/scripts/general.js"></script>
   <!-- <script type="text/javascript" src="view/scripts/filter-gallery.js"></script>-->
    <script type="text/javascript" src="view/scripts/login_regist.js"></script>
    <script type="text/javascript" src="view/scripts/input.js"></script>
    <script type="text/javascript" src="view/scripts/tool.js"></script>
    <!--[if IE 6]>
    <script src="js/DD_belatedPNG_0.0.8a.js" ce_src="js/DD_belatedPNG_0.0.8a.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.download');
        DD_belatedPNG.fix('.prev');
        DD_belatedPNG.fix('.next');        
    </script>
    <![endif]-->

    
    <script type="text/javascript">
	/**************************************
	*   ********数据库连接的例子**********   *
	var url ="http://localhost/shisui/index.php?route=index/demo";
 	       $.post(url,function(data){
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
		
	***************************************/
	  var config={}
	  config.normal={}
	  config.user={}
	$(document).ready(function(e) {
		//$('#album_tab').addClass("disBlock");
		$('#photolink').click(function(){
		   $.get("http://localhost/shisui/view/page/photo.php",function(data){
			   
			   $("#content").empty().append(data);
			   
			   });
	     }); 
	    $('#albumlink').click(function(){
			$.get("http://localhost/shisui/view/page/album.php",function(data){
			   
			   $("#content").empty().append(data);
			   
			   });
	    });
		
		$('#shisuiqianglink').click(function(){
			$.get("http://localhost/shisui/view/page/shisuiqiang.php",function(data){			   
			   $("#content").empty().append(data);			   
			   });
	    });

$('.send').live("click",function(){
			$.get("http://localhost/shisui/view/page/shisuiqiang.php",function(data){			   
			   $("#content").empty().append(data);			   
			   });
	    });


       $('#friendlink').click(function(){
			$.get("http://localhost/shisui/view/page/friend/friend.php",function(data){
			   
			   $("#content").empty().append(data);
			   
			   });
	    });


	 $('.out').click(function(){
		  /*unset($_SESSION['username']);
		  unset($_SESSION['sex']);*/
		//  return false;
		  });
	   	  
	  function focus(){
		$(this).addClass('textareaonfcus');
		if(this.value=='每日一记 Enter You Key...'){this.value='';}  
	  }
	  
/*	  $('.setUpAlbum a').click(function(){
		   $.fn.popframe("http://localhost/shisui/view/page/setUpAblum.php");	
		   return false;     
	  });*/
	  
	  $('#out').children('.shezhi').unbind('click').bind('click',function(){
		   $.fn.popframe("http://localhost/shisui/view/page/modifyPersonalInfo.php");	
		       
	  });
	  
    /**************************************
	*   ********修改头像**********   */ 
/*	 var datajsonI={};
		 datajsonI.w=38;
		 datajsonI.h=38;
		 datajsonI.r=0;
		 datajsonI.url="http://localhost/shisui/view/images/gravatar.png";
		 datajsonI.obj=".Avatar";
		 datajsonI.local="";
	 $('.Avatar').click(function(){$(this).ModDantushangchuan("1",datajsonI);})*/
		//$(".Avatar").DantushangchuanGao("1",datajsonI);
    });<!---end $(document).ready---->
	
    </script>
<base target="_blank" />
</head>
<body>
   <?php require_once('page/background.php'); ?>
   <?php require_once('page/sideview.php'); ?> 
   <div class="content"  id="content">
   <?php require_once('page/indexleft.php'); ?> 
   </div>
<script>
var config={};</script>
</body>
</html>
 