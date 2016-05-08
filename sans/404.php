<?php
get_header();
/**
 * Sans Theme 404 Page Template
 * 
 * You should only customize this template in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */ ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/404.css">
<div class="header">
<div class="page-heading">
<span class="title-left">Error:</span><span class="title-right">404</span><div class="clear"></div>
<div class="line-dot">
<div class="line white">
<div class="dot white">
</div>
</div>
</div>
</div>
<div class="page-subheading">Page not found. Bad link or a mistyped address?</div>
</div>
<?php get_footer(); ?>
