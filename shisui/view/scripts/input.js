// JavaScript Document
(function($) {
     $.fn.ModDantushangchuan=function(dataid,datajsonI){
     $(this).html("<iframe id='touxiangiframe' width='"+datajsonI.w+"' height='"+datajsonI.h+"' frameborder='0' scrolling='no' dataid='"+dataid+"' datavalue='' marginheight='0' marginwidth='0' src='http://localhost/shisui/view/page/uploadpic/pic.php?h="+datajsonI.h+"&w="+datajsonI.w+"&r="+datajsonI.r+"&dataid="+dataid+"&path="+datajsonI.url+"&obj="+datajsonI.obj+"&local="+datajsonI.local+"&name=pic'></iframe>");
    }
//弹出框
	$.fn.popframe=function(url){
		 $(".popframe").show();
		 $(".pop").empty();
		 $(".pop").load(url);

		 };
		
	$(".closepop").live("click",
	  function(){
		$(".pop").empty();
		$(".popframe").hide();
		}
	); 
	

//重新读取数据库关于相册的数据
    $.fn.ModReloadAlbumInfo=function(){
	 var caturl ="http://localhost/shisui/action/getcat.php?id="+config.user.id;
		$.get(caturl,function(data){				
		  config.user.cat_id=data.cat_id;
		  var albumurl="http://localhost/shisui/action/getcategoty.php?catid="+config.user.cat_id;
		  $.get(albumurl,function(data){
			  config.user.album=data;
			  $("#albumNum").html(config.user.album.length);	
			   $("#portfolio").empty();
				   $.each(config.user.album,function(i,n){
	$("#portfolio").append(""+
	"<li class='service photography'>"+                 
					"<a aid='"+n.id+"' rel='prettyPhoto' alt='Preview'>"+
                    "<p><span class='albumName'>"+n.name+"</span><span class='photoNum'>"+n.pic_count+"</span></p><img src="+n.cover+" alt='' height='200' width='210' /></a><span class='change'></span><span class='delete'></span>"+
                   " </li>"
						);
	
	});			   			  		
		  },'json');
		},'json');  	
	}
	
	$.fn.del=function(){
	  var name=window.confirm('将同里面的相片一同删除，确定删除？'); 
	  if(name){ return true; }
	  else{ return false; }
  }  

				   
	

// $.fn.ModDantushangchuanGao=function(dataid,datajsonI){
//     $(this).html("<iframe width=\""+datajsonI.w+"\" height=\""+datajsonI.h+"\" frameborder=\"0\" scrolling=\"no\" dataid=\""+dataid+"\" datavalue=\"\" marginheight=\"0\" marginwidth=\"0\" src=\""+sitehost+"index.php?route=comm/uploadpic/pic/getPcic&h="+datajsonI.h+"&w="+datajsonI.w+"&r="+datajsonI.r+"&dataid="+dataid+"&path="+datajsonI.url+"&name=pic\"></iframe>") ;
//    };	
//	
//	
////可添加的图片上传 dataid就是dataid datajsonI初始化数据
//$.fn.ModKetianjiashangchuanHuang=function(objid,datajsonI){
//        $(this).click(function(){
//            $(this).after("<div class=\"ModShangchuanGao\" style=\"width:"+datajsonI.w+"px;height:"+datajsonI.h+"px;position:relative\"><div class=\"PicClose\" style=\"position:absolute;top:0px;right:0px\">X</div><iframe dataid=\""+objid+"_"+Shangchuanshu+"\" datavalue=\"\" name=\"picc\" width=\""+datajsonI.w+"\" height=\""+datajsonI.h+"\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\""+sitehost+"index.php?route=comm/uploadpic/pic/getPcic&h="+datajsonI.h+"&w="+datajsonI.w+"&r="+datajsonI.r+"&dataid="+objid+"_"+Shangchuanshu+"&path="+datajsonI.url+"&name="+ZDUSER.id+new Date().getTime()+"\"></iframe></div>");
//            $(".PicClose").unbind();
//            $(".PicClose").click(
//            function(){
//                $(this).parent().remove();
//                }
//            );
//            Shangchuanshu+=1;
//            }
//        );
//        };
//
////生成切图框 datajsonI初始化数据 
// $.fn.ModShangchuangtupianGao=function(datajsonI){
//      $(this).append("<iframe width=\""+datajsonI.ww+"\" height=\""+datajsonI.wh+"\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\""+sitehost+"upload_crop/index.php?maxw="+datajsonI.maxw+"&w="+datajsonI.w+"&h="+datajsonI.h+"&dataid="+$(this).attr("DataId")+"\"></iframe>");
//         };
//         
 
////单个图片上传 dataid就是dataid datajsonI初始化数据
//            $.fn.GetModDantushangchuanGao=function(dataid,datajsonI,obj){
//                $.getScript(reshost+"/version/0/modules/input/js/ModDantushangchuanGao.js").done(
//        function(){
//            $(obj).ModDantushangchuanGao(dataid,datajsonI);
//        }
//    );
//            };		 
		 
})(jQuery);


