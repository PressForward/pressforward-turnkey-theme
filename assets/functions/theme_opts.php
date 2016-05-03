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
    'label'       => __( 'Slider (Block 1)', 'pressforward_tk_theme' ),
    'tooltip'     => 'This switch turns the slider on or off',
    'section'     => 'slider',
    'default'     => '1',
    'priority'    => 10,

) );
  Kirki::add_field( 'slider_numposts', array(
      'type'        => 'slider',
      'settings'    => 'slider_numposts',
      'label'       => __( 'Number of Posts', 'pressforward_tk_theme' ),
      'description' => __( 'How many posts should appear in the slider.', 'pressforward_tk_theme' ),
      'section'     => 'slider',
      'tooltip'     => 'Select the number of posts that will appear in the slider',
      'default'     => 4,
      'priority'    => 10,
      'choices'     => array(
          'min'  => 1,
          'max'  => 10,
          'step' => 1
      ),
  ) );
  Kirki::add_field( 'slider-title-numwords', array(
      'type'        => 'slider',
      'settings'    => 'slider-title-numwords',
      'label'       => __( 'Number of Words in Slider Post Title', 'pressforward_tk_theme' ),
      'description' => __( 'How many posts should appear in the slider.', 'pressforward_tk_theme' ),
      'section'     => 'slider',
      'default'     => 14,
      'priority'    => 10,
      'choices'     => array(
          'min'  => 1,
          'max'  => 100,
          'step' => 1
      ),
  ) );
  Kirki::add_field( 'slider-excerpt-numwords', array(
      'type'        => 'slider',
      'settings'    => 'slider-excerpt-numwords',
      'label'       => __( 'Number of Words in Slider Excerpt', 'pressforward_tk_theme' ),
      'description' => __( 'How many posts should appear in the slider.', 'pressforward_tk_theme' ),
      'section'     => 'slider',
      'default'     => 55,
      'priority'    => 10,
      'choices'     => array(
          'min'  => 1,
          'max'  => 500,
          'step' => 1
      ),
  ) );
  Kirki::add_field( 'slider_category', array(
      'type'        => 'select',
      'settings'    => 'slider_category',
      'label'       => __( 'Slider Post Category', 'pressforward_tk_theme' ),
      'description' => __( 'Select a post category for the slider.', 'pressforward_tk_theme' ),
      'tooltip'     => __( 'Select the post category that you want to appear in the slider.', 'pressforward_tk_theme' ),
      'section'     => 'slider',
      'default'     => '1',
      'priority'    => 10,
      'choices'     => Kirki_Helper::get_terms( 'category' ),
  ) );
  Kirki::add_field( 'slider-autoplay', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'slider-autoplay',
	'label'       => __( 'Slider Autoplay', 'pressforward_tk_theme' ),
	'section'     => 'slider',
  'tooltip'     => 'This switch turns the autoplay feature of the slider on or off',
	'default'     => 'autoPlay:false;',
	'priority'    => 10,
	'choices'     => array(
		'autoPlay:true;' => esc_attr__( 'On', 'pressforward_tk_theme' ),
    'autoPlay:false;'   => esc_attr__( 'Off', 'pressforward_tk_theme' )
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
    'label'       => __( 'Block 2', 'pressforward_tk_theme' ),
    'section'     => 'block2',
    'tooltip'     => 'This switch turns Block 2 on or off',
    'default'     => '1',
    'priority'    => 10,

) );


////////////////////////////////////////////
//Title,link and text for column1 block 2.//
////////////////////////////////////////////
//column1 -- Block2
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'custom',
	'settings'    => 'b2c1-text',
	'section'     => 'block2',
	'default'     => '<div><h2>First Column</h2><hr>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
	'priority'    => 10,
) );
  Kirki::add_field( 'b2c1-icon', array(
      'type'        => 'text',
      'settings'    => 'b2c1-icon',
      'label'       => __( 'First Column Icon', 'kirki-demo' ),
      'tooltip'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'fa-taxi',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c1-title', array(
      'type'        => 'text',
      'settings'    => 'b2c1-title',
      'label'       => __( 'First Column Title', 'kirki-demo' ),
      'tooltip'        => __( 'Enter a title for the first column', 'kirki-demo' ),
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
    'tooltip'     => 'Select a title link for the first column',
    'default'     => '',
    'priority'    => 10,
    'multiple'    => 1,
  ) );
  Kirki::add_field( 'b2c1-text', array(
      'type'        => 'textarea',
      'settings'    => 'b2c1-text',
      'label'       => __( 'First Column Text', 'kirki-demo' ),
      'tooltip'     => __( 'Enter the text that will appear in the first column of block 2', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "textarea" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'Nam pretium magna non enim finibus dignissim. Suspendisse felis ipsum, finibus ac eros ut, rhoncus consequat nisl.',
      'priority'    => 10,
  ) );

//column 2 -- Block2
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'custom',
	'settings'    => 'b2c2-div',
	'section'     => 'block2',
	'default'     => '<div><hr><h2>Second Column</h2>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
	'priority'    => 10,
) );
  Kirki::add_field( 'b2c2-icon', array(
      'type'        => 'text',
      'settings'    => 'b2c2-icon',
      'label'       => __( 'Second Column Icon', 'kirki-demo' ),
      'tooltip'     => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'fa-taxi',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c2-title', array(
      'type'        => 'text',
      'settings'    => 'b2c2-title',
      'label'       => __( 'Second Column Title', 'kirki-demo' ),
      'tooltip'     => __( 'Enter a title for the second column of block 2', 'kirki-demo' ),
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
    'tooltip'     => 'Select a title link for the second column of block 2',
    'default'     => '',
    'priority'    => 10,
    'multiple'    => 1,
  ) );
  Kirki::add_field( 'b2c2-text', array(
      'type'        => 'textarea',
      'settings'    => 'b2c2-text',
      'label'       => __( 'Second Column Text', 'kirki-demo' ),
      'tooltip'     => __( 'Enter the text that will appear in the second column of block 2', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "textarea" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'Curabitur porta dui at diam iaculis dapibus. Vivamus efficitur interdum mi vel sagittis. Vivamus sagittis aliquet pretium. Nulla ultrices in tortor sed facilisis.',
      'priority'    => 10,
  ) );

//Column 3 -- Block2
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'custom',
	'settings'    => 'b2c3-div',
	'section'     => 'block2',
	'default'     => '<div><hr><h2>First Column</h2>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
	'priority'    => 10,
) );
  Kirki::add_field( 'b2c3-icon', array(
      'type'        => 'text',
      'settings'    => 'b2c3-icon',
      'label'       => __( 'Third Column Icon', 'kirki-demo' ),
      'tooltip'     => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'fa-taxi',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c3-title', array(
      'type'        => 'text',
      'settings'    => 'b2c3-title',
      'label'       => __( 'Third Column Title', 'kirki-demo' ),
      'tooltip'     => __( 'Enter a title for column three of block 2', 'kirki-demo' ),
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
    'tooltip'     => 'Select a title link for column three of block 2',
    'default'     => '',
    'priority'    => 10,
    'multiple'    => 1,
  ) );
  Kirki::add_field( 'b2c3-text', array(
      'type'        => 'textarea',
      'settings'    => 'b2c3-text',
      'label'       => __( 'Third Column Text', 'kirki-demo' ),
      'tooltip'     => __( 'Enter the text that will appear in column three of block 2', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "textarea" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet efficitur elit.',
      'priority'    => 10,
  ) );

//Column 4 -- Block2
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'custom',
	'settings'    => 'b2c4-div',
	'section'     => 'block2',
	'default'     => '<div><hr><h2>First Column</h2>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
	'priority'    => 10,
) );
  Kirki::add_field( 'b2c4-icon', array(
      'type'        => 'text',
      'settings'    => 'b2c4-icon',
      'label'       => __( 'Fourth Column Icon', 'kirki-demo' ),
      'tooltip'     => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block2',
      'default'     => 'fa-taxi',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c4-title', array(
      'type'        => 'text',
      'settings'    => 'b2c4-title',
      'label'       => __( 'Fourth Column Title', 'kirki-demo' ),
      'tooltip'     => __( 'Enter the title for the fourth column of block 2', 'kirki-demo' ),
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
    'tooltip'     => 'Select a title link for the fourth column of block 2',
    'default'     => '',
    'priority'    => 10,
    'multiple'    => 1,
  ) );
  Kirki::add_field( 'b2c4-text', array(
      'type'        => 'textarea',
      'settings'    => 'b2c4-text',
      'label'       => __( 'Fourth Column Text', 'kirki-demo' ),
      'tooltip'     => __( 'Enter the text that will appear in the fourth column of block 2', 'kirki-demo' ),
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
      'label'       => __( 'Block 3', 'pressforward_tk_theme' ),
      'section'     => 'block3',
      'tooltip'     => 'This switch turns Block 3 on or off',
      'default'     => '1',
      'priority'    => 10,

  ) );

  //add control for number of rows in block 3
  Kirki::add_field( 'b3-numrows', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'b3-numrows',
    'label'       => __( 'Number of Rows Block 3', 'kirki-demo' ),
    'section'     => 'block3',
    'tooltip'     => 'Select the number of rows for Block 3',
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
    Kirki::add_field( 'pftk_opts', array(
    	'type'        => 'custom',
    	'settings'    => 'b3r1c1-div',
    	'section'     => 'block3',
    	'default'     => '<div><h2>First Row First Column</h2><hr>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
    	'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c1-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r1c1-icon',
        'label'       => __( 'First Row First Column Icon', 'kirki-demo' ),
        'tooltip'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c1-title', array(
        'type'        => 'text',
        'settings'    => 'b3r1c1-title',
        'label'       => __( 'First Row First Column Title', 'kirki-demo' ),
        'tooltip'        => __( 'Enter a title for the first row of the first column', 'kirki-demo' ),
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
      'tooltip'     => __( 'Select a link for the first row in the first column', 'kirki-demo' ),
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r1c1-category', array(
        'type'        => 'select',
        'settings'    => 'b3r1c1-category',
        'label'       => __( 'First Row First Column Category', 'pressforward_tk_theme' ),
        'description' => __( 'Select a category', 'pressforward_tk_theme' ),
        'tooltip'        => __( 'Select a category for the first row of the first column.', 'kirki' ),
        'section'     => 'block3',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => Kirki_Helper::get_terms( 'category' ),
    ) );
    /*********************
    Homepage -- Block 3 Row 1 Column 2 -- Options
    *********************/
    Kirki::add_field( 'pftk_opts', array(
      'type'        => 'custom',
      'settings'    => 'b3r1c2-div',
      'section'     => 'block3',
      'default'     => '<div><h2>First Row Second Column</h2><hr>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
      'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c2-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r1c2-icon',
        'label'       => __( 'First Row Second Column Icon', 'kirki-demo' ),
        'tooltip'     => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c2-title', array(
        'type'        => 'text',
        'settings'    => 'b3r1c2-title',
        'label'       => __( 'First Row Second Column Title', 'kirki-demo' ),
        'help'        => __( 'Enter a title for the first row of the second column', 'kirki-demo' ),
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
      'tooltip'     => __( 'Select a link for the second row of the first column', 'kirki-demo' ),
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r1c2-category', array(
        'type'        => 'select',
        'settings'    => 'b3r1c2-category',
        'label'       => __( 'First Row Second Column Category', 'pressforward_tk_theme' ),
        'description' => __( 'Select a category', 'kirki' ),
        'tooltip'        => __( 'Select a category for the first row of the second column.', 'pressforward_tk_theme' ),
        'label'       => __( 'Category', 'pressforward_tk_theme' ),
        'description' => __( 'This is the control description', 'pressforward_tk_theme' ),
        'tooltip'        => __( 'Select a category for the first row of the second column.', 'pressforward_tk_theme' ),
        'section'     => 'block3',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => Kirki_Helper::get_terms( 'category' ),
    ) );
    /*********************
    Homepage -- Block 3 Row 1 Column 3 -- Options
    *********************/
    Kirki::add_field( 'pftk_opts', array(
      'type'        => 'custom',
      'settings'    => 'b3r1c3-div',
      'section'     => 'block3',
      'default'     => '<div><h2>First Row Third Column</h2><hr>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
      'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c3-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r1c3-icon',
        'label'       => __( 'First Row Third Column Icon', 'kirki-demo' ),
        'tooltip'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c3-title', array(
        'type'        => 'text',
        'settings'    => 'b3r1c3-title',
        'label'       => __( 'First Row Third Column Title', 'kirki-demo' ),
        'tooltip'     => __( 'Enter a title for the first row of the thrid column', 'kirki-demo' ),
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
      'tooltip'     => __( 'Select a link for the first row of the third column', 'kirki-demo' ),
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r1c3-category', array(
        'type'        => 'select',
        'settings'    => 'b3r1c3-category',
        'label'       => __( 'First Row Third Column Category', 'pressforward_tk_theme' ),
        'description' => __( 'Select a category', 'pressforward_tk_theme' ),
        'tooltip'     => __( 'Select a category for the first row of column 3.', 'pressforward_tk_theme' ),
        'label'       => __( 'Category', 'pressforward_tk_theme' ),
        'description' => __( 'This is the control description', 'pressforward_tk_theme' ),
        'tooltip'     => __( 'Select a category for the first row of column 3.', 'pressforward_tk_theme' ),
        'section'     => 'block3',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => Kirki_Helper::get_terms( 'category' ),
    ) );

    /*********************
    Homepage -- Block 3 Row 2 Column 1 -- Options
    *********************/
    Kirki::add_field( 'pftk_opts', array(
    	'type'        => 'custom',
    	'settings'    => 'b3r2c1-div',
    	'section'     => 'block3',
    	'default'     => '<div><h2>Second Row First Column</h2><hr>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
    	'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c1-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r2c1-icon',
        'label'       => __( 'Second Row First Column Icon', 'kirki-demo' ),
        'tooltip'     => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c1-title', array(
        'type'        => 'text',
        'settings'    => 'b3r2c1-title',
        'label'       => __( 'Second Row First Column Title', 'kirki-demo' ),
        'tooltip'     => __( 'Enter a title for the second row of the first column', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'B3-R2-C1 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c1-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b3r2c1-link',
      'label'       => __( 'Second Row First Column Link', 'kirki-demo' ),
      'section'     => 'block3',
      'tooltip'     => __( 'Select a link for the second row of the first column', 'kirki-demo' ),
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r2c1-category', array(
        'type'        => 'select',
        'settings'    => 'b3r2c1-category',
        'label'       => __( 'Second Row First Column Category', 'pressforward_tk_theme' ),
        'description' => __( 'Select a category', 'pressforward_tk_theme' ),
        'tooltip'        => __( 'Select a category for the second row of the first column', 'pressforward_tk_theme' ),
        'section'     => 'block3',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => Kirki_Helper::get_terms( 'category' ),
    ) );

    /*********************
    Homepage -- Block 3 Row 1 Column 3 -- Options
    *********************/
    Kirki::add_field( 'pftk_opts', array(
    	'type'        => 'custom',
    	'settings'    => 'b3r2c2-div',
    	'section'     => 'block3',
    	'default'     => '<div><h2>Second Row Second Column</h2><hr>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
    	'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c2-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r2c2-icon',
        'label'       => __( 'Second Row Second Column Icon', 'kirki-demo' ),
        'tooltip'     => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c2-title', array(
        'type'        => 'text',
        'settings'    => 'b3r2c2-title',
        'label'       => __( 'Second Row Second Column Title', 'kirki-demo' ),
        'tooltip'        => __( 'Enter a title for the second row of the second column', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'B3-R2-C2 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c2-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b3r2c2-link',
      'label'       => __( 'Second Row Second Column Link', 'kirki-demo' ),
      'section'     => 'block3',
      'tooltip'     => __( 'Select a link for the second row of the second column', 'kirki-demo' ),
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r2c2-category', array(
        'type'        => 'select',
        'settings'    => 'b3r2c2-category',
        'label'       => __( 'Second Row Second Column Category', 'pressforward_tk_theme' ),
        'description' => __( 'Select a category', 'kirki' ),
        'tooltip'     => __( 'Select a category for the second row of the second column', 'pressforward_tk_theme' ),
        'section'     => 'block3',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => Kirki_Helper::get_terms( 'category' ),
    ) );
    /*********************
    Homepage -- Block 3 Row 1 Column 3 -- Options
    *********************/
    Kirki::add_field( 'pftk_opts', array(
    	'type'        => 'custom',
    	'settings'    => 'b3r2c3-div',
    	'section'     => 'block3',
    	'default'     => '<div><h2>Second Row Third Column</h2><hr>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
    	'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c3-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r2c3-icon',
        'label'       => __( 'Second Row Third Column Icon', 'kirki-demo' ),
        'tooltip'     => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c3-title', array(
        'type'        => 'text',
        'settings'    => 'b3r2c3-title',
        'label'       => __( 'Second Row Third Column Title', 'kirki-demo' ),
        'tooltip'     => __( 'Enter a title for the second row of the third column', 'kirki-demo' ),
        'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
        'section'     => 'block3',
        'default'     => 'B3-R2-C3 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c3-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b3r2c3-link',
      'label'       => __( 'Second Row Third Column Link', 'kirki-demo' ),
      'section'     => 'block3',
      'tooltip'     => __( 'Select a link for the second row of the third column', 'kirki-demo' ),
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r2c3-category', array(
        'type'        => 'select',
        'settings'    => 'b3r2c3-category',
        'label'       => __( 'Second Row Third Column Category', 'pressforward_tk_theme' ),
        'description' => __( 'Select a category', 'kirki' ),
        'tooltip'     => __( 'Select a category for the second row of the third column', 'pressforward_tk_theme' ),
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
      'label'       => __( 'Block 4', 'pressforward_tk_theme' ),
      'section'     => 'block4',
      'tooltip'     => 'This switch turns Block 4 on or off',
      'default'     => '1',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b4-title', array(
      'type'        => 'text',
      'settings'    => 'b4-title',
      'label'       => __( 'Block 4 Title', 'kirki-demo' ),
      'tooltip'        => __( 'Enter a title for Block 4', 'kirki-demo' ),
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
    'tooltip'     => 'Select a title link for Block 4',
    'default'     => '',
    'priority'    => 10,
    'multiple'    => 1,
  ) );
  Kirki::add_field( 'b4-text', array(
      'type'        => 'textarea',
      'settings'    => 'b4-text',
      'label'       => __( 'Block 4 Text', 'kirki-demo' ),
      'tooltip'        => __( 'Enter the text that you want to appear in Block 4', 'kirki-demo' ),
      'default'     => __( 'This text is entered in the "text" control.', 'kirki-demo' ),
      'section'     => 'block4',
      'default'     => 'Default text for block 4.',
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
           => __( 'Edit the content and appearance of the fifth block on the homepage.' ),
        'panel'          => 'homepage', // Not typically needed.
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ) );
    //Create on/off switch for block 3.
    Kirki::add_field( 'toggle-b5', array(
        'type'        => 'switch',
        'settings'    => 'toggle-b5',
        'label'       => __( 'Block 5', 'pressforward_tk_theme' ),
        'tooltip'     => 'This switch turns Block 5 on or off',
        'section'     => 'block5',
        'default'     => '1',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b5-title', array(
        'type'        => 'text',
        'settings'    => 'b5-title',
        'label'       => __( 'Block 5 Title', 'kirki-demo' ),
        'tooltip'        => __( 'Enter a title for Block 5', 'kirki-demo' ),
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
      'tooltip'     => 'Select a title link for Block 5',
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
       => __( 'Edit the content and appearance of the footer on the homepage.' ),
    'panel'          => 'homepage', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_field( 'toggle-footer', array(
    'type'        => 'switch',
    'settings'    => 'toggle-footer',
    'label'       => __( 'Footer', 'pressforward_tk_theme' ),
    'section'     => 'footer',
    'tooltip'     => 'This switch turns the footer on or off.',
    'default'     => '1',
    'priority'    => 10,
) );
Kirki::add_field( 'toggle-copyright', array(
    'type'        => 'switch',
    'settings'    => 'toggle-copyright',
    'label'       => __( 'Display Copyright and Sitename', 'pressforward_tk_theme' ),
    'section'     => 'footer',
    'tooltip'     => 'This switch turns the copyright and sitename information on or off.',
    'default'     => '1',
    'priority'    => 10,
) );
Kirki::add_field( 'toggle-footer-text', array(
    'type'        => 'switch',
    'settings'    => 'toggle-footer-text',
    'label'       => __( 'Toggle Footer Text', 'pressforward_tk_theme' ),
    'section'     => 'footer',
    'tooltip'     => 'This switch turns the footer text on or off.',
    'default'     => '1',
    'priority'    => 10,
) );
Kirki::add_field( 'footer-text', array(
	'type'     => 'textarea',
	'settings' => 'footer-text',
	'label'    => __( 'Footer Text', 'pressforward_tk_theme' ),
	'section'  => 'Footer',
  'tooltip'  => 'Enter the text that will appear in the footer.',
	'default'  => esc_attr__( 'This is a defualt value', 'pressforward_tk_theme' ),
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
	'label'       => esc_attr__( 'Body Font', 'pressforward_tk_theme' ),
	'section'     => 'fontcontrol',
  'tooltip'  => 'This section controls the appearance of the body text.',
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
			'element' => 'p',
		),
	),
) );

Kirki::add_field( 'pftk_opts', array(
'type'        => 'typography',
'settings'    => 'header-font',
'label'       => esc_attr__( 'Header Font', 'pressforward_tk_theme' ),
'section'     => 'fontcontrol',
'tooltip'  => 'This section controls the appearance of the body text.',
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
  'type'        => 'custom',
  'settings'    => 'topbar-div',
  'section'     => 'colors',
  'default'     => '<div><h2>Top Bar Styling</h2><hr>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
  'priority'    => 10,
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'topbar',
	'label'       => __( 'Top Bar Background Color', 'pressforward_tk_theme' ),
	'section'     => 'colors',
	'default'     => '',
  'tooltip'     => 'Select a background color for the bar that appears on the top of the page.',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.top-bar, .menu-text, .menu-item, .top-bar ul, #navrow, .header, .title-bar',
			'property' => 'background-color',
		),
	),
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'topbar-text',
	'label'       => __( 'Top Bar Text Color', 'pressforward_tk_theme' ),
	'section'     => 'colors',
  'tooltip'     => 'Select a text color for the bar that appears at the top of the page.',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.top-bar a, .top-bar p, .title-bar a, .title-bar-title',
			'property' => 'color',
		),
	),
) );

// slider bg color
Kirki::add_field( 'pftk_opts', array(
  'type'        => 'custom',
  'settings'    => 'slider-div',
  'section'     => 'colors',
  'default'     => '<div><h2>Slider</h2><hr>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
  'priority'    => 10,
) );
Kirki::add_field( 'slider-color-1', array(
	'type'        => 'color',
	'settings'    => 'slider-color-1',
	'label'       => __( 'Slider Gradient (Color #1)', 'pressforward_tk_theme' ),
	'section'     => 'colors',
  'tooltip'     => 'Select a gradient color for the top of the slider. This will blend with the second gradient color.',
	'default'     => '#0088CC',
	'priority'    => 10,
	'alpha'       => true,
) );
Kirki::add_field( 'slider-color-2', array(
	'type'        => 'color',
	'settings'    => 'slider-color-2',
	'label'       => __( 'Slider Gradient (Color #2)', 'pressforward_tk_theme' ),
	'section'     => 'colors',
  'tooltip'     => 'Select a gradient color for the bottom of the slider. This will blend with the first gradient color.',
	'default'     => '#0088CC',
	'priority'    => 10,
	'alpha'       => true,
) );
//slider txt color
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'orbit-bullets',
	'label'       => __( 'Slider Bullets', 'pressforward_tk_theme' ),
	'section'     => 'colors',
  'tooltip'     => 'Select a color for the slider bullets.',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '#slider-nav button',
			'property' => 'background-color',
		),
	),
) );
Kirki::add_field( 'pftk_opts', array(
  'type'        => 'custom',
  'settings'    => 'b2-div',
  'section'     => 'colors',
  'default'     => '<div><h2>Block 2</h2><hr>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
  'priority'    => 10,
) );
// b2 bg color
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b2-bg-color',
	'label'       => __( 'Block 2 Background Color', 'pressforward_tk_theme' ),
	'section'     => 'colors',
  'tooltip'     => 'Select a background color for block 2.',
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
//icon color
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b2-icon-color',
	'label'       => __( 'Block 2 Icon Color', 'pressforward_tk_theme' ),
	'section'     => 'colors',
  'tooltip'     => 'Select a color for the icons in block 2.',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.block-2 i',
			'property' => 'color',
		),
	),
) );
//b2 link color
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'multicolor',
	'settings'    => 'b2-link-color',
	'label'       => __( 'Block 2 Link Color', 'pressforward_tk_theme' ),
	'section'     => 'colors',
	'priority'    => 10,
  'tooltip'     => 'Select a link color, a hover color, an active link color for block 2.',
  'choices'     => array(
          'link'    => esc_attr__( 'Color', 'pressforward_tk_theme' ),
          'hover'   => esc_attr__( 'Hover', 'pressforward_tk_theme' ),
          'active'  => esc_attr__( 'Active', 'pressforward_tk_theme' ),
      ),
      'default'     => array(
             'link'    => '',
             'hover'   => '',
             'active'  => '',
         ),
  'output'    => array(
         array(
           'choice'   => 'link',
           'element'  => '.block-2 a',
           'property' => 'color',
         ),
         array(
           'choice'   => 'hover',
           'element'  => '.block-2 a:hover',
           'property' => 'color',
         ),
         array(
           'choice'   => 'active',
           'element'  => '.block-2 a:active',
           'property' => 'color',
         ),
       )
) );

//b2 text color
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b2-text-color',
	'label'       => __( 'Block 2 Text Color', 'pressforward_tk_theme' ),
	'section'     => 'colors',
	'default'     => '',
  'tooltip'     => 'Select a text color for block 2.',
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
  'type'        => 'custom',
  'settings'    => 'b3-div',
  'section'     => 'colors',
  'default'     => '<div><h2>Block 3</h2><hr>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
  'priority'    => 10,
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b3-bg-color',
	'label'       => __( 'Block 3 Background Color', 'pressforward_tk_theme' ),
	'section'     => 'colors',
	'default'     => '',
  'tooltip'     => 'Select a background color for block 3.',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.block-3',
			'property' => 'background-color',
		),
	),
) );
//icon color
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b3-icon-color',
	'label'       => __( 'Block 3 Icon Color', 'pressforward_tk_theme' ),
	'section'     => 'colors',
  'tooltip'     => 'Select a color for the icons in block 3.',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.block-3 i',
			'property' => 'color',
		),
	),
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'multicolor',
	'settings'    => 'b3-link-color',
	'label'       => __( 'Block 3 Link Color', 'pressforward_tk_theme' ),
	'section'     => 'colors',
	'priority'    => 10,
  'tooltip'     => 'Select a link color, a hover color, an active link color for block 3.',
  'choices'     => array(
          'link'    => esc_attr__( 'Color', 'pressforward_tk_theme' ),
          'hover'   => esc_attr__( 'Hover', 'pressforward_tk_theme' ),
          'active'  => esc_attr__( 'Active', 'pressforward_tk_theme' ),
      ),
      'default'     => array(
             'link'    => '',
             'hover'   => '',
             'active'  => '',
         ),
  'output'    => array(
         array(
           'choice'   => 'link',
           'element'  => '.block-3 a',
           'property' => 'color',
         ),
         array(
           'choice'   => 'hover',
           'element'  => '.block-3 a:hover',
           'property' => 'color',
         ),
         array(
           'choice'   => 'active',
           'element'  => '.block-3 a:active',
           'property' => 'color',
         ),
       )
) );
Kirki::add_field( 'pftk_opts', array(
  'type'        => 'custom',
  'settings'    => 'b4-div',
  'section'     => 'colors',
  'default'     => '<div><h2>Block 4</h2><hr>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
  'priority'    => 10,
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b4-bg-color',
	'label'       => __( 'Block 4 Background Color', 'pressforward_tk_theme' ),
	'section'     => 'colors',
	'default'     => '',
  'tooltip'     => 'Select a background color for block 4.',
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
	'label'       => __( 'Block 4 Text Color', 'pressforward_tk_theme' ),
	'section'     => 'colors',
	'default'     => '',
  'tooltip'     => 'Select a text color for block 4.',
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
	'type'        => 'multicolor',
	'settings'    => 'b4-link-color',
	'label'       => __( 'Block 4 Link Color', 'pressforward_tk_theme' ),
	'section'     => 'colors',
	'priority'    => 10,
  'tooltip'   => 'Select a link color, a hover color, an active link color for block 4',
  'choices'     => array(
          'link'    => esc_attr__( 'Color', 'pressforward_tk_theme' ),
          'hover'   => esc_attr__( 'Hover', 'pressforward_tk_theme' ),
          'active'  => esc_attr__( 'Active', 'pressforward_tk_theme' ),
      ),
      'default'     => array(
             'link'    => '',
             'hover'   => '',
             'active'  => '',
         ),
  'output'    => array(
         array(
           'choice'   => 'link',
           'element'  => '.block-4 a',
           'property' => 'color',
         ),
         array(
           'choice'   => 'hover',
           'element'  => '.block-4 a:hover',
           'property' => 'color',
         ),
         array(
           'choice'   => 'active',
           'element'  => '.block-4 a:active',
           'property' => 'color',
         ),
       )
) );
Kirki::add_field( 'pftk_opts', array(
  'type'        => 'custom',
  'settings'    => 'b5-div',
  'section'     => 'colors',
  'default'     => '<div><h2>Block 5</h2><hr>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
  'priority'    => 10,
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b5-text-color',
	'label'       => __( 'Block 5 Text Color', 'pressforward_tk_theme' ),
	'section'     => 'colors',
	'default'     => '',
  'tooltip'     => 'Select a text color for block 5.',
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
	'type'        => 'multicolor',
	'settings'    => 'b5-link-color',
	'label'       => __( 'Block 5 Link Color', 'pressforward_tk_theme' ),
	'section'     => 'colors',
	'priority'    => 10,
  'tooltip'   => 'Select a link color, a hover color, an active link color for block 5',
  'choices'     => array(
          'link'    => esc_attr__( 'Color', 'pressforward_tk_theme' ),
          'hover'   => esc_attr__( 'Hover', 'pressforward_tk_theme' ),
          'active'  => esc_attr__( 'Active', 'pressforward_tk_theme' ),
      ),
      'default'     => array(
             'link'    => '',
             'hover'   => '',
             'active'  => '',
         ),
  'output'    => array(
         array(
           'choice'   => 'link',
           'element'  => '.block-5 a',
           'property' => 'color',
         ),
         array(
           'choice'   => 'hover',
           'element'  => '.block-5 a:hover',
           'property' => 'color',
         ),
         array(
           'choice'   => 'active',
           'element'  => '.block-5 a:active',
           'property' => 'color',
         ),
       )
) );

Kirki::add_field( 'b5-color-1', array(
	'type'        => 'color',
	'settings'    => 'b5-color-1',
	'label'       => __( 'Block 5 Gradient (Color #1)', 'pressforward_tk_theme' ),
	'section'     => 'colors',
  'tooltip'     => 'Select a gradient color for the top of block 5. This will blend with the second gradient color.',
	'default'     => '#0088CC',
	'priority'    => 10,
	'alpha'       => true,
) );
Kirki::add_field( 'b5-color-2', array(
	'type'        => 'color',
	'settings'    => 'b5-color-2',
	'label'       => __( 'Block 5 Gradient (Color #2) ', 'pressforward_tk_theme' ),
	'section'     => 'colors',
  'tooltip'     => 'Select a gradient color for the bottom of block 5. This will blend with the first gradient color.',
	'default'     => '#0088CC',
	'priority'    => 10,
	'alpha'       => true,
) );
Kirki::add_field( 'pftk_opts', array(
  'type'        => 'custom',
  'settings'    => 'sw-div',
  'section'     => 'colors',
  'default'     => '<div><h2>Site Wide</h2><hr>' . esc_html__( '', 'pressforward_tk_theme' ) . '</div>',
  'priority'    => 10,
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'body-bg-color',
	'label'       => __( 'Site Background Color ', 'pressforward_tk_theme' ),
	'section'     => 'colors',
	'default'     => '',
  'tooltip'     => 'Select a background color for th entire site.',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '#content',
			'property' => 'background-color',
		),
	),
) );

Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'post-bg-color',
	'label'       => __( 'Post Background Color ', 'pressforward_tk_theme' ),
	'section'     => 'colors',
	'default'     => '',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => 'main, #main',
			'property' => 'background-color',
		),
	),
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'multicolor',
	'settings'    => 'site-link-color',
	'label'       => __( 'Sitewide Link Color', 'pressforward_tk_theme' ),
	'section'     => 'colors',
	'priority'    => 10,
  'tooltip'     => 'Select a link color, a hover color, an active link color for the entire site.',
  'choices'     => array(
          'link'    => esc_attr__( 'Color', 'pressforward_tk_theme' ),
          'hover'   => esc_attr__( 'Hover', 'pressforward_tk_theme' ),
          'active'  => esc_attr__( 'Active', 'pressforward_tk_theme' ),
      ),
      'default'     => array(
             'link'    => '',
             'hover'   => '',
             'active'  => '',
         ),
  'output'    => array(
         array(
           'choice'   => 'link',
           'element'  => 'a',
           'property' => 'color',
         ),
         array(
           'choice'   => 'hover',
           'element'  => 'a:hover',
           'property' => 'color',
         ),
         array(
           'choice'   => 'active',
           'element'  => 'a:active',
           'property' => 'color',
         ),
       )
) );
////// CONTENT SETTINGS SECTION //////



Kirki::add_section( 'content-settings', array(
    'title'          => __( 'Content Options' ),
    'description'    => __( 'Add an image to be shown as header advertisement.' ),
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'custom',
	'settings'    => 'logo-display-div',
  'label'       => '<h2>Logo Display Options</h2>',
	'section'     => 'content-settings',
	'default'     => '<div><hr></div>',
	'priority'    => 10,
) );
//logo upload
Kirki::add_field( 'image_demo', array(
	'type'        => 'image',
	'settings'    => 'image_demo',
	'label'       => __( 'Logo', 'pressforward_tk_theme' ),
	'description' => __( 'Upload a Logo to Display', 'pressforward_tk_theme' ),
	'tooltip'     => __( 'Select a logo image to upload.', 'pressforward_tk_theme' ),
	'section'     => 'content-settings',
	'default'     => '',
	'priority'    => 10,
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'dimension',
	'settings'    => 'img_height',
	'label'       => __( 'Logo Height', 'pressforward_tk_theme' ),
	'section'     => 'content-settings',
  'tooltip'     => 'Enter the logo height using a valid CSS unit: px, em, %, vh, etc. ',
	'default'     => '50px',
	'priority'    => 10,
  'output' => array(
		array(
			'element'  => '.site-logo-img',
			'property' => 'height',
		),
	),
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'dimension',
	'settings'    => 'img_width',
	'label'       => __( 'Logo Width', 'pressforward_tk_theme' ),
	'section'     => 'content-settings',
  'tooltip'     => 'Enter the logo width using a valid CSS unit: px, em, %, vh, etc.',
	'default'     => '50px',
	'priority'    => 10,
  'output' => array(
		array(
			'element'  => '.site-logo-img',
			'property' => 'width',
		),
	),
) );
Kirki::add_field( 'breadcrumbs', array(
	'type'        => 'switch',
	'settings'    => 'breadcrumbs',
	'label'       => __( 'Breadcrumbs', 'pressforward_tk_theme' ),
	'section'     => 'content-settings',
  'tooltip'     => 'This switch turns breadcrumb navigation on or off. Breadcrumbs allow users to track their location in the website.',
	'default'     => '1',
	'priority'    => 10,
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'custom',
	'settings'    => 'author-display-div',
  'label'       => '<h2>Author Display Options</h2>',
	'section'     => 'content-settings',
	'default'     => '<div><hr><p>' . esc_html__( 'Description for author display options goes here.', 'pressforward_tk_theme' ) . '</div>',
	'priority'    => 10,
) );
Kirki::add_field( 'author-name-switch', array(
    'type'        => 'switch',
    'settings'    => 'author-name-switch',
    'label'       => __( 'Display Author Name and Link', 'pressforward_tk_theme' ),
    'section'     => 'content-settings',
    'tooltip'     => 'This switch turns the author name and link on or off.',
    'default'     => '1',
    'priority'    => 10,

) );

Kirki::add_field( 'alt-author-text', array(
	'type'     => 'text',
	'settings' => 'alt-author-text',
	'label'    => __( 'Text to Display Rather than Author Name', 'pressforward_tk_theme' ),
	'section'  => 'content-settings',
  'tooltip'  => 'Text to display in place of the author when the above option is turned off.',
	'priority' => 10,
) );

Kirki::add_field( 'author-exclude-cats', array(
	'type'        => 'select',
	'settings'    => 'author-exclude-cats',
	'label'       => __( 'Author Exclude Categories', 'pressforward_tk_theme' ),
	'section'     => 'content-settings',
  'tooltip'     => 'The categories selected here will display the author name even when the author/link swith is turned off.',
	'priority'    => 10,
	'multiple'    => 999,
  'choices'     => Kirki_Helper::get_terms( 'category' ),
) );
Kirki::add_field( 'author-include-cats', array(
	'type'        => 'select',
	'settings'    => 'author-include-cats',
	'label'       => __( 'Author Include Categories', 'pressforward_tk_theme' ),
	'section'     => 'content-settings',
  'tooltip'     => 'The categories selected here will display the author name andlink even if the display author/link switch is turned off.',
	'priority'    => 10,
	'multiple'    => 999,
  'choices'     => Kirki_Helper::get_terms( 'category' ),
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'custom',
	'settings'    => 'nomcount-display-div',
  'label'       => '<h2>PressForward Nomination Count</h2>',
	'section'     => 'content-settings',
  'tooltip'     => 'this option displays the nomination count for only featured items that appear in the slider....',
	'default'     => '<div><hr></div>',
	'priority'    => 10,
) );
Kirki::add_field( 'nom-count-switch', array(
    'type'        => 'switch',
    'settings'    => 'nom-count-switch',
    'label'       => __( 'Display Nomination Count on Featured Posts', 'pressforward_tk_theme' ),
    'section'     => 'content-settings',
    'tooltip'     => 'This switch turns the nomination count display on or off on individual posts.',
    'default'     => '1',
    'priority'    => 10,

) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'custom',
	'settings'    => 'comment-display-div',
  'label'       => '<h2>Comment Form Display Options</h2>',
	'section'     => 'content-settings',
	'default'     => '<div><hr></div>',
	'priority'    => 10,
) );
Kirki::add_field( 'comment-control', array(
	'type'        => 'radio',
	'settings'    => 'comment-control',
	'label'       => __( 'Comment Form Display', 'pressforward_tk_theme' ),
	'section'     => 'content-settings',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'1'   => array(
			esc_attr__( 'Turn All Comments ON', 'pressforward_tk_theme' ),
			esc_attr__( 'The comment form will display on all posts.', 'pressforward_tk_theme' ),
		),
		'2' => array(
			esc_attr__( 'Turn all comments OFF.', 'pressforward_tk_theme' ),
			esc_attr__( 'The comment form will not be displayed on any posts.', 'pressforward_tk_theme' ),
		),
		'3'  => array(
			esc_attr__( 'Turn comments ON but only for specific categories.', 'pressforward_tk_theme' ),
			esc_attr__( 'The comment form will only be displayed on posts from the categories selected in the option below.', 'pressforward_tk_theme' ),
		),
	),
) );
Kirki::add_field( 'comment-include-cats', array(
	'type'        => 'select',
	'settings'    => 'comment-include-cats',
	'label'       => __( 'Comments on for Specific Categories', 'pressforward_tk_theme' ),
	'section'     => 'content-settings',
	'priority'    => 10,
	'multiple'    => 999,
  'choices'     => Kirki_Helper::get_terms( 'category' ),
) );

Kirki::add_section( 'post-index-page-settings', array(
    'title'          => __( 'Post Index Page Options' ),
    'description'    => __( 'Add an image to be shown as header advertisement.' ),
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_field( 'my_config', array(
	'type'     => 'text',
	'settings' => 'PI-Tab1-Title',
	'label'    => __( 'Text Control', 'my_textdomain' ),
	'section'  => 'my_section',
	'default'  => esc_attr__( 'This is a defualt value', 'my_textdomain' ),
	'priority' => 10,
) );
?>
