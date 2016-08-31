<div class="primary-content" style="margin-top: 20px;">



	<?php foreach ($query as $key => $value) { ?>

		<ul>
			<li><a href="#"><span id="<?= $value->id ?>" style="border: 1px lightblue solid;"> <?= $value->fname . " " . $value->lname ?></span></a></li>
		</ul>

	<?php	} ?>



</div>
