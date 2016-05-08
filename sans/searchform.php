<?php

/**
 * Sans Search Form
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */

?>

<form action="<?php echo home_url(); ?>/" method="get">
	<fieldset>
		<label for="s"><?php _e( 'Search Form', 'designcrumbs' ); ?></label>
		<input id="s" name="s" type="text" placeholder="<?php _e( 'Enter keyword&#40;s&#41;', 'designcrumbs' ); ?>" />
		<input class="search-submit" type="image" src="<?php echo get_template_directory_uri(); ?>/images/icon-magnifying-glass.png" />
	</fieldset>
</form>
