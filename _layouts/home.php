<html>
	<?php snippet('head') ?>
	<body>
		<div class="container mt-3">
			<?php $md->content(); ?>
			<?php Plugin::create('example')('Test') ?>
		</div>
	</body>
</html>
