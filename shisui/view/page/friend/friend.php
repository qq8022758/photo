 <!-- ***********************Start Content ablum******************************-->
	<div class="cf" id="friend_tab" style="display:block">
       <div class="grid-1">
			<h1>My Fans</h1>
			<textarea rows="4" cols="139" class="jishiben" onfocus="$('.jishiBtn').css('display','block');$(this).addClass('textareaonfcus');
		if(this.value=='每日一记 Enter You Key...'){this.value='';}" onblur="if(this.value=='') {this.value='每日一记 Enter You Key...'; }if((this.value!='')||(this.value!='每日一记 Enter You Key...')){$('.jishiBtn').css('display','none');} $(this).removeClass('textareaonfcus');">每日一记 Enter You Key...</textarea>
<!--			<ul id="filter">
				<li class="current"><a href="#">上传照片</a></li>
				<li class="setUpAlbum"><a href="#">新建相册</a></li>
				<li><a href="#">最新在前</a></li>
				<li><a href="#">最新在后</a></li>
				<li><a href="#">照片数量</a></li>
                <li><a href="#">分类视图</a></li>
                <li><a href="#">日历视图</a></li>
			</ul>-->
		</div><!-- end grid-1 -->
			<div class="gallery">


            <!--fans_tab start-->
            
            <!--fans_tab end-->
            
            
            
            <!--fans_album start-->
            
            <!--fans_Album end-->
            
            
            
            
            <!--fans_photo start-->
            
            <!--fans_Album end-->
            
			</div>
            <!--gallery end-->
            
	</div><!-- end content -->
    
    
    <script type="text/javascript">
 $.get("http://localhost/shisui/view/area/friend/fans_tab.php",function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
	
	$(".closepop").click(function(){
		$(".pop").empty();
		$(".popframe").hide();
		}
	); 
<!--*********************粉丝模块	**************************-->
	$("#fans_tab ul li").children('a').hover(function(){
		

		}
	); 
<!--*********************粉丝的相册模块	**************************-->	
	
    $('#fans_photo a').hover(function(){
		$(this).children('.shareAndHit').toggle("disblock");
		});


<!--*********************粉丝的相片模块	**************************-->	


 $('.shareAndHit').children('.shareToShiSuiQiang').click(function(){
		   $.fn.popframe("http://localhost/shisui/view/page/friend/CaiJiZhaoPian.php");	  
		   return false;  
	  });


</script>