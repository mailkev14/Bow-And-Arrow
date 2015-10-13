<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title></title>

	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="apple-touch-icon" href="" />
	<link rel="shortcut icon" href="" type="image/x-icon" />
	<link rel="icon" href="" type="image/x-icon" />

	<link rel="stylesheet" type="text/css" href="reset.min.css" />
	
	<style type="text/css">
	.bow{
		position:relative;
		width:100px;
		height:300px;
		margin:20px;
		border:1px dotted red;
		float:right;
		overflow:hidden;
	}
	.top,.bottom{
		position:absolute;
		right:0;
		width:1px;
		height:50%;
		background:black;
		
	}
	.top{
		top:0;
		-ms-transform-origin:top right;
		-webkit-transform-origin:top right;
		transform-origin:top right;
		-webkit-transform:skewX(-33deg);
		transform:skewX(-33deg);
	}
	.bottom{
		bottom:0;
		-ms-transform-origin:bottom right;
		-webkit-transform-origin:bottom right;
		transform-origin:bottom right;
		-webkit-transform:skewX(33deg);
		transform:skewX(33deg);
	}

	<?php if (isset($_GET['css'])): ?>
	.bow.active .top,
	.bow.active .bottom{-webkit-transition:transform ease-in 0.4s;transition:transform ease-in 0.4s;-webkit-transform:skewX(0deg);transform:skewX(0deg);}
	<?php endif; ?>
	</style>
</head>
<body>
	<div class="bow">
	    <div class="top"></div>
	    <div class="bottom"></div>
	</div>

	<button>reset and start</button>

	<script type="text/javascript" src="jquery.min.js"></script>

	<?php if (isset($_GET['css'])): ?>
	<script>
		$('button').click(function (e) {
			$('.bow').removeClass('active');
			setTimeout(function () {
				$('.bow').addClass('active')
			}, 10);
		});
	</script>
	<?php else: ?>
	<script type="text/javascript" src="jquery.easing.min.js"></script>

	<script type="text/javascript">
		var $top = $('.top'),
	        $btm = $('.bottom'),
	        bowHeight = $top.parent().height();

	    $('button').click(function (e) {
	        $top.removeAttr('style');
	        $btm.removeAttr('style');

	    	$({deg:33}).stop().animate({deg: 0}, {
	            duration: 400,
	            easing: 'easeInQuad',
	            progress: function (p, n, r) {
					var deg = 33 * (1 - n);

	                $top.css({
	                    webkitTransform: 'skewX(-'+deg+'deg)',
	                    transform: 'skewX(-'+deg+'deg)'
	                });

	                $btm.css({
	                    webkitTransform: 'skewX('+deg+'deg)',
	                    transform: 'skewX('+deg+'deg)'
	                });
	            }
	        });
	    });
	</script>
	<?php endif; ?>
</body>
</html>