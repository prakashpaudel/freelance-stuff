<?php

/**
 * Sans Index Sidebar
 *
 * This is the template that will display the sidebar on index templates.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */

?>
<?php if ( is_active_sidebar( 'sans-archives' ) ) : ?>
<aside class="sans-post-aside aside-widgets">

	<?php dynamic_sidebar( 'sans-archives' ); ?>

</aside>
<?php endif; ?>
