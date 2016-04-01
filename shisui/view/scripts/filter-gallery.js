$(document).ready(function() {
	$('ul#filter label').click(function() {alert();
		$(this).css('outline','none');
		$('ul#filter .current').removeClass('current');
		$(this).parent().addClass('current');		
		   $('.setUpAlbum label').click(function(){
		   $.fn.popframe("http://localhost/shisui/view/page/setUpAblum.php");	
		   return false;     
	  });
		return false;
	});
});

$(document).ready(function() {
	$('ul#filter label').click(function() {
		$(this).css('outline','none');
		$('ul#filter .current').removeClass('current');
		$(this).parent().addClass('current');
		return false;
	});
});