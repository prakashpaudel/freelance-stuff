<?php
/*
Template Name: Blog Details
*/

/**
	
 * Sans mailChimp Template
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



$postID = get_the_ID();
$porg = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'full' ) ;
//print_r($porg);
$src = $porg[0];
if( !$src ) $src = get_template_directory_uri().'/images/tmp.png';
$cat = get_the_category();
?>
<div class="blog-detail-title clearfix">
	<div class="blog-detail-title-inner"><?php the_title()?></div>
</div>
<div class="blog-wrapper">
	<img src="<?php echo $src?>" alt="<?php the_title()?>" class="blog-item-details-img">
	<div class="blog-date text-center paddingT10">By  <?php the_author()?>, <?php the_time('j M Y');?></div>
	<div class="clearfix paddingT30">
    	<?php the_content()?>
    </div>
</div>


