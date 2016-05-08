<?php
/*
Template Name: mailChimp
*/

/**
	
 * Sans mailChimp Template
 *
 * This is the single post template that will display the blog post entry.
 * You should only customize this template in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since San 1.0.0
 * @author Jake Caputo
 *
 */

get_header();


?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // check for post ?>
<section class="sans-page-title">
	<div class="wrapper">
		<div class="sans-page-title-inner">
			<hgroup>
				<?php the_title( '<h1>', '</h1>' ); ?>
			
				<?php if (has_excerpt()) the_excerpt(); ?>
			
			</hgroup>
		</div>
	</div>
</section>

<div class="sans-content"><!-- Begin .sans-content -->

<section class="sans-articles">
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
