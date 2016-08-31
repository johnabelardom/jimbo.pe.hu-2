<div class="primary-content">

		<div id="divlogin" class="login-form-div">
			
			<h3>Let's make it free.</h3>
			<form action="" method=post class="login-form" style="padding: 10%;">
				
				<div id="ms" class="msg" style="display: none;"></div> 
				<input type="email" class="inputs email" name="email" placeholder="Email or Username"><br><br>
				<input type="password" class="inputs pass" name="password" placeholder="Password"><br><br>
				<a type="button" href="#divlogin" class="glyphicon-log-in funcBTNS" value="Login">Login</a>
				<span class="glyphicon-lock"></span>
			</form>	

		</div>
</div>
<script>
	function change() {

		$('.glyphicon-log-in').click(function() {
			var email = jQuery('.email').val();
			var password = jQuery('.pass').val();
			var msg = "";

			if(email == "") {
				jQuery('.email').attr('style', 'border: 1px red solid');
				jQuery('.email').effect("shake", {times:4}, 1000);
			}else {
				msg += "";
			}

			if(password == "") {
				jQuery('.pass').attr('style', 'border: 1px red solid');
				jQuery('.pass').effect("shake", {times:4}, 1000);
			}else {
				msg += "";
			}

			if(email != "" && password != ""){
				checkLogin(email, password);
			}

		});
	}

	jQuery('.email').keypress(function() {
		jQuery(this).removeAttr('style');
	});

	jQuery('.pass').keypress(function() {
		jQuery(this).removeAttr('style');
	});

	jQuery(".pass").keyup(function(e) {
	    if(e.which == 13) {
	    	e.preventDefault();
	        //change();
	        $('.glyphicon-log-in').click().focus();
	    }
	});

	function checkLogin(email, pass) {
		jQuery.get('<?php base_url(); ?>login/loginuser', { email : email, pass : pass }, function(data) {
			if(data == ""){

				jQuery('.msg').attr('style', 'font-size: 13px; margin-left: 10px; color: red; border-left: 2px #ff0039 solid');
				jQuery('.msg').html('<p>Invalid credentials</p>');
				jQuery('.msg').fadeIn();
				jQuery('.email').attr('style', 'border: 1px red solid');
				jQuery('.pass').attr('style', 'border: 1px red solid');
				jQuery('.email').effect("shake", {times:4}, 1000);
				jQuery('.pass').effect("shake", {times:4}, 1000);
			}else {
				window.location.href = 'dashboard';
			}
		});
	}


	$(document).ready(function() {
		change();
	});

</script>
