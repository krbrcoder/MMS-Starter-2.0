<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title>
		<?php
		if ( is_archive() ) {
			post_type_archive_title(); echo ' | ';
		}
		elseif ( is_category() ) {
			single_cat_title(); echo ' | ';
		}
		else if ( !is_front_page() ) {
			echo the_title() . ' | ';
		} ?>
		<?php bloginfo( 'name' ); ?> <?php single_cat_title(); ?> | McGovern Medical School
	</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="TimdGzuLl1Yw4Dq45FMXkoWoVgJiZXFGs9itQCqhjXg" />
    <meta name="author" content="McGovern Medical School">
    <?php get_template_part('parts/head', 'favicon'); ?>

    <!--[if IE]>
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

    <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/library/respond/1.1.0/respond.min.js"></script>
      <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/selectivizr/1.0.2/selectivizr-min.js"></script>
    <![endif]-->


    <?php wp_head(); ?>
    <?php $themesitecolor = get_option( 'theme_site_color' );
      if ($themesitecolor == 'orange') { ?>
      <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/includes/orange-sass/style.css">
    <?php } else if ($themesitecolor == 'gray') { ?>
      <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/includes/gray-sass/style.css">
    <?php } else { ?>
      <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/includes/sass/style.css">
    <?php }
      $inject = get_option( 'theme_inject_header' );
      if (!empty($inject)) { echo stripslashes_deep($inject); }
      ?>
  </head>

	<body <?php body_class(); ?>>
    <div class="skip" role="navigation" aria-label="skip to main"><a href="#main" title="Jump to Main Content">Skip</a></div>

    <header id="header" role="banner" aria-label="header">
      <?php
		$serviceID = get_the_ID();
		//echo '<h3>' . $serviceID . '</h3>';
		$servicecf = get_post_custom($serviceID);
		if (isset($servicecf['_service_menu_service_exists'][0])) {
			$serviceexists = $servicecf['_service_menu_service_exists'][0];
			if ( $serviceexists == 'yes' ) {
				get_template_part('menus/menu', 'services');
			} else {
				get_template_part('menus/menu', 'mainmenu');
			}
		} else {
			get_template_part('menus/menu', 'mainmenu');
		} ?>
    </header>