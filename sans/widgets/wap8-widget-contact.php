<?php

/*
Plugin Name: Contact Widget
Plugin URI: http://www.designcrumbs.com
Description: A widget that will display your contact information in your sidebar.
Version: 1.0.1
Author: Jake Caputo
Author URI: http://www.designcrumbs.com
*/

// Add function to widgets_init that'll load this widget 
add_action( 'widgets_init', 'wap8_contact_widget' );

// Register this widget
function wap8_contact_widget() {
	register_widget( 'wap8_Contact_Widget' );
}

// Extend WP_Widget by adding this widget class
class wap8_Contact_Widget extends WP_Widget {

	// Widget setup
	function wap8_Contact_Widget() {
		$widget_ops = array(
			'classname' => 'wap8_contact_widget',
			'description' => __( 'Display your contact information in your sidebar.', 'designcrumbs' )
			);
			
		$control_ops = array(
			'width' => 400,
			'height' => 350
			);
			
		parent::__construct( 'wap8-Contact-widget', __( 'Contact Widget', 'designcrumbs' ), $widget_ops, $control_ops );	
	}
	
	// Saved widget display
	function widget( $args, $instance ) {
		extract($args);
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		$text = apply_filters( 'widget_text', $instance['text'] );
		$phone = $instance['wap8_phone'];
		$fax = $instance['wap8_fax'];
		$email = $instance['wap8_email'];
		
		echo $before_widget;
		echo $before_title . $title . $after_title;
		
		echo $text;
		
		if ( $phone || $fax || $email ) {
		
			echo '<ul>';
			
				if ( $phone ) {
				
					echo '<li>' . __( '<strong>Phone: </strong>', 'designcrumbs' ) . esc_html( $phone ) . '</li>';
				
				}
				
				if ( $fax ) {
				
					echo '<li>' . __( '<strong>Fax: </strong>', 'designcrumbs' ) . esc_html( $fax ) . '</li>';
				
				}
				
				if ( $email ) {
				
					echo '<li>' . __( '<strong>Email: </strong>', 'designcrumbs' ) . '<a class="emailaddy">' . esc_html( $email ) . '</a></li>';
				
				}
			
			echo '</ul>';
		
		}		
		
		echo $after_widget;		
	}
	
	// Update widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['text'] = $new_instance['text'];
		$instance['wap8_phone'] = strip_tags( esc_attr( $new_instance['wap8_phone'] ) );
		$instance['wap8_fax'] = strip_tags( esc_attr( $new_instance['wap8_fax'] ) );
		$instance['wap8_email'] = strip_tags( esc_attr( $new_instance['wap8_email'] ) );
		return $instance;
	}
	
	// Widget form
	function form( $instance ) {
		$defaults = array(
			'title' => __( 'Your Name', 'designcrumbs' )
		);
		$text = esc_textarea( $instance['text'] );
		$instance = wp_parse_args( (array) $instance, $defaults );

		?>
		
		<p><?php _e( 'Use this widget to display your contact information. The <code>textarea</code> will process arbitrary HTML.', 'designcrumbs' ); ?></p>
		
		<p><strong><?php _e( 'Example Address Entry:', 'designcrumbs' ); ?></strong></p>
		
		<p><code><?php _e( '&lt;p&gt;7510 Sunsent Boulevard, Suite 1421&lt;br /&gt;Hollywood, CA 90046&lt;br/&gt;United States&lt;/p&gt;', 'designcrumbs' ); ?></code></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Your Name', 'designcrumbs' ); ?></label><br />
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title'];?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Address', 'designcrumbs' ); ?></label><br />
			<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $instance['text']; ?></textarea>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'wap8_phone' ); ?>"><?php _e( 'Your Phone Number', 'designcrumbs' ); ?></label><br />
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'wap8_phone' ); ?>" name="<?php echo $this->get_field_name( 'wap8_phone' ); ?>" value="<?php echo $instance['wap8_phone'];?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'wap8_fax' ); ?>"><?php _e( 'Your Fax Number', 'designcrumbs' ); ?></label><br />
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'wap8_fax' ); ?>" name="<?php echo $this->get_field_name( 'wap8_fax' ); ?>" value="<?php echo $instance['wap8_fax'];?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'wap8_email' ); ?>"><?php _e( 'Your Email Address', 'designcrumbs' ); ?></label><br />
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'wap8_email' ); ?>" name="<?php echo $this->get_field_name( 'wap8_email' ); ?>" value="<?php echo $instance['wap8_email'];?>" /><br/><?php _e( 'To avoid spam bots, enter your email address replacing the &#64; symbol with the English word, &#147;at&#148;. <strong>Example:</strong> hello at designcrumbs.com', 'designcrumbs' ); ?>
		</p>

		<?php	
	}
	
}

?>
