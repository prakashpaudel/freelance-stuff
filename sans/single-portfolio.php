<?php

get_header();

/**
 * Sans Single Portfolio Template
 *
 * This is the case study page template that will display your custom case studies for each portfolio
 * item.
 * 
 * You should only customize this template in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */
 
// store options for later testing
$hm_portfolio_type = of_get_option( 'sans_hm_portfolio_type' );
$portfolio_type = of_get_option( 'sans_portfolio_filtering' );
$case_study = get_post_meta( $post->ID, '_wap8_case_type', true );
$client_name = get_post_meta( $post->ID, '_wap8_client_name', true );
$case_services = get_post_meta( $post->ID, '_wap8_case_services', true );
$project_url = get_post_meta( $post->ID, '_wap8_case_url', true );
$testimonial = get_post_meta( $post->ID, '_wap8_client_testimonial', true );
$testimonial_source = get_post_meta( $post->ID, '_wap8_client_testimonial_name', true );
$case_related = get_post_meta( $post->ID, '_wap8_case_related', true );
$related_heading = get_post_meta( $post->ID, '_wap8_case_related_heading', true );
?>

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

<div class="sans-content"><!-- Begin .sans-content -->

<section class="sans-articles">
	<div class="wrapper">
		<?php if ( $case_study == 'wap8_featured_img' ) { // if this is a hero image case study ?>
		<div class="sans-portfolio-feature">
			<?php the_post_thumbnail( 'wap8-1440-wide', array( 'title' => get_the_title() ) ); ?>
		</div>
		<?php } // end if this is a hero image case study ?>
		
		<div class="sans-articles-container">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'sans-case-study sans-portfolio-img' ); ?>>
				<?php
				
					if ( $case_study == 'wap8_portfolio_audio' || $case_study == 'wap8_portfolio_audio_img' ) { // if this is an audio portfolio item
						locate_template( '/includes/portfolio/inc-portfolio-audio.php', true, true );
					} // end if this is an audio portfolio item
					
					if ( $case_study == 'wap8_jq_slide' ) { // if this is jQuery slideshow case study
						locate_template( '/includes/portfolio/inc-portfolio-slide.php', true, true );
					} // end if this is jQuery slideshow case study
					
				?>
				
				<?php the_content(); ?>
			</article>
			
			<aside class="sans-case-aside aside-widgets">			
				<?php if ( !empty( $client_name ) ) { // if show client name
					echo '<div class="aside-widget">';
					echo '<h3>' . __( 'Client', 'designcrumbs' ) . '</h3>';
					echo '<p>' . esc_html( $client_name ) . '</p>';
					echo '</div>';
				} ?>
				
				<?php if ( $case_services == 'yes' ) { // if show services provided
					echo '<div class="aside-widget">';
					wap8_services();
					echo '</div>';
				} ?>
				
				<?php if ( !empty( $project_url ) ) { // if project contains an external URL
					echo '<div class="aside-widget">';
					echo '<h3>' . __( 'Production URL', 'designcrumbs' ) . '</h3>';
					echo '<p><a href="'. esc_url( $project_url ) . '">' . $project_url . ' <i class="fa fa-external-link"></i></a></p>';
					echo '</div>';
				} ?>
				
				<?php if ( !empty( $testimonial ) ) {
					echo '<div class="aside-widget">';
					echo '<h3>' . __( 'Client Testimonial', 'designcrumbs' ) . '</h3>';
					echo '<blockquote><p>&#147;'. esc_html( $testimonial ) . '&#148;</p>';
						if ( !empty( $testimonial_source ) ) {
							echo '<p class="testimonial-source">' . $testimonial_source;
								if ( !empty( $client_name ) ) { echo '<span>, ' . esc_html( $client_name ) . '</span>'; }
							echo '</p>';
						}
					echo '</blockquote>';
					echo '</div>';
				} ?>
				
				<?php if ( $case_related == 'yes' ) { ?>
				<div class="aside-widget">
					<?php
						echo '<h3>' . esc_html( $related_heading ) . '</h3>';
					
						locate_template( '/includes/portfolio/inc-portfolio-related.php', true, true );
					?>
				</div>
				<?php } ?>
				
				<div class="aside-widget last-widget">
				<?php if ( $hm_portfolio_type == 'all-filter' | $hm_portfolio_type == 'all-nofilter' ) { // if home page is portfolio page because it is displaying all items
					echo '<p><a class="sans-button default-button" href="' . home_url() . '" title="' . __( 'Portfolio', 'designcrumbs' ) . '"><i class="fa fa-arrow-left"></i> ' . __( 'Portfolio', 'designcrumbs' ) . '</a></p>';
				} else { // return to portfolio page
					echo '<p><a class="sans-button default-button" href="' . site_url( '/portfolio/' ) . '" title="' . __( 'Portfolio', 'designcrumbs' ) . '"><i class="fa fa-arrow-left"></i> ' . __( 'Portfolio', 'designcrumbs' ) . '</a></p>';
				} ?>
				</div>
			</aside>
		</div>
	</div>
</section>
<?php endwhile; endif; get_footer(); ?>
