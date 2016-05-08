<?php

/**
 * Sans Home Hero Section
 *
 * This template file contains all of the options for the home page hero section.
 * 
 * You should only customize this template file in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */

// store options in a variable for later testing
$home_hero_type = of_get_option( 'sans_home_hero_type' );
$home_hero_img = of_get_option( 'sans_home_hero_img' );
$home_hero_txt = of_get_option( 'sans_hm_hero_txt' );
$home_hero_copy = of_get_option( 'sans_hm_hero_copy' );
$home_hero_bttn = of_get_option( 'sans_hm_hero_bttn' );
$home_hero_bttn_text = of_get_option( 'sans_hm_hero_link_txt' );
$home_hero_bttn_dest = of_get_option( 'sans_hm_hero_link_dest' );
$home_hero_bttn_pg = of_get_option( 'sans_hm_hero_link_pg' );
	if ( !empty( $home_hero_bttn_pg ) ) {
		$pg_url = get_permalink( $home_hero_bttn_pg );
	}
$hero_video = of_get_option( 'sans_hm_hero_video' );
$hero_video_m4v = of_get_option( 'sans_hm_hero_video_m4v' );
$hero_video_ogv = of_get_option( 'sans_hm_hero_video_ogv' );
$hero_video_webm = of_get_option( 'sans_hm_hero_video_webm' );
$hero_video_poster = of_get_option( 'sans_home_hero_video_poster' );
?>

<?php if ( $home_hero_type == 'hero-text' ) { // if text text only ?>

<section class="sans-hero-title">

	<div class="wrapper">

		<div class="sans-hero-title-inner">

			<?php echo '<h1>' . esc_html( $home_hero_txt ) . '</h1>'; ?>
			
			<?php if ( !empty( $home_hero_copy ) ) { // if hero copy is set 
				echo '<p>' . esc_html( $home_hero_copy ) . '</p>'; } ?>

			<?php if ( $home_hero_bttn == 1 ) : // if home hero call to action is enabled ?>

				<?php if ( $home_hero_bttn_dest == 'ext-pg' ) { // if link is pointing to another page ?> 

				<p><a class="sans-button default-button" href="<?php echo esc_url( $pg_url ); ?>" rel="bookmark"><?php echo esc_html( $home_hero_bttn_text ); ?></a></p>

				<?php } if ( $home_hero_bttn_dest == 'hm-portfolio' ) { // if link is pointing to home page portfolio ?>

				<p><a class="scroll-it sans-button default-button" href="#sans-hm-portfolio"><?php echo esc_html( $home_hero_bttn_text ); ?></a></p>

				<?php } ?>

			<?php endif; // stop checking for home hero call to action ?>

		</div>

	</div>

</section>

<?php } // end if text only ?>

<?php if ( $home_hero_type == 'hero-image-text-overlay' ) { // if background image with text overlay ?>

<style type="text/css">
	.sans-hero-title {
		background-image: url(<?php echo esc_url( $home_hero_img ); ?>);
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>

<section class="sans-hero-title">

	<div class="opaque-overlay">
	
		<div class="wrapper">

			<div class="sans-hero-title-inner">

				<?php echo '<h1>' . esc_html( $home_hero_txt ) . '</h1>'; ?>
			
				<?php if ( !empty( $home_hero_copy ) ) { // if hero copy is set 
					echo '<p>' . $home_hero_copy . '</p>'; } ?>

				<?php if ( $home_hero_bttn == 1 ) : // if home hero call to action is enabled ?>

					<?php if ( $home_hero_bttn_dest == 'ext-pg' ) { // if link is pointing to another page ?> 

					<p><a class="sans-button default-button" href="<?php echo esc_url( $pg_url ); ?>" rel="bookmark"><?php echo esc_html( $home_hero_bttn_text ); ?></a></p>

					<?php } if ( $home_hero_bttn_dest == 'hm-portfolio' ) { // if link is pointing to home page portfolio ?>

					<p><a class="scroll-it sans-button default-button" href="#sans-hm-portfolio"><?php echo esc_html( $home_hero_bttn_text ); ?></a></p>

					<?php } ?>

				<?php endif; // stop checking for home hero call to action ?>

			</div>

		</div>
	
	</div>

</section>

<?php } // end if background image with text overlay ?>

<?php if ( $home_hero_type == 'hero-text-video' ) { // if text and video ?>

<section class="sans-hero-title hero-video clear">

	<div class="wrapper">

		<div class="sans-hero-title-inner">

			<?php echo '<h1>' . esc_html( $home_hero_txt ) . '</h1>'; ?>
			
			<?php if ( !empty( $home_hero_copy ) ) { // if hero copy is set 
				echo '<p>' . $home_hero_copy . '</p>'; } ?>

			<?php if ( $home_hero_bttn == 1 ) : // if home hero call to action is enabled ?>

				<?php if ( $home_hero_bttn_dest == 'ext-pg' ) { // if link is pointing to another page ?> 

				<p><a class="sans-button default-button" href="<?php echo esc_url( $pg_url ); ?>" rel="bookmark"><?php echo esc_html( $home_hero_bttn_text ); ?></a></p>

				<?php } if ( $home_hero_bttn_dest == 'hm-portfolio' ) { // if link is pointing to home page portfolio ?>

				<p><a class="scroll-it sans-button default-button" href="#sans-hm-portfolio"><?php echo esc_html( $home_hero_bttn_text ); ?></a></p>

				<?php } ?>

			<?php endif; // stop checking for home hero call to action ?>

		</div>
		
		<div class="sans-hero-video">
		
			<?php echo wp_oembed_get( $hero_video ); ?>
		
		</div>

	</div>

</section>

<?php } // end if text and video ?>

<?php if ( $home_hero_type == 'hero-image-text-video' ) { // if text with video & background image ?>

<style type="text/css">
	.sans-hero-title {
		background-image: url(<?php echo esc_url( $home_hero_img ); ?>);
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>

<section class="sans-hero-title hero-video">

	<div class="opaque-overlay">

		<div class="wrapper">

			<div class="sans-hero-title-inner">

				<?php echo '<h1>' . esc_html( $home_hero_txt ) . '</h1>'; ?>
			
				<?php if ( !empty( $home_hero_copy ) ) { // if hero copy is set 
					echo '<p>' . $home_hero_copy . '</p>'; } ?>

				<?php if ( $home_hero_bttn == 1 ) : // if home hero call to action is enabled ?>

					<?php if ( $home_hero_bttn_dest == 'ext-pg' ) { // if link is pointing to another page ?> 

					<p><a class="sans-button default-button" href="<?php echo esc_url( $pg_url ); ?>" rel="bookmark"><?php echo esc_html( $home_hero_bttn_text ); ?></a></p>

					<?php } if ( $home_hero_bttn_dest == 'hm-portfolio' ) { // if link is pointing to home page portfolio ?>

					<p><a class="scroll-it sans-button default-button" href="#sans-hm-portfolio"><?php echo esc_html( $home_hero_bttn_text ); ?></a></p>

					<?php } ?>

				<?php endif; // stop checking for home hero call to action ?>

			</div>
		
			<div class="sans-hero-video">
		
				<?php if ( $hero_video ) { // if a oEmbed video has been set
				
					echo wp_oembed_get( $hero_video );
				
				} else { // otherwise, let's build the HTML5 video player
				
				?>
				
				<script type="text/javascript">
					(function($) {
						$(document).ready(function() {				
							$('#jquery_jplayer_hero').jPlayer({
								ready: function () {
									$(this).jPlayer('setMedia', {
										m4v:	'<?php echo esc_url( $hero_video_m4v ); ?>',
										ogv:	'<?php echo esc_url( $hero_video_ogv ); ?>',
										webmv:	'<?php echo esc_url( $hero_video_webm ); ?>',
										poster:	'<?php echo esc_url( $hero_video_poster ); ?>'
									});
								},
								size: {
									width:	'100%',
									height:	'auto'
								},
								swfPath: '<?php echo get_template_directory_uri() . '/js/jplayer/Jplayer.swf'; ?>',
								cssSelectorAncestor: '#jp_container_hero',
								supplied: 'm4v, ogv, webmv',
								volume: 0.5,
								ended: function() {
									$(this).jPlayer('setMedia', {
										m4v:	'<?php echo esc_url( $hero_video_m4v ); ?>',
										ogv:	'<?php echo esc_url( $hero_video_ogv ); ?>',
										webmv:	'<?php echo esc_url( $hero_video_webm ); ?>',	
										poster:	'<?php echo esc_url( $hero_video_poster ); ?>'
									});
								}
							});
						});
					})(jQuery);
				</script>
		
				<div id="jp_container_hero" class="jp-video"><!-- Begin #jquery_container_hero -->
		
					<div class="jp-type-single"><!-- Begin .jp-type-single -->
			
						<div id="jquery_jplayer_hero" class="jp-jplayer sans-video-screen"></div>
				
						<div id="jp_gui_hero" class="jp-gui sans-video-player jp-interface"><!-- Begin .jp-interface -->
				
							<ul class="jp-controls">
								<li><a href="#" class="jp-play" tabindex="1" title="<?php esc_attr_e( 'Play', 'designcrumbs' ); ?>"><?php _e( '<i class="fa fa-play"></i> <span class="screen-reader">Play</span>', 'designcrumbs' ); ?></a></li>
								<li><a href="#" class="jp-pause" tabindex="1" title="<?php esc_attr_e( 'Pause', 'designcrumbs' ); ?>"><?php _e( '<i class="fa fa-pause"></i> <span class="screen-reader">Pause</span>', 'designcrumbs' ); ?></a></li>
							</ul>
					
							<div class="jp-progress"><!-- Begin .jp-progress -->
								<div class="jp-seek-bar">
									<div class="jp-play-bar"></div>
								</div>
							</div><!-- End .jp-progress -->
					
							<div class="jp-current-time"></div>
					
							<div class="jp-volume-bar"><!-- Begin .jp-volume-bar -->
								<div class="jp-volume-bar-value"></div>
							</div><!-- End .jp-volume-bar -->
					
							<div class="player-volume">
								<i class="fa fa-volume-up"></i> <span class="screen-reader"><?php _e( 'Volume', 'designcrumbs' ); ?></span>
							</div>
				
						</div><!-- End .jp-interface -->
				
					</div><!-- End .jp-type-single -->
		
				</div><!-- End #jquery_container_hero -->
				
				<?php } ?>
		
			</div>

		</div>
	
	</div>

</section>

<?php } // end if text with video & background image ?>
