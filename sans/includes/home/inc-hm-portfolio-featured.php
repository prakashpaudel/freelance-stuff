<?php
/**
 * Sans Home Portfolio - Featured Work
 *
 * This template file contains the loop for the home portfolio featured work option.
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
$home_hero = of_get_option( 'sans_home_hero' );
$portfolio_header = of_get_option( 'sans_hm_portfolio_header' );
$portfolio_items = of_get_option( 'sans_hm_portfolio_feat_count' ); ?>

<section id="sans-hm-portfolio" class="sans-portfolio">
	<div class="wrapper">
		<?php if ( $home_hero == 1 ) {
			echo '<h2>' . esc_html( $portfolio_header ) . '</h2>';
		} else {
			echo '<h1>' . esc_html( $portfolio_header ) . '</h1>';
		} ?>
		
		<?php
		
		/**
 		 * Sans Home Portfolio Featured Work Loop
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
			'posts_per_page' => $portfolio_items,
			'orderby' => 'date',
			'order' => 'DESC',
			'portfolio-tags' => 'home-featured' 
			);
						
		$portfolio = new WP_Query( $args );
		
			if ( $portfolio -> have_posts() ) :
			
			echo '<ul class="portfolio-grid clear">';				
						
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
		
		<?php
		
		endwhile; echo '</ul>';
		
		else : echo '<p class="sans-error">' . __( 'It looks like you do not have any featured portfolio items.', 'designcrumbs' ) . '</p>';
		
		endif; wp_reset_query(); ?>
	</div>
</section>
