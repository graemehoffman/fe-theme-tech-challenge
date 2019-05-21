
<section class="single single--<? echo get_post_type(); ?>">

	<header class="single__header">
		<?php the_title('<h1 class="single__title h2">', '</h1>'); ?>
	</header>

	<div class="single__content t-content">

		<?php
		the_content();
		?>

	</div>

</section>


