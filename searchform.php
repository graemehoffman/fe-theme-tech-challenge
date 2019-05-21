<form role="search" method="get" class="search-form" action="<?php esc_url( home_url( '/' ) ); ?>">
	<label class="search-form__label a11y-visual-hide" for="s">
		<?php _x( 'Search for:', 'label' ); ?>
	</label>
	<input type="search" id="s" class="search-form__field" placeholder="<?php esc_attr_e( 'eg. delicious sandwiches', '10upfechallenge'  ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-form__submit">
		<span class="a11y-visual-hide"><?php _e( 'Search', '10upfechallenge' ); ?></span>
		<i class="icon icon-search"></i>
	</button>
</form>