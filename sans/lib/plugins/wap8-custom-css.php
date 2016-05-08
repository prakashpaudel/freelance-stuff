<?php
/*
Plugin Name: Sans Custom Inline Styles from Theme Options
Plugin URI: http://www.designcrumbs.com
Description: This plugin will add custom inline styles as set in the Sans Theme Options.
Version: 1.0.0
Author: Jake Caputo
Author URI: http://www.designcrumbs.com
*/

/*-----------------------------------------------------------------------------------*/
/* Add Custom Inline Styles
/*-----------------------------------------------------------------------------------*/

if ( of_get_option( 'sans_custom_css' ) == 1 ) {
	add_action( 'wp_head', 'wap8_custom_css' );
	
	function wap8_custom_css() {
		// content link colors
		$sans_link_a = of_get_option( 'sans_link_a_color' );
		$sans_link_h = of_get_option( 'sans_link_h_color' );
		
		// color for header tags
		$sans_header_tag = of_get_option( 'sans_head_tag_color' );
		
		// button colors
		$sans_bttn_a = of_get_option( 'sans_bttn_color_a' );
		$sans_bttn_h = of_get_option( 'sans_bttn_color_h' );
		
		// masthead background
		$mhbg = of_get_option( 'sans_masthead_bg' );
		$mhbg_color = of_get_option( 'sans_masthead_color' );
		$mhbg_image = of_get_option ( 'sans_masthead_img' );
		$mhbg_img_rpt = of_get_option( 'sans_masthead_img_rpt' );
		$mhbg_img_pos = of_get_option( 'sans_masthead_img_pos' );
			if ( $mhbg_img_pos == 'top-left' ) {
				$bg_pos = 'left top';
			} if ( $mhbg_img_pos == 'top-right' ) {
				$bg_pos = 'right top';
			} if ( $mhbg_img_pos == 'top-center' ) {
				$bg_pos = 'center top';
			} if ( $mhbg_img_pos == 'bottom-left' ) {
				$bg_pos = 'left bottom';
			} if ( $mhbg_img_pos == 'bottom-right' ) {
				$bg_pos = 'right bottom';
			} if ( $mhbg_img_pos == 'bottom-center' ) {
				$bg_pos = 'center bottom';
			} if ( $mhbg_img_pos == 'center' ) {
				$bg_pos = 'center center';
			}
		
		// masthead link colors
		$mhlc_a = of_get_option( 'sans_mhm_a_color' );
		$mhlc_h = of_get_option( 'sans_mhm_h_color' );
		
		// hero text color
		$sans_hero_txt_color = of_get_option( 'sans_hm_pg_hero_color' );
		
		// portfolio filter drop down nav buttons
		$sans_port_filter_a = of_get_option( 'sans_filter_nav_color_a' );
		$sans_port_filter_h = of_get_option( 'sans_filter_nav_color_h' );
		
		// output styles
		echo '<!-- ' . __( 'Begin Sans Custom Styles from Theme Options', 'wap8lang' ) . ' -->' . "\n";
		echo '<style type="text/css" media="screen">' . "\n";
		
		// content link styles
		if ( !empty( $sans_link_a ) ) {
		?>
		a, a:visited {
			color: <?php echo $sans_link_a; ?>;
			border-color: <?php echo $sans_link_a; ?>;
		}
		<?php
		} if ( !empty( $sans_link_h ) ) {
		?>
		a:hover, a:active {
			color: <?php echo $sans_link_h; ?>;
			border-color: <?php echo $sans_link_h; ?>;
		}
		<?php
		}
		
		// color for header tags
		if ( !empty( $sans_header_tag ) ) {
		?>
		h1, h2, h3, h4, h5, h6 {
			color: <?php echo $sans_header_tag; ?>;
		}
		<?php
		}
		
		// masthead background styles
		if ( $mhbg == 1) {
		?>
		.sans-masthead {
			<?php if ( !empty( $mhbg_color ) ) { ?>
			background-color: <?php echo $mhbg_color; ?>;
			<?php } if ( !empty( $mhbg_image ) ) { ?>
			background-image: url(<?php echo $mhbg_image; ?>);
			background-repeat: <?php echo $mhbg_img_rpt; ?>;
			background-position: <?php echo $bg_pos; ?>;
			<?php } else { ?>
			background-image: none;
			<?php } ?>
		}
		<?php
		}
		
		// masthead link colors
		if ( !empty( $mhlc_a ) ) {
		?>
		.sans-masthead a, .sans-masthead a:visited {
			color: <?php echo $mhlc_a; ?>;
		}
		<?php
		}
		
		// home page hero text color
		if ( !empty( $sans_hero_txt_color ) ) {
		?>
		.sans-hero-text-overlay h1 {
			color: <?php echo $sans_hero_txt_color; ?>;
		}
		<?php
		}
		
		// button colors inactive and visited states
		if ( !empty( $sans_bttn_a ) ) {
		?>
		@media only screen and ( min-width: 320px ) and ( max-width: 573px ) {
			.sans-masthead li a, .sans-masthead li a:visited {
				background-color: <?php echo $sans_bttn_a; ?>;
			}
		} 
		
		@media only screen and ( min-width: 320px ) and ( max-width: 783px ) {
			.filter-trigger a, .filter-trigger a:visited,
			.has-js .sans-home-portfolio ul.filter_nav {
				background-color: <?php echo $sans_bttn_a; ?>; 
			}
		}
		<?php
		}
		
		// button colors hover and active states
		if ( !empty( $sans_bttn_h ) ) {
		?>
		@media only screen and ( min-width: 320px ) and ( max-width: 573px ) {
			.sans-masthead li a:hover, .sans-masthead li a:active {
				background-color: <?php echo $sans_bttn_h; ?>;
			}
		}
		<?php
		}
		
		// portfolio filter button color inactive and visited states
		if ( !empty( $sans_port_filter_a ) ) {
		?>
		@media only screen and ( min-width: 320px ) and ( max-width: 783px ) {
			.filter_nav li a, .filter_nav li a:visited {
				background-color: <?php echo $sans_port_filter_a; ?>;
			}
		}
		<?php
		}
		
		// portfolio filter button color hover and active states
		if ( !empty( $sans_port_filter_h ) ) {
		?>
		@media only screen and ( min-width: 320px ) and ( max-width: 783px ) {
			.filter_nav li a:hover, .filter_nav li a:active,
			.filter_nav li a.current {
				background-color: <?php echo $sans_port_filter_h; ?>;
			}
		}
		<?php
		}
		
		echo '</style><!-- ' . __( 'End Sans Custom Styles from Theme Options', 'wap8lang' ) . ' -->' . "\n";
	}
}
