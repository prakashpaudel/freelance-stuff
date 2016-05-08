<?php
/*
Plugin Name: Sans Portfolio Custom Post Type
Plugin URI: http://www.designcrumbs.com
Description: This plugin will create a custom post type, named Portfolio, and an associated custom taxonomy, named Services.
Version: 1.0.0
Author: Jake Caputo
Author URI: http://www.designcrumbs.com
*/

/*-----------------------------------------------------------------------------------*/
/* Register "Services" taxonomy for portfolio custom post type
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'wap8_create_portfolio_taxonomies' );

function wap8_create_portfolio_taxonomies() {

	$labels = array(
		'name' => _x( 'Services', 'taxonomy general name', 'designcrumbs'),
		'singular_name' => _x( 'Service', 'taxonomy singular name', 'designcrumbs' ),
		'search_items' => __( 'Search Services', 'designcrumbs' ),
		'popular_items' => __( 'Popular Services', 'designcrumbs' ),
		'all_items' => __( 'All Services', 'designcrumbs' ),
		'parent_item' => __( 'Parent Service', 'designcrumbs' ),
		'edit_item' => __( 'Edit Service', 'designcrumbs' ),
		'update_item' => __( 'Update Service', 'designcrumbs' ),
		'add_new_item' => __( 'Add New Service', 'designcrumbs' ),
		'new_item_name' => __( 'New Service', 'designcrumbs' ),
		'separate_items_with_commas' => __( 'Separate Services with commas', 'designcrumbs' ),
		'add_or_remove_items' => __( 'Add or Remove Services', 'designcrumbs' ),
		'choose_from_most_used' => __( 'Choose from Most Used Services', 'designcrumbs' )
	);
	
	$args = array(
		'label' => __( 'Services', 'designcrumbs' ),
		'labels' => $labels,
		'public' => true,
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_nav_menus' => false,
		'args' => array( 'orderby' => 'term_order' ),
		'rewrite' => array( 'slug' => 'portfolio/services', 'with_front' => false ),
		'query_var' => true
	);
	
	register_taxonomy( 'services', 'portfolio', $args );
}

/*-----------------------------------------------------------------------------------*/
/* Register "Portfolio Tags" taxonomy for portfolio custom post type
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'wap8_create_portfolio_tags' );

function wap8_create_portfolio_tags() {

	$labels = array(
		'name' => _x( 'Portfolio Tags', 'taxonomy general name', 'designcrumbs' ),
		'singular_name' => _x( 'Portfolio Tag', 'taxonomy singular name', 'designcrumbs '),
		'search_items' => __( 'Search Portfolio Tags', 'designcrumbs' ),
		'popular_items' => __( 'Popular Portfolio Tags', 'designcrumbs' ),
		'all_items' => __( 'All Portfolio Tags', 'designcrumbs' ),
		'edit_item' => __( 'Edit Portfolio Tag', 'designcrumbs' ),
		'update_item' => __( 'Update Portfolio Tag', 'designcrumbs' ),
		'add_new_item' => __( 'Add New Portfolio Tag', 'designcrumbs' ),
		'new_item_name' => __( 'New Portfolio Tag', 'designcrumbs' ),
		'separate_items_with_commas' => __( 'Separate Portfolio Tags with commas', 'designcrumbs' ),
		'add_or_remove_items' => __( 'Add or Remove Portfolio Tags', 'designcrumbs' ),
		'choose_from_most_used' => __( 'Choose from Most Used Portfolio Tags', 'designcrumbs' )
	);
	
	$args = array(
		'label' => __( 'Portfolio Tags', 'designcrumbs' ),
		'labels' => $labels,
		'public' => true,
		'hierarchical' => false,
		'show_ui' => true,
		'show_in_nav_menus' => false,
		'show_tagcloud' => false,
		'args' => array( 'orderby' => 'term_order' ),
		'rewrite' => array( 'slug' => 'portfolio/portfolio-tags', 'with_front' => false ),
		'query_var' => true
	);
	
	register_taxonomy( 'portfolio-tags', 'portfolio', $args );
}

/*-----------------------------------------------------------------------------------*/
/* Register portfolio custom post type
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'wap8_register_portfolio' );

function wap8_register_portfolio() {

	$labels = array(
		'name' => _x( 'Portfolio', 'post type general name', 'designcrumbs' ),
		'singular_name' => _x( 'Portfolio', 'post type singular name', 'designcrumbs' ),
		'add_new' => _x( 'Add New Item', 'portfolio', 'designcrumbs' ),
		'add_new_item' => __( 'Add New Portfolio Item', 'designcrumbs' ),
		'edit' => __( 'Edit', 'designcrumbs' ),
		'edit_item' => __( 'Edit Portfolio Item', 'designcrumbs' ),
		'new_item' => __( 'New Portfolio Item', 'designcrumbs' ),
		'view' => __( 'View Portfolio Item', 'designcrumbs' ),
		'view_item' => __( 'View Portfolio Item', 'designcrumbs' ),
		'search_items' => __( 'Search Portfolio', 'designcrumbs' ),
		'not_found' => __( 'No Portfolio Items found', 'designcrumbs' ),
		'not_found_in_trash' => __( 'No Portfolio Items found in Trash', 'designcrumbs' )
	);
	
	$supports = array(
		'title',
		'editor',
		'thumbnail',
		'excerpt',
		'revisions',
		'author'
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
    	'show_ui' => true, 
    	'show_in_menu' => true, 
    	'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio', 'with_front' => false ),
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
    	'menu_position' => 7,
    	'supports' => $supports
	);
	
	register_post_type( 'portfolio', $args );

}

/*-----------------------------------------------------------------------------------*/
/* Update messages for portfolio custom post tyle
/*-----------------------------------------------------------------------------------*/
 
add_filter( 'post_updated_messages', 'wap8_portfolio_updated_messages' );

function wap8_portfolio_updated_messages( $messages ) {
	global $post, $post_ID;

	$messages['portfolio'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __( 'Portfolio Item updated. <a href="%s">View portfolio item</a>', 'designcrumbs' ), esc_url( get_permalink( $post_ID ) ) ),
		2 => __( 'Custom field updated.', 'designcrumbs' ),
		3 => __( 'Custom field deleted.', 'designcrumbs' ),
		4 => __( 'Portfolio Item updated.', 'designcrumbs' ),
		/* translators: %s: date and time of the revision */
		5 => isset( $_GET['revision'] ) ? sprintf( __( 'Portfolio Item restored to revision from %s', 'designcrumbs' ), wp_post_revision_title( ( int ) $_GET['revision'], false ) ) : false,
		6 => sprintf( __( 'Portfolio Item published. <a href="%s">View portfolio item</a>', 'designcrumbs' ), esc_url( get_permalink( $post_ID ) ) ),
		7 => __( 'Portfolio Item saved.', 'designcrumbs' ),
		8 => sprintf( __( 'Portfolio Item submitted. <a target="_blank" href="%s">Preview portfolio item</a>', 'designcrumbs' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
		9 => sprintf( __( 'Portfolio Item scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview portfolio item</a>', 'designcrumbs' ),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i', 'designcrumbs' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( __( 'Portfolio Item draft updated. <a target="_blank" href="%s">Preview portfolio item</a>', 'designcrumbs' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
	);

	return $messages;
}

/*-----------------------------------------------------------------------------------*/
/* Portfolio Help Tabs
/*-----------------------------------------------------------------------------------*/

add_action( 'load-post.php', 'wap8_portfolio_help_tabs' );
add_action( 'load-post-new.php', 'wap8_portfolio_help_tabs' );

function wap8_portfolio_help_tabs() {
	$screen = get_current_screen();
    
    if ( $screen->id != 'portfolio' ) return;
    
    $screen->add_help_tab( array(
    	'id'		=> 'wap8_help_portfolio_img',
		'title'		=> __( 'Featured Image', 'designcrumbs' ),
		'content'	=> wap8_portfolio_help_content( 'wap8_help_portfolio_img' )
		)
	);
	
	$screen->add_help_tab( array(
    	'id'		=> 'wap8_help_portfolio_options',
		'title'		=> __( 'Portfolio Item Options', 'designcrumbs' ),
		'content'	=> wap8_portfolio_help_content( 'wap8_help_portfolio_options' )
		)
	);
	
	$screen->add_help_tab( array(
    	'id'		=> 'wap8_help_portfolio_gallery',
		'title'		=> __( 'Gallery Portfolio Item', 'designcrumbs' ),
		'content'	=> wap8_portfolio_help_content( 'wap8_help_portfolio_gallery' )
		)
	);
	
	$screen->add_help_tab( array(
    	'id'		=> 'wap8_help_portfolio_video',
		'title'		=> __( 'Video Portfolio Item', 'designcrumbs' ),
		'content'	=> wap8_portfolio_help_content( 'wap8_help_portfolio_video' )
		)
	);
	
	$screen->add_help_tab( array(
    	'id'		=> 'wap8_help_portfolio_audio',
		'title'		=> __( 'Audio Portfolio Item', 'designcrumbs' ),
		'content'	=> wap8_portfolio_help_content( 'wap8_help_portfolio_audio' )
		)
	);
	
	$screen->add_help_tab( array(
    	'id'		=> 'wap8_help_portfolio_tax',
		'title'		=> __( 'Services &#38; Portfolio Tags', 'designcrumbs' ),
		'content'	=> wap8_portfolio_help_content( 'wap8_help_portfolio_tax' )
		)
	);
	
	$screen->add_help_tab( array(
    	'id'		=> 'wap8_help_support',
		'title'		=> __( 'Support &#38; User Guide', 'designcrumbs' ),
		'content'	=> wap8_portfolio_help_content( 'wap8_help_support' )
		)
	);
}

/*-----------------------------------------------------------------------------------*/
/* Portfolio Help Tabs Content
/*-----------------------------------------------------------------------------------*/

function wap8_portfolio_help_content( $tab = 'wap8_portfolio_featured_img' ) {
	if ( $tab == 'wap8_help_portfolio_img' ) {
		ob_start(); ?>
			<h2><?php _e( 'Featured Image', 'designcrumbs' ); ?></h2>
			<h3><?php _e( 'Recommended Minimum Dimensions', 'designcrumbs' ); ?></h3>
			<p><?php _e( 'Before you upload and set an image as featured, make sure the source image meets the minimum recommended dimensions of at least 1440px wide. The height is arbitrary but the width is important if you are going to set your Case Study Type to &#147;Featured Image&#148;. Any images smaller than the recommended width may become pixelated on desktop browsers.', 'designcrumbs' ); ?></p>
			<h3><?php _e( 'Recommended Aspect Ratio', 'designcrumbs' ); ?></h3>
			<p><?php _e( 'The cropping aspect ratio for portfolio thumbnails is 16&#58;9. If your source image meets this aspect ratio, your thumbnail will be resized proportionately. All other aspect ratios will be cropped from the center outwards to meet the theme&#39;s needs.', 'designcrumbs' ); ?></p>
		<?php
		return ob_get_clean();
	}
	
	if ( $tab == 'wap8_help_portfolio_options' ) {
		ob_start(); ?>
			<h2><?php _e( 'Portfolio Item Options', 'designcrumbs' ); ?></h2>
			<p><?php _e( 'All of the Portfolio Item Options are optional except for &#147;Select Case Study Type&#148;. You will need to set one of the available five options before publishing your portfolio item. For detailed information on how to publish your portfolio items, please refer to the User Guide included with your download package.', 'designcrumbs' ); ?></p>
		<?php
		return ob_get_clean();
	}
	
	if ( $tab == 'wap8_help_portfolio_gallery' ) {
		ob_start(); ?>
			<h2><?php _e( 'Gallery Portfolio Item', 'designcrumbs' ); ?></h2>
			<p><?php _e( 'If you have chosen to show a jQuery slideshow as your case study type, you will need to upload all of the images that will be shown in the slideshow. For detailed information on how to upload images for your gallery slideshow, please refer to the User Guide included with your download package.', 'designcrumbs' ); ?></p>
			<p><?php _e( 'Once you have set the autoplay and looping properties, you will need to set the timeout and animation speeds in milliseconds.', 'designcrumbs' ); ?> <a href="<?php echo esc_url( 'http://www.calculateme.com/Time/Seconds/ToMilliseconds.htm' ); ?>" target="_blank"><?php _e( 'Convert seconds into milliseconds', 'designcrumbs' ); ?></a>.</p>
		<?php
		return ob_get_clean();
	}
	
	if ( $tab == 'wap8_help_portfolio_video' ) {
		ob_start(); ?>
			<h2><?php _e( 'Video Portfolio Item', 'designcrumbs' ); ?></h2>
			<p><?php _e( 'Before you can publish a video portfolio item, you will need to copy and paste the URL of the video, from either Vimeo or YouTube, into the appropriate field.', 'designcrumbs' ); ?></p>
		<?php
		return ob_get_clean();
	}
	
	if ( $tab == 'wap8_help_portfolio_audio' ) {
		ob_start(); ?>
			<h2><?php _e( 'Audio Portfolio Item', 'designcrumbs' ); ?></h2>
			<p><?php _e( 'Before you can publish an audio portfolio item, you will need to copy and paste the URL of the audio files into the appropriate fields. The accepted file formats are MP3, M4A and OGG. At a minimum, you can paste either and MP3 or M4A file. Never include both of these formats at the same time. For maximum cross browser performance, we recommend including an OGG file.', 'designcrumbs' ); ?></p>
		<?php
		return ob_get_clean();
	}
	
	if ( $tab == 'wap8_help_portfolio_tax' ) {
		ob_start(); ?>
			<h2><?php _e( 'Services &#38; Portfolio Tags', 'designcrumbs' ); ?></h2>
			<h3><?php _e( 'Services', 'designcrumbs' ); ?></h3>
			<p><?php _e( 'Before you can publish a portfolio item, you must assign the item a service. The services are used to create the filter navigation on the portfolio page and to dynamically generate the related case studies. You can create your services here in the post editor or by clicking the Services link in the left menu under the Portfolio heading. Each item can be assigned multiple services.', 'designcrumbs' ); ?></p>
			<h3><?php _e( 'Portfolio Tags', 'designcrumbs' ); ?></h3>
			<p><?php _e( 'If you only showing Featured Portfolio Items on your home page, you will need to assign the &#147;Home Featured&#148; portfolio tags to the item.', 'designcrumbs' ); ?></p>
		<?php
		return ob_get_clean();
	}
	
	if ( $tab == 'wap8_help_support' ) {
		ob_start(); ?>
			<h2><?php _e( 'Support &#38; User Guide Links', 'designcrumbs' ); ?></h2>
			<p><a href="<?php echo esc_url( 'http://support.designcrumbs.com' ); ?>" target="_blank"><?php _e( 'Design Crumbs Customer Support Forum', 'designcrumbs' ); ?></a></p>			
		<?php
		return ob_get_clean();
	}
}

/*-----------------------------------------------------------------------------------*/
/* Add custom columns for portfolio custom post type
/*-----------------------------------------------------------------------------------*/

add_filter( 'manage_edit-portfolio_columns', 'wap8_custom_portfolio_columns' );

function wap8_custom_portfolio_columns( $portfolio_columns ) {
	$portfolio_columns = array(
		'cb' 				=> '<input type="checkbox" />',
		'title' 			=> _x( __( 'Portfolio Item', 'designcrumbs' ), 'column name' ),
		'author' 			=> __( 'Author', 'designcrumbs' ),
		'services' 			=> __( 'Services', 'designcrumbs' ),
		'portfolio_tags' 	=> __( 'Portfolio Tags', 'designcrumbs' ),
		'date' 				=> _x( __( 'Date', 'designcrumbs' ), 'column name' )
	);
	return $portfolio_columns;
}

/*-----------------------------------------------------------------------------------*/
/* Show "Services" taxonomies for portfolio custom post type in our custom columns
/*-----------------------------------------------------------------------------------*/

add_action( 'manage_posts_custom_column', 'wap8_portfolio_taxonomy_column' );

function wap8_portfolio_taxonomy_column( $portfolio_columns ) {
	global $post;
	
	switch ( $portfolio_columns ) {
		case 'services' :
			$taxonomy = __( 'services', 'designcrumbs' );
			$post_type = get_post_type( $post->ID );
			$services = get_the_terms( $post->ID, $taxonomy );
			if ( !empty( $services ) ) {
				foreach ( $services as $service )
				$post_terms[] = "<a href='edit.php?post_type={$post_type}&{$taxonomy}={$service->slug}'> " . esc_html( sanitize_term_field( 'name', $service->name, $service->term_id, $taxonomy, 'edit' ) ) . "</a>";
				echo join( ', ', $post_terms );
			} else echo __( '<i>No services.</i>', 'designcrumbs' );
		break;
	}
}

/*-----------------------------------------------------------------------------------*/
/* Show "Portfolio Tags" for portfolio custom post type in our custom columns
/*-----------------------------------------------------------------------------------*/

add_action( 'manage_posts_custom_column', 'wap8_portfolio_tag_column' );

function wap8_portfolio_tag_column( $tag_column ) {
	global $post;
	
	switch ( $tag_column ) {
		case 'portfolio_tags' :
			$taxonomy = __( 'portfolio-tags', 'designcrumbs' );
			$post_type = get_post_type( $post->ID );
			$portfolio_tags = get_the_terms( $post->ID, $taxonomy );
			if ( !empty( $portfolio_tags ) ) {
				foreach ( $portfolio_tags as $portfolio_tag )
				$post_terms[] = "<a href='edit.php?post_type={$post_type}&{$taxonomy}={$portfolio_tag->slug}'> " . esc_html( sanitize_term_field( 'name', $portfolio_tag->name, $portfolio_tag->term_id, $taxonomy, 'edit' ) ) . "</a>";
				echo join( ', ', $post_terms );
			} else echo __( '<i>No portfolio tags.</i>', 'designcrumbs' );
		break;
	}

}

/*-----------------------------------------------------------------------------------*/
/* Portfolio Filter Navigation
/*-----------------------------------------------------------------------------------*/

function wap8_filter_portfolio() {
	$services = get_terms( 'services' );
	$count = count( $services );
					
	if ( $count > 0 ) {
		echo '<nav class="filter-controls">';
		echo '<ul class="filter_nav clear">';
		echo '<li><a href="#all" title="' . __( 'All', 'designcrumbs' ) . '">' . __( 'All', 'designcrumbs' ) . '</a></li>';
		foreach ( $services as $service ) {
			echo '<li><a href="#' . $service->slug . '" title="' . $service->name . '">' . $service->name . '</a></li>';
		}
		echo '</ul>';
		echo '</nav>';
	}
}

/*-----------------------------------------------------------------------------------*/
/* Case Study Service lists
/*-----------------------------------------------------------------------------------*/

// services list without links
function wap8_services() {
	$terms = get_the_terms( get_the_ID(), 'services' );
					
	echo '<h3>' . __( 'Services Provided', 'designcrumbs' ) . '</h3>';
	echo '<ul>';
		foreach ( $terms as $term) {
		echo '<li>' . $term->name . '</li>';
		}
	echo '</ul>';
}
