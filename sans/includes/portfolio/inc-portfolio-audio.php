<?php
/**
 * Portfolio Audio Player
 *
 * This template file contains the audio player for the portfolio audio case study.
 * 
 * You should only customize this template file in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */

// store option for later testing
$case_study = get_post_meta( $post->ID, '_wap8_case_type', true );
?>

<?php if ( $case_study == 'wap8_portfolio_audio_img' ) { ?>
<div class="sans-audio-cover">
	<?php the_post_thumbnail( 'wap8-810-wide', array( 'title' => get_the_title() ) ); ?>
</div>
<?php } ?>