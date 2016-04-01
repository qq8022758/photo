<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/G.css" />     
     <script type="text/javascript" src="../../../view/scripts/jquery.1.9.0.min.js"></script>
    <script src="../../../view/scripts/jquery.jcarousellite.min.js" type="text/javascript"></script>
    <style type="text/css">
        
        /*幻灯片区域背景*/
        .MainBg { background-color:#222; }
        
        /*标题和页码*/
        .Title { color:#EEE; padding:5px 10px 0 10px; text-align:center; line-height:25px; height:25px; }
        .Title h1 { display:inline; font-size:15px;}
        .Title .Counter { color:#666; }
        .Title .CounterCurrent { color:#C00; font-size:20px; font-weight:bold; }
        
        /*灰色分隔线*/
        .SpaceLine { border-bottom:1px solid #333; height:1px; font-size:1px; }
        
        /*大图展示区域*/
        .OriginalPicBorder { padding:5px 15px 5px 15px; }
        #OriginalPic { width:930px; height:490px;overflow:hidden; position:relative; font-size:12px; }
        #OriginalPic img { display: block; margin: 0 auto; max-width:700px;max-height:600px;}
        
        /*鼠标手势*/
        .CursorL { position: absolute; z-index:999; width:50%; height:600px; color:#FFF; left:220px; cursor:url(CurL.cur), auto; background:url() repeat scroll 0 0 transparent; }
        .CursorR { position: absolute; z-index:999; width:50%; height:600px; color:#FFF; right:0; cursor:url(CurR.cur), auto; background:url() repeat scroll 0 0 transparent; }
        
        /*小图预览和滑动*/
        .SliderPicBorder { width:700px; height:600px; overflow:hidden; vertical-align:central;}
         .Summary { position: absolute; top:57px; left:10px;line-height:20px; display:block; width:200px; margin-right:10px; color:#999; overflow:hidden; background-color:#333; padding:10px; font-size:12px;z-index:2;}
        .More { text-align:right; color:#666; line-height:40px; height:40px; font-size:12px; display:block; }        
        .ThumbPicBorder { display: inline-block; *display: inline; zoom: 1; }
        #ThumbPic img { border: 3px solid #666; cursor: pointer; background-color: #666; margin:0 4px; width: 130px; height: 80px; display: block; }
        #ThumbPic img.active { border: 3px solid #FF9900; }
		.handlebox div{margin:10px auto;}
		.handlebox textarea{width:180px;height:60px;}
		.handlebox select{width:154px;margin-left:10px;}
		.stickLabel select{width:154px;margin-left:10px;}
		.stickLabel input{width:108px;margin-left:10px;margin-top:10px;}
		.hitDelDown span{margin: auto 17px;margin-bottom: 5px;display: inline-block; cursor:pointer;}
		.hitDelDown span:hover{color:red;}
    </style>
</head>
<body>
<?php
$id=$_GET['id'];
 ?>
 
 
    <form>    
        <div id="Container">
        <div class="MainBg">
            <div class="HS10"></div>
            <div class="Title">
                <h1>相册名</h1>
                <span class="Counter">（<span class="CounterCurrent">1</span>/<span class="zongshu">7</span>）</span>
            </div>
            <div class="SpaceLine"></div>
            <div class="handlebox Summary">
              <div class="commentOfOthers">
                <span class="commenter">评论人</span>:
                <span class="commCont">发电量可交付的</span>
              </div>
              <div class="commentNow"><textarea cols="10" rows="5"></textarea></div>
              
              
              <div class="hitDelDown">
                     <span class="hit" yixuan='0' zanshu='0'>点赞</span><a class="downloadpic" href="#" target="_blank">下载</a><span class="share">分享到梦幻墙</span><span class="yuantu">查看原图</span>
               </div>
            </div><!--end handlebox-->
            <div class="OriginalPicBorder">
                <div id="OriginalPic">
                    <div id="aPrev" class="CursorL"></div>
                    <div id="aNext" class="CursorR"></div>
                     
                    
                    
                    
                    
                    
                    
                </div>
            </div>
            <div class="SpaceLine">
            </div>
            <div class="HS10">
            </div>
            <div style=" width: 960px; text-align: center;">
                <div class="ThumbPicBorder">
                    <img src="../../../view/images/image/ArrowL.jpg" id="btnPrev" class="FlLeft"
                        style="cursor: pointer;" />
                    <div class="jCarouselLite FlLeft">
                        <ul id="ThumbPic">
                            
                            
                            
                            
                            
                           
                            
                        </ul>
                        <div class="Clearer">
                        </div>
                    </div>
                    <img src="../../../view/images/image/ArrowR.jpg" id="btnNext" class="FlLeft"
                        style="cursor: pointer;" />
                    <div class="Clearer">
                    </div>
                </div>
            </div>
            <div class="HS10"></div>
            
            
        </div>
        
    </div>
    </form>
    <script>
	if(<?php echo $_GET['friend']?>==1){
	$(".moveTo").remove();	
	$(".stickLabel").remove();	
	$(".delete").remove();	
	$(".share").remove();	
	}
	var xuanzhongde;
	var tabid;
    var photourl="http://localhost/shisui/action/getphoto.php?id=<?php echo $id ?>";
				  	$.get(photourl,function(data){
						$(".zongshu").html(data.length)
						
						$.each(data,function(i,n){
							$("#OriginalPic").append(
							"<p class='Hidden' pid='"+n.id+"' tid='"+n.tab_id+"'>"
                     +" <span class='SliderPicBorder FlRight'>"
                                +"<img src='"+n.path+"' />"
                           +" </span>"
                    +"</p>"
							);
							$("#ThumbPic").append(
							"<li rel='"+(i+1)+"' pid='"+n.id+"' tid='"+n.tab_id+"'>"
                                +"<img src='"+n.path+"' />"
                            +"</li>"
							);
							})
							//缩略图滚动事件
                $(".jCarouselLite").jCarouselLite({
                    btnNext: "#btnNext",
                    btnPrev: "#btnPrev",
                    scroll: 1,
                    speed: 240,
                    circular: false,
                    visible: 6
                });
				var currentImage;
                var currentIndex = -1;

                //显示大图(参数index从0开始计数)
                function showImage(index) {
					$(".hit").attr('yixuan',0)
					$(".hit").attr('zanshu',data[index].hit)
					$(".hit").unbind('click').bind('click',function(){
						alert("请先登录")
						})
					
					
						
				  	
						
						
                    //更新当前图片页码
                    $(".CounterCurrent").html(index + 1);

                    //隐藏或显示向左向右鼠标手势
                    var len = $('#OriginalPic img').length;
                    if (index == len - 1) {
                        $("#aNext").hide();
                    }
                    else {
                        $("#aNext").show();
                    }

                    if (index == 0) {
                        $("#aPrev").hide();
                    }
                    else {
                        $("#aPrev").show();
                    }

                    //显示大图            
                    if (index < $('#OriginalPic img').length) {
                        var indexImage = $('#OriginalPic p')[index];

                        //隐藏当前的图
                        if (currentImage) {
                            if (currentImage != indexImage) {
                                $(currentImage).css('z-index', 2);

                                $(currentImage).fadeOut(0, function () {
                                    $(this).css({ 'display': 'none', 'z-index': 1 })
                                });
                            }
                        }

                        //显示用户选择的图
                        $(indexImage).show().css({ 'opacity': 0.4 });
                        $(indexImage).animate({ opacity: 1 }, { duration: 200 });
                        xuanzhongde=$(indexImage).attr("pid");
						$(".downloadpic").attr('href',"http://localhost/shisui/uploadpic/uploads/getpic.php?filename="+$("li[pid='"+xuanzhongde+"'] img").attr('src'))	;
						tabid=$(indexImage).attr("tid");
						function shuapinglun(){
							var commentsurl="http://localhost/shisui/action/getcomments.php?id="+xuanzhongde;
						$(".commentOfOthers").empty();
				  	$.get(commentsurl,function(cdata){
						 $.each(cdata,function(i,n){
							
							$(".commentOfOthers").append("<span class='commenter'>"+n.author+"</span>:<span class='commCont'>"+n.comment+"</span><br/>");
							})
						},"json")
							}
						shuapinglun();
						$(".commentNow textarea").unbind('change').bind('change',function(){
							alert("请先登录")
							$(".commentNow textarea").val('')
							})
                        //更新变量
                        currentImage = indexImage;
                        currentIndex = index;

                        //移除并添加高亮
                        $('#ThumbPic img').removeClass('active');
                        $($('#ThumbPic img')[index]).addClass('active');

                        //设置向左向右鼠标手势区域的高度                        
                        //var tempHeight = $($('#OriginalPic img')[index]).height();
                        //$('#aPrev').height(tempHeight);
                        //$('#aNext').height(tempHeight);                        
                    }
                }

                //下一张
                function ShowNext() {
                    var len = $('#OriginalPic img').length;
                    var next = currentIndex < (len - 1) ? currentIndex + 1 : 0;
                    showImage(next);
                }

                //上一张
                function ShowPrep() {
                    var len = $('#OriginalPic img').length;
                    var next = currentIndex == 0 ? (len - 1) : currentIndex - 1;
                    showImage(next);
                }

                //下一张事件
                $("#aNext").click(function () {
                    ShowNext();

                    if ($(".active").position().left >= 44 * 5) {
                        $("#btnNext").click();
                    }
                });

                //上一张事件
                $("#aPrev").click(function () {
                    ShowPrep();

                    if ($(".active").position().left <= 44 * 5) {
                        $("#btnPrev").click();
                    }
                });

                //初始化事件
                $(".OriginalPicBorder").ready(function () {
                    ShowNext();

                    //绑定缩略图点击事件
                    $('#ThumbPic li').bind('click', function (e) {
                        var count = $(this).attr('rel');
                        showImage(parseInt(count) - 1);
                    });
                });			
							
							},'json')
		$(".delete").unbind('click').bind('click',function(){alert("请先登录")});
					
		/******************下载*************************/	
		
			/*$(".downloadpic").unbind('click').bind('click',function(){
				var dataOne={};
				dataOne.id=xuanzhongde;
				var url ="http://localhost/shisui/index.php?route=Photo/getOnePhoto";
				$.post(url,dataOne,function(data){
						 var data=eval(data);//转化成对象类型的数据
						 var url = data[0].data[0].path;alert(url);
				       $.post("http://localhost/shisui/view/area/download.php",{'filename':url},function(){});	
					
						 
				});  
			});	
			function savepic(url) {  
            if (document.all.a1 == null) {  
                objIframe = document.createElement("IFRAME");  
                document.body.insertBefore(objIframe);  
                objIframe.outerHTML = "<iframe name=a1 style='width:400px;hieght:300px' src=" + url + "></iframe>";  
                re = setTimeout("savepic(url)", 1)  
           }  
            else {  
                clearTimeout(re)  
                pic = window.open(url, "a1")  
                pic.document.execCommand("SaveAs")  
                document.all.a1.removeNode(true)  
            }  
        }  
		
		
			
			
			*/
			
			
			
			
					/******************查看原图*************************/		
			$(".yuantu").unbind('click').bind('click',function(){
				var dataOne={};
				dataOne.id=xuanzhongde;
				var url ="http://localhost/shisui/index.php?route=Photo/getOnePhoto";
				$.post(url,dataOne,function(data){
						 var data=eval(data);//转化成对象类型的数据
						 window.location.href= data[0].data[0].path;
				});
			});	
		
		  /******************查看原图*************************/		
			$(".share").unbind('click').bind('click',function(){
				alert("请先登录")
				});	
		
			
			
 	          


		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
			
			       
    </script>

</body>
</html>>