<?php
get_header();
?>

	<div id="primary" class="content-area l-container">

		<main id="main" class="site-main" role="main">

			<?php the_page_title(); ?>

			<div class="loop">

				<?php
				while(have_posts()) : the_post();
					?>

					<?php get_template_part( '/partials/loop_item', get_post_type() ); ?>

				<?php
				endwhile; // End of the loop.
				?>

			</div>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php
get_footer();