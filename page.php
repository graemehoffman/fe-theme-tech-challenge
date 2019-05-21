<?php
get_header();
?>

	<div id="primary" class="content-area l-container">

		<main id="main" class="site-main" role="main">

			<?php
			while(have_posts()) : the_post();
				?>

				<?php get_template_part( '/partials/content_single', get_post_type() ); ?>

			<?php
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php
get_footer();