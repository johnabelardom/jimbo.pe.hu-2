<div class="primary-content">

<br><br>


	<?php 
		$attrs = array(
			'class' => 'uploadform',
			'onsubmit' => 'return filecheck()'
		);
		$attrsupload = array(
			'class' => 'uploadbutton',
			'name' => 'userfile'
		);
		$attrbtn = array(
			'class' => 'funcBTNS'
		);
		echo form_open_multipart('upload/uploadfile', $attrs);

			//echo form_upload('userfile');
			echo '<input type="file" name="userfile" style="cursor: pointer;">';
			echo form_submit('upload', 'Upload', 'class="funcBTNS"');

		echo form_close();
	?>
	<p>Allowed files: <i>jpeg, jpg, gif, png, docx, doc, ppt, pptx, rar, zip and txt.</i></p>

<style>

	input[value=Upload].funcBTNS {
		margin-top: 10px;
	}

</style>

<script>
	
	function filecheck() {

		var _file = jQuery('input[type=file]').val();
		// var _types

		// var _fileex = _file.split(".").pop(-1);
		// alert(_fileex);

		// if(strpos())

		if(_file == ""){

			jQuery('input[type=file]').attr('style', 'border: 1px red solid;');
			jQuery('input[type=file]').effect('shake');

			return false;
			
		}else {
			return true;
		}

	}

	// jQuery(document).ready(function() {
	// 	filecheck();
	// });

</script>

</div>