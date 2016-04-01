 <!-- ********************start Content photo********************************--> 
  <?php
$id=$_GET['id']
?>
    <div class="cf1" id="photo_tab">
       <div class="grid-1">
			<h1><span class='XiangCeMing'>相册名</span></h1>
			<textarea rows="4" cols="139" class="jishiben" onfocus="$('.jishiBtn').css('display','block');$(this).addClass('textareaonfcus');
		if(this.value=='每日一记 Enter You Key...'){this.value='';}" onblur="if(this.value=='') {this.value='每日一记 Enter You Key...'; }if((this.value!='')||(this.value!='每日一记 Enter You Key...')){$('.jishiBtn').css('display','none');} $(this).removeClass('textareaonfcus');">每日一记 Enter You Key...</textarea>
            <!--<input class="jishiBtn" type="button" value="确定" style="display:none" />-->
			<ul id="filter">
				<li class="current upload"><label>上传照片</label></li>
				<li class='new'><label>最新在前</label></li>
				<li class='old'><label>最新在后</label></li>
                <li class='labellink'><label>标签视图</label></li>
                <li class='datelink'><label>日历视图</label></li>
			</ul>
		</div><!-- end grid-1 -->
		
        <div class="gallery">
             <!--/ content_inner-->
		</div><!--/ gallery-->
	</div><!-- end content -->
    <!-- ********************end Content photo********************************--> 
        
    <script type="text/javascript">

	$('ul#filter label').click(function() {
		$(this).css('outline','none');
		$('ul#filter .current').removeClass('current');
		$(this).parent().addClass('current');		   
	  });


$.get("http://localhost/shisui/view/area/photo/zhaopian.php?id=<?php echo $id ?>",function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
	
	
	
	
    $('#pictrue_tab a').hover(function(){
		$(this).children('.shareAndHit').toggle("disblock");
		});
$(".upload").unbind('click').bind('click',function(){
	$.get("http://localhost/shisui/view/area/photo/creat.php?id=<?php echo $id ?>",function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
	
	
    $('#pictrue_tab a').hover(function(){
		$(this).children('.shareAndHit').toggle("disblock");
		});
	});


	$(".new").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/area/photo/show.php?id=<?php echo $id ?>",function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
		});
	
	$(".old").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/area/photo/showold.php?id=<?php echo $id ?>",function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
		});
$(".labellink").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/area/photo/label.php?id=<?php echo $id ?>",function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
		});
$(".datelink").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/area/photo/date.php?id=<?php echo $id ?>",function(data){
			   
			   $(".gallery").empty().append(data);
			   
			   });
		});
</script>