<?php

/**
 * Sans Contact Sidebar
 *
 * This is the template that will display the sidebar on the custom contact page template.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */

?>
<?php if ( is_active_sidebar( 'sans-contact' ) ) : ?>
<aside class="sans-post-aside aside-widgets">

	<?php dynamic_sidebar( 'sans-contact' ); ?>
	
</aside>
<?php endif; ?>
