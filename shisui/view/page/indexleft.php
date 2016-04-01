 <link rel="stylesheet" href="view/styles/indexleft.css"/>
<div class="inner_content">
   
   <div class="i_name">
         <h1>留下您最美好的时刻！</h1>
   </div>
   <div class="sui_main index_left">
       <!--ting_cont start-->
       <div class="sui_cont">
         <div class="ting_img">
           <img src="view/images/art.jpg">
         </div>           
        <div class="cover clearfix">
           <div class="cover_bg"></div>
           <div class="ting_name">被赞之王</div>
           <p>
            <span>来自：</span><span class="belongTo">照片所属人</span>       
            <span>被赞数：</span><span class="hitNum">122</span>
           </p>
         </div>
       </div> 
       <!--ting_cont end-->

      <div class="caption clearfix">
         <h2>人气幻客</h2><h2 style="padding-left:500px;">More>></h2>
      </div>
      
      <div class="lively_user">
        <ul class="clearfix" id='guangzhude'>
         
           
          </ul>
      </div>
      
       <div class="caption clearfix">
         <h2>公共相册</h2><h2 style="padding-left:500px;">More>></h2>
      </div>
      
      
      <div class="fans_album public_album" id="public_album">
               <ul id="album_tab" class="portfolio">
					<!--<ul id="portfolio">-->

				</ul>
            </div>
   </div><!--sui_main end-->
    
    
    
</div>

<script>
var attendid;
$('.lively_user ul li > a').hover(function(){
	$(".user_icon").addClass('.displayBlock');
	});

$.get("http://localhost/shisui/action/getattention.php",function(data){
	$.each(data,function(i,n){
		$("#guangzhude").append(
		 "<li>"
            +"<a title='"+n.name+"'>"
              +"<img class='hotUserAvater' src="+n.img+">"
              +"<p class='hotUserName'>"+n.name+" <span class='guanzhushu' style='display:none' uid='"+n.id+"'>"+n.attention+"</span></p>"
           +" </a>"
           +" <div class='user_icon clearfix' style='display:block' uid='"+n.id+"'>"
                 +" <a href='javascript:void(0);' class='follow_btn follow' data-id='291836' title='关注' >+关注</a>"
           +" </div>"
         +" </li>"
		)
		});
		$(".user_icon.clearfix").unbind('click').bind('click',function(){
	attendid=$(this).attr('uid');
	if(config.user){
		console.log(config.user);
		$.get("http://localhost/shisui/action/addattend.php?id="+config.user.id+"&atid="+attendid,function(data){
			$(".user_icon.clearfix[uid='"+attendid+"']").hide();
			$.get("http://localhost/shisui/action/changeattend.php?id="+attendid+"&at="+(Number($(".guanzhushu[uid='"+attendid+"']").html())+1),function(adata){
				alert("添加成功")
				})
			$(".guanzhushu[uid='"+attendid+"']").html(Number($(".guanzhushu[uid='"+attendid+"']").html()))
			$.get("http://localhost/shisui/action/addfriend.php?id="+config.user.id+"&atid="+attendid,function(data){
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
				},'json')
		})
		}
	else{
		alert("请先登录")
		}
	});
	},'json')

$.get("http://localhost/shisui/action/gethit.php",function(data){
	$(".ting_img img").attr('src',data[0].path)
	$(".ting_name").html(data[0].name)
	$(".belongTo").html(data[0].author)
	$(".hitNum").html(data[0].hit)
	},'json')

$.get("http://localhost/shisui/action/getpublic.php",function(data){
	config.public=data;
	$.each(config.public,function(i,n){
		$(".fans_album.public_album #album_tab").append(""+
		"<li class='service photography' aid='"+n.id+"'>"+                 
					"<a href='javascript:void(0);' rel='prettyPhoto' alt='Preview'>"+
                    "<p><span class='albumName'>"+n.name+"</span><span class='photoNum'>"+n.pic_count+"</span><span class='Description'>"+n.description+"</span></p><img src="+n.cover+" alt='' height='200' width='210' /></a><span class='change'></span><span class='delete'></span>"+
                   "</li>"
		)
		});
		$(".portfolio li").unbind('click').bind('click',function(){
	$.get("http://localhost/shisui/view/area/public/public.php?id="+$(this).attr("aid"),function(data){
			   
			   $(".content").empty().append(data);
			   
			   });
	})
	},'json')
</script>