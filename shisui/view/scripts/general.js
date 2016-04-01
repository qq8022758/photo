jQuery(document).ready(function($){
	
	$('body').append('<span id="body_loader"></span>');
	$('#body_loader').fadeIn(); 
	
	//In our jQuery function, we will first cache some element and define some variables:
	var $bg				= $('#background'),
		$bg_img			= $bg.find('img'),
		$bg_img_eq		= $bg_img.eq(0),
		total			= $bg_img.length,
		current			= 0,
		$next		= $('#next'),
		$prev		= $('#prev')
		
	$(window).load(function(){
		//hide loader
		$('#body_loader').fadeOut('normal', function(){
			init();
		}).remove(); 
	
	});
	
	var intervalID,
		play = $('#play'),
		titleItem = $('.title-item');	
	
	//shows the first image and initializes events
	function init(){
		//get dimentions for the image, based on the windows size
		var dim	= getImageDim($bg_img_eq);
		//set the returned values and show the image
		$bg_img_eq.css({
			width	: dim.width,
			height	: dim.height,
			left	: dim.left,
			top    : dim.top
		}).fadeIn('normal');

		//resizing the window resizes the $tf_bg_img
		$(window).bind('resize',function(){
			var dim	= getImageDim($bg_img_eq);
			$bg_img_eq.css({
				width	: dim.width,
				height	: dim.height,
				left	: dim.left,
				top		: dim.top
			});
		});
					
		play.bind('click', function() {
			if($(this).hasClass('pause')) {
				clearInterval(intervalID);
				$(this).removeClass('pause').addClass('play');
			} else {
				$(this).addClass('pause').removeClass('play');
				intervalID = setInterval("$('#next').trigger('click')", 3000);
			}
			return false;
		});
			
		//click the arrow down, scrolls down
		$next.bind('click',function(){
			if($bg_img_eq.is(':animated'))
				return false;
				scroll();
		});

		//click the arrow up, scrolls up
		$prev.bind('click',function(){
			if($bg_img_eq.is(':animated'))
			return false;
			scroll();
		});
	}	
	function scroll(){
			//else if "bt" decrement it
			current	= current - 1;
			//we want a circular slideshow, 
			//so we need to check the limits of current
			if(current == total) current = 0;
			else if(current < 0) current = total - 1;
			
			//we get the next image
			var $bg_img_next	= $bg_img.eq(current),
				//its dimentions
				dim				= getImageDim($bg_img_next);
			//set the returned values and show the next image	
				$bg_img_next.css({
					width	: dim.width,
					height	: dim.height,
					top		: dim.top,
					left	: dim.left
				}).fadeIn(1500);

			//we want the old image to slide in the same direction, out of the viewport
				$bg_img_eq.stop().fadeOut(1500,function(){
				//the $tf_bg_img is now the shown image
					$bg_img_eq	= $bg_img_next;
			});		
		} // scroll functions ends here 
			

	//get dimentions of the image, 
	//in order to make it full size and centered
	function getImageDim($img){
		var w_w	= $(window).width(),
			w_h	= $(window).height(),
			r_w	= w_h / w_w,
			i_w	= $img.width(),
			i_h	= $img.height(),
			r_i	= i_h / i_w,
			new_w,new_h,
			new_left,new_top;
			
		if(r_w > r_i){
			new_h	= w_h;
			new_w	= w_h / r_i;
		}
		else {
			new_h	= w_w * r_i;
			new_w	= w_w;
		}

		return {
			width	: new_w + 'px',
			height	: new_h + 'px',
			left	: (w_w - new_w) / 2 + 'px',
			top		: (w_h - new_h) / 2 + 'px'
		};
	}
		
});