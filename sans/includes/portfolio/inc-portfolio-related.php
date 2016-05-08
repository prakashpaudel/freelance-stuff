<?php
/**
 * Related Case Studies Loop
 *
 * This template file contains the related case studies loop.
 * 
 * You should only customize this template file in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */ ?>

<?php

	if ( 'portfolio' == get_post_type() ) {
	
		$terms = wp_get_post_terms( $post->ID, 'services' );
		if ( $terms ) {
			$terms_id = array();
			foreach( $terms as $individual_term ) $terms_id[] = $individual_term->term_id;
			
			$args = array(
				'tax_query' => array(
					array(
						'taxonomy'	=> 'services',
						'terms'		=> $terms_id,
						'operator'	=> 'IN'
					)
				),
				'post__not_in'		=> array( $post->ID ),
				'posts_per_page'	=> 2,
				'orderby' 			=> rand
			);
			
			$related_case = new WP_Query( $args );
			
			if ( $related_case->have_posts() ) {
			
				echo '<ul class="related-cases">';
				
				while ( $related_case -> have_posts() ) : $related_case -> the_post();
				
				?>
					<li id="post-<?php the_ID(); ?>">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'wap8-330x186', array( 'title' => get_the_title() ) ); ?></a>
						<?php the_title( '<a class="related-title" href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a>' ); ?>
					</li>
				<?php
				
				endwhile;
				
				echo '</ul>';
			
			}
			
			wp_reset_query();
		
		}
	
	}

?>
