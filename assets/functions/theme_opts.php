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
      'title'       => __( 'Home Page Layout', 'theme_slug' ),
      'description' => __( 'This panel will provide all the options of the header.', 'theme_slug' ),
  ) );
  Kirki::add_panel( 'designelements', array(
      'priority'    => 10,
      'title'       => __( 'Design Elements', 'theme_slug' ),
      'description' => __( 'This panel will provide all the options of the header.', 'theme_slug' ),
  ) );
  Kirki::add_panel( 'contentsettings', array(
      'priority'    => 10,
      'title'       => __( 'Content Settings', 'theme_slug' ),
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
Kirki::add_field( 'slider-switch', array(
    'type'        => 'switch',
    'settings'    => 'slider-switch',
    'label'       => __( 'Slider (Block 1)', 'my_textdomain' ),
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
      'label'       => __( 'Slider Post Category', 'kirki' ),
      'description' => __( 'This is the control description', 'kirki' ),
      'help'        => __( 'This is some extra help text.', 'kirki' ),
      'section'     => 'slider',
      'default'     => '1',
      'priority'    => 10,
      'choices'     => Kirki_Helper::get_terms( 'category' ),
  ) );
  Kirki::add_field( 'slider-autoplay', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'slider-autoplay',
	'label'       => __( 'Slider Autoplay', 'my_textdomain' ),
	'section'     => 'slider',
	'default'     => 'autoPlay:false;',
	'priority'    => 10,
	'choices'     => array(
		'autoPlay:true;' => esc_attr__( 'On', 'my_textdomain' ),
    'autoPlay:false;'   => esc_attr__( 'Off', 'my_textdomain' )
	),
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
//Create on/off switch for block 2.
Kirki::add_field( 'toggle-b2', array(
    'type'        => 'switch',
    'settings'    => 'toggle-b2',
    'label'       => __( 'Block 2', 'my_textdomain' ),
    'section'     => 'block2',
    'default'     => '1',
    'priority'    => 10,

) );


////////////////////////////////////////////
//Title,link and text for column1 block 2.//
////////////////////////////////////////////

//column1 -- Block2
  Kirki::add_field( 'b2c1-icon', array(
      'type'        => 'text',
      'settings'    => 'b2c1-icon',
      'label'       => __( 'First Column Icon', 'kirki-demo' ),
      'help'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'fa-taxi',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c1-title', array(
      'type'        => 'text',
      'settings'    => 'b2c1-title',
      'label'       => __( 'First Column Title', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'B2-C1 Title',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c1-link', array(
    'type'        => 'dropdown-pages',
    'settings'    => 'b2c1-link',
    'label'       => __( 'First Column Title Link', 'kirki-demo' ),
    'section'     => 'block2',
    'default'     => '',
    'priority'    => 10,
    'multiple'    => 1,
  ) );
  Kirki::add_field( 'b2c1-text', array(
      'type'        => 'textarea',
      'settings'    => 'b2c1-text',
      'label'       => __( 'First Column Text', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "textarea" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'Nam pretium magna non enim finibus dignissim. Suspendisse felis ipsum, finibus ac eros ut, rhoncus consequat nisl.',
      'priority'    => 10,
  ) );

//column 2 -- Block2
  Kirki::add_field( 'b2c2-icon', array(
      'type'        => 'text',
      'settings'    => 'b2c2-icon',
      'label'       => __( 'Second Column Icon', 'kirki-demo' ),
      'help'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'fa-taxi',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c2-title', array(
      'type'        => 'text',
      'settings'    => 'b2c2-title',
      'label'       => __( 'Second Column Title', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'B2-C2 Title',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c2-link', array(
    'type'        => 'dropdown-pages',
    'settings'    => 'b2c2-link',
    'label'       => __( 'Second Column Title Link', 'kirki-demo' ),
    'section'     => 'block2',
    'default'     => '',
    'priority'    => 10,
    'multiple'    => 1,
  ) );
  Kirki::add_field( 'kirki_demo', array(
      'type'        => 'textarea',
      'settings'    => 'b2c2-text',
      'label'       => __( 'Second Column Text', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "textarea" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'Curabitur porta dui at diam iaculis dapibus. Vivamus efficitur interdum mi vel sagittis. Vivamus sagittis aliquet pretium. Nulla ultrices in tortor sed facilisis.',
      'priority'    => 10,
  ) );

//Column 3 -- Block2
  Kirki::add_field( 'b2c3-icon', array(
      'type'        => 'text',
      'settings'    => 'b2c3-icon',
      'label'       => __( 'Third Column Icon', 'kirki-demo' ),
      'help'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'fa-taxi',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c3-title', array(
      'type'        => 'text',
      'settings'    => 'b2c3-title',
      'label'       => __( 'Third Column Title', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'B2-C3 Title',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c3-link', array(
    'type'        => 'dropdown-pages',
    'settings'    => 'b2c3-link',
    'label'       => __( 'Third Column Title Link', 'kirki-demo' ),
    'section'     => 'block2',
    'default'     => '',
    'priority'    => 10,
    'multiple'    => 1,
  ) );
  Kirki::add_field( 'b2c3-text', array(
      'type'        => 'textarea',
      'settings'    => 'b2c3-text',
      'label'       => __( 'Third Column Text', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "textarea" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet efficitur elit.',
      'priority'    => 10,
  ) );

//Column 4 -- Block2
  Kirki::add_field( 'b2c4-icon', array(
      'type'        => 'text',
      'settings'    => 'b2c4-icon',
      'label'       => __( 'Fourth Column Icon', 'kirki-demo' ),
      'help'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'fa-taxi',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c4-title', array(
      'type'        => 'text',
      'settings'    => 'b2c4-title',
      'label'       => __( 'Fourth Column Title', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'B2-C4 Title',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c4-link', array(
    'type'        => 'dropdown-pages',
    'settings'    => 'b2c4-link',
    'label'       => __( 'Fourth Column Title Link', 'kirki-demo' ),
    'section'     => 'block2',
    'default'     => '',
    'priority'    => 10,
    'multiple'    => 1,
  ) );
  Kirki::add_field( 'b2c4-text', array(
      'type'        => 'textarea',
      'settings'    => 'b2c4-text',
      'label'       => __( 'Fourth Column Text', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "textarea" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'Curabitur porta dui at diam iaculis dapibus. Vivamus efficitur interdum mi vel sagittis.',
      'priority'    => 10,
  ) );
/*********************
Homepage -- Block 3 -- Options
*********************/

  //Create panel
  Kirki::add_section( 'Block3', array(
      'title'          => __( 'Block 3 Options' ),
      'description'
         => __( 'Edit the content and appearance of the third block on the homepage.' ),
      'panel'          => 'homepage', // Not typically needed.
      'priority'       => 160,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );
  //Create on/off switch for block 3.
  Kirki::add_field( 'toggle-b3', array(
      'type'        => 'switch',
      'settings'    => 'toggle-b3',
      'label'       => __( 'Block 3', 'my_textdomain' ),
      'section'     => 'block3',
      'default'     => '1',
      'priority'    => 10,

  ) );

  //add control for number of rows in block 3
  Kirki::add_field( 'b3-numrows', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'b3-numrows',
    'label'       => __( 'Number of Rows Block 3', 'kirki-demo' ),
    'section'     => 'block3',
    'default'     => 'Two',
    'priority'    => 10,
    'choices'     => array(
        'One'   => esc_attr__( 'One', 'kirki-demo' ),
        'Two' => esc_attr__( 'Two', 'kirki-demo' ),
    ),
) );
    /*********************
    Homepage -- Block 3 Row 1 Column 1 -- Options
    *********************/

    Kirki::add_field( 'b3r1c1-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r1c1-icon',
        'label'       => __( 'First Row First Column Icon', 'kirki-demo' ),
        'help'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c1-title', array(
        'type'        => 'text',
        'settings'    => 'b3r1c1-title',
        'label'       => __( 'First Row First Column Title', 'kirki-demo' ),
        'help'        => __( 'This is a tooltip', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'B3-R1-C1 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c1-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b3r1c1-link',
      'label'       => __( 'First Row First Column Link', 'kirki-demo' ),
      'section'     => 'block3',
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r1c1-category', array(
        'type'        => 'select',
        'settings'    => 'b3r1c1-category',
        'label'       => __( 'This is the label', 'kirki' ),
        'description' => __( 'This is the control description', 'kirki' ),
        'help'        => __( 'This is some extra help text.', 'kirki' ),
        'section'     => 'block3',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => Kirki_Helper::get_terms( 'category' ),
    ) );
    /*********************
    Homepage -- Block 3 Row 1 Column 2 -- Options
    *********************/

    Kirki::add_field( 'b3r1c2-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r1c2-icon',
        'label'       => __( 'First Row Second Column Icon', 'kirki-demo' ),
        'help'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c2-title', array(
        'type'        => 'text',
        'settings'    => 'b3r1c2-title',
        'label'       => __( 'First Row Second Column Title', 'kirki-demo' ),
        'help'        => __( 'This is a tooltip', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'B3-R1-C2 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c2-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b3r1c2-link',
      'label'       => __( 'First Row Second Column Link', 'kirki-demo' ),
      'section'     => 'block3',
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r1c2-category', array(
        'type'        => 'select',
        'settings'    => 'b3r1c2-category',
        'label'       => __( 'This is the label', 'kirki' ),
        'description' => __( 'This is the control description', 'kirki' ),
        'help'        => __( 'This is some extra help text.', 'kirki' ),
        'section'     => 'block3',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => Kirki_Helper::get_terms( 'category' ),
    ) );
    /*********************
    Homepage -- Block 3 Row 1 Column 3 -- Options
    *********************/

    Kirki::add_field( 'b3r1c3-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r1c3-icon',
        'label'       => __( 'First Row Third Column Icon', 'kirki-demo' ),
        'help'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c3-title', array(
        'type'        => 'text',
        'settings'    => 'b3r1c3-title',
        'label'       => __( 'First Row Third Column Title', 'kirki-demo' ),
        'help'        => __( 'This is a tooltip', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'B3-R1-C3 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c3-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b3r1c3-link',
      'label'       => __( 'First Row Third Column Link', 'kirki-demo' ),
      'section'     => 'block3',
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r1c3-category', array(
        'type'        => 'select',
        'settings'    => 'b3r1c3-category',
        'label'       => __( 'This is the label', 'kirki' ),
        'description' => __( 'This is the control description', 'kirki' ),
        'help'        => __( 'This is some extra help text.', 'kirki' ),
        'section'     => 'block3',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => Kirki_Helper::get_terms( 'category' ),
    ) );

    /*********************
    Homepage -- Block 3 Row 2 Column 1 -- Options
    *********************/

    Kirki::add_field( 'b3r2c1-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r2c1-icon',
        'label'       => __( 'Second Row First Column Icon', 'kirki-demo' ),
        'help'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c1-title', array(
        'type'        => 'text',
        'settings'    => 'b3r2c1-title',
        'label'       => __( 'Second Row First Column Title', 'kirki-demo' ),
        'help'        => __( 'This is a tooltip', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'B3-R1-C3 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c1-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b3r2c1-link',
      'label'       => __( 'Second Row First Column Link', 'kirki-demo' ),
      'section'     => 'block3',
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r2c1-category', array(
        'type'        => 'select',
        'settings'    => 'b3r2c1-category',
        'label'       => __( 'This is the label', 'kirki' ),
        'description' => __( 'This is the control description', 'kirki' ),
        'help'        => __( 'This is some extra help text.', 'kirki' ),
        'section'     => 'block3',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => Kirki_Helper::get_terms( 'category' ),
    ) );

    /*********************
    Homepage -- Block 3 Row 1 Column 3 -- Options
    *********************/

    Kirki::add_field( 'b3r2c2-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r2c2-icon',
        'label'       => __( 'Second Row Second Column Icon', 'kirki-demo' ),
        'help'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c2-title', array(
        'type'        => 'text',
        'settings'    => 'b3r2c2-title',
        'label'       => __( 'Second Row Second Column Title', 'kirki-demo' ),
        'help'        => __( 'This is a tooltip', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'B3-R1-C3 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c2-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b3r2c2-link',
      'label'       => __( 'Second Row Second Column Link', 'kirki-demo' ),
      'section'     => 'block3',
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r2c2-category', array(
        'type'        => 'select',
        'settings'    => 'b3r2c2-category',
        'label'       => __( 'This is the label', 'kirki' ),
        'description' => __( 'This is the control description', 'kirki' ),
        'help'        => __( 'This is some extra help text.', 'kirki' ),
        'section'     => 'block3',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => Kirki_Helper::get_terms( 'category' ),
    ) );
    /*********************
    Homepage -- Block 3 Row 1 Column 3 -- Options
    *********************/

    Kirki::add_field( 'b3r2c3-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r2c3-icon',
        'label'       => __( 'Second Row Third Column Icon', 'kirki-demo' ),
        'help'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c3-title', array(
        'type'        => 'text',
        'settings'    => 'b3r2c3-title',
        'label'       => __( 'Second Row Third Column Title', 'kirki-demo' ),
        'help'        => __( 'This is a tooltip', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'B3-R1-C3 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c3-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b3r2c3-link',
      'label'       => __( 'Second Row Third Column Link', 'kirki-demo' ),
      'section'     => 'block3',
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r2c3-category', array(
        'type'        => 'select',
        'settings'    => 'b3r2c3-category',
        'label'       => __( 'This is the label', 'kirki' ),
        'description' => __( 'This is the control description', 'kirki' ),
        'help'        => __( 'This is some extra help text.', 'kirki' ),
        'section'     => 'block3',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => Kirki_Helper::get_terms( 'category' ),
    ) );

/*********************
**********************
Homepage -- Block 4
**********************
*********************/
  //Create panel
  Kirki::add_section( 'Block4', array(
      'title'          => __( 'Block 4 Options' ),
      'description'
         => __( 'Edit the content and appearance of the fourth block on the homepage.' ),
      'panel'          => 'homepage', // Not typically needed.
      'priority'       => 160,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );
  //Create on/off switch for block 3.
  Kirki::add_field( 'toggle-b4', array(
      'type'        => 'switch',
      'settings'    => 'toggle-b4',
      'label'       => __( 'Block 4', 'my_textdomain' ),
      'section'     => 'block4',
      'default'     => '1',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b4-title', array(
      'type'        => 'text',
      'settings'    => 'b4-title',
      'label'       => __( 'Block 4 Title', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block4',
      'default'     => 'Block 4 Title',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b4-title-link', array(
    'type'        => 'dropdown-pages',
    'settings'    => 'b4-title-link',
    'label'       => __( 'Block 4 Title Link', 'kirki-demo' ),
    'section'     => 'block4',
    'default'     => '',
    'priority'    => 10,
    'multiple'    => 1,
  ) );
  Kirki::add_field( 'b4-text', array(
      'type'        => 'textarea',
      'settings'    => 'b4-text',
      'label'       => __( 'Block 4 Text', 'kirki-demo' ),
      'help'        => __( 'This is a tooltip', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block4',
      'default'     => 'B3-R1-C3 Title',
      'priority'    => 10,
  ) );

/*********************
**********************
Homepage -- Block 5
**********************
*********************/
    //Create panel
    Kirki::add_section( 'Block5', array(
        'title'          => __( 'Block 5 Options' ),
        'description'
           => __( 'Edit the content and appearance of the fourth block on the homepage.' ),
        'panel'          => 'homepage', // Not typically needed.
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ) );
    //Create on/off switch for block 3.
    Kirki::add_field( 'toggle-b5', array(
        'type'        => 'switch',
        'settings'    => 'toggle-b5',
        'label'       => __( 'Block 5', 'my_textdomain' ),
        'section'     => 'block5',
        'default'     => '1',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b5-title', array(
        'type'        => 'text',
        'settings'    => 'b5-title',
        'label'       => __( 'Block 5 Title', 'kirki-demo' ),
        'help'        => __( 'This is a tooltip', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block5',
        'default'     => 'Block 5 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b5-title-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b5-title-link',
      'label'       => __( 'Block 5 Title Link', 'kirki-demo' ),
      'section'     => 'block5',
      'default'     => '',
      'priority'    => 10,
      'multiple'    => 1,
    ) );


/*********************
**********************
Homepage -- Footer
**********************
*********************/
//Create panel
Kirki::add_section( 'Footer', array(
    'title'          => __( 'Footer' ),
    'description'
       => __( 'Edit the content and appearance of the fourth block on the homepage.' ),
    'panel'          => 'homepage', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_field( 'toggle-footer', array(
    'type'        => 'switch',
    'settings'    => 'toggle-footer',
    'label'       => __( 'Footer', 'my_textdomain' ),
    'section'     => 'footer',
    'default'     => '1',
    'priority'    => 10,
) );
Kirki::add_field( 'toggle-copyright', array(
    'type'        => 'switch',
    'settings'    => 'toggle-copyright',
    'label'       => __( 'Display Copyright and Sitename', 'my_textdomain' ),
    'section'     => 'footer',
    'default'     => '1',
    'priority'    => 10,
) );
Kirki::add_field( 'toggle-footer-text', array(
    'type'        => 'switch',
    'settings'    => 'toggle-footer-text',
    'label'       => __( 'Toggle Footer Text', 'my_textdomain' ),
    'section'     => 'footer',
    'default'     => '1',
    'priority'    => 10,
) );
Kirki::add_field( 'footer-text', array(
	'type'     => 'textarea',
	'settings' => 'footer-text',
	'label'    => __( 'Footer Text', 'my_textdomain' ),
	'section'  => 'Footer',
	'default'  => esc_attr__( 'This is a defualt value', 'my_textdomain' ),
	'priority' => 10,
) );

/*********************
**********************
Sitewide -- Typography
**********************
*********************/
//Create Section for Typography controls

  //Create panel
  Kirki::add_section( 'fontcontrol', array(
      'title'          => __( 'Fonts' ),
      'description'
         => __( 'description goes here.' ),
      'panel'          => 'designelements', // Not typically needed.
      'priority'       => 160,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );


  Kirki::add_field( 'pftk_opts', array(
	'type'        => 'typography',
	'settings'    => 'body-font',
	'label'       => esc_attr__( 'Control Label', 'kirki' ),
	'section'     => 'fontcontrol',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '400',
		'font-size'      => '14px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#333333',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'body',
		),
	),
) );

Kirki::add_field( 'pftk_opts', array(
'type'        => 'typography',
'settings'    => 'header-font',
'label'       => esc_attr__( 'Control Label', 'kirki' ),
'section'     => 'fontcontrol',
'default'     => array(
  'font-family'    => 'Lato',
  'variant'        => '300',
  'line-height'    => '1.5',
  'letter-spacing' => '2',
  'color'          => '#333333',
),
'priority'    => 10,
'output'      => array(
  array(
    'element' => 'h1, h2, h3, h4, h5, h6',
  ),
),
) );
//Create panel
Kirki::add_section( 'colors', array(
    'title'          => __( 'Colors' ),
    'description'
       => __( 'description goes here.' ),
    'panel'          => 'designelements', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'topbar',
	'label'       => __( 'Top Bar Background Color', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.top-bar, .menu-text, .menu-item, .top-bar ul',
			'property' => 'background-color',
		),
	),
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'topbar-text',
	'label'       => __( 'Top Bar Text Color', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.top-bar a, .top-bar p',
			'property' => 'color',
		),
	),
) );
//icon color
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'icon-color',
	'label'       => __( 'Icon Color', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => 'i',
			'property' => 'color',
		),
	),
) );
// slider bg color
Kirki::add_field( 'slider-color-1', array(
	'type'        => 'color',
	'settings'    => 'slider-color-1',
	'label'       => __( 'Slider Gradient (Color #1)', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '#0088CC',
	'priority'    => 10,
	'alpha'       => true,
) );
Kirki::add_field( 'slider-color-2', array(
	'type'        => 'color',
	'settings'    => 'slider-color-2',
	'label'       => __( 'Slider Gradient (Color #2)', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '#0088CC',
	'priority'    => 10,
	'alpha'       => true,
) );
//slider txt color
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'orbit-bullets',
	'label'       => __( 'Slider Bullets', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.orbit-bullets button',
			'property' => 'color',
		),
	),
) );
// b2 bg color
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b2-bg-color',
	'label'       => __( 'Block 2 Background Color', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.block-2',
			'property' => 'background-color',
		),
	),
) );
//b2 link color
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b2-link-color',
	'label'       => __( 'Block 2 Link Color', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.block-2 a',
			'property' => 'color',
		),
	),
) );
//b2 text color
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b2-text-color',
	'label'       => __( 'Block 2 Text Color', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.block-2 p',
			'property' => 'color',
		),
	),
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b3-bg-color',
	'label'       => __( 'Block 3 Background Color', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.block-3',
			'property' => 'background-color',
		),
	),
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b3-link-color',
	'label'       => __( 'Block 3 Link Color', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => 'a, ul, li',
			'property' => 'color',
		),
	),
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b4-bg-color',
	'label'       => __( 'Block 4 Background Color', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.block-4',
			'property' => 'background-color',
		),
	),
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b4-text-color',
	'label'       => __( 'Block 4 Text Color', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.block-4 p',
			'property' => 'color',
		),
	),
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b4-link-color',
	'label'       => __( 'Block 4 Link Color', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.block-4 a',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b5-bg-color',
	'label'       => __( 'Block 5 Background Color', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.block-5',
			'property' => 'background-color',
		),
	),
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b5-text-color',
	'label'       => __( 'Block 5 Text Color', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.block-5 p',
			'property' => 'color',
		),
	),
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b5-link-color',
	'label'       => __( 'Block 5 Link Color', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.block-5 a',
			'property' => 'color',
		),
	),
) );


Kirki::add_field( 'b5-color-1', array(
	'type'        => 'color',
	'settings'    => 'b5-color-1',
	'label'       => __( 'Block 5 Gradient (Color #1)', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '#0088CC',
	'priority'    => 10,
	'alpha'       => true,
) );
Kirki::add_field( 'b5-color-2', array(
	'type'        => 'color',
	'settings'    => 'b5-color-2',
	'label'       => __( 'Block 5 Gradient (Color #2) ', 'my_textdomain' ),
	'section'     => 'colors',
	'default'     => '#0088CC',
	'priority'    => 10,
	'alpha'       => true,
) );


////// CONTENT SETTINGS SECTION //////
Kirki::add_section( 'content-settings', array(
    'title'          => __( 'ContentOptions' ),
    'description'    => __( 'Add an image to be shown as header advertisement.' ),
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_field( 'breadcrumbs', array(
	'type'        => 'switch',
	'settings'    => 'breadcrumbs',
	'label'       => __( 'Breadcrumbs', 'my_textdomain' ),
	'section'     => 'content-settings',
	'default'     => '1',
	'priority'    => 10,
) );

?>
