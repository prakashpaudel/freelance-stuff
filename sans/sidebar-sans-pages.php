<?php

/**
 * Sans Page Sidebar
 *
 * This is the template that will display the sidebar on page templates.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */

?>
<?php if ( is_active_sidebar( 'sans-pages' ) ) : ?>
<aside class="sans-post-aside aside-widgets">
	
	<?php dynamic_sidebar( 'sans-pages' ); ?>
	
</aside>
<?php endif; ?>
