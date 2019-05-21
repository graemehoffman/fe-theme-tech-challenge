<?php

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

