

		<div id="divlogin" class="login-form-div">
			<h3>Login</h3>

			<form action="" method=post class="login-form">
				<div id="ms" class="msg" style="display: none;"></div> 
				<input type="email" class="inputs email" name="email" placeholder="Username"><br><br>
				<input type="password" class="inputs pass" name="password" placeholder="Password"><br><br>
				<a type="button" href="#divlogin" style="color: black;" class="glyphicon-log-in loginBtn" value="Login">Login</a>
				<span class="glyphicon-lock"></span>
			</form>	

		</div>

<script>
	function change() {

		$('.glyphicon-log-in').click(function() {
			var email = jQuery('.email').val();
			var password = jQuery('.pass').val();
			// var msgemail = '<p class="m1">Email is empty.</p>';
			// var msgpass = '<p class="m2">Password is empty.</p>';
			var msg = "";

			if(email == "") {
				//msg += 'Email is empty.<br>';
				// msg += msgemail;

				jQuery('.email').attr('style', 'border: 1px red solid');
				jQuery('.email').effect("shake", {times:4}, 1000);
				// jQuery('.msg').attr('style', 'margin-left: 10px; color: red; border-left: 2px #ff0039 solid');
				// jQuery('.msg').html(msg);
				//jQuery(msgemail).appendTo(jQuery('.msg'));
			}else {
				//jQuery('.msg').attr('style', 'display: none;');
				msg += "";
			}

			if(password == "") {
				// msg += 'Password is empty.<br>'
				// msg += msgpass;

				jQuery('.pass').attr('style', 'border: 1px red solid');
				jQuery('.pass').effect("shake", {times:4}, 1000);
				//jQuery('.msg').attr('style', 'margin-left: 10px; color: red; border-left: 2px #ff0039 solid');
				// jQuery('.msg').html(msg);
			}else {
				//jQuery('.msg').attr('style', 'display: none;');
				msg += "";
			}

			if(email != "" && password != ""){
				// jQuery('.msg').attr('style', 'display: none;');
				checkLogin(email, password);
			}

		});
	}

	jQuery('.email').keypress(function() {
		jQuery(this).removeAttr('style');
		//jQuery('.msg').removeAttr('style');
		//jQuery('.msg').fadeOut();
	});

	jQuery('.pass').keypress(function() {
		jQuery(this).removeAttr('style');
		//jQuery('.msg').removeAttr('style');
		//jQuery('.msg').fadeOut();
	});

	jQuery(".pass").keyup(function(e) {
	    if(e.which == 13) {
	    	e.preventDefault();
	        //change();
	        $('.glyphicon-log-in').click().focus();
	    }
	});

	function checkLogin(email, pass) {
		//console.log(email);
		//console.log(pass);
		jQuery.get('<?php base_url(); ?>login/loginuser', { email : email, pass : pass }, function(data) {
			//console.log(data);
			if(data == ""){

				jQuery('.msg').attr('style', 'font-size: 13px; margin-left: 10px; color: red; border-left: 2px #ff0039 solid');
				jQuery('.msg').html('<p>Invalid credentials</p>');
				jQuery('.msg').fadeIn();
				jQuery('.email').attr('style', 'border: 1px red solid');
				jQuery('.pass').attr('style', 'border: 1px red solid');
				jQuery('.email').effect("shake", {times:4}, 1000);
				jQuery('.pass').effect("shake", {times:4}, 1000);
				//alert(data);
			}else {
				window.location.href = 'dashboard';
				//console.log(data);
			}


		});
	}


	$(document).ready(function() {
		change();

	});

</script>
