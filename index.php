<?php
get_header();
?>

    <div id="primary" class="content-area l-container">
        <main id="main" class="site-main" role="main">

	        <?php
	        while(have_posts()) : the_post();
		        ?>

                <section>
			        <?php the_title('<h1>', '</h1>'); ?>

			        <?php
			        the_content();
			        ?>
                </section>

		        <?php
	        endwhile; // End of the loop.
	        ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();