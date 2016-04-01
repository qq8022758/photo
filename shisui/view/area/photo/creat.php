
<link href="view/area/photo/css/creat.css" rel="stylesheet" rev="stylesheet" type="text/css"/>
<div class='creatpic'>
    <div class='top'>
      <div class='title'>上传到</div>
      <div class='selectalbum'>
      <select name="selectalbumname">
      </select>
      </div>
      <div class='creatalbumbtn'>或<span class="createalbumNow">新建相册</span></div>
      <!-- <div class='title'>照片尺寸</div>
      <div class='size'><input type="radio" name="size"/>普通</div>
      <div class='size'><input type="radio" name="size"/>超大</div>
      <div class='size'><input type="radio" name="size"/>原图</div> -->
      <div class='clear'></div>
    </div><!--end top-->
    
    <div class='middle'>
      <div class='addpic'>
          <iframe width='80' height='80' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='uploadpic/pic.php?h=80&w=80&r=0'></iframe>
      </div>
      <input class='url' type="hidden" name="picsUrl"/>
      <div class='clear'></div>
    </div><!--end middle-->
    
    <div class='bottom'>
      <div class='submit' id="uploadPicBtn">上传</div>
      <div class='clear'></div>
    </div><!--end bottom-->
    
</div><!--end createpic-->
<script>
$(".creatalbumbtn").unbind('click').bind('click',function(){
	$.fn.popframe("http://localhost/shisui/view/area/album/creatalbumPop.php");	
		   return false;
	});
	
/********
****初始化当前用户的相册
*********/
$.each(config.user.album,function(i,n){
			$(".selectalbum select").append(""+"<option value='"+n.id+"'>"+n.name+"</option>");
   });
	   
/********
****上传照片
*********/
$('#uploadPicBtn').unbind('click').bind('click',function(){
	var shangchuan={}
	var shijian=new Date();
		var nian=shijian.getFullYear();
		var yue=shijian.getMonth()+1;
		var ri=shijian.getDate();
		var shi=shijian.getHours();
		var fen=shijian.getMinutes();
		var miao=shijian.getSeconds();
		duanshijian=nian+"-"+yue+"-"+ri;
		changshijian=nian+"-"+yue+"-"+ri+" "+shi+":"+fen+":"+miao;
	shangchuan.duanshijian=	duanshijian;
	shangchuan.changshijian=changshijian;
	shangchuan.id=$(".selectalbum select").val();
	shangchuan.username=config.user.username;
	shangchuan.url=[];
	if($(".url").val()){shangchuan.url=$(".url").val().replace(/\|$/gi,'').split("|");
	}
	var src='http://localhost/shisui/action/addphoto.php'
	$.post(src,shangchuan,function(data){
		alert("上传成功");
		var photourl="http://localhost/shisui/action/getphoto.php?id="+$(".selectalbum select").val();
				  	$.get(photourl,function(datap){
				$.get("http://localhost/shisui/action/changepic_count.php?id="+$(".selectalbum select").val()+"&count="+datap.length)
				$.each(config.user.album,function(i,n){
					if(n.id==$(".selectalbum select").val()){
						config.user.album[i].pic_count=datap.length
						}
					})		
						},'json')
		
		$.get("http://localhost/shisui/view/area/photo/photo.php?id="+$(".selectalbum select").val(),function(data){
			   
			   $(".content").empty().append(data);
			   
			   });
		
		
		})
	});
	   
</script>

