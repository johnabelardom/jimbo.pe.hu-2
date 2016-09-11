<html>


<head>

<title><?php echo $page_title ;?></title>

<!-- <link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.css" rel="stylesheet"> -->
<link href="<?php echo base_url(); ?>assets/favicon/logo.png" type="image/png" rel="icon">

<link href="<?php echo base_url(); ?>assets/custom_css/style.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/jquery/jquery-ui.min.js"></script>

<!-- <script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- <script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.js"></script> -->
<!-- <script src="<?php echo base_url();?>assets/bootstrap/dist/js/npm.js"></script>
 -->




</head>


<body class="body">
	
	<header class="header-off">
		<div class="nav-container">
			<a class="brand-name bn-off" href="<?php echo base_url(); ?>login">Jimbo</a>
			
		</div>

	</header>


	<section class="section section-off">
	<?php 
	// var_dump($messageC);
	// exit();
		if(isset($messageC)){
	?>
	
	<span style="margin-top: 70px;"><?php echo $messageC; ?></span>
	<?php
		}
	?>