<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" lang="en"><![endif]-->
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<title>CompanyLogo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/responsive.css">
	<!--[if lt IE 9]>
		<script src="<?php echo base_url();?>js/html5shiv.js"></script>
		<script src="<?php echo base_url();?>js/css3-mediaqueries.js"></script>
	<![endif]-->
	<script src="<?php echo base_url();?>js/jquery-1.9.1.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/jquery.plugin.min.js"></script>
	<script src="<?php echo base_url();?>js/jquery.countdown.min.js"></script>
	<script src="<?php echo base_url();?>js/spin.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function (){
		
		$("#countdowntimer").countdown({
			 until:'liftoffTime',
			format: 'M',
			serverSync: serverTime
			});

		var opts = {
				  lines: 13, // The number of lines to draw
				  length: 20, // The length of each line
				  width: 10, // The line thickness
				  radius: 30, // The radius of the inner circle
				  corners: 1, // Corner roundness (0..1)
				  rotate: 74, // The rotation offset
				  direction: 1, // 1: clockwise, -1: counterclockwise
				  color: '#000', // #rgb or #rrggbb or array of colors
				  speed: 1, // Rounds per second
				  trail: 60, // Afterglow percentage
				  shadow: true, // Whether to render a shadow
				  hwaccel: true, // Whether to use hardware acceleration
				  className: 'spinner', // The CSS class to assign to the spinner
				  zIndex: 2e9, // The z-index (defaults to 2000000000)
				  top: 'auto', // Top position relative to parent in px
				  left: 'auto' // Left position relative to parent in px
				};
				//var target = document.getElementById('foo');
				//var spinner = new Spinner(opts).spin(target);
	});

	function serverTime () {
		var time = null; 
	    $.ajax({
		    url: $("#baseurl").val()+"index.php/settings/getsessionexpire", 
	        async: false, dataType: 'text', 
	        success: function(text) { 
	            time = new Date(text); 
	            console.log(time);
	        }, error: function(http, message, exc) { 
	            time = new Date(); 
	    }}); 
	    return time; 
	}
	</script>
</head>
<body>
<input type='hidden' id='baseurl' name='baseurl' value="<?php echo base_url();?>"/>
<div id="foo">
	<div class="wrapper">
		<header id="header">
		<p style="background-color: #7FBAE8; color: #FFFFFF; height: 27px; margin: 0 0 10px;  padding: 5px;  width: 250px;"><?php echo "Your IP address is " .$this->input->ip_address();?></p>
		<?php echo get_display_countdown_ticker ();?>
			<div class="container">
				<div class="row-fluid">
					<div class="span4">
						<a href="#"><img class="logo" src="<?php echo base_url()?>images/tesork.png" alt="CompanyLogo"></a>
					</div>
					<div class="span8">
						<ul class="user-nav">
							<li><a href="<?php echo base_url();?>index.php/settings/globalset">Global Settings</a><span class="divider">|</span></li>
							<li><a href="#">Account Setting</a><span class="divider">|</span></li>
							<li><a href="#">Help</a><span class="divider">|</span></li>
							<li><a href="<?php echo base_url()?>index.php/login/logout">Log Out</a></li>
						</ul>
						<button type="button" class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						
					</div>
				</div>
			</div>
		</header><!-- #header -->