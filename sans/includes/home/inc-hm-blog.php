<?php

/**
 * Sans Home Blog Posts
 *
 * This template file contains the loop for the home blog posts.
 * 
 * You should only customize this template file in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */

// store options in a variable for later testing
$blog_header = of_get_option( 'sans_hm_blog_header' );
$blog_cat = of_get_option( 'sans_hm_blog_cat' );

?>

<section class="sans-hm-blog">
	<div class="wrapper sans-tres-column">
		<?php echo '<h2>' . esc_html( $blog_header ) . '</h2>'; ?>
		
		<?php
		/**
 		 * Home Blog Loop
		 *
		 * @package WordPress
		 * @subpackage Sans
		 * @since Sans 1.0.0
		 * @author Jake Caputo
		 *
		 */	
		
		$args = array(
			'posts_per_page'	=> 3,
			'cat'				=> $blog_cat,
			'orderby'			=> 'date',
			'order'				=> 'DESC',
			'ignore_sticky_posts'	=> 'true'
		);
		
		$home_blog = new WP_Query( $args );
					
		if ( $home_blog -> have_posts() ) : while ( $home_blog -> have_posts() ) : $home_blog -> the_post();
		?>
		<article class="sans-third">
			<?php the_title( '<h3><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h3>' ); ?>
			<p class="sans-byline"><?php the_time( get_option( 'date_format' ) ); ?></p>
			<?php the_excerpt(); ?>
			<p><a href="<?php the_permalink(); ?>"><?php _e( 'Continue &rarr;', 'designcrumbs' ); ?></a></p>
		</article>
		<?php endwhile; else : ?>
		<p class="sans-error"><?php _e( 'It seems we have not published any blog posts yet.', 'designcrumbs' ); ?></p>
		<?php endif; wp_reset_query(); ?>
	</div>
</section>
