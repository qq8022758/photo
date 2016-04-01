 <!-- ***********************Start Content ablum******************************-->
	<div class="cf" id="album_tab">
       <div class="grid-1">
			<h1>My Album</h1>
			<textarea class="diaryContent jishiben" rows="4" cols="139" onfocus="$(this).addClass('textareaonfcus');
		if(this.value=='每日一记 Enter You Key...'){this.value='';}">每日一记 Enter You Key...</textarea>
			<ul id="filter">
                <li class="current upload"><label>上传照片</label></li>
				<li class="setUpAlbum"><label>新建相册</label></li>
				<li class='new'><label>最新在前</label></li>
				<li class='old'><label>最新在后</label></li>
				<li class='photonum'><label>照片数量</label></li>
                <li class='labellink'><label>分类视图</label></li>
                <li class='datelink'><label>日历视图</label></li>
			</ul>
		</div><!-- end grid-1 -->
			<div class="gallery">
              
			</div>
          
	</div><!-- end content -->
    <script>
$(document).ready(function() {
	if(config.user.content){
		//$(".jishiben").val(config.user.note);
		$('.diaryContent').val(config.user.content);
		}
	
	$('ul#filter label').click(function() {
		$(this).css('outline','none');
		$('ul#filter .current').removeClass('current');
		$(this).parent().addClass('current');		   
	  });
});

    $.get("http://localhost/shisui/view/area/album/xiangce.php",function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
	$(".upload").unbind('click').bind('click',function(){
	$.get("http://localhost/shisui/view/area/photo/creat.php",function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
	
	
    $('#pictrue_tab a').hover(function(){
		$(this).children('.shareAndHit').toggle("disblock");
		});
	});

     $(".setUpAlbum").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/area/album/creatalbum.php",function(data){		   
			   $(".gallery").empty().append(data);		   
			   });
		});
	
	$(".new").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/area/album/albumshow.php",function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
		});
	
	$(".old").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/area/album/albumshowold.php",function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
		});

	$(".photonum").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/area/album/albumshowmore.php",function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
		});
		
   $(".labellink").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/area/album/albumshowmore.php",function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
		});
		
$(".labellink").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/area/album/classification.php",function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
		});
$(".datelink").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/area/album/albumdate.php",function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
		});
		
/*********
***记事本
********/
$(".diaryContent.jishiben").unbind('change').bind('change',function(){
	//alert($(this).val())
	if($('.diaryContent').value=='') {
		this.value='每日一记 Enter You Key...';
	 }
	if((this.value!='')||(this.value!='每日一记 Enter You Key...')){
		//alert(this.value)
		//var url="http://localhost/shisui/index.php?route=index/updateDiaryContent";
	    //$.post(url,{id:config.user.id,diaryContent:$('.diaryContent').val()},function(){});
		var noteurl="http://localhost/shisui/action/changenote.php?id="+config.user.id+"&note="+this.value
		$.get(noteurl,function(data){
			//alert(data)
			config.user.note=$(this).val();
			})
	} 
	$('.diaryContent').removeClass('textareaonfcus');

	})


    </script>
    <!-- ********************end Content ablum********************************-->