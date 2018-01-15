<!DOCTYPE html>
<html>
<head>
<title><?php echo isset($title) ? $title . ' &raquo; ' : ''; echo $site_name;?></title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?php echo base_url('assets/main/');?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url('assets/main/');?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="<?php echo base_url('assets/main/');?>js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
<script src="<?php echo base_url('assets/main/');?>js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="<?php echo base_url('assets/main/');?>js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- timer -->
<link rel="stylesheet" href="<?php echo base_url('assets/main/');?>css/jquery.countdown.css" />
<!-- //timer -->
<!-- animation-effect -->
<link href="<?php echo base_url('assets/main/');?>css/animate.min.css" rel="stylesheet"> 
<script src="<?php echo base_url('assets/main/');?>js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
</head>
	
<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="header-grid">
				<div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
					<ul>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:<?php echo $site_email;?>"><?php echo $site_email;?></a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><?php echo $site_phone;?></li>
						<!-- <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login.html">Login</a></li> -->
						<!-- <li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="register.html">Register</a></li> -->
					</ul>
				</div>
				<div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
					<ul class="social-icons">
						<li><a href="#" class="facebook"></a></li>
						<li><a href="#" class="twitter"></a></li>
						<li><a href="#" class="g"></a></li>
						<li><a href="#" class="instagram"></a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="logo-nav">
				<div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
					<h1><a href="<?php echo base_url();?>"><?php echo $site_name;?> <span><?php echo $site_desc?></span></a></h1>
				</div>
				<div class="logo-nav-left1">
					<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
							<li class="active"><a href="<?php echo base_url();?>" class="act">Home</a></li>	
							<!-- Mega Menu -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3 dropdown-menu-right">
									<div class="row">
										<?php $i=1; foreach ($category as $cat):?>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<a href="<?php echo base_url('main/category/'.$cat['ID']);?>"><h6><?php echo $cat['name'];?></h6></a>
												<?php foreach ($cat['childs'] as $child):?>
													<li><a href="<?php echo base_url('main/category/'.$child['ID']);?>"><?php echo $child['name']?></a></li>
												<?php endforeach;?>
											</ul>
										</div>
										<?php if ($i % 3 == 0):?>
											<div class="clearfix"></div>
										<?php endif;;?>
										<?php $i++; endforeach;?>
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
							<li>
								<a href="<?php echo base_url('about_us');?>" class="dropdown-toggle">About Us</a>
							</li>
						</ul>
					</div>
					</nav>
				</div>
				<!-- <div class="logo-nav-right"> -->
					<!-- <div class="search-box"> -->
						<!-- <div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Enter your search term..." type="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>
						</div> -->
					<!-- </div> -->
						<!-- search-scripts -->
						<!-- <script src="<?php echo base_url('assets/main/');?>js/classie.js"></script> -->
						<!-- <script src="<?php echo base_url('assets/main/');?>js/uisearch.js"></script> -->
							<!-- <script> -->
								<!-- // new UISearch( document.getElementById( 'sb-search' ) ); -->
							<!-- </script> -->
						<!-- //search-scripts -->
				<!-- </div> -->
				<!-- <div class="header-right">
					<div class="cart box_1">
						<a href="checkout.html">
							<h3> <div class="total">
								<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
								<img src="images/bag.png" alt="" />
							</h3>
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
						<div class="clearfix"> </div>
					</div>	
				</div> -->
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //header -->
