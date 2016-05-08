<?php
/**
 * Sans Theme Functions
 *
 * This file will contain all of the parent theme's custom functions. The majority of these
 * functions are fired inside of the wap8_theme_setup function.
 *
 * If you are developing a child theme, know that your child theme's function.php file will
 * execute before the parent. The majority of the Sans custom functions are pluggable functions.
 * This means that the parent theme will first check if the function exists before execution which
 * allows you the ability to override the function in your child theme.
 *
 * For more information visit http://codex.wordpress.org/Child_Themes#Using_functions.php
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */
 
/*-----------------------------------------------------------------------------------*/
/* Theme version cache
/*-----------------------------------------------------------------------------------*/

function wap8_version_cache() {
	// Theme version number for caching purposes
	return '1.1.0';
}

// Check for Options Framework Plugin
of_check();

require_once( get_template_directory() . "/lib/admin/support/support.php"); // Load support tab

function of_check() {
	if ( !function_exists('of_get_option') ) {
		add_action('admin_notices', 'of_check_notice');
	}
}

// The Admin Notice
function of_check_notice() { ?>
	<div class='updated fade'>
		<p><?php _e('The Options Framework plugin is required for this theme to function properly.', 'designcrumbs'); ?> <a href="<?php echo network_admin_url('plugin-install.php?tab=plugin-information&plugin=options-framework&TB_iframe=true&width=640&height=517'); ?>" class="thickbox onclick"><?php _e('Install now.', 'designcrumbs'); ?></a></p>
	</div>
<?php }

/* =================================== Options Framework =================================== */

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = 'false') {
	
	$optionsframework_settings = get_option('optionsframework');
	
	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
		
	if ( !empty($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}
 
add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');
 
function optionsframework_custom_scripts() { ?>
 
<script type="text/javascript">
jQuery(document).ready(function() {

	// adds support tab
	jQuery(".embed-themes").html("<iframe width='770' height='390' src='http://themes.designcrumbs.com/iframe/index.html'></iframe>");

});
</script>
 
<?php
}
 
/* Removes the code stripping */
 
add_action('admin_init','optionscheck_change_santiziation', 100);
 
function optionscheck_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'of_sanitize_textarea_custom' );
}
 
function of_sanitize_textarea_custom($input) {
    global $allowedposttags;
        $of_custom_allowedtags["embed"] = array(
			"src" => array(),
			"type" => array(),
			"allowfullscreen" => array(),
			"allowscriptaccess" => array(),
			"height" => array(),
			"width" => array()
		);
		$of_custom_allowedtags["script"] = array(
			"type" => array()
		);
		$of_custom_allowedtags["iframe"] = array(
			"height" => array(),
			"width" => array(),
			"src" => array(),
			"frameborder" => array(),
			"allowfullscreen" => array()
		);
		$of_custom_allowedtags["object"] = array(
			"height" => array(),
			"width" => array()
		);
		$of_custom_allowedtags["param"] = array(
			"name" => array(),
			"value" => array()
		);
 
	$of_custom_allowedtags = array_merge($of_custom_allowedtags, $allowedposttags);
	$output = wp_kses( $input, $of_custom_allowedtags);
	return $output;
}

/*-----------------------------------------------------------------------------------*/
/* Theme setup
/*-----------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'wap8_theme_setup' );

if ( !function_exists( 'wap8_theme_setup' ) ) {
	function wap8_theme_setup() {
	
		// Set the $content_width
		global $content_width;
		if ( !isset( $content_width ) ) $content_width = 1050;
		
		// Add custom editor styles
		add_editor_style();
		
		// Add the title tag
		add_theme_support( 'title-tag' );

		// Add theme support for automatic-feed-links
		add_theme_support( 'automatic-feed-links' );
	
		// Add theme support for post-formats
		add_theme_support( 'post-formats', array( 'image', 'quote', 'video', 'gallery', 'audio', 'status' ) );

		// Allow page excerpts
		add_post_type_support( 'page', 'excerpt' );
	
		// Add theme support for post-thumbnails
		add_theme_support( 'post-thumbnails' );
	
		// Register custom menus
		add_action( 'init', 'wap8_register_menus' );
	
		// Register sidebars
		add_action( 'widgets_init', 'wap8_register_sidebars' );
	
		// Register & enqueue javascripts
		add_action( 'wp_enqueue_scripts', 'wap8_theme_js' );
	
		// Register & enqueue stylesheets
		add_action( 'wp_enqueue_scripts', 'wap8_theme_css' );
	
		// Override mobile device viewport width
		add_action( 'wp_head', 'wap8_viewport_width' );
	
		// HTML5Shiv script
		add_action( 'wp_head', 'wap8_html5_shiv' );
		
		// Add favicon
		add_action( 'wp_head', 'wap8_favicon' );
		
		// Add Apple Touch Icon
		add_action( 'wp_head', 'wap8_touch_icon' );
	
		// Add Custom Default Gravatar
		add_filter( 'avatar_defaults', 'wap8_custom_gravatar' );
	
		// Remove default gallery shortcode inline styles
		add_filter( 'use_default_gallery_style', '__return_false' );
	
		// Load theme plugins
		if ( function_exists('of_get_option') ) {
			require_once( get_template_directory() . '/lib/plugins/wap8-custom-css.php' );
			require_once( get_template_directory() . '/lib/plugins/wap8-cpt-portfolio.php' );
			require_once( get_template_directory() . '/lib/plugins/wap8-custom-metaboxes.php' );
			require_once( get_template_directory() . '/lib/plugins/wap8-post-classes.php' );
			require_once( get_template_directory() . '/lib/plugins/wap8-password-form.php' );
		}
	
		// Load custom widgets
		require_once( get_template_directory() . '/widgets/wap8-widget-contact.php' );
		
		// Load textdomain for localization
		load_theme_textdomain( 'designcrumbs', get_template_directory() . '/languages' );

	}
}

/*-----------------------------------------------------------------------------------*/
/* Add images sizes during image upload
/*-----------------------------------------------------------------------------------*/

add_image_size( 'wap8-330x186', 406, 229, true );
add_image_size( 'wap8-810x608', 810, 608, true );
add_image_size( 'wap8-810-wide', 810, '', true );
add_image_size( 'wap8-1440-wide', 1440, '', true );

/*-----------------------------------------------------------------------------------*/
/* Register custom menus
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'wap8_register_menus' ) ) {
	function wap8_register_menus() {
		register_nav_menus(
			array(
				'sans-main-menu'   => __( 'Main Menu', 'designcrumbs' ),
				'sans-footer-menu' => __( 'Footer Menu', 'designcrumbs' ),
				'sans-social-menu' => __( 'Social Menu', 'designcrumbs' ),
			)
		);
	}
}

/*-----------------------------------------------------------------------------------*/
/* Register sidebars
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'wap8_register_sidebars' ) ) {
	function wap8_register_sidebars() {

		register_sidebar(
			array(
				'id'            => 'sans-archives',
				'name'          => __( 'Sidebar for Index Templates', 'designcrumbs' ),
				'description'   => __( 'Drag, drop, organize and save widgets for the sidebar that will appear on your index templates.', 'designcrumbs' ),
				'before_widget' => '<div id="%1$s" class="aside-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'sans-entries',
				'name'          => __( 'Sidebar for Single Templates', 'designcrumbs' ),
				'description'   => __( 'Drag, drop, organize and save widgets for the sidebar that will appear on your blog post single templates.', 'designcrumbs' ),
				'before_widget' => '<div id="%1$s" class="aside-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'sans-pages',
				'name'          => __( 'Sidebar for Page Templates', 'designcrumbs' ),
				'description'   => __( 'Drag, drop, organize and save widgets for the sidebar that will appear on your page templates.', 'designcrumbs' ),
				'before_widget' => '<div id="%1$s" class="aside-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'sans-contact',
				'name'          => __( 'Sidebar for Contact Page', 'designcrumbs' ),
				'description'   => __( 'Drag, drop, organize and save widgets for the sidebar that will appear on your custom contact page template.', 'designcrumbs' ),
				'before_widget' => '<div id="%1$s" class="aside-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'sans-footer',
				'name'          => __( 'Footer Widget Area', 'designcrumbs' ),
				'description'   => __( 'Drag, drop, organize and save widgets for the footer. A maximum of three widgets are recommended.', 'designcrumbs' ),
				'before_widget' => '<div id="%1$s" class="sans-third aside-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
			)
		);

	}
}

/*-----------------------------------------------------------------------------------*/
/* Register & enqueue javascripts
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'wap8_theme_js' ) ) {
	function wap8_theme_js() {
		if ( !is_admin() ) {
			// register javascripts
			wp_register_script( 'jquery-filterable', get_template_directory_uri() . '/js/jquery.filterable.js', array( 'jquery' ), wap8_version_cache(), true );
			wp_register_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.0', true );
			wp_register_script( 'jquery-flexslider', get_template_directory_uri() . '/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '2.2.2', true );
			wp_register_script( 'jquery-fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.pack.js', array( 'jquery' ), '2.0.6', true );
			wp_register_script( 'sans', get_template_directory_uri() . '/js/sans.js', array( 'jquery' ), wap8_version_cache(), true );
			
			// enqueue javascripts
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'jquery-filterable' );
			wp_enqueue_script( 'jquery-fitvids' );
			wp_enqueue_script( 'jquery-flexslider' );
			wp_enqueue_script( 'jquery-fancybox' );
			wp_enqueue_script( 'sans' );
			
			// enqueue comment reply JS
			if ( is_single() && comments_open() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );		
				
				

		}
	}
}

/*-----------------------------------------------------------------------------------*/
/* Register & enqueue stylesheets
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'wap8_theme_css' ) ) {
	function wap8_theme_css() {
		if ( !is_admin() ) {
			// register stylesheets
			wp_register_style( 'sans', get_stylesheet_uri(), '', wap8_version_cache(), 'screen' );
			wp_register_style( 'google-fonts', '//fonts.googleapis.com/css?family=Noticia+Text:400,400italic,700,700italic', array( 'sans' ), wap8_version_cache(), 'screen' );
			wp_register_style( 'fontawesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', array( 'sans' ), '4.0.3', 'screen' );
			wp_register_style( 'flexslider', get_template_directory_uri() . '/flexslider/flexslider.css', '', '2.0', 'screen' );
			wp_register_style( 'fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.css', '', '2.0.6', 'screen' );
			wp_register_style( 'sans-grayscale', get_template_directory_uri() . '/css/grayscale.css', array( 'sans' ), wap8_version_cache(), 'screen' );
			
			// enqueue stylesheet
			wp_enqueue_style( 'sans' );
			wp_enqueue_style( 'google-fonts' );
			wp_enqueue_style( 'fontawesome' );
			wp_enqueue_style( 'flexslider' );
			wp_enqueue_style( 'fancybox' );
			
			// enqueue alternate stylesheets
			if ( of_get_option( 'sans_alt_style' ) == 'sans-grayscale' ) {
				wp_enqueue_style( 'sans-grayscale' );
			}
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/* Override mobile device viewport width
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'wap8_viewport_width' ) ) {
	function wap8_viewport_width() {
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
	}
}

/*-----------------------------------------------------------------------------------*/
/* HTML5Shiv Script
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'wap8_html5_shiv' ) ) {
	function wap8_html5_shiv() {
?>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php
	}
}

/*-----------------------------------------------------------------------------------*/
/* Custom comments callback
/*-----------------------------------------------------------------------------------*/

function wap8_comments( $comment, $args, $depth ) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<div class="mugshot">
				<?php echo get_avatar( $comment, $size='50' ); ?>
			</div>
			
			<div class="comment-meta">
				<?php printf( __( '<address>%s</address>', 'designcrumbs' ), get_comment_author_link() ) ?>
			
				<time class="comment-date" datetime="<?php comment_date( 'Y-m-d' ); ?>"><?php printf( __( '%1$s &#64; %2$s', 'designcrumbs' ), get_comment_date(), get_comment_time() ) ?><a class="scroll-it" href="#comment-<?php comment_ID(); ?>" title="<?php esc_attr_e( 'Comment Permalink', 'notdivisible' ); ?>">#</a></time>
			</div>
			
			<p>
				<?php edit_comment_link( __( '&larr; Edit', 'designcrumbs' ), '<span>', '</span>' ); ?>
				<?php if ( $args['max_depth'] != $depth ) { ?>
				<span class="reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'designcrumbs' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
				<?php } ?>
			</p>
		</div>
 
		<div class="comment-body"><!-- Begin .comment-body -->			
			
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<p><em class="approval"><?php _e( 'Your comment is awaiting moderation.', 'designcrumbs' ) ?></em></p>
			<?php endif; ?>
			
			<?php comment_text(); ?>
		</div><!-- End .comment-body -->
	</div>
<?php
}

/*-----------------------------------------------------------------------------------*/
/* Custom trackbacks callback
/*-----------------------------------------------------------------------------------*/

function wap8_trackbacks( $comment ) {
$GLOBALS['comment'] = $comment; ?>
<li><?php printf( __( '%s', 'designcrumbs' ), get_comment_author_link() ) ?> <?php edit_comment_link( __( 'Edit', 'designcrumbs' ), '<span>', '</span>' ); ?>
<?php
}

/*----------------------------------------------------------------------------*/
/* WP Title
/*----------------------------------------------------------------------------*/

add_filter( 'wp_title', 'wap8_wp_title', 10, 2 );

function wap8_wp_title( $title, $sep ) {

	global $page, $paged;

	if ( is_feed() )
		return $title;
	
	// add the site name
	$title .= get_bloginfo( 'name' );

	// add site description
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_front_page() ) )
		$title = "$title $sep $site_description";

	// add page numbers on paged templates
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'designcrumbs' ), max( $paged, $page ) );

	return $title;

}

/*----------------------------------------------------------------------------*/
/* HTML5 Image Caption
/*----------------------------------------------------------------------------*/

add_filter( 'img_caption_shortcode', 'wap8_html5_image_caption', 10, 3 );

function wap8_html5_image_caption( $val, $attr, $content = null ) {

	extract( shortcode_atts( array(
		'id'      => '',
		'align'   => '',
		'width'   => '',
		'caption' => '',
	), $attr ) );

	if ( 1 > ( int ) $width || empty( $caption ) ) {

		return $val;

	}

	if ( $id )
		$id = 'id="' . esc_attr( $id ) . '" ';

	return '<figure ' . $id . 'class="wp-caption ' . esc_attr( $align ) . '">' . do_shortcode( $content ) . '<figcaption class="wp-caption-text">'  . $caption . '</figcaption></figure>';

}

/*-----------------------------------------------------------------------------------*/
/* Add odd or even to alternating post_class()
/*-----------------------------------------------------------------------------------*/

add_filter ( 'post_class' , 'wap8_post_class' );

global $current_class;
$current_class = 'odd';

function wap8_post_class ( $classes ) { 
   global $current_class;
   $classes[] = $current_class;

   $current_class = ( $current_class == 'odd' ) ? 'even' : 'odd';

   return $classes;
}

/*-----------------------------------------------------------------------------------*/
/* Add rel attribute to fancybox gallery anchors
/*-----------------------------------------------------------------------------------*/

add_filter( 'wp_get_attachment_link' , 'wap8_add_gallery_rel' );

function wap8_add_gallery_rel( $attachment_link ) {

	global $post;
	
	$attachment_link = str_replace( '<a', '<a rel="fancybox-gallery-' . $post->ID . '"', $attachment_link );
	
	return $attachment_link;
}

/*-----------------------------------------------------------------------------------*/
/* Add Custom Favicon
/*-----------------------------------------------------------------------------------*/

function wap8_favicon() {

	$favicon = of_get_option( 'sans_favicon' );
	
	if ( !empty( $favicon ) ) {	
echo '<link rel="shortcut icon" href="' . esc_url( $favicon ) . '"/>' . "\n";	
	}
}

/*-----------------------------------------------------------------------------------*/
/* Add Custom Apple Touch Icon
/*-----------------------------------------------------------------------------------*/

function wap8_touch_icon() {

	$touch_icon = of_get_option( 'sans_apple_icon' );
	
	if ( !empty( $touch_icon ) ) {	
echo '<link rel="apple-touch-icon" href="' . esc_url( $touch_icon ) . '"/>' . "\n";	
	}
}

/*-----------------------------------------------------------------------------------*/
/* Add Custom Default Gravatar
/*-----------------------------------------------------------------------------------*/
	
function wap8_custom_gravatar( $avatar_defaults ) {
	$sans_gravatar = of_get_option( 'sans_gravatar' );
	if ( !empty( $sans_gravatar ) ) {
		$avatar_defaults[$sans_gravatar] = __( 'Custom Gravatar', 'designcrumbs' );
	}
	return $avatar_defaults;
}


/*-----------------------------------------------------------------------------------*/
/* Replace the MailChimp Form
/*-----------------------------------------------------------------------------------*/

function content_str_replace($content = ''){
$form = '<form method="post" id="mailchimp-form" action="">';
$form .= '<ul class="ul-no-style">';
$form .= '<li>Name <span class="red">*</span></li>';
$form .= '<li><input type="text" name="name" required></li>';
$form .= '<li>Email <span class="red">*</span></li>';
$form .= '<li><input type="text" name="email" required></li>';
$form .= '<li>Your industry <span class="red">*</span></li>';
$form .= '<li><input type="text" name="industry" required></li>';
$form .= '</ul>';
$form .= '<div class="mailchimp-button"><input type="image" src="'.get_template_directory_uri().'/images/download.png"></div>';
$form .= '</form>';
$form .= '<input type="image" alt="Submit" src="http://lokavasoftware.com/wp-content/themes/sans/images/download.png" class="yikes-easy-mc-submit-button yikes-easy-mc-submit-button-image yikes-easy-mc-submit-button-1 btn btn-primary  admin-logged-in">';
	
$content = str_replace('[mailchimp-form]', $form, $content);
return $content;
}
add_filter('the_content', 'content_str_replace', 10);




if( ! defined( YIKES_MAILCHIMP_EXCLUDE_STYLES ) ) {
   define( YIKES_MAILCHIMP_EXCLUDE_STYLES, true );
}

require_once( TEMPLATEPATH.'/pagination.php' );

function get_category_root_id($cat)
{
	$this_category = get_category($cat); // 取得当前分类
	while($this_category->category_parent) // 若当前分类有上级分类时，循环
	{
	$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
	}
	return $this_category->term_id; // 返回根分类的id号
}
