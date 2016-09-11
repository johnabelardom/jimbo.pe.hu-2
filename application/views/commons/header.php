<html>


<head>

<title><?php echo $page_title ;?></title>

<!-- <link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<!-- <link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.css" rel="stylesheet"> -->
<link href="<?php echo base_url(); ?>assets/favicon/logo.png" type="image/png" rel="icon">
<link href="<?php echo base_url(); ?>assets/custom_css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/custom_css/jquery-ui.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/jquery/jquery-ui.min.js"></script>



<!-- <script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- <script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.js"></script> -->
<!-- <script src="<?php echo base_url();?>assets/bootstrap/dist/js/npm.js"></script>
 -->

<style>

#fixed-header {
	position: fixed;
	width: 100%;
}

header.sticky, header div .headActive {
  /*font-size: 24px;*/
/*  line-height: 48px;
  height: 48px;*/
  background: #2980b9;
	transition: all 1s;
}

div.scrollactive {
	margin-top: 57px;
}

header {
	transition: all 1s ease-in-out;
}

a.headActive {
	float: left;
	transition: all 0.5s ease-in-out;
}

a.brand-name {
	transition: all 0.5s;
}


</style>


</head>


<body class="body">
	
	<header class="header-on" id="">
		<div class="nav-container">
			<a class="brand-name bn-on" href="login">Jimbo</a>
			<button class="moreBtn funcBTNS"><?php echo $this->session->userdata('fname');?></button>
			<div class="navmenu" style="position: fixed; float: right; display: none; box-shadow: 2px 2px 5px #333; padding: 0 25px;">
				<nav class="nav">
					<ul class="navlist">
						<a href="<?php echo base_url();?>dashboard"><li class="nav-butts funcBTNS">Dashboard</li></a><br>
					<?php if($this->session->userdata('role') == 'admin') { ?>

						<a href="<?php echo base_url();?>upload"><li class="nav-butts funcBTNS">Files</li></a><br>
						
						<a href="<?php echo base_url();?>register"><li class="nav-butts funcBTNS">Register</li></a><br>

					<?php } ?>

						<a href="<?php echo base_url();?>feeds"><li class="nav-butts funcBTNS">News Feed</li></a><br>
						<a href="<?php echo base_url();?>profile/"><li class="nav-butts funcBTNS">Profile</li></a><br>
						<a href="<?php echo base_url();?>dashboard/logoutuser"><li class="nav-butts funcBTNSX" id="logoutBtn">Logout</li></a>
						<!-- <li class="nav-butts "><a href=""></a></li> -->
					</ul>
				</nav>
			</div>
		</div>

	</header>

<script>
	
jQuery('.moreBtn').click(function() {
	jQuery('.navmenu').slideToggle();
});


// jQuery(document).ready(function() {
// 	jQuery(window).scroll(function(){
// 	    if (jQuery(window).scrollTop() >= 300) {
// 	       jQuery('header-on').attr('id', 'fixed-header');
// 	    }
// 	    else {
// 	       jQuery('header-on').attr('id', 'header');
// 	    }
// 	});
// });

$(window).scroll(function() {
	if ($(this).scrollTop() > 1){  
	    $('header').addClass("sticky");
	    $('a.brand-name').addClass("headActive");
	    $('.navmenu').addClass('scrollactive');
	  }
	  else{
	    $('header').removeClass("sticky");
	    $('a.brand-name').removeClass("headActive");
	    $('.navmenu').removeClass('scrollactive');
	  }
	});

</script>

	<section class="section">


	<?php 
		if(isset($messageC)){
	?>
	<br><br><br>
	<span><?php echo $messageC; ?></span>
	<?php
		}
	?>