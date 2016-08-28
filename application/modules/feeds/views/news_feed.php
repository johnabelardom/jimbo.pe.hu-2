<?php 
$fullname = $this->session->userdata('fname') . ' ' . $this->session->userdata('lname') ;
$username = $this->session->userdata('username');

?>
<div class="primary-content" style="margin-top: 50px;">

	<span style="color: red" class="msg"></span>

<div style="" class="afeed">
	<div style=" border: 1px #ddd solid">
		<span style="border-bottom: 1px #ddd solid"><a class="profileLink" href="<?php echo base_url(); ?>profile/person?identifier=<?= $username ?>"><?php echo $fullname; ?></a> <button href="#" class="posterBtn funcBTNS">Post</button></span>
		<div class="inputforpost" style="display: none;">
			<?php 
				$attr = array('class' => 'formposter', 'onsubmit' => 'return submitPostcheck()');
				echo form_open('feeds/postFeedcheck', $attr);
			?>
			<!-- <form method="post" action="feeds/postFeed"> -->
				<!-- <input type="hidden" class="ownerid" value="<?php echo $this->session->userdata('user_id');?>"> -->
				<!-- <input type="hidden" class="ownername" value="<?php echo $fullname ; ?>"> -->
				<!-- <span class="errs" style="margin-left: 10px; color: red; border-left: 2px #ff0039 solid"><?php if(isset($msgerr)){echo $msgerr;} ?></span> -->
				<span style="border-bottom: 1px #ddd solid"><textarea style="width: 100%; height: 20%;" name="content" id="txtpost" class="postcontent"></textarea></span><br>
				<!-- <span style="border-bottom: 1px #ddd solid"><input type="button" value="Choose file" ></span> -->
				<!-- <input type="hidden" name="file" value=""> -->
				<span style="border-bottom: 1px #ddd solid"><button href="#" id="postBtn" class="funcBTNS">Post</button></span>
				<input type="hidden" name="from_place" value="feeds">
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

	echo '<div class="afeed" style="">';
	foreach ($feeds as $feed) {
		if($current_user == $feed->ownername || $this->session->userdata('role') == 'admin') {
			
			echo '<div class="optionbutts-' . $feed->id . '" style="float: right;">';
			echo '<span style="margin-right: 5px;"><button value="' . $feed->id . '" data-change="non-edit-mode" class="funcBTNS editpost">Edit</button></span>';
			echo '<span style="margin-right: 5px;"><button value="' . $feed->id . '" class="deletepost funcBTNSX">Delete</button></span>';			
			echo '</div>';

			echo '<div class="hidedit' . $feed->id . '" style="display: none;">';
			echo '<form">';
				echo '<input type="hidden" value="' . $feed->id . '" name="editid">';
				echo '<span style="border-bottom: 1px #ddd solid"><textarea name="contenttext" style="width: 100%; height: 18%;"' . 
				'>' . htmlspecialchars($feed->content) . '</textarea></span><br>';
				echo '<span style="border-bottom: 1px #ddd solid"><button type="submit" style="cursor: pointer; margin-right: 10px;" value="' . $feed->id . '" id="updateBtn" class="funcBTNS">Update</button></span>&nbsp;';
				echo '<input type="hidden" name="from_place" value="feeds"';		
			echo form_close();
			echo '</div>';
			
		}
		// if($this->session->userdata('role') == 'admin'){

		// }

		$date = strtotime($feed->date_created);
		$dateformat = date("M d, Y ", $date) . "at " . date("H:i a", $date);

		echo '<div class="postfeedcontent' . $feed->id . '" style="border: 2px #ddd solid">';	
		?>
		<span style="border-bottom: 1px #ddd solid"><strong><a class="profileLink" href="<?php echo base_url(); ?>profile/person?identifier=<?= $feed->username ?>"><?= $feed->ownername ?></a></strong></span><br>
		<?php
		echo '<span style="border-bottom: 1px #ddd solid" class="dateformatstyle">' . $dateformat . '</span>';
		echo '<span style="border: 1px #ddd solid"><p style="margin: 2%;">' . nl2br(htmlspecialchars($feed->content)) . '</p></span>';
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
		var change = jQuery(this).attr('data-change');
		if(change == "non-edit-mode"){
			jQuery(this).html('Edit');
		}else {
			jQuery(this).html('Cancel edit');
		}

		console.log(_id + " ng editpost");
		//jQuery('.optionbutts-'+ _id).slideToggle();
		jQuery('.postfeedcontent'+ _id).slideToggle();
		jQuery('.hidedit'+ _id).slideToggle();



	});

	// jQuery('#cancelBtn').click(function() {
	// 	var id = jQuery(this).attr('data-id');
	// 	console.log(id + " ng cancelBtn");
	// 	jQuery('.optionbutts-'+ id).slideToggle();
	// 	jQuery('.postfeedcontent'+ id).slideToggle();
	// 	jQuery('.hidedit'+ id).slideToggle();
	// });

	function submitPostcheck() {
		var form = jQuery('.formposter');
		var _postcontent = form.find('textarea').val();

		if(_postcontent == ""){
			form.find('textarea').attr('style', 'border: 1px red solid; width: 100%; height: 20%;');
			form.find('textarea').attr('placeholder', "This can't be blank.");
			return false;
			

		}else {
			return true;
		}
	}

	function updatefeed() {

		jQuery('#updateBtn').click(function() {
			var _id = jQuery(this).attr('value');
			var cont = jQuery(this).parent().parent().find('textarea[name=contenttext]').val();
			//var cot = jQuery(this).
			console.log(cont);

			//if(cont != ""){
				if(confirm('Are you sure you want to update this?') == true){
					jQuery.post('<?php echo base_url(); ?>feeds/updatePost', { editid : _id, contenttext : cont }, function(data) {
						console.log(data);
						window.location.href ="<?php echo base_url(); ?>feeds";
					});
				}else {
					console.log(data);
						return false;
						//window.location.href ="<?php echo base_url(); ?>feeds";
				}
			// }else {
			// 	jQuery(this).parent().parent().find('textarea[name=contenttext]').attr('style', 'border: 1px red solid');
			// 	jQuery(this).parent().parent().find('textarea[name=contenttext]').attr('placholder', "This can't be blank.");
			// }
		});
	}

	jQuery(document).ready(function() {
		updatefeed();
	});

	jQuery('.deletepost').click(function() {
		var _id = jQuery(this).attr('value');
		// jQuery(this).html()
		console.log(_id);

		//var confirm = confirm("Are you sure to delete this post?");

		if(confirm("Are you sure to delete this post?")){
			jQuery.get('<?php echo base_url(); ?>feeds/deletePost', { id : _id }, function(data) {
				if(data == ""){
					window.location.href = "<?php echo base_url(); ?>feeds/";				
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
