<?php

/*
Template Name: Portfolio
*/

get_header();

/**
 * Sans Theme Portfolio Template
 *
 * This is the portfolio page template that will be displayed if you have your home page set to show
 * only featured portfolio items.
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
$portfolio_filter = of_get_option( 'sans_portfolio_filtering' );
$portfolio_header = of_get_option( 'sans_portfolio_header' ); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
<?php endwhile; endif; ?>

<div class="sans-content"><!-- Begin .sans-content -->

<section class="sans-portfolio">
	<div class="wrapper">
		<?php if ( !empty( $portfolio_header ) ) {
			echo '<hgroup><h2>' . $portfolio_header . '</h2></hgroup>'; } ?>
			
		<?php
		
			/**
 			 * Sans Filter Portfolio Navigation
			 *
			 * @package WordPress
			 * @subpackage Sans
			 * @since Sans 1.0.0
			 * @author Jake Caputo
			 *
			 */
		 
			if ( $portfolio_filter == 1 ) { // if filtering has been enabled on the portfolio page
				wap8_filter_portfolio();
			}
				
		?>
		
		<?php
		
		/**
 		 * Sans Portfolio Loop
		 *
		 * @package WordPress
		 * @subpackage Sans
		 * @since Sans 1.0.0
		 * @author Jake Caputo
		 *
		 */
		 
		$args = array(
			'post_type' => 'portfolio',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'orderby' => 'date',
			'order' => 'DESC'
			);
			
		if ( $portfolio_filter == 1 ) {
			$filterable = 'filter-portfolio';
		} else {
			$filterable = 'no-filtering';
		}
						
		$portfolio = new WP_Query( $args );
		
			if ( $portfolio -> have_posts() ) :
			
			echo '<ul id="' . $filterable . '" class="portfolio-grid clear">';				
						
				while ( $portfolio -> have_posts() ) : $portfolio -> the_post();

				$terms = get_the_terms( get_the_ID(), 'services' );
		?>
		
			<li id="post-<?php the_ID(); ?>" class="<?php foreach ( $terms as $term) { echo $term->slug . ' '; } ?>all">
				<div <?php post_class(); ?>>
					<?php if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'wap8-330x186', array( 'title' => get_the_title() ) ); ?></a>
					<?php } ?>
				</div>
			</li>
		
		<?php endwhile; echo '</ul>';
		
		else : echo '<p class="sans-error">' . __( 'It looks like you do not have any portfolio items.', 'designcrumbs' ) . '</p>';
		
		endif; wp_reset_query(); ?>	
	</div>
</section>

<?php get_footer(); ?>
