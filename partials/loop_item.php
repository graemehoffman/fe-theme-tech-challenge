
<?php

$has_thumbnail = has_post_thumbnail();
$classes = [
	'loop-item',
	sprintf('loop-item--%s', get_post_type() )
];
if ($has_thumbnail) {
	$classes[] = 'loop-item--has-thumbnail';
}

?>

<article class="<? echo implode(' ', $classes ); ?>">

	<?php if ($has_thumbnail) {
		$img_src = wp_get_attachment_image_url( get_post_thumbnail_id(), '10upfechallenge_post_large' );
		$img_srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id(), '10upfechallenge_post_mid' );
		?>
		<div class="loop-item__thumnbnail">
			<img
				data-src="<?php echo esc_url( $img_src ); ?>"
				data-srcset="<?php echo esc_attr( $img_srcset ); ?>"
				data-sizes="auto"
				class="loop-item__image lazyload"
				alt="A rad wolf"
				>
				<?php the_post_thumbnail_caption(); ?>
		</div>

	<?php } ?>

	<div class="loop-item__inner">

		<header class="loop-item__header">

			<div class="loop-item__header-meta">
				<time class="loop-item__header-date">
					<?php the_time( get_option( 'date_format' ) ); ?>
				</time>
				<div class="loop-item__header-categories">
					<?php // the_category( ' | ' ); ?>
				</div>
				<div class="loop-item__header-tags">
					<?php // the_tags(); ?>
				</div>
			</div>

			<a href="<?php the_permalink(); ?>" class="loop-item__link">
				<?php the_title('<h2 class="loop-item__title h2">', '</h2>'); ?>
			</a>
		</header>

		<div class="loop-item__excerpt t-content">

			<?php
			$excerpt = apply_filters( 'the_excerpt', get_the_excerpt() );
			echo $excerpt;
			?>

		</div>

		<a href="<?php the_permalink(); ?>" class="loop-item__read-more">
			<?php _e('Read More', '10upfechallenge'); ?>
			<span></span>
		</a>

	</div>

</article>
