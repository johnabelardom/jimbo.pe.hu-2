<div class="primary-content">


	<div class="register-form-div login-form-div">

			<form class="register-form login-form" method="post" action="register/registerAccount" onsubmit="return registerformchecker()">

				<h4>Register an Account</h4>
				<h6>(Admin only)</h6>
				<input type="text" class="inputs" name="fname" id="fname"  title="Maximum of 255 characters. No numbers and special characters" placeholder="Firstname"><br><br>

				<input type="text" class="inputs" name="lname" id="lname"  title="Maximum of 255 characters. No numbers and special characters" placeholder="Lastname"><br><br>

				<input type="text" class="inputs" name="birthdate" id="datepicker" placeholder="Birthdate"><br><br>

				<input type="number" class="inputs" name="age" id="age" title="Age" placeholder="Age"><br><br>
				<input type="email" class="inputs" name="email" id="email" title="sample@gmail.com" placeholder="Email"><br><br>

				<input type="text" class="inputs" name="username" id="username" title="Username" placeholder="Username"><br><br>

				<input type="password" class="inputs" name="password" id="password" pattern=".{8,}" title="8 or more characters" placeholder="Password"><br><br>

				<input type="password" class="inputs" id="confirmpassword" pattern=".{8,}" title="8 or more characters" placeholder="Confirm Password"><br><br>
				<div class="phonenumberdecline">
					<input type="checkbox" value="false">Check if no Phone Number to input<br>

					<input type="text" id="prefixphone" name="prefixphone" readonly="readonly" value="+639" style="width: 50px;" class="inputs">

					<input type="text" class="inputs" name="phone" pattern="{9}" id="phone" title="Phone Number: 9 digits only" placeholder="Phone Number">

				</div><br>

				<select id="role" name="role" class="inputs" placeholder="Role">

					<option value="" data-default>Select Role</option>
					<option value="admin">admin</option>
					<option value="user">user</option>
				
				</select><br><br>

				<input type="submit" value="Register" class="funcBTNS">

			<!-- </form> -->
			<?php echo form_close(); ?>

	</div>


</div>
<script>


	//$( function() {
		// $( "#datepicker" ).datepicker();
		// $(".datepicker").datepicker({
		//     minDate: new Date(1910,0,1),
		//     maxDate: new Date(2010,0,1),
		//     yearRange: '1910:2010' ,
		//     changeYear: true,
		//     changeMonth: true
		// });
	//} );
	$(function() {
        $( "#datepicker" ).datepicker({
            dateFormat : 'mm/dd/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn'
        });
    });



	
	function registerformchecker() {
		_fname = jQuery('#fname');
		_lname = jQuery('#lname');
		_age = jQuery('#age');
		_email = jQuery('#email');
		_uname = jQuery('#username');
		_pass = jQuery('#password');
		_cpass = jQuery('#confirmpassword');
		_role = jQuery('#role');
		_phone = jQuery('#phone');
		_bdate = jQuery('#birthdate');


		if(_fname.val() == "") {
			_fname.attr('style', 'border: 1px solid red');
			_fname.effect('shake', {times: 2});
			//return false;
		}
		if(_lname.val() == "") {
			_lname.attr('style', 'border: 1px solid red');
			_lname.effect('shake', {times: 2});
			//return false;
		}
		if(_bdate.val() == "") {
			_bdate.attr('style', 'border: 1px solid red');
			_bdate.effect('shake', {times: 2});
			//return false;
		}
		if(_age.val() == "") {
			_age.attr('style', 'border: 1px solid red');
			_age.effect('shake', {times: 2});
			//return false;
		}
		if(_email.val() == "") {
			_email.attr('style', 'border: 1px solid red');
			_email.effect('shake', {times: 2});
			//return false;
		}
		if(_uname.val() == "") {
			_uname.attr('style', 'border: 1px solid red');
			_uname.effect('shake', {times: 2});
			//return false;
		}
		if(_pass.val() == "") {
			_pass.attr('style', 'border: 1px solid red');
			_pass.effect('shake', {times: 2});
			//return false;
		}
		if(_cpass.val() == "") {
			_cpass.attr('style', 'border: 1px solid red');
			_cpass.effect('shake', {times: 2});
			//return false;
		}

		if(jQuery('.phonenumberdecline input[type=checkbox]').val() == 'false'){
			if(jQuery('.phonenumberdecline input[type=checkbox]').parent().find('#phone').val() == "") {
				_phone.attr('style', 'border: 1px solid red');
				_phone.effect('shake', {times: 2});
			}
		}
		if(_role.val() == "") {
			_role.attr('style', 'border: 1px solid red');
			_role.effect('shake', {times: 2});
			//return false;
		}

		if(_fname.val() != "" && _lname.val() != "" && _age.val() != "" && _email.val() != "" && _uname.val() != "" && _cpass.val() == _pass.val() && _role.val() != ""){
			return true;
		}else {
			return false;
		}
	}

	// jQuery('.phonenumberdecline input[type=checkbox]').change(function() {
	// 	if(jQuery(this).val() == "false"){
	// 		jQuery(this).val('true');
	// 	}else {
	// 		jQuery(this).val('false');
	// 	}
	// });

	jQuery('#confirmpassword').change(function() {
		if(jQuery(this).val() != jQuery('#password').val()){
			jQuery(this).attr('style', 'border: 2px solid red;');
		}else {
			jQuery(this).attr('style', 'border: 2px solid green;');
		}
	});

	jQuery(document).ready(function() {

		jQuery('.phonenumberdecline input[type=checkbox]').change(function() {

				_val = jQuery(this).attr('value');
			if(_val == "false") {
				jQuery(this).parent().find('input[type=text]').prop('disabled', true);
				jQuery(this).val('true');
			}
			if(_val == "true") {
				jQuery(this).parent().find('input[type=text]').prop('disabled', false );
				jQuery(this).val('false');
			}
		});
	});

	jQuery('#datepicker').change(function() {
		_string = jQuery(this).val();
		_lastfour = _string.substr(_string.length - 4);
		_age = 2016 - _lastfour;

		jQuery('#age').val(_age);
	});

	// jQuery('select[name=role]').change(function() {
	// 	_asd = jQuery(this).val();

	// 	alert(_asd);
	// });


</script>