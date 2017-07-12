<form method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
	<input type="text" value="<?php _e( 'Search', 'mantra' ) ?>" name="s" id="s" onblur="if (this.value == '') {this.value = '<?php _e( 'Search', 'mantra' ) ?>';}" onfocus="if (this.value == '<?php _e( 'Search', 'mantra' ) ?>') {this.value = '';}" />
	<input type="submit" id="searchsubmit" value="OK" />
</form>