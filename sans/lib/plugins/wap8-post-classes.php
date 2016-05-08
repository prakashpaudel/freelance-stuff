<?php

/*
Plugin Name: Design Crumbs Post Class Styles
Plugin URI: http://www.designcrumbs.com
Description: This plugin will enable the stylesheet drop down option, in the WordPress editor, and add new class styles for block level elements.
Version: 1.0
Author: Jake Caputo
Author URI: http://www.designcrumbs.com
*/

/*-----------------------------------------------------------------------------------*/
/* Add stylesheet select dropdown to TinyMCE Editor
/*-----------------------------------------------------------------------------------*/

add_filter( 'mce_buttons_2', 'wap8_my_mce_buttons' );

function wap8_my_mce_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

/*-----------------------------------------------------------------------------------*/
/* Add Sans classes to stylesheet select dropdown in TinyMCE Editor
/*-----------------------------------------------------------------------------------*/

add_filter( 'tiny_mce_before_init', 'wap8_add_classes' );

function wap8_add_classes( $settings ) {

    $style_formats = array(
    	array(
    		'title' => __( 'Blue Button', 'designcrumbs' ),
    		'selector' => 'a',
    		'classes' => 'sans-button blue-button'
    	),
    	array(
    		'title' => __( 'Brown Button', 'designcrumbs' ),
    		'selector' => 'a',
    		'classes' => 'sans-button brown-button'
    	),
    	array(
    		'title' => __( 'Chrome Button', 'designcrumbs' ),
    		'selector' => 'a',
    		'classes' => 'sans-button chrome-button'
    	),
    	array(
    		'title' => __( 'Green Button', 'designcrumbs' ),
    		'selector' => 'a',
    		'classes' => 'sans-button green-button'
    	),
    	array(
    		'title' => __( 'Orange Button', 'designcrumbs' ),
    		'selector' => 'a',
    		'classes' => 'sans-button orange-button'
    	),
    	array(
    		'title' => __( 'Wine Button', 'designcrumbs' ),
    		'selector' => 'a',
    		'classes' => 'sans-button wine-button'
    	),
        array(
        	'title' => __( 'Half Column', 'designcrumbs' ),
        	'block' => 'div',
        	'classes' => 'sans-half-column',
        	'wrapper' => true
        ),
        array(
        	'title' => __( 'Half Column Last', 'designcrumbs' ),
        	'block' => 'div',
        	'classes' => 'sans-half-column-last',
        	'wrapper' => true
        ),
        array(
        	'title' => __( 'Third Column', 'designcrumbs' ),
        	'block' => 'div',
        	'classes' => 'sans-third-column-first',
        	'wrapper' => true
        ),
        array(
        	'title' => __( 'Third Column Middle', 'designcrumbs' ),
        	'block' => 'div',
        	'classes' => 'sans-third-column-middle',
        	'wrapper' => true
        ),
        array(
        	'title' => __( 'Third Column Last', 'designcrumbs' ),
        	'block' => 'div',
        	'classes' => 'sans-third-column-last',
        	'wrapper' => true
        ),
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}
