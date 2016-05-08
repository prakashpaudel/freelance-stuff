<?php

/*
Template Name: Home
*/

get_header();

/**
 * Sans Theme Home Template
 *
 * This is the home page template that will be displayed if the Reading Settings have been set
 * to a static page.
 * 
 * You should only customize this template in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */
 
// store home page options in variables for later testing
$home_hero = of_get_option( 'sans_home_hero' );
$home_portfolio = of_get_option( 'sans_hm_portfolio' );
$home_portfolio_type = of_get_option( 'sans_hm_portfolio_type' );
$home_blog = of_get_option( 'sans_hm_blog' );

if ( $home_hero == 1 ) { // if home page hero section is enabled
	locate_template( '/includes/home/inc-hm-hero.php', true, true );
} // end if home page hero section is enabled

echo '<div class="sans-content"><!-- Begin .sans-content -->';

if ( $home_portfolio == 1 ) { // if home page portfolio is enabled
	if ( $home_portfolio_type == 'all-filter' || $home_portfolio_type == 'all-nofilter' ) : // if any of the all work options has been set
		locate_template( '/includes/home/inc-hm-portfolio-all.php', true, true );
	else :
		locate_template( '/includes/home/inc-hm-portfolio-featured.php', true, true );	
	endif; // end checking for portfolio type
} // end checking if home portfolio is enabled

if ( $home_blog == 1 ) { // if home page blog posts are enabled
	locate_template( '/includes/home/inc-hm-blog.php', true, true );
} // end checking if home page blog posts are enabled

get_footer(); ?>
