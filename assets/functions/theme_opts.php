<?php
include_once( get_template_directory() . '/assets/functions/theme_opts.php' );

Kirki::add_config( 'mk', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'option',
    'option_name'   => 'mk',
) );
Kirki::add_panel( 'header', array(
    'priority'    => 10,
    'title'       => __( 'Header', 'theme_slug' ),
    'description' => __( 'This panel will provide all the options of the header.', 'theme_slug' ),
) );
Kirki::add_section( 'header_advertisement', array(
    'title'          => __( 'Header advertisement' ),
    'description'    => __( 'Add an image to be shown as header advertisement.' ),
    'panel'          => 'header', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_field( 'mk', array(
    'settings' => 'header_advertisement_setting',
    'label'    => __( 'Setting for the header advertisement', 'theme_slug' ),
    'section'  => 'header_advertisement',
    'type'     => 'image',
    'priority' => 10,
    'default'  => '',
) );
Kirki::add_field( 'mk', array(
    'type'        => 'text',
    'settings'    => 'text_demo',
    'label'       => __( 'Column 1 Icon', 'kirki-demo' ),
    'help'        => __( 'i.e. fa-taxi', 'kirki-demo' ),
    'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
    'section'     => 'header_advertisement',
    'default'     => '',
    'priority'    => 10,
) );

?>
