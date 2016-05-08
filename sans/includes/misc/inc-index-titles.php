<?php

/**
 * Sans Index Page Titles
 *
 * This template file contains the page titles for the index template.
 * 
 * You should only customize this template file in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */

// store the blog page title from the settings
$blog_title = get_the_title( get_option( 'page_for_posts', true ) );
$cat_description = category_description(); ?>

<?php if ( is_category() ) { // if is category archive ?>

<section class="sans-page-title">
	<div class="wrapper">
		<div class="sans-page-title-inner">
			<hgroup>
				<h1><?php _e( 'Currently browsing ', 'designcrumbs' ); ?><?php single_cat_title(); ?><?php _e( ' Category', 'designcrumbs' ); ?></h1>
			
				<?php if ( $cat_description ) {
					echo '<h6>' . $cat_description . '</h6>';
				} ?>
			</hgroup>
		</div>
	</div>
</section>

<?php } else if ( is_tag() ) { // if is tag archive ?>

<section class="sans-page-title">
	<div class="wrapper">
		<div class="sans-page-title-inner">
			<h1><?php _e( 'Currently browsing Posts Tagged ', 'designcrumbs' ); ?>&#147;<?php single_tag_title(); ?>&#148;</h1>
		</div>
	</div>
</section>

<?php } else if ( is_day() ) { // if is archive of posts published on a specific day ?>

<section class="sans-page-title">
	<div class="wrapper">
		<div class="sans-page-title-inner">
			<h1><?php _e( 'Currently browsing Posts Published on ', 'designcrumbs' ); ?><?php the_time( 'F jS, Y' ); ?></h1>
		</div>
	</div>
</section>

<?php } else if ( is_month() ) { // if is archive of posts published during a specific month ?>

<section class="sans-page-title">
	<div class="wrapper">
		<div class="sans-page-title-inner">
			<h1><?php _e( 'Currently browsing Posts Published ', 'designcrumbs' ); ?><?php the_time( 'F Y' ); ?></h1>
		</div>
	</div>
</section>

<?php } else if ( is_year() ) { // if is archive of posts published during a specific year ?>

<section class="sans-page-title">
	<div class="wrapper">
		<div class="sans-page-title-inner">
			<h1><?php _e( 'Currently browsing Posts Published in ', 'designcrumbs' ); ?><?php the_time( 'Y' ); ?></h1>
		</div>
	</div>
</section>

<?php } else { // is blog landing page ?>

<section class="sans-page-title">
	<div class="wrapper">
		<div class="sans-page-title-inner">
			<?php echo '<h1>' . esc_html( $blog_title ) . '</h1>'; ?>
		</div>
	</div>
</section>

<?php } ?>
