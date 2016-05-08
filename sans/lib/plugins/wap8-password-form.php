<?php

/*
Plugin Name: Design Crumbs Post Password Form
Plugin URI: http://www.designcrumbs.com
Description: This plugin will modify the default post password form.
Version: 1.0.2
Author: Jake Caputo
Author URI: http://www.designcrumbs.com
*/

/*-----------------------------------------------------------------------------------*/
/* Modify the post password form
/*-----------------------------------------------------------------------------------*/

add_filter( 'the_password_form', 'wap8_custom_password_form' );

function wap8_custom_password_form() {
	global $post;
	
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$form =
	'<form class="wap8-protected-post-form" action="' . get_option( 'siteurl' ) . '/wp-login.php?action=postpass" method="post">
		<fieldset>
			<p>' . __( 'This post is password protected. To view it please enter your password below.', 'wap8lang' ) . '</p>
			<p><label for="' . $label . '">' . __( 'Enter Password', 'wap8lang' ) . '</label><input name="post_password" id="' . $label . '" type="password" /></p>
			<p><input type="submit" name="Submit" value="' . esc_attr__( 'Submit Password', 'wap8lang' ) . '" /></p>
		</fieldset>
	</form>
	';
	return $form;
}

?>
