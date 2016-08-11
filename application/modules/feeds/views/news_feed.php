<?php 
$fullname = $this->session->userdata('fname') . ' ' . $this->session->userdata('lname') ;

?>
<div class="primary-content">

	<span style="color: red" class="msg"></span>

<div style="display: inline-block">
	<div style="display: inline-block; border: 1px #ddd solid">
		<span style="border-bottom: 1px #ddd solid"><?php echo $fullname; ?> >> <a href="#" class="posterBtn">Post</a></span>
		<div class="inputforpost" style="display: none;">
			<?php 
				$attr = array();
				echo form_open('feeds/postFeedcheck');
			?>
			<!-- <form method="post" action="feeds/postFeed"> -->
				<!-- <input type="hidden" class="ownerid" value="<?php echo $this->session->userdata('user_id');?>"> -->
				<!-- <input type="hidden" class="ownername" value="<?php echo $fullname ; ?>"> -->
				<!-- <span class="errs" style="margin-left: 10px; color: red; border-left: 2px #ff0039 solid"><?php if(isset($msgerr)){echo $msgerr;} ?></span> -->
				<span style="border-bottom: 1px #ddd solid"><textarea name="content" cols="100" rows="7" id="txtpost" class="postcontent"></textarea></span><br>
				<span style="border-bottom: 1px #ddd solid"><input type="button" value="Choose file" disabled></span>
				<input type="hidden" name="file" value="">
				<span style="border-bottom: 1px #ddd solid"><button id="postBtn">Post</button></span>
			<!-- </form> -->
			<?php 
				echo form_close();
			?>

		</div>
	</div>
</div>
<br><br>
<?php

if($msg == ""){
	$current_user = $fullname;

	echo '<div class="afeed" style="display: inline-block">';
	foreach ($feeds as $feed) {
		if($current_user == $feed->ownername) {
			
			echo '<div class="optionbutts-' . $feed->id . '" style="float: right;">';
			// echo '<input type="hidden" value="' . $feed->id . '">';
			echo '<span style="margin-right: 5px;"><a value="' . $feed->id . '" href="#" class="editpost">Edit</a></span>';
			echo '<span style="margin-right: 5px;"><a value="' . $feed->id . '" href="#" class="deletepost">Delete</a></span>';			
			echo '</div>';

			echo '<div class="hidedit' . $feed->id . '" style="display: none;">';
			echo form_open('feeds/updatePost');
				echo '<input type="hidden" value="' . $feed->id . '" name="edID">';
				echo '<span style="border-bottom: 1px #ddd solid"><textarea name="contenttext" cols="100" rows="7" value="' . $feed->content . '"' . 
				'>' . $feed->content . '</textarea></span><br>';
				echo '<span style="border-bottom: 1px #ddd solid"><a style="cursor: pointer; margin-right: 10px;" value="' . $feed->id . '" id="updateBtn">Update</a></span>';
				echo '<span style="border-bottom: 1px #ddd solid"><button href="#" data-id="' . $feed->id . '" id="cancelBtn">Cancel</button></span>';				
				echo '</div>';
			echo form_close();
		}else {

		}
		echo '<div class="postfeedcontent' . $feed->id . '" style="border: 2px #ddd solid">';	
		echo '<span style="border-bottom: 1px #ddd solid"><strong>' . $feed->ownername . '</strong></span><br>';
		echo '<span style="border-bottom: 1px #ddd solid">' . $feed->date_created . '</span>';
		echo '<span style="border: 1px #ddd solid"><p>' . $feed->content . '</p></span>';
		if($feed->attached_file != ""){
			echo '<span style="border-bottom: 1px #ddd solid">' . $feed->attached_file . '</span>';
		}else {
			echo '<br>';
		}
		echo '</div><br>';
	}

	echo '</div>';

}else {
	echo $msg;
}
?>

<script>

	// jQuery('#postBtn').click(function() {
	// 	var
	// });

	jQuery('.posterBtn').click(function() {
		jQuery('.inputforpost').slideToggle();
	});

	jQuery('textarea#txtpost').keypress(function() {
		// var txt = document.getElementById('txtpost').value;
		// var len = txt.length;
		// console.log(len);
		var cont = $('textarea#txtpos').text();
		console.log(cont);

	});

	// jQuery('#postBtn').click(function() {

	// });

	jQuery('.editpost').click(function() {
		var _id = jQuery(this).attr('value');
		// jQuery(this).html()
		console.log(_id);
		jQuery('.optionbutts-'+ _id).slideToggle();
		jQuery('.postfeedcontent'+ _id).slideToggle();
		jQuery('.hidedit'+ _id).slideToggle();

	});

	jQuery('#cancelBtn').click(function() {
		var id = jQuery(this).attr('data-id');
		console.log(id);
		jQuery('.optionbutts-'+ id).slideToggle();
		jQuery('.postfeedcontent'+ id).slideToggle();
		jQuery('.hidedit'+ id).slideToggle();
	});

	jQuery('#updateBtn').click(function() {
		var _id = jQuery(this).attr('value');
		var cont = jQuery('textarea[name=contenttext]').val();
		console.log(cont);
		if(confirm('Are you sure you want to update this?') == true){
			jQuery.get('<?php echo base_url(); ?>feeds/updatePost', { editid : _id, contenttext : cont }, function(data) {
				console.log(data);
				window.location.href ="<?php echo base_url(); ?>feeds";
			});
		}else {
			console.log('cont');

				window.location.href ="<?php echo base_url(); ?>feeds";
		}
	});

	jQuery('.deletepost').click(function() {
		var _id = jQuery(this).attr('value');
		// jQuery(this).html()
		console.log(_id);

		//var confirm = confirm("Are you sure to delete this post?");

		if(confirm("Are you sure to delete this post?")){
			jQuery.get('<?php echo base_url(); ?>feeds/deletePost', { id : _id }, function(data) {
				if(data == ""){
					window.location.href = "feeds/";				
				}else {
					jQuery('.msg').html();
				}
			});
		} else {
			return false;
		}

	});



</script>

</div>
