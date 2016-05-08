<?php

/**
 * Sans Status Post Format Loop Template Part
 *
 * This template contains the status post format loop template part.
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
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'sans-blog-post sans-blog-img' ); ?>>
	<section class="sans-entry sans-entry-<?php the_ID(); ?>">		
		<?php if ( !is_singular() && $title ) { // if this is not the single template
			the_title( '<h2 class="sans-entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' );
		} ?>
	
		<?php the_content(); ?>
		
		<p class="sans-byline"><?php _e( 'Posted by ', 'designcrumbs' ); the_author(); _e( ' on ', 'designcrumbs' ); ?><?php the_time( get_option( 'date_format' ) ); ?></p>
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
