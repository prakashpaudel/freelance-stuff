<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace( "/\W/", "", strtolower( $themename ) );
	
	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {

	// Alternate Stylesheets
	$wap8_alt_styles = array(
		'sans-none'			=> __( 'None', 'designcrumbs' ),
		'sans-grayscale'	=> __( 'Grayscale', 'designcrumbs' )
	);
	
	// Home page hero settings
	$wap8_hm_hero = array(
		'hero-text' 				=> __( 'Text Only', 'designcrumbs' ),
		'hero-image-text-overlay' 	=> __( 'Text + Background Image', 'designcrumbs' ),
		'hero-text-video'			=> __( 'Text + Video', 'designcrumbs' ),
		'hero-image-text-video' 	=> __( 'Text + Video + Background Image', 'designcrumbs' )
	);
	
	// Home page hero cta link destination
	$wap8_hm_hero_link_dest = array(
		'ext-pg'		=> __( 'Another Page', 'designcrumbs' ),
		'hm-portfolio'	=> __( 'Home Page Portfolio', 'designcrumbs' )
	);
	
	// Home portfolio options
	$wap8_hm_portfolio_options = array(
		'all-filter'	=> __( 'All Work with Filter', 'designcrumbs' ),
		'all-nofilter'	=> __( 'All Work without Filter', 'designcrumbs' ),
		'featured-work'	=> __( 'Featured Work', 'designcrumbs' )
	);
	
	// Home portfolio feature posts
	$wap8_hm_portfolio_feat_count = array(
		'4'		=> __( 'Four &#40;4&#41;', 'designcrumbs' ),
		'8'		=> __( 'Eight &#40;8&#41;', 'designcrumbs' ),
		'12'	=> __( 'Twelve &#40;12&#41;', 'designcrumbs' )
	);
		
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ( $options_categories_obj as $category ) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = __( 'Select a page:', 'designcrumbs' );
	foreach ( $options_pages_obj as $page ) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// Image Radio Buttons
	$imagepath =  get_stylesheet_directory_uri() . '/images/';
		
	$options = array();
		
	/**
	 * Sans Global Settings
	 *
	 * @package WordPress
	 * @subpackage Sans
	 * @since Sans 1.0
	 * @author Jake Caputo
	 *
	 */
	
	$options[] = array( 'name' => __( 'Global Settings', 'designcrumbs' ),
						'type' => 'heading'
						);
						
	$options[] = array( 'name' => __( 'Select an Alternate Style', 'designcrumbs' ),
						'desc' => __( 'Select an alternate stylesheet. Select &#147;None&#148;, if you would like to use the default stylesheet or you are creating a custom child theme.', 'designcrumbs' ),
						'id' => 'sans_alt_style',
						'std' => 'sans-none',
						'type' => 'select',
						'options' => $wap8_alt_styles
						);
						
	$options[] = array( 'name' => __( 'Website Logo', 'designcrumbs' ),
						'desc' => __( 'Upload an image to use as your website&#146;s logo. The maximum width of your image should be 210px.', 'designcrumbs' ),
						'id' => 'sans_logo',
						'type' => 'upload'
						);
						
	$options[] = array( 'name' => __( 'Website Favicon', 'designcrumbs' ),
						'desc' => __( 'Upload an 16px x 16px image to use as your website&#146;s favicon.', 'designcrumbs' ),
						'id' => 'sans_favicon',
						'type' => 'upload'
						);
						
	$options[] = array( 'name' => __( 'Apple Touch Icon', 'designcrumbs' ),
						'desc' => __( 'Upload an 144px x 144px PNG image to use as your website&#146;s Apple Touch Icon.', 'designcrumbs' ),
						'id' => 'sans_apple_icon',
						'type' => 'upload'
						);
						
	$options[] = array( 'name' => __( 'Custom Default Gravatar', 'designcrumbs' ),
						'desc' => __( 'Upload an image to use as your custom default gravatar. This image will be added to the default avatar list in your Discussion Settings. The recommended maximum dimensions are 100px x 100px.', 'designcrumbs' ),
						'id' => 'sans_gravatar',
						'type' => 'upload'
						);
						
	/**
	 * Sans Home Page Hero Settings
	 *
	 * @package WordPress
	 * @subpackage Sans
	 * @since Sans 1.0
	 * @author Jake Caputo
	 *
	 */
	
	$options[] = array( 'name' => __( 'Home Page Hero Settings', 'designcrumbs' ),
						'type' => 'heading'
						);
						
	$options[] = array( 'name' => __( 'Enable Home Page Hero Section', 'designcrumbs' ),
						'desc' => __( 'Select this option to enable the home page hero section. Once enabled, you will able to customize the hero section in the following options.', 'designcrumbs' ),
						'id' => 'sans_home_hero',
						'std' => '0',
						'type' => 'checkbox'
						);
						
	$options[] = array( 'name' => __( 'Home Page Hero Section Type', 'designcrumbs' ),
						'desc' => __( 'Select the type of home page hero section you would like for your website.', 'designcrumbs' ),
						'id' => 'sans_home_hero_type',
						'std' => 'hero-image-text',
						'type' => 'select',
						'options' => $wap8_hm_hero
						);
						
	$options[] = array( 'name' => __( 'Home Page Hero Headline', 'designcrumbs' ),
						'desc' => __( 'Enter your home page hero headline. HTML is not allowed.', 'designcrumbs' ),
						'id' => 'sans_hm_hero_txt',
						'std' => '',
						'type' => 'textarea'
						);
						
	$options[] = array( 'name' => __( 'Home Page Hero Text', 'designcrumbs' ),
						'desc' => __( 'If you are displaying text only content, you can optionally include copy with your headline. Leave this option blank if you want to only show a headline. HTML is not allowed.', 'designcrumbs' ),
						'id' => 'sans_hm_hero_copy',
						'std' => '',
						'type' => 'textarea'
						);
						
	$options[] = array( 'name' => __( 'Enable Home Page Hero Button', 'designcrumbs' ),
						'desc' => __( 'Select this option to enable the home page hero button. Once enabled, you will able to customize the button in the following options.', 'designcrumbs' ),
						'id' => 'sans_hm_hero_bttn',
						'std' => '0',
						'type' => 'checkbox'
						);
						
	$options[] = array( 'name' => __( 'Home Page Hero Button Text', 'designcrumbs'),
						'desc' => __( 'Enter the text you would like for your home page hero button.', 'designcrumbs' ),
						'id' => 'sans_hm_hero_link_txt',
						'std' => '',
						'type' => 'text'
						);
						
	$options[] = array( 'name' => __( 'Home Page Hero Button Destination', 'designcrumbs' ),
						'desc' => __( 'Select the destination for your home page hero button. If you choose &#147;Another Page&#148;, you will be able to select the page in the next option. If you choose &#147;Home Page Portfolio&#148;, you will need to enable the home page portfolio in the Home Page Portfolio Settings tab.', 'designcrumbs' ),
						'id' => 'sans_hm_hero_link_dest',
						'std' => 'ext-pg',
						'type' => 'select',
						'options' => $wap8_hm_hero_link_dest
						);
						
	$options[] = array( 'name' => __( 'Select a Page for Home Hero Button', 'designcrumbs' ),
						'desc' => __( 'Select the page you would like to be linked to your home page hero button. This option will only work, if you have chosen &#147;Another Page&#148; as your destination.', 'designcrumbs' ),
						'id' => 'sans_hm_hero_link_pg',
						'std' => '',
						'type' => 'select',
						'options' => $options_pages
						);
						
	$options[] = array( 'name' => __( 'Home Page Hero Background Image', 'designcrumbs' ),
						'desc' => __( 'Upload a image to use as the background for your home page hero section. The recommended aspect ratio is 16&#58;9 and the minimum recommended dimensions are 1280px x 720px.', 'designcrumbs' ),
						'id' => 'sans_home_hero_img',
						'type' => 'upload'
						);
						
	$options[] = array( 'name' => __( 'Home Page Hero oEmbed Video', 'designcrumbs'),
						'desc' => __( 'Enter the oEmbed URL for your video. Only video services that support oEmbed are allowed. Leave this option blank if you are self hosting your video.', 'designcrumbs' ),
						'id' => 'sans_hm_hero_video',
						'std' => '',
						'type' => 'text'
						);
						
	$options[] = array( 'name' => __( 'Home Page Hero M4V Video', 'designcrumbs'),
						'desc' => __( 'Enter the URL for your M4V video.', 'designcrumbs' ),
						'id' => 'sans_hm_hero_video_m4v',
						'std' => '',
						'type' => 'text'
						);
						
	$options[] = array( 'name' => __( 'Home Page Hero OGV Video', 'designcrumbs'),
						'desc' => __( 'Enter the URL for your OGV video.', 'designcrumbs' ),
						'id' => 'sans_hm_hero_video_ogv',
						'std' => '',
						'type' => 'text'
						);
						
	$options[] = array( 'name' => __( 'Home Page Hero WebMv Video', 'designcrumbs'),
						'desc' => __( 'Enter the URL for your WebMv video.', 'designcrumbs' ),
						'id' => 'sans_hm_hero_video_webm',
						'std' => '',
						'type' => 'text'
						);
						
	$options[] = array( 'name' => __( 'Home Page Hero Video Poster', 'designcrumbs' ),
						'desc' => __( 'Upload a image to use as poster image for your self hosted video. The recommended aspect ratio is 16:9', 'designcrumbs' ),
						'id' => 'sans_home_hero_video_poster',
						'type' => 'upload'
						);
						
	/**
	 * Sans Home Page Portfolio Settings
	 *
	 * @package WordPress
	 * @subpackage Sans
	 * @since Sans 1.0.0
	 * @author Jake Caputo
	 *
	 */
	
	$options[] = array( 'name' => __( 'Home Page Portfolio Settings', 'designcrumbs' ),
						'type' => 'heading'
						);
						
	$options[] = array( 'name' => __( 'Enable Home Page Portfolio', 'designcrumbs' ),
						'desc' => __( 'Select this option to enable your home page portfolio. Once enabled, you will be able to select the type of portfolio to display, how many items to display and enter a heading.', 'designcrumbs' ),
						'id' => 'sans_hm_portfolio',
						'std' => '0',
						'type' => 'checkbox'
						);
						
	$options[] = array( 'name' => __( 'Select Home Portfolio Type', 'designcrumbs' ),
						'desc' => __( 'Select the type of portfolio you would like to display on your home page. The &#147;All Work&#148; options are best suited for websites without a home page hero section. <strong>If you choose either of the &#147;All Work&#148; options, your home page will become your portfolio page and you should not create a custom portfolio page.</strong>', 'designcrumbs' ),
						'id' => 'sans_hm_portfolio_type',
						'std' => '',
						'type' => 'select',
						'options' => $wap8_hm_portfolio_options
						);
						
	$options[] = array( 'name' => __( 'Featured Portfolio Items', 'designcrumbs' ),
						'desc' => __( 'If you have chosen to show your featured work on your home page, select the amount of featured portfolio items to display.', 'designcrumbs' ),
						'id' => 'sans_hm_portfolio_feat_count',
						'std' => '',
						'type' => 'select',
						'options' => $wap8_hm_portfolio_feat_count
						);
						
	$options[] = array( 'name' => __( 'Home Page Portfolio Header', 'designcrumbs'),
						'desc' => __( 'Enter the text you would like for your home page portfolio header.', 'designcrumbs' ),
						'id' => 'sans_hm_portfolio_header',
						'std' => __( 'Browse our Work', 'designcrumbs' ),
						'type' => 'text'
						);
						
	/**
	 * Sans Home Blog Settings
	 *
	 * @package WordPress
	 * @subpackage Sans
	 * @since Sans 1.0.0
	 * @author Jake Caputo
	 *
	 */
	 
	$options[] = array( 'name' => __( 'Home Blog Settings', 'designcrumbs' ),
						'type' => 'heading'
						);
						
	$options[] = array( 'name' => __( 'Enable Home Page Blog Posts', 'designcrumbs' ),
						'desc' => __( 'Select this option to enable your home page blog posts. Once enabled, you will be able to select the category to display and enter a heading.', 'designcrumbs' ),
						'id' => 'sans_hm_blog',
						'std' => '0',
						'type' => 'checkbox'
						);
						
	$options[] = array( 'name' => __( 'Home Page Blog Header', 'designcrumbs'),
						'desc' => __( 'Enter the text you would like for your home page blog header.', 'designcrumbs' ),
						'id' => 'sans_hm_blog_header',
						'std' => '',
						'type' => 'text'
						);
						
	$options[] = array( 'name' => __( 'Home Page Blog Category', 'designcrumbs' ),
						'desc' => __( 'Select the category for your home page blog post. A total of three of your most recent posts, from this category, will be displayed.', 'designcrumbs' ),
						'id' => 'sans_hm_blog_cat',
						'std' => '',
						'type' => 'select',
						'options' => $options_categories
						);
						
	/**
	 * Sans Portfolio Settings
	 *
	 * @package WordPress
	 * @subpackage Sans
	 * @since Sans 1.0.0
	 * @author Jake Caputo
	 *
	 */
	
	$options[] = array( 'name' => __( 'Portfolio Settings', 'designcrumbs' ),
						'type' => 'heading'
						);
						
	$options[] = array( 'name' => __( 'Enable Portfolio Filtering', 'designcrumbs' ),
						'desc' => __( 'Select this option to enable the filtering navigation on your portfolio page. Once enabled, your visitors will be able to filter your portfolio based on the services you have created. <strong>If you have decided to show all of your portfolio items on the home page, do not create a portfolio page. Your home page will be your portfolio page.</strong>', 'designcrumbs' ),
						'id' => 'sans_portfolio_filtering',
						'std' => '0',
						'type' => 'checkbox'
						);
						
	$options[] = array( 'name' => __( 'Portfolio Header', 'designcrumbs'),
						'desc' => __( 'Enter the text you would like for the header on the portfolio page. This text will appear above the thumbnail grid of your portfolio. Leave this option blank, if you do not wish to have a heading for your portfolio.', 'designcrumbs' ),
						'id' => 'sans_portfolio_header',
						'std' => __( 'Browse our Work', 'designcrumbs' ),
						'type' => 'text'
						);
						
	/**
	 * Sans Footer Settings
	 *
	 * @package WordPress
	 * @subpackage Sans
	 * @since Sans 1.0
	 * @author Jake Caputo
	 *
	 */
	
	$options[] = array( 'name' => __( 'Footer Settings', 'designcrumbs' ),
						'type' => 'heading'
						);
						
	$options[] = array( 'name' => __( 'Enable Callout Section', 'designcrumbs' ),
						'desc' => __( 'Select this option to enable the callout section of your website. Once enabled, this section will appear on every page of your website, except for the Contact Page, about the footer.', 'designcrumbs' ),
						'id' => 'sans_callout',
						'std' => '0',
						'type' => 'checkbox'
						);
						
	$options[] = array( 'name' => __( 'Callout Header', 'designcrumbs'),
						'desc' => __( 'Enter the text you would like for your callout header.', 'designcrumbs' ),
						'id' => 'sans_callout_header',
						'std' => '',
						'type' => 'text'
						);
						
	$options[] = array( 'name' => __( 'Callout Text', 'designcrumbs' ),
						'desc' => __( 'Enter your callout text. HTML is not allowed.', 'designcrumbs' ),
						'id' => 'sans_callout_txt',
						'std' => '',
						'type' => 'textarea'
						);
						
	$options[] = array( 'name' => __( 'Callout Button Text', 'designcrumbs'),
						'desc' => __( 'Enter the text you would like for your callout button.', 'designcrumbs' ),
						'id' => 'sans_callout_button',
						'std' => '',
						'type' => 'text'
						);
						
	$options[] = array( 'name' => __( 'Select a Page for Callout Button Link', 'designcrumbs' ),
						'desc' => __( 'Select the page you would like to use for your callout button link.', 'designcrumbs' ),
						'id' => 'sans_callout_link',
						'std' => '',
						'type' => 'select',
						'options' => $options_pages
						);
						
	$options[] = array( 'name' => __( 'Footer Links Header', 'designcrumbs'),
						'desc' => __( 'Enter the text you would like for your footer links header.', 'designcrumbs' ),
						'id' => 'sans_footer_links_header',
						'std' => __( 'Navigate', 'designcrumbs' ),
						'type' => 'text'
						);
						
	$options[] = array( 'name' => __( 'Social Links Header', 'designcrumbs'),
						'desc' => __( 'Enter the text you would like for your social links header.', 'designcrumbs' ),
						'id' => 'sans_footer_social_header',
						'std' => __( 'Socialize', 'designcrumbs' ),
						'type' => 'text'
						);
						
		// Support

	$options[] = array( "name" => __('Support', 'designcrumbs'),
						"type" => "heading");

	$options[] = array( "name" => __('Theme Documentation & Support', 'designcrumbs'),
						"desc" => "<p class='dc-text'>". __( 'Theme support and documentation is available for all ThemeForest customers. Visit <a target="blank" href="http://designcrumbstoo.ticksy.com">http://designcrumbstoo.ticksy.com</a>.', 'designcrumbs' ) ."</p>

						<div class='dc-buttons'>
							<a target='blank' class='dc-button help-button' href='". get_template_directory_uri() ."/changelog.txt'>
								<span class='dc-icon icon-changelog'>".  __( 'Changelog', 'designcrumbs' ) ."</span>
							</a>
							<a target='blank' class='dc-button help-button' href='http://support.designcrumbs.com/help_files/sanswp/'>
								<span class='dc-icon icon-help'>".  __( 'Help File', 'designcrumbs' ) ."</span>
							</a>
							<a target='blank' class='dc-button support-button' href='http://designcrumbstoo.ticksy.com'>
								<span class='dc-icon icon-support'>".  __( 'Theme Support', 'designcrumbs' ) ."</span>
							</a>
							<a target='blank' class='dc-button custom-button' href='http://support.designcrumbs.com/customizations/'>
								<span class='dc-icon icon-custom'>".  __( 'Customization Request', 'designcrumbs' ) ."</span>
							</a>
						</div>

						<h4 class='heading'>".  __( 'More Themes by Design Crumbs', 'designcrumbs' ) ."</h4>

						<div class='embed-themes'></div>

						",
						"type" => "info");
	 				
	return $options;
}
