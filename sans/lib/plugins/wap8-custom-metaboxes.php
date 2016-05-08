<?php

/*
Plugin Name: Sans Custom Metaboxes
Plugin URI: http://www.designcrumbs.com
Description: This plugin will add custom metaboxes to posts and pages where needed. This plugin works in conjunction with Custom Metaboxes and Fields for WordPress by @jaredatch, @norcross and @billerickson.
Version: 1.0.0
Author: Jake Caputo
Author URI: http://www.designcrumbs.com
*/

/**
 * Include and setup custom metaboxes and fields.
 *
 * @category Sans
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 *
 */
 
add_filter( 'cmb_meta_boxes', 'wap8_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */

function wap8_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_wap8_';
	
	$meta_boxes[] = array(
		'id'         => 'wap8_portfolio_metabox',
		'title'      => __( 'Portfolio Item Options', 'designcrumbs' ),
		'pages'      => array( 'portfolio', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => __( 'Client Name', 'designcrumbs' ),
				'desc' => __( 'Enter the client name associated with this project. Leave this field blank, if you do not wish to show a client name.', 'designcrumbs' ),
				'id'   => $prefix . 'client_name',
				'type' => 'text_medium',
			),
			array(
				'name' => __( 'Client Testimonial', 'designcrumbs' ),
				'desc' => __( 'Enter a client testimonial associated with this project. Leave this field blank, if you do not wish to show a client testimonial', 'designcrumbs' ),
				'id'   => $prefix . 'client_testimonial',
				'type' => 'textarea_small',
			),
			array(
				'name' => __( 'Client Testimonial Source', 'designcrumbs' ),
				'desc' => __( 'Enter the name of the client who provided the testimonial. Leave this option blank, if you do not wish to show a name.', 'designcrumbs' ),
				'id'   => $prefix . 'client_testimonial_name',
				'type' => 'text_medium',
			),
			array(
				'name'    => __( 'Select Case Study Type', 'designcrumbs' ),
				'desc'    => __( 'Select the case study type for this project. If you choose &#147;jQuery Slideshow&#148; you will be required to enter additional information in the <strong>Gallery Portfolio Item</strong> metabox.', 'designcrumbs' ),
				'id'      => $prefix . 'case_type',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __( 'No Hero Image', 'designcrumbs' ), 'value' => 'wap8_no_featured_img', ),
					array( 'name' => __( 'Hero Image', 'designcrumbs' ), 'value' => 'wap8_featured_img', ),
					array( 'name' => __( 'jQuery Slideshow', 'designcrumbs' ), 'value' => 'wap8_jq_slide', ),
					array( 'name' => __( 'Video', 'designcrumbs' ), 'value' => 'wap8_portfolio_video', ),
					array( 'name' => __( 'Audio Only', 'designcrumbs' ), 'value' => 'wap8_portfolio_audio', ),
					array( 'name' => __( 'Audio + Cover Image', 'designcrumbs' ), 'value' => 'wap8_portfolio_audio_img', ),
				),
			),
			array(
				'name'    => __( 'Services Provided', 'designcrumbs' ),
				'desc'    => __( 'Would you like to list the services provided&#63;', 'designcrumbs' ),
				'id'      => $prefix . 'case_services',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => __( 'Yes', 'designcrumbs' ), 'value' => 'yes', ),
					array( 'name' =>  __( 'No', 'designcrumbs' ), 'value' => 'no', ),
				),
			),
			array(
				'name' => __( 'Production URL', 'designcrumbs' ),
				'desc' => __( 'If there is an external URL associated with this project, enter it here. The theme will convert the URL into an anchor.', 'designcrumbs' ),
				'id'   => $prefix . 'case_url',
				'type' => 'text',
			),
			array(
				'name'    => __( 'Related Case Studies', 'designcrumbs' ),
				'desc'    => __( 'Would you like to list case studies similar to this one&#63;', 'designcrumbs' ),
				'id'      => $prefix . 'case_related',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => __( 'Yes', 'designcrumbs' ), 'value' => 'yes', ),
					array( 'name' =>  __( 'No', 'designcrumbs' ), 'value' => 'no', ),
				),
			),
			array(
				'name' => __( 'Related Case Heading', 'designcrumbs' ),
				'desc' => __( 'Enter the heading for your related case studies.', 'designcrumbs' ),
				'id'   => $prefix . 'case_related_heading',
				'std'  => __( 'Similar Projects', 'designcrumbs' ),
				'type' => 'text',
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'wap8_portfolio_gallery_metabox',
		'title'      => __( 'Gallery Portfolio Item&#58; jQuery Slideshow Settings', 'designcrumbs' ),
		'pages'      => array( 'portfolio' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => __( 'Enable Slideshow Autoplay', 'designcrumbs' ),
				'desc'    => __( 'Should this slideshow begin playing automatically&#63;', 'designcrumbs' ),
				'id'      => $prefix . 'gallery_slideshow_play',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => __( 'Yes', 'designcrumbs' ), 'value' => 'true', ),
					array( 'name' =>  __( 'No', 'designcrumbs' ), 'value' => 'false', ),
				),
			),
			array(
				'name'    => __( 'Enable Slideshow Looping', 'designcrumbs' ),
				'desc'    => __( 'Should this slideshow loop back to the first slide&#63;', 'designcrumbs' ),
				'id'      => $prefix . 'gallery_slideshow_loop',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => __( 'Yes', 'designcrumbs' ), 'value' => 'true', ),
					array( 'name' =>  __( 'No', 'designcrumbs' ), 'value' => 'false', ),
				),
			),
			array(
				'name' => __( 'Set Slideshow Timeout', 'designcrumbs' ),
				'desc' => __( 'Set the timeout duration, in milliseconds.', 'designcrumbs' ),
				'id'   => $prefix . 'gallery_slideshow_timeout',
				'type' => 'text_medium',
			),
			array(
				'name' => __( 'Set Animation Speed', 'designcrumbs' ),
				'desc' => __( 'Set the animation speed, in milliseconds.', 'designcrumbs' ),
				'id'   => $prefix . 'gallery_slideshow_speed',
				'type' => 'text_medium',
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'wap8_post_gallery_metabox',
		'title'      => __( 'Gallery Post Format&#58; Select Gallery Type and Options', 'designcrumbs' ),
		'pages'      => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => __( 'Enable Slideshow Autoplay', 'designcrumbs' ),
				'desc'    => __( 'Should this slideshow begin playing automatically&#63;', 'designcrumbs' ),
				'id'      => $prefix . 'gallery_slideshow_play',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => __( 'Yes', 'designcrumbs' ), 'value' => 'true', ),
					array( 'name' =>  __( 'No', 'designcrumbs' ), 'value' => 'false', ),
				),
			),
			array(
				'name'    => __( 'Enable Slideshow Looping', 'designcrumbs' ),
				'desc'    => __( 'Should this slideshow loop back to the first slide&#63;', 'designcrumbs' ),
				'id'      => $prefix . 'gallery_slideshow_loop',
				'type'    => 'radio_inline',
				'options' => array(
					array( 'name' => __( 'Yes', 'designcrumbs' ), 'value' => 'true', ),
					array( 'name' =>  __( 'No', 'designcrumbs' ), 'value' => 'false', ),
				),
			),
			array(
				'name' => __( 'Set Slideshow Timeout', 'designcrumbs' ),
				'desc' => __( 'Set the timeout duration, in milliseconds.', 'designcrumbs' ),
				'id'   => $prefix . 'gallery_slideshow_timeout',
				'type' => 'text_medium',
			),
			array(
				'name' => __( 'Set Animation Speed', 'designcrumbs' ),
				'desc' => __( 'Set the animation speed, in milliseconds.', 'designcrumbs' ),
				'id'   => $prefix . 'gallery_slideshow_speed',
				'type' => 'text_medium',
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'wap8_post_quote_metabox',
		'title'      => __( 'Quote Post Format&#58; Enter Quote, Source and Link', 'designcrumbs' ),
		'pages'      => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => __( 'Quote', 'designcrumbs' ),
				'desc' => __( 'Enter the quote for this post.', 'designcrumbs' ),
				'id'   => $prefix . 'quote_full',
				'type' => 'textarea_small',
			),
			array(
				'name' => __( 'Quote Author', 'designcrumbs' ),
				'desc' => __( 'Enter the name of the author of this quote. Leave this field blank, if you do not wish to display a name.', 'designcrumbs' ),
				'id'   => $prefix . 'quote_author',
				'type' => 'text_medium',
			),
		),
	);
	
	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'wap8_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function wap8_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once( get_template_directory() . '/lib/metabox/init.php' );

}
