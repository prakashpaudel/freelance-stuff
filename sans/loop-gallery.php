<?php

/**
 * Sans Gallery Format Loop Template Part
 *
 * This template contains the gallery post format loop template part.
 *
 * You should only customize this template in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */

// store the title in a variable for conditional testing
$title = get_the_title();

// store gallery slideshow options
$gallery_auto = get_post_meta( $post->ID, '_wap8_gallery_slideshow_play', true );
$gallery_loop = get_post_meta( $post->ID, '_wap8_gallery_slideshow_loop', true );
$gallery_timeout = get_post_meta( $post->ID, '_wap8_gallery_slideshow_timeout', true );
$gallery_speed = get_post_meta( $post->ID, '_wap8_gallery_slideshow_speed', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'sans-blog-post sans-blog-img' ); ?>>
	<section class="sans-entry sans-entry-<?php the_ID(); ?>">
		<?php if ( !is_singular() && $title ) { // if this is not the single template
			the_title( '<h2 class="sans-entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' );
		} ?>
		
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
	
		<p class="sans-byline"><?php _e( 'Posted by ', 'designcrumbs' ); the_author(); _e( ' on ', 'designcrumbs' ); ?><?php the_time( get_option( 'date_format' ) ); ?></p>
	
		<?php the_content( __( 'Continue Reading', 'designcrumbs' ) ); ?>
	</section>
	
	<footer class="sans-post-meta sans-footer-<?php the_ID(); ?>">		
		<div class="sans-meta-section">
			<h4><i class="fa fa-pencil"></i> <?php _e( 'Posted in', 'designcrumbs' ); ?></h4>
		
			<?php the_category(); ?>
		</div>
		
		<?php if ( has_tag() ) { ?>
		<div class="sans-meta-section">
			<h4><i class="fa fa-tags"></i> <?php _e( 'Tagged', 'designcrumbs' ); ?></h4>
			
			<?php the_tags( '<ul><li>','</li><li>','</li></ul>' ); ?>
		</div>
		<?php } ?>
		
		<div class="sans-meta-section">
			<h4><i class="fa fa-comments"></i> <?php _e( 'Comments', 'designcrumbs' ); ?></h4>
		
			<p><a <?php if ( is_singular() ) { echo 'class="scroll-it" '; } ?>href="<?php the_permalink(); ?>#comments"><?php comments_number( __( 'No comments', 'designcrumbs' ), __( '1 comment', 'designcrumbs' ), __( '% comments', 'designcrumbs' ) ); ?></a></p>
		</div>
	</footer>
</article>
