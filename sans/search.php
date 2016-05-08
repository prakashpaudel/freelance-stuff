<?php

/**
 * Sans Search Template
 *
 * This is the search template that will display successful and failed search queries.
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
<?php global $post; if ( have_posts() ) : // we have results ?>
<section class="sans-page-title">
	<div class="wrapper">
		<div class="sans-page-title-inner">
			<hgroup>
				<h1><?php _e( 'Search results for ', 'designcrumbs' ); ?>&#147;<?php the_search_query(); ?>&#148;</h1>
				
				<?php
				
					$found = $wp_query->found_posts;
					
					if ( $found > 1 ) {
					
						$results = __( 'results', 'designcrumbs' );
					
					} else {
					
						$results = __( 'result', 'designcrumbs' );
					}
				
				
					echo '<h6>' . __( 'Found ', 'designcrumbs' ) . $found . __( ' possible ', 'designcrumbs' ) . $results . __( ' matching your query.', 'designcrumbs' ) . '</h6>'; ?>
			
			</hgroup>
		</div>
	</div>
</section>

<div class="sans-content"><!-- Begin .sans-content -->

<section class="sans-articles">
	<div class="wrapper">
		<div class="sans-articles-container">
			<?php echo '<h2>' . __( 'Browsing page ', 'designcrumbs' ) . $paged  . __( ' of ', 'designcrumbs' ) . $wp_query->max_num_pages . '</h2>'; ?>
			
			<ol class="sans-search-results">

<?php while ( have_posts() ) : the_post(); // execute the loop ?>

				<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php the_title( '<h3><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h3>' ); ?>
					
					<?php the_excerpt(); ?>
					
					<?php if ( $post->post_type == 'post' ) { ?>
						<p class="sans-byline"><?php _e( 'Posted by ', 'designcrumbs' ); the_author(); _e( ' on ', 'designcrumbs' ); ?><?php the_time( get_option( 'date_format' ) ); ?><?php _e( ' in ', 'designcrumbs' ); ?><?php the_category(', '); ?></p>
					<?php } ?>
				</li>

<?php endwhile; // end the loop & paginate

		echo '</ol>'; // closing odered list for search results

	$infinite = 999999999; // need an unlikely integer
	
	// store pagination arguments in an array
	$args = array(
		'base' => str_replace( $infinite, '%#%', esc_url( get_pagenum_link( $infinite ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'end_size' => 1,
		'mid_size' => 1,
		'prev_text' => __( 'Previous', 'dulce' ),
		'next_text' => __( 'Next', 'dulce' ),
		'type' => 'list'
	);

?>

			<div class="sans-pagination">
				<nav class="clear">
				<?php echo paginate_links( $args ) ?>
				</nav>
			</div>
		</div><!-- End .sans-article-container -->

<?php else : // whoops. no matches found for this query ?>

<section class="sans-page-title">
	<div class="wrapper">
		<div class="sans-page-title-inner">
			<hgroup>
				<h1><?php _e( 'Search results for ', 'designcrumbs' ); ?>&#147;<?php the_search_query(); ?>&#148;</h1>
				
				<?php echo '<h6>' . __( 'Found no possible results.', 'designcrumbs' ) . '</h6>'; ?>
			</hgroup>
		</div>
	</div>
</section>

<div class="sans-content"><!-- Begin .sans-content -->

<section class="sans-articles">
	<div class="wrapper">
		<div class="sans-articles-container">
			<p><?php _e( 'Unfortunately, we could not find any results for your search query. Perhaps the following suggestions can be helpful.', 'designcrumbs' ); ?></p>
			
			<ul>
				<li><?php _e( 'Make sure all of your keywords are spelled correctly.', 'designcrumbs' ); ?></li>
				<li><?php _e( 'Try fewer keywords.', 'designcrumbs' ); ?></li>
				<li><?php _e( 'Try using general keywords.', 'designcrumbs' ); ?></li>					
			</ul>
		</div>
<?php endif; // stop checking for posts ?>

<?php get_sidebar( 'sans-archives' ); ?>

	</div>
</section>

<?php get_footer(); ?>
