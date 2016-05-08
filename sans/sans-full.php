<?php

/*
Template Name: Full Width
*/

get_header();

/**
 * Sans Theme Full Width Page Template
 *
 * This is the full width page template.
 * 
 * You should only customize this template in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */
 
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

<section class="sans-articles full-width">
	<div class="wrapper">
		<div class="sans-articles-container">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'sans-img-resize' ); ?>>
				<?php the_content(); ?>
				
				<?php endwhile; endif; // end the loop ?>
			</article>
		</div>
	</div>
</section>

<?php get_footer(); ?>
