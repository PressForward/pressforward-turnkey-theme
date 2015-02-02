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

// function bones_scripts_and_styles_child() {
//   // global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
  
    
//     // register main stylesheet
//     wp_enqueue_style( 'bones-child-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '', 'all' );

// }
// add_action('wp_enqueue_style', 'bones_scripts_and_styles_child' );
  register_sidebar(array(
    'id' => 'content1',
    'name' => __( 'Content Widget 1', 'bonestheme' ),
    'description' => __( 'The first content area widget.', 'bonestheme' ),
    'before_widget' => '<i class="fa fa-briefcase fa-4x light-gray"></i>',
    // 'before_title' => '<h3>',
    // 'after_title' => '</h3>',
  ));

   register_sidebar(array(
    'id' => 'content2',
    'name' => __( 'Content Widget 2', 'bonestheme' ),
    'description' => __( 'The second content area widget.', 'bonestheme' ),
    'before_widget' => '<i class="fa fa-bullhorn fa-4x light-gray"></i>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

   register_sidebar(array(
    'id' => 'content3',
    'name' => __( 'Content Widget 3', 'bonestheme' ),
    'description' => __( 'The third content area widget.', 'bonestheme' ),
    'before_widget' => '<i class="fa fa-info fa-4x light-gray"></i>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

    register_sidebar(array(
    'id' => 'content4',
    'name' => __( 'Content Widget 4', 'bonestheme' ),
    'description' => __( 'The fourth content area widget.', 'bonestheme' ),
    'before_widget' => '<i class="fa fa-laptop fa-4x light-gray"></i>',
    // 'before_title' => '<h3>',
    // 'after_title' => '</h3>',
  ));

     register_sidebar(array(
    'id' => 'content5',
    'name' => __( 'Content Widget 5', 'bonestheme' ),
    'description' => __( 'The fifth content area widget.', 'bonestheme' ),
    'before_widget' => '<i class="fa fa-money fa-4x light-gray"></i>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

      register_sidebar(array(
    'id' => 'content6',
    'name' => __( 'Content Widget 6', 'bonestheme' ),
    'description' => __( 'The sixth content area widget.', 'bonestheme' ),
    'before_widget' => '<i class="fa fa-flag fa-4x light-gray"></i>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

?>
