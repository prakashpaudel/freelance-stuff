<?php

/**
 * Sans Single Template
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

<?php if ( have_posts() ) : // check for post ?>
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

<?php while ( have_posts() ) : the_post(); // execute the loop
	$category = get_the_category();
	$currentid=$category[0]->cat_ID;
	$parentid=$category[0]->category_parent;
	if( $parentid == 3 || $currentid == 3 ) {
		get_template_part( 'blog', '' );		
	} else if ( !get_post_format() ) {
	
		get_template_part( 'loop', 'standard' );
		
	} else {
	
		get_template_part( 'loop', get_post_format() );
		
	}

	//comments_template( '', true ); // load comments template
	
	endwhile;
	
	endif; // stop checking for posts ?>

	</div>
	
	<?php get_sidebar( 'sans-entries' ); ?>
</section>

<?php get_footer(); ?>
