<?php
/**
 * Sans Theme Footer
 *
 * This is the footer template that will display the closing <html> and <body> tags as well as the 
 * the theme's secondary navigation and copyright information.
 *
 * This template also contains the wp_footer() function which allows the theme and plugins to fire
 * the wp_footer action hook. You should only customize this template in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */
// store options for output
$callout = of_get_option( 'sans_callout' );
$callout_header = of_get_option( 'sans_callout_header' );
$callout_text = of_get_option( 'sans_callout_txt' );
$callout_button = of_get_option( 'sans_callout_button' );
$pg_url = get_permalink( of_get_option( 'sans_callout_link' ) );
$footer_links = of_get_option( 'sans_footer_links_header' );
$social_links = of_get_option( 'sans_footer_social_header' ); ?>
		</div><!-- End .sans-content -->
		
		<?php if ( $callout == 1 && !is_page( 'contact' ) ) { // if callout has been enabled and this is not the contact page ?>
		<section class="sans-quick-contact">
			<div class="wrapper">
				<div class="sans-quick-contact-info">
					<?php echo '<h2>' . esc_html( $callout_header ) . '</h2>'; ?>
					
					<?php				
						echo '<p>' . $callout_text . '</p>';
					
						echo '<p class="last-p"><a class="sans-button brown-button" href="' . esc_url( $pg_url ) . '">' . esc_html( $callout_button ) . ' <i class="fa fa-arrow-right"></i></a></p>'; 	
					?>
					
				</div>
			</div>
		</section>
		<?php } // end if callout has been enabled ?>
		
		<?php get_sidebar( 'sans-footer' ); ?>
		
		<footer class="sans-footer">
			<div class="footer-overlay">
				<div class="wrapper">
					<div class="footer-columns">	
						<!-- <section class="sans-footer-menu social-links">
							<?php //echo '<h4>' . esc_html( $social_links ) . '</h4>'; ?>
						
							<nav>
							<?php // wp_nav_menu(
//				
//							/**
//	 						 * Sans Social Menu
//	 						 *
//	 						 * We are setting the maximum drop down depth to 1. If you require more than 1, edit this
//	 						 * template in a child theme and change the depth to fit your particular needs. For example,
//	 						 * if your require one drop down menu, you would change 'depth' => 2.
//	 						 *
//	 						 * @package WordPress
//	 						 * @subpackage Sans
//	 						 * @since Sans 1.0.0
//	 						 * @author Jake Caputo
//	 						 *
//	 						 */
//				
//								array(
//									'theme_location' => 'sans-social-menu',
//									'container' => false,
//									'depth' => 1
//									)
//								);
//						
							?>
							</nav>
						</section> -->
					
						<!-- <section class="sans-footer-menu footer-links">
							<?php //echo '<h4>' . esc_html( $footer_links ) . '</h4>'; ?>
						
							<nav>
							<?php 
//							wp_nav_menu(
//				
//							/*
//	 						 * Sans Footer Menu
//	 						 *
//	 						 * We are setting the maximum drop down depth to 1. If you require more than 1, edit this
//	 						 * template in a child theme and change the depth to fit your particular needs. For example,
//	 						 * if your require one drop down menu, you would change 'depth' => 2.
//	 						 *
//	 						 * @package WordPress
//	 						 * @subpackage Sans
//	 						 * @since Sans 1.0.0
//	 						 * @author Jake Caputo
//	 						 */
//	 						 
//				
//								array(
//									'theme_location' => 'sans-footer-menu',
//									'container' => false,
//									'depth' => 1
//									)
//								);
//						
							?>
							</nav>
						</section> -->
			
						<section class="sans-copyright">
							<p><small>Sydney, Australia	&#124; <a href="mailto:info@lokavasoftware.com">info@lokavasoftware.com</a></small></p>
							<p><small><?php echo __( 'Copyright &#169; ', 'designcrumbs' ) . date( 'Y'); ?> <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>. <?php _e( 'All Rights Reserved.', 'designcrumbs' ); ?></small></p>
						</section>
					</div>
				</div>
			</div>
		</footer>
	<?php wp_footer(); // Do not delete this line or your world will come to an end ?>


	<!-- RocketBolt integration -->
	<script async src="//script.rocketbolt.com/rocket.js#oid=219&pid=253"></script>
	
	<script type="text/javascript">
function toggleProcess() {
	$('.process-header-section').toggleClass('active');
	$('.process-section-container').toggleClass('active');
	$("body, html").animate({ 
  	scrollTop: $('.process-header-section').offset().top 
  }, 600);
}
function toggleResults() {
	$('.results-header-section').toggleClass('active');
	$('.results-section-container').toggleClass('active');
	$("body, html").animate({ 
  	scrollTop: $('.results-header-section').offset().top 
  }, 600);
}
</script>

	</body>
</html>
