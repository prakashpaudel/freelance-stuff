<?php

/**
 * Sans Footer Widget Area
 *
 * This is the template that will display the widget area in the footer.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.3
 * @author Jake Caputo
 *
 */

?>
<?php if ( is_active_sidebar( 'sans-footer' ) ) : ?>
<aside class="sans-footer-widgets sans-tres-column aside-widgets">
	<div class="footer-widgets-columns clear">
		<?php dynamic_sidebar( 'sans-footer' ); ?>
	</div>
</aside>
<?php endif; ?>
