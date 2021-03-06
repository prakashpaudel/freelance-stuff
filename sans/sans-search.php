<?php

/*
Template Name: Search
*/

get_header();

/**
 * Sans Theme Search Page Template
 *
 * This is the search page template that will be displayed if you create a dedicated archives page.
 * 
 * You should only customize this template in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */
 
// store page options in variables for later testing
$blog_title = get_the_title( get_option( 'page_for_posts', true ) );
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // start the loop ?>
<section class="sans-page-title">
	<div class="wrapper">
		<div class="sans-page-title-inner">
			<hgroup>
				<?php the_title( '<h1>', '</h1>' ); ?>
					
				<?php if (has_excerpt()) { ?>
				<h6>
					<?php the_excerpt(); ?>
				</h6>
				<?php } ?>
			</hgroup>
		</div>
	</div>
</section>

<div class="sans-content"><!-- Begin .sans-content -->

<section class="sans-articles">
	<div class="wrapper">
		<div class="sans-articles-container">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'articles-left sans-img-resize search-options' ); ?>>
				<?php the_content(); ?>
				
				<?php endwhile; endif; // end the loop ?>
				
				<?php get_search_form(); ?>
				
				<?php echo '<h2>' . __( 'More ways to Browse Content', 'designcrumbs' ) . '</h2>'; ?>
				
				<?php echo '<p>' . __( 'Search forms are not your thing&#63; We get that. That is why we have provided some useful links to content throughout our website.', 'designcrumbs' ) . '</p>'; ?>
				
				<?php if ( function_exists ( 'sm_list_popular_searches' ) ) {

					echo '<h3>' . __( 'Popular Search Keywords', 'designcrumbs' ) . '</h3>';
					
					sm_list_popular_searches();

				} ?>
				
				<?php echo '<h3>' . __( 'Recent Work', 'designcrumbs' ) . '</h3>'; ?>
				
				<?php
				
					$args = array (
						'post_type' => 'portfolio',
						'post_status' => 'publish',
						'posts_per_page' => 12,
						'orderby' => 'date',
						'order' => 'DESC'
					);
					
					$projects = new WP_Query( $args );
					
					if ( $projects -> have_posts() ) :
					
					echo '<ul>';				
						
					while ( $projects -> have_posts() ) : $projects -> the_post();

					$terms = get_the_terms( get_the_ID(), 'services' );
					
					?>
					<li>
						<?php the_title( '<a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a>' ); ?>
						<?php if ( $terms ) {
							$services = get_the_term_list( $post->ID, 'services', '&#40;', ', ', '&#41;' );
							echo strip_tags( $services );
						} ?>
					</li>
					<?php
					
					endwhile; echo '</ul>';
		
					else : echo '<p>' . __( 'It looks like you do not have any portfolio items.', 'designcrumbs' ) . '</p>';
		
					endif; wp_reset_query();
				
				?>
				
				<?php echo '<h3>' . $blog_title . __( ' Archives by Year', 'designcrumbs' ) . '</h3>'; ?>
				
				<?php
				
					$yearly = array(
						'type'				=> 'yearly',
						'limit'				=> 12,
						'show_post_count'	=> true
					);
					
					echo '<ul>';
					
						wp_get_archives ( $yearly );
						
					echo '</ul>';
				
				?>
				
				<?php echo '<h3>' . $blog_title . __( ' Archives by Month', 'designcrumbs' ) . '</h3>'; ?>
				
				<?php
				
					$monthly = array(
						'type'				=> 'monthly',
						'limit'				=> 12,
						'show_post_count'	=> true
					);
					
					echo '<ul>';
					
						wp_get_archives ( $monthly );
						
					echo '</ul>';
				
				?>
			</article>
		</div>
		<?php get_sidebar( 'sans-pages' ); ?>
	</div>
</section>

<?php get_footer(); ?>
