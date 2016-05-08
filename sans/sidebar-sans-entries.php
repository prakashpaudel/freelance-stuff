<?php

/**
 * Sans Entry Sidebar
 *
 * This is the template that will display the sidebar on single blog templates.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */

?>
<?php if ( is_active_sidebar( 'sans-entries' ) ) : ?>
<aside class="sans-post-aside aside-widgets">
	
	<?php dynamic_sidebar( 'sans-entries' ); ?>
	
</aside>
<?php endif; ?>
