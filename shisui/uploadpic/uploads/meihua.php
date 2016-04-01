<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hot Pic</title>
	<style type="text/css">
body{
	background-color: pink;
}
/* #pic{
	background: url('<?php echo basename($_GET["filename"]); ?>')  no-repeat;
} */
		button{
			float: left;
			border: 1px solid red;
			margin: 5px;
			padding: 2px;
		}
	</style>
	<script type="text/javascript" src = "../jquery-1.10.2.js"></script>
</head>
<body>
	<button id="btn_reset" >Reset</button>
	<button id="save" >Save</button>
	<canvas id="pic" width="1000" height="1000"></canvas>
	<script type="text/javascript">
		var points = {},
		    SCALE = 3,
		    x = -1,
		    y = -1,
		    judge = false;

		    var img = new Image();
		    var a = '<?php echo basename($_GET["filename"]); ?>';
		    img.src = a;
		    img.onload = function(){
		    var width=img.width,height=img.height;
		   	document.getElementById('pic').setAttribute("width",width);
		    document.getElementById('pic').setAttribute("height",height);
		    console.log(width+" "+height);
		    console.log('<?php echo basename($_GET["filename"]); ?>');
		    console.log(img.src);
		    console.log(a);
		}

		function loadDemo() {
			document.getElementById('btn_reset').onclick = reset;			

			canvas = document.getElementById('pic');

			document.getElementById('save').onclick = function(){
				var saveImage = convertCanvasToImage(canvas);
				var save = saveImage.src;
				var save1 = save.replace("data:image/png;base64,","");
				//console.log(save);
				//document.getElementById("meihua").setAttribute("href",save)
				var url = "http://localhost/shisui/uploadpic/meihuaxiazai.php";
				$.post(url,{xiazai:save1},function(data){
						console.log(data);
				})
			}

			context = canvas.getContext('2d');
			context.drawImage(img,0,0);
			context.globalAlpha = 0.2;
			context.globalCompositeOperation = 'lighter';
			!function sample() {
				if(x != -1) {
					addToPoint(x, y);
				}
				setTimeout(sample,10);
			}()
			//可调整时间
			canvas.onmousemove = function(e) {
				if (judge) {
					getpoint(e);
				}
			}


			canvas.onmousedown = function(e) {
				judge = true;
				getpoint(e);
				
			}
			canvas.onmouseup = function() {
				judge = false;
			}
			
		}

		function getpoint(e){
			e = e || window.event; 
			// x = e.clientX - e.target.offsetLeft;
			// y = e.clientY - e.target.offsetTop;
			x = e.pageX - e.target.offsetLeft;
			y = e.pageY - e.target.offsetTop;//not scroll
			addToPoint(x, y);
		}

		function reset() {
			points = {};
			context.clearRect(0, 0, 2000, 2000);
			context.globalAlpha = 1;
			context.drawImage(img,0,0);
			context.globalAlpha = 0.2;
			x = -1;
			y = -1;
		}

		function convertCanvasToImage(canvas) {
			var image = new Image();
			image.src = canvas.toDataURL("image/png");
			return image;
		}

		function getColor(intensity) {
			var colors = ['yellow', 'blue', 'green', 'yellow', 'pink', 
						  'red'];
			return colors[Math.floor(intensity/2)];
		}

		function drawPoint(x, y, radius) {
			context.fillStyle = getColor(radius);
			radius = Math.sqrt(radius)*6;

			context.beginPath();
			context.arc(x, y, radius, 0, Math.PI*2, true);

			context.closePath();
			context.fill();
		}

		function addToPoint(x, y) {
			x = Math.floor(x/SCALE);
			y = Math.floor(y/SCALE);

			if(!points[[x, y]]) {
				points[[x, y]] = 1;
			} else if (points[[x, y]]==10) {
				return
			} else {
				points[[x, y]]++;
			}

			drawPoint(x*SCALE, y*SCALE, points[[x, y]]);
		}

		window.addEventListener('load', loadDemo, true);
	</script>
</body>
</html>
