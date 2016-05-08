<?php
/*
Template Name: Blog
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

get_header();


?>


<section class="sans-page-title">
	<div class="wrapper">
		<div class="sans-page-title-inner">
			<hgroup>
				<h1><?php single_cat_title()?></h1>			
			</hgroup>
		</div>
	</div>
</section>

<div class="sans-content"><!-- Begin .sans-content -->

<section class="sans-articles">
	<div class="wrapper">
		<div class="sans-articles-container">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'sans-img-resize' ); ?>>
				<div class="header">
                    <div class="page-heading">
                        <div>BLOG</div>
                        <div class="clear"></div>
                        <div class="line-dot"><div class="line"><div class="dot"></div></div></div>
                    </div>
                </div>
            </article>
		</div>
        <div class="clear"></div>
                <a name="list"></a>
		<div id="sans-main-container" class="clearfix">
        	<div class="blog-left">
            	
                <?php $thiscat = get_category($cat); 
				if( $thiscat->name != 'Blog' ) :?>
				
                <div class="blog-sub-title">CATEGORY: <span><?php echo $thiscat ->name;?></span></div>
                <div class="clearfix paddingB20">
                	<div class="line-dot clearfix"><div class="line"><div class="dot"></div></div></div>
                </div>
                <?php endif;?>
                
                
                <div class="clearfix">
            	<?php
				while(have_posts()):the_post();
					$postID = get_the_ID();
					$porg = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'full' ) ;
					//print_r($porg);
					$src = $porg[0];
					if( !$src ) $src = get_template_directory_uri().'/images/tmp.png';
					$cat = get_the_category();
					
				?>
            	<div class="blog-item clearfix">
                	<div class="blog-item-head font-18">
                        <div class="blog-item-img"><img src="<?php echo $src?>" alt="<?php the_title()?>"></div>
                        <?php the_time('j M Y');?>
                    </div>
                    <div class="blog-item-content">
                    	<a href="<?php echo get_permalink()?>" class="blog-item-title"><?php the_title()?></a>
                        <div class="paddingT10 font-16">By <?php the_author()?></div>
                    	<div class="paddingT10 font-16"><?php the_content('');?></div>
                        <div class="clearfix text-right">
                        	<a class="more font-16" href="<?php echo get_permalink()?>">Read-more</a>
                        </div>
                    </div>
                </div>
                <?php	
				endwhile;			
				wp_reset_query();			
				?>
                </div>
                <div class="clearfix paddingT10" id="pagenav">
                	<?php echo oi_pagenavi();?>
                </div>
            </div>
            <div class="blog-right">
            	<div class="blog-sub-title">Latest Posts</div>
                <div class="clearfix">
                	<div class="line-dot clearfix"><div class="line"><div class="dot"></div></div></div>
                </div>
                <?php
                $args=array(
					'cat' => 3,
					'orderby' => 'id',
					'paged' => $paged,
					'order' => 'DESC',
					'showposts' => 3
				);
				query_posts($args);
				
				while(have_posts()):the_post();
					$postID = get_the_ID();
					$porg = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'full' ) ;
					//print_r($porg);
					$src = $porg[0];
					if( !$src ) $src = get_template_directory_uri().'/images/tmp.png';
				?>
                <div class="latest-item clearfix">
                	<div class="latest-img"><img src="<?=$src?>" alt="<?php the_title()?>"></div>
                    <div class="latest-des font-14">
                    	<div class="latest-des-inner">
                            <div class="latest-title"><a href="<?php echo get_permalink()?>" class="orange"><?php the_title()?></a></div>
                            <div class="latest-date"><?php the_time('j M Y');?></div>
                        </div>
                    </div>                     
                </div>
                <?php endwhile; wp_reset_query();	?>
                
            	<div class="blog-sub-title paddingT30">Categories</div>
                <div class="clearfix">
                	<div class="line-dot clearfix"><div class="line"><div class="dot"></div></div></div>
                </div>
                <div class="clearfix">
                	<ul class="ul-no-style blog-categires font-14" id="cat-list">
                	<?php
					wp_list_categories("child_of=3&depth=0&hide_empty=0&title_li=&show_count=1");	
					?>
                    </ul>
                </div>
                
            	<div class="blog-sub-title paddingT30">Our Newsletter</div>
                <div class="clearfix">
                	<div class="line-dot clearfix"><div class="line"><div class="dot"></div></div></div>
                </div>
                <div class="clearfix font-16 mailchimp">
                	
                    <p>Subscribe to our newsletter and stay up to date with all the latest and greatest tips, tricks and app development advice from Lokava</p>
                	<?php 
					/*query_posts('pagename=Blog Newsletter');
					while(have_posts()):the_post();
						the_content();
					endwhile;*/
					$content = '[yikes-mailchimp form="3"]';
					$content = apply_filters('the_content', $content);
					$content = str_replace(']]>', ']]>', $content);
					echo $content;
					?>
                </div>
            	<div class="blog-sub-title paddingT30">Blog Tags</div>
                <div class="clearfix">
                	<div class="line-dot clearfix"><div class="line"><div class="dot"></div></div></div>
                </div>
                <div class="clearfix font-14 tags" id="tags">
                	<?php 
					$args = array(
						'smallest' => '14',
						'largest' => '14',
						'unit'      => 'px',
					);
					wp_tag_cloud($args)?>
                </div>
            </div>
        </div>
    </div>    
</section>


<?php get_footer(); ?>
