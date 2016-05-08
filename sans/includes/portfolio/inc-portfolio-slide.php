<?php
/**
 * Portfolio jQuery Slideshow
 *
 * This template file contains the jQuery Slideshow for the portfolio gallery case study.
 * 
 * You should only customize this template file in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */

// store gallery slideshow options
$gallery = get_post_meta( $post->ID, '_wap8_gallery_slideshow', true );
$gallery_auto = get_post_meta( $post->ID, '_wap8_gallery_slideshow_play', true );
$gallery_loop = get_post_meta( $post->ID, '_wap8_gallery_slideshow_loop', true );
$gallery_timeout = get_post_meta( $post->ID, '_wap8_gallery_slideshow_timeout', true );
$gallery_speed = get_post_meta( $post->ID, '_wap8_gallery_slideshow_speed', true ); ?>

		<script type="text/javascript">
		(function($) {
			$(document).ready(function() {
				$(window).load(function() {
    				$('.sans-gallery-<?php the_ID(); ?>').flexslider({
    					animation			:	'slide',
    					slideshow			:	<?php echo $gallery_auto; ?>,
    					slidehowSpeed		:	<?php echo $gallery_timeout; ?>,
    					animationDuration	:	<?php echo $gallery_speed; ?>,
    					controlNav			:	false,
    					animationLoop		:	<?php echo $gallery_loop; ?>
    				});
    			});
			});
		})(jQuery);
		</script>
		
		<?php
		/**
		 * Loop through the image attachments on this post and return the thumbnail
		 * for a jQuery slideshow.
		 *
		 * @package WordPress
		 * @subpackage Sans
		 * @since San 1.0.0
		 * @author Jake Caputo
		 *
		 */
		 
		// store the query arguments in an array
 		$args = array(
 			'post_parent' => get_the_ID(),
 			'post_status' => 'inherit',
 			'post_type' => 'attachment',
 			'post_mime_type' => 'image',
 			'order' => 'DESC',
 			'orderby' => 'menu_order ID',
 			'posts_per_page' => -1
 		);
 		
 		$images = new WP_Query( $args );
 		
 			echo '<div class="sans-gallery-' . $post->ID . ' sans-slider"><ul class="slides">' . "\n";
 		
 			foreach ( $images->posts as $image ) {
 				echo '<li class="gallery-image-' . $image->ID . '">' . wp_get_attachment_image( $image->ID, 'wap8-810x608' ) . "\n";
 			}
 		
 			wp_reset_query();
 	
 			echo '</ul></div>' . "\n";
		?>
