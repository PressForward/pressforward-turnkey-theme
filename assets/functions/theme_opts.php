<?php
include_once( get_template_directory() . '/assets/functions/theme_opts.php' );
//see http://www.infismash.com/extending-the-wordpress-customizer-using-kirki/ for tutorial


/*********************
**********************
  Add Configuration
**********************
*********************/
Kirki::add_config( 'pftk_opts', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
    'option_name'   => 'pftk_opts',
) );




//create panel for homepage options
  Kirki::add_panel( 'homepage', array(
      'priority'    => 10,
      'title'       => __( 'Home Page', 'theme_slug' ),
      'description' => __( 'This panel will provide all the options of the header.', 'theme_slug' ),
  ) );

/*********************
Homepage -- Slider -- Options
*********************/

//create slider section
  Kirki::add_section( 'slider', array(
      'title'          => __( 'Slider Options' ),
      'description'    => __( 'Add an image to be shown as header advertisement.' ),
      'panel'          => 'homepage', // Not typically needed.
      'priority'       => 160,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );

//add fields
  Kirki::add_field( '', array(
      'type'        => 'toggle',
      'settings'    => 'toggle_slider',
      'label'       => __( 'Slider On', 'kirki' ),
      'section'     => 'slider',
      'default'     => '1',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'slider_numposts', array(
      'type'        => 'slider',
      'settings'    => 'slider_numposts',
      'label'       => __( 'Number of Posts', 'kirki' ),
      'description' => __( 'How many posts should appear in the slider.', 'kirki' ),
      'section'     => 'slider',
      'default'     => 4,
      'priority'    => 10,
      'choices'     => array(
          'min'  => 1,
          'max'  => 10,
          'step' => 1
      ),
  ) );
  Kirki::add_field( 'slider_category', array(
      'type'        => 'select',
      'settings'    => 'slider_category',
      'label'       => __( 'This is the label', 'kirki' ),
      'description' => __( 'This is the control description', 'kirki' ),
      'help'        => __( 'This is some extra help text.', 'kirki' ),
      'section'     => 'slider',
      'default'     => '1',
      'priority'    => 10,
      'choices'     => Kirki_Helper::get_terms( 'category' ),
  ) );


/*********************
Homepage -- Block 2 -- Options
*********************/

//Create panel
Kirki::add_section( 'Block2', array(
    'title'          => __( 'Block 2 Options' ),
    'description'
       => __( 'Edit the content and appearance of the second block on the homepage.' ),
    'panel'          => 'homepage', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
//Create on/off toggle for block 2.
Kirki::add_field( '', array(
    'type'        => 'toggle',
    'settings'    => 'toggle_slider',
    'label'       => __( 'Block 2 On', 'kirki' ),
    'section'     => 'block2',
    'default'     => '1',
    'priority'    => 10,
) );


////////////////////////////////////////////
//Title,link and text for column1 block 2.//
////////////////////////////////////////////

//column1 -- Block2
  Kirki::add_field( 'kirki_demo', array(
      'type'        => 'text',
      'settings'    => 'b2c1-icon',
      'label'       => __( 'First Column Icon', 'kirki-demo' ),
      'help'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => '',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'kirki_demo', array(
      'type'        => 'text',
      'settings'    => 'b2c1-title',
      'label'       => __( 'First Column Title', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => '',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'kirki_demo', array(
      'type'        => 'textarea',
      'settings'    => 'b2c1-text',
      'label'       => __( 'First Column Text', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "textarea" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => '',
      'priority'    => 10,
  ) );

//column 2 -- Block2
  Kirki::add_field( 'kirki_demo', array(
      'type'        => 'text',
      'settings'    => 'b2c2-icon',
      'label'       => __( 'Second Column Icon', 'kirki-demo' ),
      'help'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => '',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'kirki_demo', array(
      'type'        => 'text',
      'settings'    => 'b2c2-title',
      'label'       => __( 'Second Column Title', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => '',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'kirki_demo', array(
      'type'        => 'textarea',
      'settings'    => 'b2c2-text',
      'label'       => __( 'Second Column Text', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "textarea" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => '',
      'priority'    => 10,
  ) );

//Column 3 -- Block2
  Kirki::add_field( 'kirki_demo', array(
      'type'        => 'text',
      'settings'    => 'b2c3-icon',
      'label'       => __( 'Third Column Icon', 'kirki-demo' ),
      'help'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => '',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'kirki_demo', array(
      'type'        => 'text',
      'settings'    => 'b2c3-title',
      'label'       => __( 'Third Column Title', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => '',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'kirki_demo', array(
      'type'        => 'textarea',
      'settings'    => 'b2c3-text',
      'label'       => __( 'Third Column Text', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "textarea" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => '',
      'priority'    => 10,
  ) );

//Column 4 -- Block2
  Kirki::add_field( 'kirki_demo', array(
      'type'        => 'text',
      'settings'    => 'b2c4-icon',
      'label'       => __( 'Fourth Column Icon', 'kirki-demo' ),
      'help'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => '',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'kirki_demo', array(
      'type'        => 'text',
      'settings'    => 'b2c4-title',
      'label'       => __( 'Fourth Column Title', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => '',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'kirki_demo', array(
      'type'        => 'textarea',
      'settings'    => 'b2c4-text',
      'label'       => __( 'Fourth Column Text', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "textarea" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => '',
      'priority'    => 10,
  ) );







?>
