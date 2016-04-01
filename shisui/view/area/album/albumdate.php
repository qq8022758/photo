<!------------------start albumdate.php------------------>
<link rel="stylesheet" href="http://localhost/shisui/view/styles/jquery.ui.all.css">
	<script src="http://localhost/shisui/view/scripts/jquery.ui.core.js"></script>
	<script src="http://localhost/shisui/view/scripts/jquery.ui.widget.js"></script>
	<script src="http://localhost/shisui/view/scripts/jquery.ui.mouse.js"></script>
	<script src="http://localhost/shisui/view/scripts/jquery.ui.slider.js"></script>
	<link rel="stylesheet" href="http://localhost/shisui/view/styles/demos.css">
	<script>
	function quanshua(y,m,d){
		
		$(".shuaxinqu").empty();
		$(".shuaxinqu").append("  <div class='day'>24</div>"
     +" <p>"
	
	+"<input type='text' id='amount' style='border:0; color:#f6931f; font-weight:bold;' style='display:none !important'/>"
+"</p>"

+"<div id='slider-range-min'></div>")
	$(function() {

function chutu(y,m,d){
if(m<10){m="0"+m}	
if(d<10){d="0"+d}
$("#portfoliolin").empty();
$.each(config.user.album,function(i,n){
	if(n.update_time.substring(0,10)==y+"-"+m+"-"+d){
		
		$("#portfoliolin").append(""+
	"<li class='service photography'>"+                 
					"<a aid='"+n.id+"' rel='prettyPhoto' alt='Preview'>"+
                    "<p><span class='albumName'>"+n.name+"</span><span class='photoNum'>"+n.pic_count+"</span><span class = 'miaoshu'>"+n.description+"</span></p><img src="+n.cover+" alt='' height='200' width='210' /></a><span class='change'></span><span class='delete'></span>"+
                   " </li>"
						);
		}
	
	
	})
	
	$("#portfoliolin li a").unbind('click').bind('click',function(){
		$.get("http://localhost/shisui/view/page/photo.php?id="+$(this).attr("aid"),function(data){			   
			   $(".content").empty().append(data);
			   
			   });
	});
	
	
	}
	    d=20;
	    m=3;
        chutu(y,m,d);
		var kaishi=d;
		$(".day").html(kaishi);
		$( "#slider-range-min" ).slider({
			range: "min",
			value: kaishi,
			min: 1,
			max: 30,
			slide: function( event, ui ) {
				$( "#amount" ).val(  ui.value ).hide();;
				$(".day").html(ui.value)
				chutu(y,m,ui.value)
			}
		});
		$( "#amount" ).val( $( "#slider-range-min" ).slider( "value" ) );
	});
	}
	var newy=new Date().getFullYear();
var newm=new Date().getMonth()+1;

var newd=new Date().getDate();	
	quanshua(newy,newm,newd)
	$(".prev").unbind('click').bind('click',function(){
		quanshua(newy,newm,(Number($( "#amount" ).val())-1))
		})
	$(".next").unbind('click').bind('click',function(){
		quanshua(newy,newm,(Number($( "#amount" ).val())+1))
		})
	</script>
<link href="view/area/album/css/classification.css" rel="stylesheet" rev="stylesheet" type="text/css"/>
<link href="view/area/album/css/albumdate.css" rel="stylesheet" rev="stylesheet" type="text/css"/>
<div class='albumdate'>

<div class='bottom'>
      <div class="prev"></div>
      <div class='month'>2016/03/</div>
      <div class='shuaxinqu'></div> 
      <div class="next"></div>
  <div class='clear'></div>
  </div><!--end bottom-->
<div class='main'>
       <ul id="portfoliolin" class="portfolio"></ul>
<div class='clear'></div>
</div>
  
</div>
<script>

	
</script>
<style>
#amount{display:none !important}
</style>