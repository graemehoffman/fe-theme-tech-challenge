<?php

	// Utilities

	include( 'configure/utilities.php' );

	// CONFIG

	include( 'configure/configure.php' );

	// JAVASCRIPT & CSS

	include( 'configure/js-css.php' );

	// SHORTCODES

	include( 'configure/shortcodes.php' );

	// Theme

	include( 'configure/theme.php' );

	// HOOKS ADMIN

	if( is_admin() )
	{
		include( 'configure/admin.php' );
	}
