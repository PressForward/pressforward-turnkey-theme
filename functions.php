<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


function ls_scripts() {
		
		wp_enqueue_style('ls-css', get_stylesheet_directory_uri() . '/library/css/liquid-slider.css');
		wp_enqueue_script( 'jquery-easing', get_stylesheet_directory_uri() . 
			'/library/js/jquery.easing.1.3.js', array('jquery'));
		wp_enqueue_script( 'jquery-touchSwipe', get_stylesheet_directory_uri() . '/library/js/jquery.touchSwipe.min.js', array('jquery-easing'));
		wp_enqueue_script( 'jquery-ls', get_stylesheet_directory_uri() . '/library/js/jquery.liquid-slider.min.js', array('jquery-touchSwipe'));

}
add_action('wp_enqueue_scripts', 'ls_scripts');
?>
