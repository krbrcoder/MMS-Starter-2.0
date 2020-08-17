<?php

	// DEFINITIONS
	define( 'BASE', get_template_directory(). '/library' );
	define( 'THEME_URI', get_stylesheet_directory() );
	define( 'THEME_INCLUDE', THEME_URI . '/includes' );

	//Cleaning Head Section
	remove_action( 'wp_head', 'feed_links');
	remove_action( 'wp_head', 'feed_links_extra');
	remove_action( 'wp_head', 'rsd_link');
	remove_action( 'wp_head', 'wlwmanifest_link');
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head');
	remove_action( 'wp_head', 'noindex');
	remove_action( 'wp_head', 'wp_print_styles');
	remove_action( 'wp_head', 'wp_print_head_scripts');
	remove_action( 'wp_head', 'wp_generator');
	remove_action( 'wp_head', 'rel_canonical');
	remove_action( 'wp_head', 'wp_shortlink_wp_head');

	add_post_type_support( 'page', 'excerpt' );

	// Add All CPTs in Dashboard
//	require_once( THEME_INCLUDE . '/functions/cpt-dashboard.php');

	// INCLUDE HELPER CLASS for CPT
	require_once( BASE . '/helper_class/2.9.20/cuztom.php');

	//Include the CPTs for this theme
	include( THEME_INCLUDE. '/cpt/pages.php');
	include( THEME_INCLUDE. '/cpt/faculty.php');
	include( THEME_INCLUDE. '/cpt/posts.php');

  // INCLUDE CUSTOMIZER THEME OPTIONS
//  require THEME_INCLUDE . '/functions/custom-header.php';
//  require THEME_INCLUDE . '/functions/customizer.php';

	// INCLUDE BREADCRUMBS CLASS
	require_once( BASE. '/breadcrumbs/1.2/breadcrumbs.php');

	// INCLUDE NAV WALKER CLASS
	require_once( BASE. '/wp-bootstrap-navwalker/4.0.0.2/wp_bootstrap_navwalker.php');

	// INCLUDE UPDATED PAGINATION CLASS with Right classes for BS3+
	require_once( THEME_INCLUDE. '/functions/utms-pagination.php');

	// Showing CPT Archives on the Nav Menu System
	require_once( THEME_INCLUDE. '/functions/cpt-nav-menu.php');

	//Adding Support for Menus
	add_action( 'init', 'register_my_menus' );

	function register_my_menus() {
		register_nav_menus(
		array(
		'menu-1' => __( 'Main Nav' ),
		'menu-2' => __( 'Global Sidebar' ),
		'menu-3' => __( 'Faculty Sidebar' ),
		'menu-4' => __( 'Services 01 Main Nav' ),
		'menu-5' => __( 'Services 02 Main Nav' ),
		'menu-6' => __( 'Services 03 Main Nav' ),
		'menu-7' => __( 'Services 04 Main Nav' ),
		'menu-8' => __( 'Services 05 Main Nav' ),
		'menu-9' => __( 'Services 06 Main Nav' ),
		'menu-10' => __( 'Services 07 Main Nav' ),
		'menu-11' => __( 'Services 08 Main Nav' ),
		'menu-12' => __( 'Services 09 Main Nav' ),
		'menu-13' => __( 'Services 10 Main Nav' )
		));
	}

//	remove_filter( 'the_content', 'wpautop' );

  // REQUIRE OPTIONS
  require_once( THEME_INCLUDE . '/functions/options.php');

	// REGISTER FOOTER ONE WIDGET

		function footer_one_widget() {
		register_sidebar(array(
				'name' 					=> __( 'Footer One', 'footer_one_id' ),
				'id' 						=> 'footer_one_id',
				'before_widget' => '<div class="widgetcontent">',
				'after_widget'  => '</div>',
				'before_title'  => '<p class="h5">',
				'after_title'   => '</p>',
		));
		}
		add_action( 'init', 'footer_one_widget' );

	// REGISTER FOOTER TWO WIDGET

		function footer_two_widget() {
		register_sidebar(array(
				'name' 					=> __( 'Footer Two', 'footer_two_id' ),
				'id' 						=> 'footer_two_id',
				'before_widget' => '<div class="widgetcontent">',
				'after_widget'  => '</div>',
				'before_title'  => '<p class="h5">',
				'after_title'   => '</p>',
		));
		}
		add_action( 'init', 'footer_two_widget' );


	// REGISTER FOOTER THREE WIDGET

		function sidebar_menu_widget() {
		register_sidebar(array(
				'name' 					=> __( 'Sidebar Menu', 'sidebar_menu_id' ),
				'id' 						=> 'sidebar_menu_id',
				'class'         => 'breadcrumbs',
				'before_widget' => '<ul class="nav secondarynav">',
				'after_widget'  => '</ul>',
				'before_title'  => '<li class="disabled"><a>',
				'after_title'   => '</a></li>',
		));
		}
		add_action( 'init', 'sidebar_menu_widget' );

	// GENERIC SIDEBAR WIDGET
		function sidebar_content_one_widget(){
		register_sidebar( array(
				'name'			=>	__( 'Sidebar Content 01', 'sidebar_content_one_id' ),
				'id'			=>	'sidebar_content_one_id',
				'before_widget'	=>	'<div class="sidebar-content-one">',
				'after-widget'	=>	'</div>',
		));
		}
		add_action( 'init', 'sidebar_content_one_widget' );

	if(!function_exists('get_post_top_ancestor_id')){
	/**
	 * Gets the id of the topmost ancestor of the current page. Returns the current
	 * page's id if there is no parent.
	 *
	 * @uses object $post
	 * @return int
	 */

	function get_post_top_ancestor_id(){
	    global $post;

	    if($post->post_parent){
	        $ancestors = array_reverse(get_post_ancestors($post->ID));
	        return $ancestors[0];
	    }

	    return $post->ID;
	}}

	//Enable Thumbnails
	add_theme_support('post-thumbnails');

	//Enable Sizing for Profile and Featured Image
	add_image_size( 'faculty-profile-listing', 100, 125, false );
	add_image_size( 'faculty-profile', 180, 225 );
	add_image_size( 'featured-faculty', 180, 225, false );
	add_image_size( 'featured-image-fullwidth', 1140, 9999 );
	add_image_size( 'module-thumbnail', 220, 135, true );

	// Enable Styling for Editor - editor-style.css Needs to be present or specify a path
	//add_editor_style();

	//Removing P tags for excerpt
	remove_filter('the_excerpt', 'wpautop');

	//Auto Generate Title for Faculty Post Type
	require_once( THEME_INCLUDE . '/functions/auto-generate-title-faculty.php');

	// Automatically apply responsive image class to thumbnails and images
	require_once( BASE . '/includes/2.0.1/bs4-responsive-images.php');


	//Enqueue Additional Scripts
	function base_js_load(){
		wp_register_script('tether-js', get_template_directory_uri() . '/library/tether/1.3.1/js/tether.min.js', array('jquery'), '20160714', true );
		wp_register_script('dblivefilter-js', get_stylesheet_directory_uri(). '/includes/scripts/livefilter.js', array('jquery'), '20161002', true );
		wp_register_script('default-js', get_stylesheet_directory_uri() . '/includes/scripts/default.js', array('jquery'), '20160707', true );
		wp_register_script('bootstrap-js', get_template_directory_uri() . '/library/bootstrap/4.0.0.2/js/bootstrap.min.js', array('jquery'), '20160126', true );
//		wp_register_style('style', get_stylesheet_directory_uri() . '/includes/sass/style.css', '20161209', true );
		wp_register_script('smoothscroll-js', get_template_directory_uri() . '/library/smoothscroll/1.7.2/jquery.smooth-scroll.min.js', array('jquery'), '20160126', true );
  	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/library/bootstrap/4.0.0.2/css/bootstrap.min.css');
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/library/font-awesome/4.6.3/css/font-awesome.min.css', '20160126', true);
		wp_register_script('isotope-js', get_template_directory_uri() . '/library/isotope/2.0.0/isotope.pkgd.min.js', array('jquery'), '20160608', true );
		wp_register_script('jquery', get_template_directory_uri() . '/library/jquery/jquery.js', array('jquery'), '20170419', true );
		wp_register_script('scrollreveal', get_template_directory_uri() . '/library/scrollreveal/2.3.2/scrollReveal.min.js', '20170726', true );


		wp_enqueue_script('tether-js');
		wp_enqueue_script('bootstrap-js');
		wp_enqueue_style('fontawesome');
//		  wp_enqueue_style('style');
// 	  wp_enqueue_script('isotope-js');
// 		wp_enqueue_script('smoothscroll-js');
		if (is_page_template('page-template-home', 'page-template-slider','page-template-fullwidth','page-template-facultylisting')){
  		wp_enqueue_script('default-js');
  		wp_enqueue_script('jquery');
		}
		if (is_category() || (is_archive()) || is_page_template( 'page-template-facultylisting') ) {
  		//wp_enqueue_script('scrollreveal');
		}
	}
	add_action( 'wp_enqueue_scripts', 'base_js_load' );

	//Loading Scripts only for Admin Part for Metaboxes
	function metabox_admin_script(){
	    wp_enqueue_script('admin-js', get_stylesheet_directory_uri().'/includes/scripts/metabox-admin.js', array('jquery'));
	}
	add_action('admin_enqueue_scripts', 'metabox_admin_script');

	// BUTTON SHORTCODE

	function button_shortcode( $atts, $content = null ){
		extract( shortcode_atts(
  		array(
        'link'        => '#',
        'color'       => 'primary',
        'size'        => 'md',
        'fa'          => ''
  		),
		$atts ) );

		if ($fa) {
			return
  			'<a href="' . $link . '" class="btn btn-' . $color . ' btn-' . $size . '" title="' . $content . '"> <span class="fa fa-' . $fa . '" aria-hidden="true"></span> ' . $content . '</a>';
    } else {
      return
  			'<a href="' . $link . '" class="btn btn-' . $color . ' btn-' . $size . '" title="' . $content . '">' . $content . '</a>';
    }
	}

	add_shortcode( 'button', 'button_shortcode' );


	// EXCERPT FUNCTION

		function wpdocs_custom_excerpt_length( $length ) {
				return 20;
		}

		add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

		function new_excerpt_more( $more ) {
				return '...';
		}

		add_filter( 'excerpt_more', 'new_excerpt_more' );


	// ACCORDION SHORTCODE

	function accordion_shortcode( $atts, $content = null ){
		extract( shortcode_atts(
			array(
				'title'		=> 'Click to Open',
				'state'		=> ''
					),
			$atts ) );
		return
			  '<div class="panel-title">
					<a data-toggle="collapse" href="#collapse' . str_replace(array(' ' , ',' , '/'), '-', $title) . '" class="accordion-toggle collapsed">
						<h4>' . $title . '</h4>
					</a>
				</div>
				<div id="collapse' . str_replace(array(' ' , ','), '-', $title) . '" class="panel-collapse collapse ' . $state . '">
					<div class="panel-body">' . apply_filters( 'the_content', $content ) . '</div>
  			</div>';
	}

	add_shortcode( 'accordion', 'accordion_shortcode' );


// EMAIL SHORTCODE

	function email_shortcode( $atts, $content = null ){
		return
			  '<a href="mailto:' . $content . '" title="email ' . $content . '"><span class="fa fa-envelope"></span> ' . $content . '</a>';
	}

	add_shortcode( 'email', 'email_shortcode' );

	// COLUMN SHORTCODE

	function column_shortcode( $atts, $content = null ){
		extract( shortcode_atts(
			array(
				'span'		=> ''
					),
			$atts ) );

  			if ($span == 'half') {
    			$colspan = 'col-md-6 col-sm-6 col-xs-12';
  			}
  			if ($span == 'third') {
    			$colspan = 'col-md-4 col-sm-4 col-xs-12';
  			}
  			if ($span == 'quarter') {
    			$colspan = 'col-md-3 col-sm-3 col-xs-12';
  			}
  			if ($span == 'two-third') {
    			$colspan = 'col-md-8 col-sm-8 col-xs-12';
  			}
  			if ($span == 'three-quarter') {
    			$colspan = 'col-md-9 col-sm-9 col-xs-12';
  			}

		return
		  '<div class="' . $colspan .'">' . apply_filters( 'the_content', $content ) . '</div>';
	}

	add_shortcode( 'column', 'column_shortcode' );


function special_nav_class ($classes, $item) {
    if (in_array('current-page-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

/*Add first image as featured image */
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
   if($output){
  $first_img = $matches[1][0];
}

  return $first_img;
}

/* Allows the addition of shortcodes to text widgets */
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );

/*  TO DISPLAY CATCH THE IMAGES VIA RSS  (modified from https://woorkup.com/show-featured-image-wordpress-rss-feed/ )  */

function CTItoRSS($rsscontent) {
global $post;
if ( catch_that_image( $post->ID ) ){

	$catch_that_image_url = catch_that_image( $post->ID );
	$rsscontent = '<img src="' . $catch_that_image_url .'" title="embedded image from story" height="125" width="125" align="left" style="padding-bottom: 15px; padding-right: 15px;" />' . $rsscontent;
}

return $rsscontent;
}

add_filter('the_excerpt_rss', 'CTItoRSS');