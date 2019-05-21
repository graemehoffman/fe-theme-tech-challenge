<?php

/**
 * Echos the header brand which can include a custom image
 */
function the_header_brand() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo_classes = [
		'site-branding__logo'
	];
	$img = get_bloginfo( 'name' );
	// custom logo
	if ( (bool) $custom_logo_id ) {
		$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		$size_class = 'site-branding__logo--square';
		if ( (int)$logo[1] > (int)$logo[2] ) {
			$size_class = 'site-branding__logo--landscape';
		} else if ( (int)$logo[1] < (int)$logo[2] ) {
			$size_class = 'site-branding__logo--portrait';
		}
		$logo_classes[] = $size_class;
		$img = sprintf(
			'<img src="%s" title="%s" class="site-branding__logo-img">',
			$logo[0],
			get_bloginfo( 'name' )
		);
	} else {
		$logo_classes[] = 'site-branding__logo--default';
	}
	$brand = sprintf(
		'<div class="%s"><a href="%s" class="site-branding__logo-link">%s</a></div><div class="site-branding__description">%s</div>',
		implode(' ', $logo_classes),
		get_home_url(),
		$img,
		get_bloginfo( 'description' )
	);
	echo $brand;
}

/**
 * Get the page title
 *
 * @return string page title per context
 */
function get_the_page_title() {
	if ( is_front_page() ) {
		return '';
	}

	// Blog
	if ( is_home() ) {
		return '';
	}

	// Search
	elseif ( is_search() ) {
		global $wp_query;
		return sprintf( __( 'Your search for <strong>%s</strong> returned <strong>%d</strong> results', '10upfechallenge' ), esc_attr( get_search_query() ), $wp_query->found_posts );
	}

	// 404
	elseif ( is_404() ) {
		return __( 'Page Not Found', '10upfechallenge' );
	}

	// Singular
	elseif ( is_singular() ) {
		return get_the_title();
	}

	elseif ( ! have_posts() ) {
		return __( 'No Posts Found', '10upfechallenge' );
	}

	// Archives
	return get_the_archive_title();
}

/**
 * Echos the page title
 */
function the_page_title() {
	$title = get_the_page_title();
	if ( empty( $title ) ) {
		return;
	}
	printf(
		'<h1 class="page__title">%s</h1>',
		$title
	);
}


