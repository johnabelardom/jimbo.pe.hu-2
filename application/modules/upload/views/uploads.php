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
	<p>Maximum of 2 MB size per file.</p>
	<p>Allowed files: <i class="filetypes">jpeg, jpg, gif, png, docx, doc, ppt, pptx, rar, zip and txt.</i></p>

<style>

	input[value=Upload].funcBTNS {
		margin-top: 10px;
	}

</style>

<script>
	
	function filecheck() {

		//alert($("input[name=userfile]")[0].files[0].size);

		var _file = jQuery('input[type=file]').val();

		var _types = jQuery('.filetypes').text();

		var _fileex = _file.split(".").pop(-1);
		var filecheck = 0;

		if(_types.indexOf(_fileex) > 0) {
			filecheck = 1;
		}

		if(_file == "" || (! filecheck > 0)){

			if(_file == "") {
				jQuery('input[type=file]').attr('style', 'border: 1px red solid;');
				jQuery('input[type=file]').effect('shake');
				alert('No file chosen.');
				return false;
			}

			if(! filecheck > 0) {
				jQuery('input[type=file]').attr('style', 'border: 1px red solid;');
				jQuery('input[type=file]').effect('shake');
				alert('The file that you want to upload is not allowed to be upload.');
				return false;
			}
			
		}else {

			var _f_size = file_size / 1024;
			var file_size = jQuery("input[name=userfile]")[0].files[0].size;
			if(_f_size >= 2001) {

				jQuery('input[type=file]').attr('style', 'border: 1px red solid;');
				jQuery('input[type=file]').effect('shake');
				alert('The size of the file that you want to upload is not allowed to be upload. It exceed the maximum upload file.');
				return false;
			}

			return true;
		}
	}

	// jQuery(document).ready(function() {
	// 	filecheck();
	// });

</script>

</div>