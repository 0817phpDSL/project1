
<section class="section-nav">
	<div class="section-div">
	<p class="p-nav">Status</p>
	<br>
	<?php
	if($_SERVER['REQUEST_URI'] == "/project1/src/in-progress.php") { ?>
		<p class="box-in"></p><a class="box-color a_a" href="/project1/src/in-progress.php"> in progress</a>
	<?php } else { ?>
		<p class="box-in"></p><a class="a_a"href="/project1/src/in-progress.php"> in progress</a>
	<?php } ?>
	<br>
	<?php if($_SERVER['REQUEST_URI'] == "/project1/src/complete.php") { ?>
		<p class="box-com"></p><a class="box-color a_a" href="/project1/src/complete.php"> complete</a>
	<?php } else { ?>
		<p class="box-com"></p><a class="a_a"href="/project1/src/complete.php"> complete</a>
	<?php } ?>
</div>
</section>