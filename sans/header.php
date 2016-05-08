<?php
/**
 * Sans Theme Header Template
 *
 * This is the header template that will display the opening and closing <head> tag, the
 * opening <html> and <body> tags as well as the main theme's navigation.
 * 
 * This template also includes the wp_head() function which will allow the theme and plugins
 * to fire the wp_head action hook. You should only customize this template in a child theme.
 *
 * @package WordPress
 * @subpackage Sans
 * @since Sans 1.0.0
 * @author Jake Caputo
 *
 */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/custom.css">

		<!-- Google Analytics integration -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-74127945-1', 'auto');
		  ga('send', 'pageview');
		</script>

		<?php
			if(is_page('Home')){
				?>
				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/index.css" media="screen" type="text/css" />
				<?php
			} else if(is_page('About Us')){
				?>
				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/about.css" media="screen" type="text/css" />
				<?php
			} else if(is_page('Our Process')){
				?>
				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/process.css" media="screen" type="text/css" />
				<?php
			} else if(is_page('Our Work')){
				?>
				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/work.css" media="screen" type="text/css" />
				<?php
			} else if(is_page('Why Build An App')){
				?>
				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/build.css" media="screen" type="text/css" />
				<?php
			} else if(is_page('FAQ')){
				?>
				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/faq.css" media="screen" type="text/css" />
				<?php
			} else if(is_page('Consulting')){
				?>
				<!-- Facebook Conversion Code for Refining idea Ad - Mobile/Desktop (Aus) -->
				<script>(function() {
				var _fbq = window._fbq || (window._fbq = []);
				if (!_fbq.loaded) {
				var fbds = document.createElement('script');
				fbds.async = true;
				fbds.src = 'https://connect.facebook.net/en_US/fbds.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(fbds, s);
				_fbq.loaded = true;
				}
				})();
				window._fbq = window._fbq || [];
				window._fbq.push(['track', '6040850783615', {'value':'0.00','currency':'AUD'}]);
				</script>
				<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6040850783615&amp;cd[value]=0.00&amp;cd[currency]=AUD&amp;noscript=1" /></noscript>

				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/consulting.css" media="screen" type="text/css" />
				<?php
			} else if(is_page('Consulting-Mobile')){
				?>
				<!-- Facebook Conversion Code for Refining idea Ad - Mobile/Desktop (Aus) -->
				<script>(function() {
				var _fbq = window._fbq || (window._fbq = []);
				if (!_fbq.loaded) {
				var fbds = document.createElement('script');
				fbds.async = true;
				fbds.src = 'https://connect.facebook.net/en_US/fbds.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(fbds, s);
				_fbq.loaded = true;
				}
				})();
				window._fbq = window._fbq || [];
				window._fbq.push(['track', '6040850783615', {'value':'0.00','currency':'AUD'}]);
				</script>
				<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6040850783615&amp;cd[value]=0.00&amp;cd[currency]=AUD&amp;noscript=1" /></noscript>

				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/consulting-mobile.css" media="screen" type="text/css" />
				<?php
			} else if(is_page('Building Your Very Own Minimum Viable Product')){
				?>
				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/build-own-mvp-mobile.css" media="screen" type="text/css" />
				<?php
			} else if(is_page('3 Sure-Fire strategies to Build Your App for Under $10K - Mobile')){
				?>
				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/report-mobile.css" media="screen" type="text/css" />
				<?php
			} else if(is_page('3 Simple Steps to build your App within budget')){
				?>
				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/report.css" media="screen" type="text/css" />
				<?php
			} else if(is_page('3 Simple Steps to build your App within budget – Mobile - US')){
				?>
				<!-- Facebook Conversion Code for 3 Simple steps - Mobile (US) -->
				<script>(function() {
				var _fbq = window._fbq || (window._fbq = []);
					if (!_fbq.loaded) {
						var fbds = document.createElement('script');
						fbds.async = true;
						fbds.src = '//connect.facebook.net/en_US/fbds.js';
						var s = document.getElementsByTagName('script')[0];
						s.parentNode.insertBefore(fbds, s);
						_fbq.loaded = true;
					}
				})();
				window._fbq = window._fbq || [];
				window._fbq.push(['track', '6038377405015', {'value':'0.00','currency':'AUD'}]);
				</script>
				<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6038377405015&amp;cd[value]=0.00&amp;cd[currency]=AUD&amp;noscript=1" /></noscript>
				
				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/report-simple-steps-us-mobile.css" media="screen" type="text/css" />
				<?php
			} else if(is_page('3 Simple Steps to build your App within budget – Mobile – AUS')){
				?>
				
				<!-- Facebook Conversion Code for 3 Simple steps - Mobile (Australia) -->
				<script>(function() {
					var _fbq = window._fbq || (window._fbq = []);
					if (!_fbq.loaded) {
						var fbds = document.createElement('script');
						fbds.async = true;
						fbds.src = '//connect.facebook.net/en_US/fbds.js';
						var s = document.getElementsByTagName('script')[0];
						s.parentNode.insertBefore(fbds, s);
						_fbq.loaded = true;
					}
				})();
					window._fbq = window._fbq || [];
					window._fbq.push(['track', '6038010316815', {'value':'0.00','currency':'AUD'}]);
				</script>
				<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6038010316815&amp;cd[value]=0.00&amp;cd[currency]=AUD&amp;noscript=1" /></noscript>
				

				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/report-simple-steps-us-mobile.css" media="screen" type="text/css" />
				<?php
			} else if(is_page('3 Simple Steps to build your App within budget – Mobile – PH')){
				?>
				
				<!-- Facebook Conversion Code for 3 Simple steps - Mobile (Phillipines) -->
				<script>(function() {
				var _fbq = window._fbq || (window._fbq = []);
					if (!_fbq.loaded) {
						var fbds = document.createElement('script');
						fbds.async = true;
						fbds.src = '//connect.facebook.net/en_US/fbds.js';
						var s = document.getElementsByTagName('script')[0];
						s.parentNode.insertBefore(fbds, s);
						_fbq.loaded = true;
					}
				})();
				window._fbq = window._fbq || [];
				window._fbq.push(['track', '6037369283415', {'value':'0.00','currency':'AUD'}]);
				</script>
				
				<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6037369283415&amp;cd[value]=0.00&amp;cd[currency]=AUD&amp;noscript=1" /></noscript>

				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/report-simple-steps-us-mobile.css" media="screen" type="text/css" />
				<?php
			} else if(is_page('3 Simple Steps to build your App within budget – Mobile - ENG')){
				?>
				
				<!-- Facebook Conversion Code for 3 Simple steps - Mobile (England) -->
				<script>(function() {
				var _fbq = window._fbq || (window._fbq = []);
					if (!_fbq.loaded) {
						var fbds = document.createElement('script');
						fbds.async = true;
						fbds.src = '//connect.facebook.net/en_US/fbds.js';
						var s = document.getElementsByTagName('script')[0];
						s.parentNode.insertBefore(fbds, s);
						_fbq.loaded = true;
					}
				})();
				window._fbq = window._fbq || [];
				window._fbq.push(['track', '6038377407615', {'value':'0.00','currency':'AUD'}]);
				</script>
				<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6038377407615&amp;cd[value]=0.00&amp;cd[currency]=AUD&amp;noscript=1" /></noscript>
								

				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/report-simple-steps-us-mobile.css" media="screen" type="text/css" />
				<?php
			} else if(is_page('3 Simple Steps to build your App within budget - Mobile')){
				?>
				<!-- Facebook Conversion Code for 3 Simple steps - Mobile -->
				<script>(function() {
					var _fbq = window._fbq || (window._fbq = []);
					if (!_fbq.loaded) {
						var fbds = document.createElement('script');
						fbds.async = true;
						fbds.src = '//connect.facebook.net/en_US/fbds.js';
						var s = document.getElementsByTagName('script')[0];
						s.parentNode.insertBefore(fbds, s);
						_fbq.loaded = true;
					}
					})();
					window._fbq = window._fbq || [];
					window._fbq.push(['track', '6037369283415', {'value':'0.00','currency':'AUD'}]);
				</script>
				<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6037369283415&amp;cd[value]=0.00&amp;cd[currency]=AUD&amp;noscript=1" /></noscript>

				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/report-simple-steps.css" media="screen" type="text/css" />
				<?php
			} else if (is_page('Report Download Success')){
				?>

				<?php echo '<!-- Facebook Pixel Code -->
				<!-- Facebook Conversion Code for 3-strategies-to-build-your-app-for-under-10k/ - Ad 1 -->
				<script>(function() {
				 var _fbq = window._fbq || (window._fbq = []);
				 if (!_fbq.loaded) {
				   var fbds = document.createElement("script");
				   fbds.async = true;
				   fbds.src = "//connect.facebook.net/en_US/fbds.js";
				   var s = document.getElementsByTagName("script")[0];
				   s.parentNode.insertBefore(fbds, s);
				   _fbq.loaded = true;
				 }
				})();
				window._fbq = window._fbq || [];
				window._fbq.push(["track", "6037060388415", {"value":"0.00","currency":"AUD"}]);
				</script>
				<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6037060388415&amp;cd[value]=0.00&amp;cd[currency]=AUD&amp;noscript=1" /></noscript>
				<!-- End Facebook Pixel Code -->'; ?>

				<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/3-strategies-10K-report-success.js"></script>
				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/report_success.css" media="screen" type="text/css" />
				<?php
			} else {
				?>
				<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/blog.css" media="screen" type="text/css" />
				<?php
			}
		?>
	</head>
	<body <?php body_class(); ?>>
		<header class="sans-masthead">
			<div class="wrapper clear">
				<div class="sans-logo">
					<?php if ( of_get_option( 'sans_logo' ) ) { ?>
					<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo of_get_option( 'sans_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
					<?php } else { ?>
					<p><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></p>
					<?php } ?>
				</div>
				
				<nav class="sans-main-menu">
				<?php wp_nav_menu(
				
				/**
	 			 * Sans Main Menu
	 			 *
	 			 * We are setting the maximum drop down depth to 2. If you require more than 2, edit this
	 			 * template in a child theme and change the depth to fit your particular needs. For example,
	 			 * if your require two drop down menus, you would change 'depth' => 3.
	 			 *
	 			 * @package WordPress
	 			 * @subpackage Sans
	 			 * @since Sans 1.0.3
	 			 * @author Jake Caputo
	 			 *
	 			 */
				
					array(
						'theme_location' => 'sans-main-menu',
						'container'      => false,
						'depth'          => 2,
						)
					);
						
				?>
				</nav>
			</div>
		</header>
