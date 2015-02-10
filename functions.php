<?php

// add_action( 'wp_enqueue_scripts', 'remove_default_stylesheet', 25 );

// function remove_default_stylesheet() {
    
//     wp_dequeue_style( 'bones-stylesheet' );
//     wp_deregister_style( 'bones-stylesheet' );

// }
add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

function my_deregister_styles() {
	wp_deregister_style( 'bones-stylesheet' );
}
function ls_scripts() {
		// wp_enqueue_style('brew-child-css', get_stylesheet_directory_uri() . '/library/css/style.css');
		wp_enqueue_style('ls-css', get_stylesheet_directory_uri() . '/library/css/liquid-slider.css');
		wp_enqueue_style('brew-child-css', get_stylesheet_directory_uri() . '/library/css/style.css');
		wp_enqueue_script( 'jquery-easing', get_stylesheet_directory_uri() . 
			'/library/js/jquery.easing.1.3.js', array('jquery'));
		wp_enqueue_script( 'jquery-touchSwipe', get_stylesheet_directory_uri() . '/library/js/jquery.touchSwipe.min.js', array('jquery-easing'));
		wp_enqueue_script( 'jquery-ls', get_stylesheet_directory_uri() . '/library/js/jquery.liquid-slider.min.js', array('jquery-touchSwipe'));
		


}
add_action('wp_enqueue_scripts', 'ls_scripts');

//This removes all the actions from the bones_ahoy function and then readds all of them EXCEPT for the excerpt_more. Instead this function removes the 'bones_excerpt_more' function.  Child_bones_excerpt_more re-adds the read more ellipses.
function remove_ahoy_actions() {
  remove_action('after_setup_theme', 'bones_ahoy', 16);
    add_action( 'init', 'bones_head_cleanup' );
    // remove WP version from RSS
    add_filter( 'the_generator', 'bones_rss_version' );
    // remove pesky injected css for recent comments widget
    add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
    // clean up comment styles in the head
    add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
    // clean up gallery output in wp
    add_filter( 'gallery_style', 'bones_gallery_style' );

    // enqueue base scripts and styles
    add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
    // ie conditional wrapper

    // launching this stuff after theme setup
    bones_theme_support();

    // adding sidebars to Wordpress (these are created in functions.php)
    add_action( 'widgets_init', 'bones_register_sidebars' );
    // adding the bones search form (created in functions.php)
    // add_filter( 'get_search_form', 'bones_wpsearch' );

    // cleaning up random code around images
    add_filter( 'the_content', 'bones_filter_ptags_on_images' );
    remove_filter('excerpt_more', 'bones_excerpt_more');
    
}
add_action('after_setup_theme', 'remove_ahoy_actions');


function child_bones_excerpt_more($more) {
  global $post;
  // edit here if you like
  return '...&nbsp</p>';
}
add_filter( 'excerpt_more', 'child_bones_excerpt_more');

// function bones_scripts_and_styles_child() {
//   // global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
add_image_size( 'brew-child-thumbnail', 200, 200, true );  
    
//     // register main stylesheet
//     wp_enqueue_style( 'bones-child-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '', 'all' );

// }
// add_action('wp_enqueue_style', 'bones_scripts_and_styles_child' );
  register_sidebar(array(
    'id' => 'content1',
    'name' => __( 'Content Widget 1', 'bonestheme' ),
    'description' => __( 'The first content area widget.', 'bonestheme' ),
    'before_widget' => '<div class="homeinnercontent"><i class="fa fa-briefcase fa-3x light-gray"></i>',
    'after_widget' => '</div>',
    'before_title' => '<h1>',
    'after_title' => '</h1>',
  ));

   register_sidebar(array(
    'id' => 'content2',
    'name' => __( 'Content Widget 2', 'bonestheme' ),
    'description' => __( 'The second content area widget.', 'bonestheme' ),
    'before_widget' => '<div class="homeinnercontent"><i class="fa fa-bullhorn fa-3x light-gray"></i>',
     'after_widget' => '</div>',
    'before_title' => '<h1>',
    'after_title' => '</h1>',
  ));

   register_sidebar(array(
    'id' => 'content3',
    'name' => __( 'Content Widget 3', 'bonestheme' ),
    'description' => __( 'The third content area widget.', 'bonestheme' ),
    'before_widget' => '<div class="homeinnercontent"><i class="fa fa-info fa-3x light-gray"></i>',
     'after_widget' => '</div>',
    'before_title' => '<h1>',
    'after_title' => '</h1>',
  ));

    register_sidebar(array(
    'id' => 'content4',
    'name' => __( 'Content Widget 4', 'bonestheme' ),
    'description' => __( 'The fourth content area widget.', 'bonestheme' ),
    'before_widget' => '<div class="homeinnercontent"><i class="fa fa-laptop fa-3x light-gray"></i>',
     'after_widget' => '</div>',
     'before_title' => '<h1>',
    'after_title' => '</h1>',
  ));

     register_sidebar(array(
    'id' => 'content5',
    'name' => __( 'Content Widget 5', 'bonestheme' ),
    'description' => __( 'The fifth content area widget.', 'bonestheme' ),
    'before_widget' => '<div class="homeinnercontent"><a href="http://localhost:8888/2014/category/job/"><i class="fa fa-money fa-3x light-gray"></i></a>',
    'after_widget' => '</div>',
    'before_title' => '<h1>',
    'after_title' => '</h1>',
  ));

      register_sidebar(array(
    'id' => 'content6',
    'name' => __( 'Content Widget 6', 'bonestheme' ),
    'description' => __( 'The sixth content area widget.', 'bonestheme' ),
    'before_widget' => '<div class="homeinnercontent"><i class="fa fa-flag fa-3x light-gray"></i>',
     'after_widget' => '</div>',
    'before_title' => '<h1>',
    'after_title' => '</h1>',
  ));

       register_sidebar(array(
    'id' => 'homepageabout',
    'name' => __( 'About Section Widget', 'bonestheme' ),
    'description' => __( 'The homepage about widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget infowidget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h1 class="widgettitle">',
    'after_title' => '</h1>',
  ));

       register_sidebar(array(
    'id' => 'participate1',
    'name' => __( 'Partcipate Block 1 Widget', 'bonestheme' ),
    'description' => __( 'The first participate block widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget participatewidget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<i class="fa fa-question-circle fa-3x"></i><h1 class="widgettitle">',
    'after_title' => '</h1>',
  ));

         register_sidebar(array(
    'id' => 'participate2',
    'name' => __( 'Partcipate Block 2 Widget', 'bonestheme' ),
    'description' => __( 'The second participate block widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget participatewidget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<i class="fa fa-rss fa-3x"></i><h1 class="widgettitle">',
    'after_title' => '</h1>',
  ));

           register_sidebar(array(
    'id' => 'participate3',
    'name' => __( 'Partcipate Block 3 Widget', 'bonestheme' ),
    'description' => __( 'The third participate block widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget participatewidget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<i class="fa fa-user fa-3x"></i><h1 class="widgettitle">',
    'after_title' => '</h1>',
  ));

             register_sidebar(array(
    'id' => 'participate4',
    'name' => __( 'Partcipate Block 4 Widget', 'bonestheme' ),
    'description' => __( 'The fourth participate block widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget participatewidget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<i class="fa fa-calendar fa-3x"></i><h1 class="widgettitle">',
    'after_title' => '</h1>',
  ));

             register_sidebar(array(
    'id' => 'blogexcerpt',
    'name' => __( 'Blog Widget 1', 'bonestheme' ),
    'description' => __( 'The blog widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget blogwidget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h1 class="widgettitle">',
    'after_title' => '</h1>',
  ));
             register_sidebar(array(
    'id' => 'bloglist',
    'name' => __( 'Blog Widget 2', 'bonestheme' ),
    'description' => __( 'The blog widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget blogwidget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h1 class="widgettitle">',
    'after_title' => '</h1>',
  ));

?>
