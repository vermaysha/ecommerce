<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $title;?> &raquo; Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- Bootstrap Core CSS -->
		<link href="<?php echo base_url('assets/dashboard/');?>css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- Custom CSS -->
		<link href="<?php echo base_url('assets/dashboard/');?>css/style.css" rel='stylesheet' type='text/css' />
		<!-- Graph CSS -->
		<link href="<?php echo base_url('assets/dashboard/');?>css/lines.css" rel='stylesheet' type='text/css' />
		<link href="<?php echo base_url('assets/dashboard/');?>css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url('assets/dashboard/');?>css/jquery.autocomplete.css">
		<!-- jQuery -->
		<script src="<?php echo base_url('assets/dashboard/');?>js/jquery.min.js"></script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
		<!-- Nav CSS -->
		<link href="<?php echo base_url('assets/dashboard/');?>css/custom.css" rel="stylesheet">
		<!-- Metis Menu Plugin JavaScript -->
		<script src="<?php echo base_url('assets/dashboard/');?>js/metisMenu.min.js"></script>
		<script src="<?php echo base_url('assets/dashboard/');?>js/custom.js"></script>
		<!-- Graph JavaScript -->
		<script src="<?php echo base_url('assets/dashboard/');?>js/d3.v3.js"></script>
		<script src="<?php echo base_url('assets/dashboard/');?>js/rickshaw.js"></script>
		<script src="<?php echo base_url('assets/dashboard/');?>js/jquery.autocomplete.js"></script>
		
		<style>
			.page-header {
				margin-top: 0;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<!-- Navigation -->
			<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url();?>"><?php echo $site_name;?></a>
				</div>
				<!-- /.navbar-header -->
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="<?php echo base_url('assets/dashboard/');?>#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="<?php echo base_url($photo);?>"></a>
						<ul class="dropdown-menu">
							<li class="m_2"><a href="<?php echo base_url('settings');?>"><i class="fa fa-cog"></i> Settings</a></li>
							<li class="m_2"><a href="<?php echo base_url('dashboard/logout');?>"><i class="fa fa-lock"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">
							<li>
								<a href="<?php echo base_url('dashboard/');?>"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
							</li>
							<li>
								<a href="<?php echo base_url('product');?>"><i class="fa fa-shopping-cart nav_icon"></i>Product</a>
							</li>
							<li>
								<a href="<?php echo base_url('category');?>"><i class="fa fa-list nav_icon"></i>Category</a>
							</li>
							<li>
								<a href="<?php echo base_url('assets/dashboard/');?>#"><i class="fa fa-envelope nav_icon"></i>Mailbox<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="<?php echo base_url('assets/dashboard/');?>inbox.html">Inbox</a>
									</li>
									<li>
										<a href="<?php echo base_url('assets/dashboard/');?>compose.html">Compose email</a>
									</li>
								</ul>
								<!-- /.nav-second-level -->
							</li>
							<li>
								<a href="<?php echo base_url('assets/dashboard/');?>widgets.html"><i class="fa fa-flask nav_icon"></i>Widgets</a>
							</li>
							<li>
								<a href="<?php echo base_url('assets/dashboard/');?>#"><i class="fa fa-check-square-o nav_icon"></i>Forms<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="<?php echo base_url('assets/dashboard/');?>forms.html">Basic Forms</a>
									</li>
									<li>
										<a href="<?php echo base_url('assets/dashboard/');?>validation.html">Validation</a>
									</li>
								</ul>
								<!-- /.nav-second-level -->
							</li>
							<li>
								<a href="<?php echo base_url('assets/dashboard/');?>#"><i class="fa fa-table nav_icon"></i>Tables<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="<?php echo base_url('assets/dashboard/');?>basic_tables.html">Basic Tables</a>
									</li>
								</ul>
								<!-- /.nav-second-level -->
							</li>
							<li>
								<a href="<?php echo base_url('settings');?>"><i class="fa fa-cog fa-fw nav_icon"></i>Settings</a>
							</li>
						</ul>
					</div>
					<!-- /.sidebar-collapse -->
				</div>
				<!-- /.navbar-static-side -->
			</nav>
			<div id="page-wrapper">
				<div class="graphs">
