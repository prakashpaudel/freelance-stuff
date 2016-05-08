<?php

/**
 * Sans Audio Post Format Loop Template Part
 *
 * This template contains the audio post format loop template part.
 *
 * You should only customize this template in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.1.0
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
		
		<?php if ( has_post_thumbnail() ) { // if a featured image has been set ?>
			<?php if ( !is_singular() ) { ?>
			<div class="sans-img-featured">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_post_thumbnail( 'wap8-810-wide', array( 'title' => $title ) ); ?></a>
			</div>
			<?php } else { ?>
			<div class="sans-img-featured">
				<?php the_post_thumbnail( 'wap8-810-wide', array( 'title' => $title ) ); ?>
			</div>
			<?php } ?>
		<?php } // end if a featured image has been set ?>
	
		<p class="sans-byline"><?php _e( 'Posted by ', 'designcrumbs' ); the_author(); _e( ' on ', 'designcrumbs' ); ?><?php the_time( get_option( 'date_format' ) ); ?></p>
	
		<?php the_content( __( 'Continue Reading', 'designcrumbs' ) ); ?>
		
		<?php
		
			$paginated_blog = array(
				'before'				=> '<p class="clear">',
				'after'					=> '</p>',
				'next_or_number'		=> 'next',
				'nextpagelink'			=> __( '<span class="alignright">Next Page &rarr;</span>', 'designcrumbs' ),
				'previouspagelink'		=> __( '<span class="alignleft">&larr; Previous Page</span>', 'designcrumbs' )
			);
			
			wp_link_pages( $paginated_blog );
		
		?>
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