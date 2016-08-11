<?php 
$fullname = $this->session->userdata('fname') . ' ' . $this->session->userdata('lname') ;

?>

<div class="sidebar" style="float: left; display: none;">

<div style="">
	<div style="display: inline-block; border: 1px #ddd solid">
		<span style="border-bottom: 1px #ddd solid"><?php echo $fullname; ?> >> <a href="#" class="posterBtn">Post</a></span>
		<div class="inputforpost" style="display: none;">
			<input type="hidden" class="ownerid" value="<?php echo $this->session->userdata('user_id');?>">
			<input type="hidden" class="ownername" value="<?php echo $fullname ; ?>">
			<span style="border-bottom: 1px #ddd solid"><textarea size="600" id="txtpost" class="postcontent"></textarea></span><br>
			<span style="border-bottom: 1px #ddd solid"><input type="button" value="Choose file"></span>
			<span style="border-bottom: 1px #ddd solid"><button id="postBtn">Post</button></span>

		</div>
	</div>
</div>
<br><br>
</div>