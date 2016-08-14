<div class="primary-content">





	<?php 
		$attrs = array(
			'class' => 'uploadform',
			'onsubmit' => 'return filecheck()'
		);
		$attrsupload = array(
			'class' => 'uploadbutton',
			'name' => 'userfile'
		);
		echo form_open_multipart('upload/uploadfile', $attrs);

			//echo form_upload('userfile');
			echo '<input type="file" name="userfile">';
			echo form_submit('upload', 'Upload');

		echo form_close();

	?>



<script>
	
	function filecheck() {

		var _file = jQuery('input[type=file]').val();

		if(_file == ""){

			jQuery('input[type=file]').attr('style', 'border: 1px red solid;');
			jQuery('input[type=file]').effect('shake');

			return false;
			
		}else {
			return true;
		}

	}

</script>

</div>