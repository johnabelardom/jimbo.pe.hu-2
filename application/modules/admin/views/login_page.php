<html>


<head>

<title><?php echo $page_title ;?></title>

<link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/bootstrap/dist/css/bootstrap.css" rel="stylesheet">


<script src="<?php echo base_url();?>assets/jquery/jquery.min.js"></script>

<script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/dist/js/bootstrap.js"></script>
<!-- <script src="<?php echo base_url();?>assets/bootstrap/dist/js/npm.js"></script>
 -->
</head>


<body id="body">
	
	<header>
		<nav>
			

		</nav>


	</header>


	<section>

		<div>

			<form action="" method=post>
				<div class="msg" style="display: none;"></div> 
				<input type="email" class="email" name="email" placeholder="Email">
				<input type="password" class="pass" name="password" placeholder="Password">
				<input type="button" class="glyphicon-log-in loginBtn">
				<span class="glyphicon-lock"></span>
			</form>	

		</div>

	</section>


	<footer>
		
	<div>
		
	<p>This is a Lorem Ipsum footer.</p>

	</div>

	</footer>


<script>
	function change() {

		$('.glyphicon-log-in').click(function() {
			var email = jQuery('.email').val();
			var password = jQuery('.pass').val();
			var msgemail = '<p class="m1">Email is empty.</p>';
			var msgpass = '<p class="m2">Password is empty.</p>';
			var msg = "";

			if(email == "") {
				//msg += 'Email is empty.<br>';
				msg += msgemail;

				jQuery('.msg').removeAttr('style');
				jQuery('.msg').html(msg);
				//jQuery(msgemail).appendTo(jQuery('.msg'));
			}else {
				//jQuery('.msg').attr('style', 'display: none;');
				msg += "";
			}

			if(password == "") {
				// msg += 'Password is empty.<br>'
				msg += msgpass;
				jQuery('.msg').removeAttr('style');
				jQuery('.msg').html(msg);
			}else {
				//jQuery('.msg').attr('style', 'display: none;');
				msg += "";
			}

			if(email != "" && password != ""){
				jQuery('.msg').attr('style', 'display: none;');
				checkLogin(email, password);
			}

		});
	}

	function checkLogin(email, pass) {
		jQuery.get('<?php base_url(); ?>admin/login', { email : email, pass : pass }, function(data) {
			console.log(data);
			if(data == ""){
				jQuery('.msg').removeAttr('style');
				jQuery('.msg').html('<p>Invalid credentials</p>');
			}else {
				window.location.href = 'dashboard';
			}
		});
	}


	$(document).ready(function() {
		change();

	});

</script>
</body>



</html>