<?php
// Register menus
register_nav_menus(
	array(
		'main-nav' => __( 'The Main Menu', 'pressforward_turnkey_theme' ),   // Main nav in header
		'footer-links' => __( 'Footer Links', 'pressforward_turnkey_theme' ) // Secondary nav in footer
	)
);

// The Top Menu
function pressforward_tk_theme_top_nav() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'dropdown menu',       // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="dropdown medium-dropdown">%3$s</ul>',
        'theme_location' => 'main-nav',        			// Where it's located in the theme
        'depth' => 5,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
        'walker' => new Topbar_Menu_Walker()
    ));
} /* End Top Menu */

// The Off Canvas Menu
function pressforward_tk_theme_off_canvas_nav() {
	 wp_nav_menu(array(
        'container' => false,                           // Remove nav container
        'menu_class' => 'vertical menu',       // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-accordion-menu>%3$s</ul>',
        'theme_location' => 'main-nav',        			// Where it's located in the theme
        'depth' => 5,                                   // Limit the depth of the nav
        'fallback_cb' => false,                         // Fallback function (see below)
        'walker' => new Off_Canvas_Menu_Walker()
    ));
} /* End Off Canvas Menu */

// The Footer Menu
function pressforward_tk_theme_footer_links() {
    wp_nav_menu(array(
    	'container' => 'false',                              // Remove nav container
    	'menu' => __( 'Footer Links', 'pressforward_turnkey_theme' ),   	// Nav name
    	'menu_class' => 'menu',      					// Adding custom nav class
    	'theme_location' => 'footer-links',             // Where it's located in the theme
        'depth' => 0,                                   // Limit the depth of the nav
    	'fallback_cb' => ''  							// Fallback function
	));
} /* End Footer Menu */

// Header Fallback Menu
function pressforward_tk_theme_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => '',      // Adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                            // Before each link
        'link_after' => ''                             // After each link
	) );
}

// Footer Fallback Menu
function pressforward_tk_theme_footer_links_fallback() {
	/* You can put a default here if you like */
}
