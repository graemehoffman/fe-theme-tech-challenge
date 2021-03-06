<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="author" content="<?php bloginfo( 'name' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>
<body <?php body_class(); ?>>

<a href="#a11y-skip-link-content" class="a11y-skip-link a11y-visual-hide">Skip to main content</a>

<div id="page" class="site">

	<header class="site-header" role="banner" data-js="header">

		<div class="l-container">

			<div class="site-header__banner">

				<button
						class="nav__trigger site-header__menu-trigger"
						aria-haspopup="true"
						aria-expanded="false"
						aria-controls="site-header__nav-container"
						data-js="nav__trigger"
				>
					<i class="icon icon-menu"></i>
					<span class="menu-trigger__text a11y-visual-hide">
						<?php _e( 'Toggle Main Menu', '10upfechallenge' ); ?>
					</span>
				</button>

				<div class="site-branding">
					<?php the_header_brand(); ?>
				</div>

				<button
						class="site-header__search-trigger site-header__menu-trigger"
						aria-haspopup="true"
						aria-expanded="false"
						aria-controls="search"
						data-js="site-header__search-trigger"
				>
					<i class="icon icon-search"></i>
					<i class="icon icon-close"></i>
					<span class="menu-trigger__text a11y-visual-hide">
						<?php _e( 'Toggle Search', '10upfechallenge' ); ?>
					</span>
				</button>

			</div>

		</div>

		<div class="site-header__nav-container" id="site-header__nav-container" data-js="site-header__nav-container">

			<nav id="main-navigation" class="main-navigation" role="navigation">
				<?php
				wp_nav_menu( [
					'theme_location' => 'menu-main',
					'menu_id'        => 'menu-main'
				] );
				?>
			</nav>

		</div>

		<div class="site-header__search" data-js="site-header__search" id="site-header__search" aria-hidden="true">
			<h2 class="a11y-visual-hide"><?php _e( 'Search', '10upfechallenge' ); ?></h2>
			<div class="site-header__search-form-wrapper">
				<?php get_search_form(); ?>
			</div>
		</div>

	</header>

	<a id="a11y-skip-link-content" tabindex="-1"></a>

	<div id="content" class="site-content">
