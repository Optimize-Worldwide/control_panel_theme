<?php global $checklist_id; ?>
<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="robots" content="noindex,nofollow"/>
		<title><?php wp_title(''); ?></title>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0"/>

		<?php
		global $site_logo;
		if ($site_logo): ?>
			<link rel="icon" href="<?php echo $site_logo; ?>" sizes="192x192">
			<link rel="icon" href="<?php echo $site_logo; ?>" sizes="160x160">
			<link rel="icon" href="<?php echo $site_logo; ?>" sizes="96x96">
			<link rel="icon" href="<?php echo $site_logo; ?>" sizes="16x16">
			<link rel="icon" href="<?php echo $site_logo; ?>" sizes="32x32">
		<?php else: ?>
			<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-57x57.png">
			<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-60x60.png">
			<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-72x72.png">
			<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-76x76.png">
			<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-114x114.png">
			<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-120x120.png">
			<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-144x144.png">
			<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-152x152.png">
			<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-180x180.png">
			<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/favicon-32x32.png" sizes="32x32">
			<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/android-chrome-192x192.png" sizes="192x192">
			<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/favicon-96x96.png" sizes="96x96">
			<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/favicon-16x16.png" sizes="16x16">
			<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/manifest.json">
			<meta name="msapplication-TileColor" content="#ffffff">
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/favicons/mstile-144x144.png">
			<meta name="theme-color" content="#ffffff">
		<?php endif; ?>
		<meta name="msapplication-TileColor" content="#01aef0">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/favicons/mstile-144x144.png">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

		<script src="<?php echo get_template_directory_uri(); ?>/library/js/ZeroClipboard.js"></script>
		<script defer src="<?php echo get_template_directory_uri(); ?>/library/js/jquery.sticky.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/fitter-happier-text.js"></script>
		<script defer src="<?php echo get_template_directory_uri(); ?>/library/js/jquery.fastLiveFilter.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/masonry.pkgd.min.js"></script>
		<script defer src="<?php echo get_template_directory_uri(); ?>/library/js/pushy.min.js"></script>

	<?php
	$time = current_time("H");
	$minutes = current_time("i");
	$minutes = $minutes /60;
	$time = $time + $minutes;
	$class = "";
	global $lightness;
	if ($time > "7" and $time <= "12") {
		// Morning
		//Sets base to 0, normalizes (4 is highest possible)
		$x = (($time - 8) / 4) * 100;//Turns into percentage
		$hue = 262 - $x;//add to hue (gets oranger as later in morning)
		$lightness = $x;
		$saturation = 100 - $x;//gets less saturated
	} elseif($time > "12" and $time < "19") {
		$hue = 25;
		$x = 120 - ((($time - 12) / 7) * 100);
		$lightness = $x;
		$saturation = 120 - $x;
	} else {
		$x = 0;
		$lightness = $x;
		$saturation = 100;
	}

	if($lightness <= 40) $class .= " dark"; ?>
	<style>
	#container{
		background-color: hsl(<?php echo $hue; ?>, <?php echo $saturation; ?>%, <?php echo $lightness; ?>%);
		background-color: hsla(<?php echo $hue; ?>, <?php echo $saturation; ?>%, <?php echo $lightness; ?>%,0.8);
	}
	#loader {
		background-color: hsla(<?php echo $hue; ?>, <?php echo $saturation; ?>%, <?php echo $lightness; ?>%,0.8);
	}
	</style>
	</head>

	<body <?php body_class($class); ?>>
		<div id="loader"><span class="loading style-1"></span></div>

		<nav role="navigation" class="pushy pushy-left">
			<?php wp_nav_menu(array(
				'container' => false,
				'container_class' => 'menu cf',
				'menu' => __( 'The Main Menu', 'bonestheme' ),
				'menu_class' => 'nav top-nav cf',
				'theme_location' => 'main-nav',
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'depth' => 0,
				'fallback_cb' => '')); ?>
		</nav>
		<div class="site-overlay"></div>
		<div id="container">
			<header class="header" role="banner">
				<div id="quick_nav"></div>
				<div id="inner-header" class="wrap cf">
					<div class="menu-btn"><span></span>	<span></span>	<span></span></div>
					<!-- <h1 id="logo"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></h1> -->
					<div id="header-search">
						<?php echo get_search_form(); ?>
					</div>
				</div>
			</header>
