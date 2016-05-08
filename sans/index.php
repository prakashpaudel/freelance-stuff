<?php

/**
 * Sans Main Index Template
 *
 * This is the main index template that will display the primary loop query.
 * You should only customize this template in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since San 1.0.0
 * @author Jake Caputo
 *
 */

get_header();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
?>

<?php global $post; if ( have_posts() ) : // check for posts and return appropriate page title
	locate_template( '/includes/misc/inc-index-titles.php', true, true );
?>

<div class="sans-content"><!-- Begin .sans-content -->
	<section class="sans-articles">
		<div class="wrapper">
			<div class="sans-articles-container">

<?php while ( have_posts() ) : the_post(); // execute the loop

	if ( !get_post_format() ) {
	
		get_template_part( 'loop', 'standard' );
		
	} else {
	
		get_template_part( 'loop', get_post_format() );
		
	}

endwhile; // end the loop & paginate 

	$infinite = 999999999; // need an unlikely integer
	
	// store pagination arguments in an array
	$args = array(
		'base' => str_replace( $infinite, '%#%', esc_url( get_pagenum_link( $infinite ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'end_size' => 1,
		'mid_size' => 1,
		'prev_text' => __( 'Previous', 'designcrumbs' ),
		'next_text' => __( 'Next', 'designcrumbs' ),
		'type' => 'list'
	);

?>

				<div class="sans-pagination">
					<nav class="clear">
					<?php echo paginate_links( $args ) ?>
					</nav>
				</div>

<?php else : // no posts have been published ?>

				<h2><?php _e('Uh oh. It looks like there aren\'t any posts yet.','designcrumbs') ?></h2>

<?php endif; // stop checking for posts ?>
			
			</div><!-- End .sans-article-container -->

<?php get_sidebar( 'sans-archives' ); ?>

		</div><!-- End .wrapper -->
	</section>

<?php get_footer(); ?>
