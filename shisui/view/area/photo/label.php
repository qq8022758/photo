
<!--标签视图-->
<link href="view/area/photo/css/label.css" rel="stylesheet" rev="stylesheet" type="text/css"/>
  <?php
$id=$_GET['id']
?>
<div class="content_inner pf_col_2 portfolio">
<div class='label'>
    <div class='selectlabel'>
    请选择标签：
    <select>
    </select>
    </div>

    <div class='clear'></div>
</div>
<div class='fangtupiande'></div>
<div class='clear'></div>
</div>
<script>

var taburl="http://localhost/shisui/action/gettab.php";

				  	$.get(taburl,function(data){
	
	$.each(data,function(i,n){
		$(".selectlabel select").append(
		"<option value='"+n.id+"'>"+n.tab_name+"</option>"
		);
		})
	},'json')
var photourl="http://localhost/shisui/action/getphoto.php?id=<?php echo $id ?>";
				  	$.get(photourl,function(data){
						$(".fangtupiande").empty();
						$.each(data,function(i,n){
							if(n.tab_id==0)
							$(".fangtupiande").append(
							
							"<div class='post-item picture-icon' pid='"+n.id+"'> " 
					+"<div class='post-thumb'>" 
					  +"<a class='zoomer'>" 
						+"<img width='250' height='168' src='"+n.path+"' alt='' class='pic'>" 
	+"<div class='shareAndHit' style='display:none'><span class='shareToShiSuiQiang'></span><span class='hit'></span></div>" 
					  +"</a>	" 				
					+"</div><!--/ post-thumb-->	" 	
					
				+"</div>" 
							)
							})
			$(".post-item").unbind('click').bind('click',function(){
				 $.fn.popframe("http://localhost/shisui/view/area/photo/single.php?id=<?php echo $_GET['id']?>");
				})
		$(".selectlabel select").unbind('change').bind('change',function(){
			$(".fangtupiande").empty();
						$.each(data,function(i,n){
							if(n.tab_id==$(".selectlabel select").val())
							$(".fangtupiande").append(
							
							"<div class='post-item picture-icon' pid='"+n.id+"'> " 
					+"<div class='post-thumb'>" 
					  +"<a class='zoomer'>" 
						+"<img width='250' height='168' src='"+n.path+"' alt='' class='pic'>" 
	+"<div class='shareAndHit' style='display:none'><span class='shareToShiSuiQiang'></span><span class='hit'></span></div>" 
					  +"</a>	" 				
					+"</div><!--/ post-thumb-->	" 	
					
				+"</div>" 
							)
							})
			$(".post-item").unbind('click').bind('click',function(){
				 $.fn.popframe("http://localhost/shisui/view/area/photo/single.php?id=<?php echo $_GET['id']?>");
				})
			})
							},'json');
</script>