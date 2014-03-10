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
</head>
<body>
<input type='hidden' id='baseurl' name='baseurl' value="<?php echo base_url();?>"/>
	<div class="wrapper">
		<header id="header">
			<div class="container">
				<div class="row-fluid">
					<div class="span4">
						<a href="#"><img class="logo" src="<?php echo base_url()?>images/tesork.png" alt="CompanyLogo"></a>
					</div>
					<div class="span8">
						<ul class="user-nav">
							<li><a href="#">General Ledger</a><span class="divider">|</span></li>
							<li><a href="#">Account Setting</a><span class="divider">|</span></li>
							<li><a href="#">Help</a><span class="divider">|</span></li>
							<li><a href="#">Log Out</a></li>
						</ul>
						<button type="button" class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="nav-collapse collapse">
							<ul class="nav">
								<li><a class="active" href="#">Accounts</a></li>
								<li><a href="#">Batches</a></li>
								<li><a href="#">Reports</a></li>
								<li><a href="#">Period Close</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</header><!-- #header -->