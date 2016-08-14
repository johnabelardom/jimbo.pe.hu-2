<html>


<head>

<title><?php echo $page_title ;?></title>

<!-- <link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.css" rel="stylesheet"> -->

<link href="<?php echo base_url(); ?>assets/custom_css/style.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/jquery/jquery-ui.min.js"></script>


<!-- <script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- <script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.js"></script> -->
<!-- <script src="<?php echo base_url();?>assets/bootstrap/dist/js/npm.js"></script>
 -->




</head>


<body class="body">
	
	<header class="header-on">
		<div class="nav-container">
			<a class="brand-name bn-on" href="login">Jimbo</a>
			<button class="moreBtn"><?php echo $this->session->userdata('fname');?></button>
			<div class="navmenu" style="position: absolute; float: right; display: none; box-shadow: 5px 5px 20px #000;">
				<nav class="nav">
					<ul class="navlist">
						<li class="nav-butts "><a href="<?php echo base_url();?>dashboard">Dashboard</a></li><br>
						<li class="nav-butts "><a href="<?php echo base_url();?>upload">Files</a></li><br>
						<li class="nav-butts "><a href="<?php echo base_url();?>feeds">News Feed</a></li><br>
						<li class="nav-butts "><a href="<?php echo base_url();?>profile">Profile</a></li><br>
						<li class="nav-butts " id="logoutBtn"><a href="<?php echo base_url();?>dashboard/logoutuser">Logout</a></li>
						<li class="nav-butts "><a href=""></a></li>
					</ul>
				</nav>
			</div>
		</div>

	</header>

<script>
	
jQuery('.moreBtn').click(function() {
	jQuery('.navmenu').slideToggle();
});

</script>

	<section class="section">