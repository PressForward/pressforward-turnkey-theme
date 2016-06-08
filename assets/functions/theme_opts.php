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
      'priority'    => 158,
      'title'       => __( 'Home Page Layout', 'pressforward-turnkey-theme' ),
      'description' => __( 'This panel will provide all the options of the header.', 'pressforward-turnkey-theme' ),
  ) );
  Kirki::add_panel( 'designelements', array(
      'priority'    => 160,
      'title'       => __( 'Design Elements', 'pressforward-turnkey-theme' ),
      'description' => __( 'This panel will provide all the options of the header.', 'pressforward-turnkey-theme' ),
  ) );
  Kirki::add_section( 'content-settings', array(
      'title'          => __( 'Content Options', 'pressforward-turnkey-theme' ),
      'description'    => __( 'The content options panel includes options that are built to compliment the PressForward plugin’s workflow.  Included are category level options to control the display of breadcrumbs,  display of the author, the display of the comment form and the site logo.', 'pressforward-turnkey-theme' ),
      'priority'       => 159,
      'capability'     => 'edit_theme_options',
  ) );

/*********************
Homepage -- Slider -- Options
*********************/


//create slider section
  Kirki::add_section( 'slider', array(
      'title'          => __( 'Slider Options', 'pressforward-turnkey-theme' ),
      'description'    => __( 'The slider consists of a single block that cycles through the most recent posts from a particular “featured” category or categories. Use this panel to set the number of posts that appear in the slider as well as the category or categories from which the slider pulls from. There is an option to turn the autoplay feature on or off. The entire slider block can also be turned on or off.', 'pressforward-turnkey-theme' ),
      'panel'          => 'homepage', // Not typically needed.
      'priority'       => 160,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );

//add fields
Kirki::add_field( 'slider-switch', array(
    'type'        => 'switch',
    'settings'    => 'slider-switch',
    'label'       => __( 'Slider (Block 1)', 'pressforward-turnkey-theme' ),
    'tooltip'     => 'This switch turns the slider on or off',
    'section'     => 'slider',
    'default'     => '1',
    'priority'    => 10,

) );
  Kirki::add_field( 'slider_numposts', array(
      'type'        => 'slider',
      'settings'    => 'slider_numposts',
      'label'       => __( 'Number of Posts', 'pressforward-turnkey-theme' ),
      'description' => __( 'How many posts should appear in the slider.', 'pressforward-turnkey-theme' ),
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
      'label'       => __( 'Number of Words in Slider Post Title', 'pressforward-turnkey-theme' ),
      'description' => __( 'How many posts should appear in the slider.', 'pressforward-turnkey-theme' ),
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
      'label'       => __( 'Number of Words in Slider Excerpt', 'pressforward-turnkey-theme' ),
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
      'label'       => __( 'Slider Post Category', 'pressforward-turnkey-theme' ),
      'description' => __( 'Select a post category for the slider.', 'pressforward-turnkey-theme' ),
      'tooltip'     => __( 'Select the post category that you want to appear in the slider.', 'pressforward-turnkey-theme' ),
      'section'     => 'slider',
      'default'     => '1',
      'priority'    => 10,
      'choices'     => Kirki_Helper::get_terms( 'category' ),
  ) );
  Kirki::add_field( 'slider-autoplay', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'slider-autoplay',
	'label'       => __( 'Slider Autoplay', 'pressforward-turnkey-theme' ),
	'section'     => 'slider',
  'tooltip'     => 'This switch turns the autoplay feature of the slider on or off',
	'default'     => 'autoPlay:false;',
	'priority'    => 10,
	'choices'     => array(
		'autoPlay:true;' => esc_attr__( 'On', 'pressforward-turnkey-theme' ),
    'autoPlay:false;'   => esc_attr__( 'Off', 'pressforward-turnkey-theme' )
	),
) );


/*********************
Homepage -- Block 2 -- Options
*********************/

//Create panel
Kirki::add_section( 'Block2', array(
    'title'          => __( 'Block 2 Options', 'pressforward-turnkey-theme' ),
    'description'    => __( 'The second block of the homepage consists of four “columns”. Each column displays a title which can also link to a page or post within the site. Each column can also include a Font Awesome icon. If you wish include an icon above the title, enter the css class name of the FontAwesome icon in the box(s) below.', 'pressforward-turnkey-theme' ),
    'panel'          => 'homepage', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
//Create on/off switch for block 2.
Kirki::add_field( 'toggle-b2', array(
    'type'        => 'switch',
    'settings'    => 'toggle-b2',
    'label'       => __( 'Block 2', 'pressforward-turnkey-theme' ),
    'section'     => 'block2',
    'tooltip'     => 'This switch turns Block 2 on or off',
    'default'     => '1',
    'priority'    => 10,

) );
Kirki::add_field( 'b2-maketitlelinked', array(
'type'        => 'checkbox',
'settings'    => 'b2c1-maketitlelinked',
'label'       => __( 'Make Column Title a Link', 'my_textdomain' ),
'section'     => 'block2',
'default'     => '0',
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
	'default'     => '<div><h2>First Column</h2><hr>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
	'priority'    => 10,
) );
  Kirki::add_field( 'b2c1-icon', array(
      'type'        => 'text',
      'settings'    => 'b2c1-icon',
      'label'       => __( 'First Column Icon', 'pressforward-turnkey-theme' ),
      'tooltip'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'pressforward-turnkey-theme' ),
      'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
      'section'     => 'block2',
      'default'     => 'fa-taxi',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c1-title', array(
      'type'        => 'text',
      'settings'    => 'b2c1-title',
      'label'       => __( 'First Column Title', 'pressforward-turnkey-theme' ),
      'tooltip'     => __( 'Enter a title for the first column', 'pressforward-turnkey-theme' ),
      'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
      'section'     => 'block2',
      'default'     => 'B2-C1 Title',
      'priority'    => 10,
  ) );

  Kirki::add_field( 'b2c1-link', array(
    'type'        => 'dropdown-pages',
    'settings'    => 'b2c1-link',
    'label'       => __( 'First Column Title Link', 'pressforward-turnkey-theme' ),
    'section'     => 'block2',
    'tooltip'     => 'Select a title link for the first column',
    'default'     => '',
    'priority'    => 10,
    'multiple'    => 1,
    'required'    => array(
      array(
        'setting' => 'b2c1-maketitlelinked',
        'operator' => '==',
        'value' => 1,
      )
    )
  ) );
  Kirki::add_field( 'b2c1-text', array(
      'type'        => 'textarea',
      'settings'    => 'b2c1-text',
      'label'       => __( 'First Column Text', 'pressforward-turnkey-theme' ),
      'tooltip'     => __( 'Enter the text that will appear in the first column of block 2', 'pressforward-turnkey-theme' ),
      'default'     => __( 'This text is entered in the "textarea" control.', 'pressforward-turnkey-theme' ),
      'section'     => 'block2',
      'default'     => 'Nam pretium magna non enim finibus dignissim. Suspendisse felis ipsum, finibus ac eros ut, rhoncus consequat nisl.',
      'priority'    => 10,
  ) );

//column 2 -- Block2
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'custom',
	'settings'    => 'b2c2-div',
	'section'     => 'block2',
	'default'     => '<div><hr><h2>Second Column</h2>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
	'priority'    => 10,
) );
  Kirki::add_field( 'b2c2-icon', array(
      'type'        => 'text',
      'settings'    => 'b2c2-icon',
      'label'       => __( 'Second Column Icon', 'pressforward-turnkey-theme' ),
      'tooltip'     => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'pressforward-turnkey-theme' ),
      'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
      'section'     => 'block2',
      'default'     => 'fa-taxi',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c2-title', array(
      'type'        => 'text',
      'settings'    => 'b2c2-title',
      'label'       => __( 'Second Column Title', 'pressforward-turnkey-theme' ),
      'tooltip'     => __( 'Enter a title for the second column of block 2', 'pressforward-turnkey-theme' ),
      'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
      'section'     => 'block2',
      'default'     => 'B2-C2 Title',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c2-link', array(
    'type'        => 'dropdown-pages',
    'settings'    => 'b2c2-link',
    'label'       => __( 'Second Column Title Link', 'pressforward-turnkey-theme' ),
    'section'     => 'block2',
    'tooltip'     => 'Select a title link for the second column of block 2',
    'default'     => '',
    'priority'    => 10,
    'multiple'    => 1,
    'required'    => array(
      array(
        'setting' => 'b2c1-maketitlelinked',
        'operator' => '==',
        'value' => 1,
      )
    )
  ) );
  Kirki::add_field( 'b2c2-text', array(
      'type'        => 'textarea',
      'settings'    => 'b2c2-text',
      'label'       => __( 'Second Column Text', 'pressforward-turnkey-theme' ),
      'tooltip'     => __( 'Enter the text that will appear in the second column of block 2', 'pressforward-turnkey-theme' ),
      'default'     => __( 'This text is entered in the "textarea" control.', 'pressforward-turnkey-theme' ),
      'section'     => 'block2',
      'default'     => 'Curabitur porta dui at diam iaculis dapibus. Vivamus efficitur interdum mi vel sagittis. Vivamus sagittis aliquet pretium. Nulla ultrices in tortor sed facilisis.',
      'priority'    => 10,
  ) );

//Column 3 -- Block2
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'custom',
	'settings'    => 'b2c3-div',
	'section'     => 'block2',
	'default'     => '<div><hr><h2>Third Column</h2>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
	'priority'    => 10,
) );
  Kirki::add_field( 'b2c3-icon', array(
      'type'        => 'text',
      'settings'    => 'b2c3-icon',
      'label'       => __( 'Third Column Icon', 'pressforward-turnkey-theme' ),
      'tooltip'     => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'pressforward-turnkey-theme' ),
      'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
      'section'     => 'block2',
      'default'     => 'fa-taxi',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c3-title', array(
      'type'        => 'text',
      'settings'    => 'b2c3-title',
      'label'       => __( 'Third Column Title', 'pressforward-turnkey-theme' ),
      'tooltip'     => __( 'Enter a title for column three of block 2', 'pressforward-turnkey-theme' ),
      'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
      'section'     => 'block2',
      'default'     => 'B2-C3 Title',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c3-link', array(
    'type'        => 'dropdown-pages',
    'settings'    => 'b2c3-link',
    'label'       => __( 'Third Column Title Link', 'pressforward-turnkey-theme' ),
    'section'     => 'block2',
    'tooltip'     => 'Select a title link for column three of block 2',
    'default'     => '',
    'priority'    => 10,
    'multiple'    => 1,
    'required'    => array(
      array(
        'setting' => 'b2c1-maketitlelinked',
        'operator' => '==',
        'value' => 1,
      )
    )
  ) );
  Kirki::add_field( 'b2c3-text', array(
      'type'        => 'textarea',
      'settings'    => 'b2c3-text',
      'label'       => __( 'Third Column Text', 'pressforward-turnkey-theme' ),
      'tooltip'     => __( 'Enter the text that will appear in column three of block 2', 'pressforward-turnkey-theme' ),
      'default'     => __( 'This text is entered in the "textarea" control.', 'pressforward-turnkey-theme' ),
      'section'     => 'block2',
      'default'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet efficitur elit.',
      'priority'    => 10,
  ) );

//Column 4 -- Block2
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'custom',
	'settings'    => 'b2c4-div',
	'section'     => 'block2',
	'default'     => '<div><hr><h2>Fourth Column</h2>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
	'priority'    => 10,
) );
  Kirki::add_field( 'b2c4-icon', array(
      'type'        => 'text',
      'settings'    => 'b2c4-icon',
      'label'       => __( 'Fourth Column Icon', 'pressforward-turnkey-theme' ),
      'tooltip'     => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'pressforward-turnkey-theme' ),
      'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
      'section'     => 'block2',
      'default'     => 'fa-taxi',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c4-title', array(
      'type'        => 'text',
      'settings'    => 'b2c4-title',
      'label'       => __( 'Fourth Column Title', 'pressforward-turnkey-theme' ),
      'tooltip'     => __( 'Enter the title for the fourth column of block 2', 'pressforward-turnkey-theme' ),
      'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
      'section'     => 'block2',
      'default'     => 'B2-C4 Title',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b2c4-link', array(
    'type'        => 'dropdown-pages',
    'settings'    => 'b2c4-link',
    'label'       => __( 'Fourth Column Title Link', 'pressforward-turnkey-theme' ),
    'section'     => 'block2',
    'tooltip'     => 'Select a title link for the fourth column of block 2',
    'default'     => '',
    'priority'    => 10,
    'multiple'    => 1,
    'required'    => array(
      array(
        'setting' => 'b2c1-maketitlelinked',
        'operator' => '==',
        'value' => 1,
      )
    )
  ) );
  Kirki::add_field( 'b2c4-text', array(
      'type'        => 'textarea',
      'settings'    => 'b2c4-text',
      'label'       => __( 'Fourth Column Text', 'pressforward-turnkey-theme' ),
      'tooltip'     => __( 'Enter the text that will appear in the fourth column of block 2', 'pressforward-turnkey-theme' ),
      'default'     => __( 'This text is entered in the "textarea" control.', 'pressforward-turnkey-theme' ),
      'section'     => 'block2',
      'default'     => 'Curabitur porta dui at diam iaculis dapibus. Vivamus efficitur interdum mi vel sagittis.',
      'priority'    => 10,
  ) );
/*********************
Homepage -- Block 3 -- Options
*********************/

  //Create panel
  Kirki::add_section( 'Block3', array(
      'title'          => __( 'Block 3 Options', 'pressforward-turnkey-theme' ),
      'description'    => __( 'The third block on the homepage consists of three columns.  There is an option to add a second row for each column. Each of these six sections has a title with the option to make it a link. Each section also has an option to select which category will populate the field. Each section can also display an icon. If you wish include an icon above the title, enter the css class name of the FontAwesome icon in the box(s) below. The entire block can be turned on or off.', 'pressforward-turnkey-theme' ),
      'panel'          => 'homepage', // Not typically needed.
      'priority'       => 160,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );
  //Create on/off switch for block 3.
  Kirki::add_field( 'toggle-b3', array(
      'type'        => 'switch',
      'settings'    => 'toggle-b3',
      'label'       => __( 'Block 3', 'pressforward-turnkey-theme' ),
      'section'     => 'block3',
      'tooltip'     => 'This switch turns Block 3 on or off',
      'default'     => '1',
      'priority'    => 10,

  ) );

  //add control for number of rows in block 3
  Kirki::add_field( 'b3-numrows', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'b3-numrows',
    'label'       => __( 'Number of Rows Block 3', 'pressforward-turnkey-theme' ),
    'section'     => 'block3',
    'tooltip'     => 'Select the number of rows for Block 3',
    'default'     => 'Two',
    'priority'    => 10,
    'choices'     => array(
        'One'   => esc_attr__( 'One', 'pressforward-turnkey-theme' ),
        'Two' => esc_attr__( 'Two', 'pressforward-turnkey-theme' ),
    ),
) );
    /*********************
    Homepage -- Block 3 Row 1 Column 1 -- Options
    *********************/
    Kirki::add_field( 'pftk_opts', array(
    	'type'        => 'custom',
    	'settings'    => 'b3r1c1-div',
    	'section'     => 'block3',
    	'default'     => '<div><h2>First Row First Column</h2><hr>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
    	'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c1-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r1c1-icon',
        'label'       => __( 'First Row First Column Icon', 'pressforward-turnkey-theme' ),
        'tooltip'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'pressforward-turnkey-theme' ),
        'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c1-title', array(
        'type'        => 'text',
        'settings'    => 'b3r1c1-title',
        'label'       => __( 'First Row First Column Title', 'pressforward-turnkey-theme' ),
        'tooltip'        => __( 'Enter a title for the first row of the first column', 'pressforward-turnkey-theme' ),
        'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
        'section'     => 'block3',
        'default'     => 'B3-R1-C1 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c1-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b3r1c1-link',
      'label'       => __( 'First Row First Column Link', 'pressforward-turnkey-theme' ),
      'section'     => 'block3',
      'tooltip'     => __( 'Select a link for the first row in the first column', 'pressforward-turnkey-theme' ),
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r1c1-category', array(
        'type'        => 'select',
        'settings'    => 'b3r1c1-category',
        'label'       => __( 'First Row First Column Category', 'pressforward-turnkey-theme' ),
        'description' => __( 'Select a category', 'pressforward-turnkey-theme' ),
        'tooltip'        => __( 'Select a category for the first row of the first column.', 'pressforward-turnkey-theme' ),
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
      'default'     => '<div><h2>First Row Second Column</h2><hr>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
      'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c2-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r1c2-icon',
        'label'       => __( 'First Row Second Column Icon', 'pressforward-turnkey-theme' ),
        'tooltip'     => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'pressforward-turnkey-theme' ),
        'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c2-title', array(
        'type'        => 'text',
        'settings'    => 'b3r1c2-title',
        'label'       => __( 'First Row Second Column Title', 'pressforward-turnkey-theme' ),
        'help'        => __( 'Enter a title for the first row of the second column', 'pressforward-turnkey-theme' ),
        'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
        'section'     => 'block3',
        'default'     => 'B3-R1-C2 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c2-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b3r1c2-link',
      'label'       => __( 'First Row Second Column Link', 'pressforward-turnkey-theme' ),
      'section'     => 'block3',
      'tooltip'     => __( 'Select a link for the second row of the first column', 'pressforward-turnkey-theme' ),
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r1c2-category', array(
        'type'        => 'select',
        'settings'    => 'b3r1c2-category',
        'label'       => __( 'First Row Second Column Category', 'pressforward-turnkey-theme' ),
        'description' => __( 'Select a category', 'pressforward-turnkey-theme' ),
        'tooltip'        => __( 'Select a category for the first row of the second column.', 'pressforward-turnkey-theme' ),
        'label'       => __( 'Category', 'pressforward-turnkey-theme' ),
        'description' => __( 'This is the control description', 'pressforward-turnkey-theme' ),
        'tooltip'        => __( 'Select a category for the first row of the second column.', 'pressforward-turnkey-theme' ),
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
      'default'     => '<div><h2>First Row Third Column</h2><hr>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
      'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c3-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r1c3-icon',
        'label'       => __( 'First Row Third Column Icon', 'pressforward-turnkey-theme' ),
        'tooltip'        => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'pressforward-turnkey-theme' ),
        'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c3-title', array(
        'type'        => 'text',
        'settings'    => 'b3r1c3-title',
        'label'       => __( 'First Row Third Column Title', 'pressforward-turnkey-theme' ),
        'tooltip'     => __( 'Enter a title for the first row of the thrid column', 'pressforward-turnkey-theme' ),
        'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
        'section'     => 'block3',
        'default'     => 'B3-R1-C3 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r1c3-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b3r1c3-link',
      'label'       => __( 'First Row Third Column Link', 'pressforward-turnkey-theme' ),
      'section'     => 'block3',
      'tooltip'     => __( 'Select a link for the first row of the third column', 'pressforward-turnkey-theme' ),
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r1c3-category', array(
        'type'        => 'select',
        'settings'    => 'b3r1c3-category',
        'label'       => __( 'First Row Third Column Category', 'pressforward-turnkey-theme' ),
        'description' => __( 'Select a category', 'pressforward-turnkey-theme' ),
        'tooltip'     => __( 'Select a category for the first row of column 3.', 'pressforward-turnkey-theme' ),
        'label'       => __( 'Category', 'pressforward-turnkey-theme' ),
        'description' => __( 'This is the control description', 'pressforward-turnkey-theme' ),
        'tooltip'     => __( 'Select a category for the first row of column 3.', 'pressforward-turnkey-theme' ),
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
    	'default'     => '<div><h2>Second Row First Column</h2><hr>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
    	'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c1-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r2c1-icon',
        'label'       => __( 'Second Row First Column Icon', 'pressforward-turnkey-theme' ),
        'tooltip'     => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'pressforward-turnkey-theme' ),
        'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c1-title', array(
        'type'        => 'text',
        'settings'    => 'b3r2c1-title',
        'label'       => __( 'Second Row First Column Title', 'pressforward-turnkey-theme' ),
        'tooltip'     => __( 'Enter a title for the second row of the first column', 'pressforward-turnkey-theme' ),
        'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
        'section'     => 'block3',
        'default'     => 'B3-R2-C1 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c1-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b3r2c1-link',
      'label'       => __( 'Second Row First Column Link', 'pressforward-turnkey-theme' ),
      'section'     => 'block3',
      'tooltip'     => __( 'Select a link for the second row of the first column', 'pressforward-turnkey-theme' ),
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r2c1-category', array(
        'type'        => 'select',
        'settings'    => 'b3r2c1-category',
        'label'       => __( 'Second Row First Column Category', 'pressforward-turnkey-theme' ),
        'description' => __( 'Select a category', 'pressforward-turnkey-theme' ),
        'tooltip'        => __( 'Select a category for the second row of the first column', 'pressforward-turnkey-theme' ),
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
    	'default'     => '<div><h2>Second Row Second Column</h2><hr>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
    	'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c2-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r2c2-icon',
        'label'       => __( 'Second Row Second Column Icon', 'pressforward-turnkey-theme' ),
        'tooltip'     => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'pressforward-turnkey-theme' ),
        'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c2-title', array(
        'type'        => 'text',
        'settings'    => 'b3r2c2-title',
        'label'       => __( 'Second Row Second Column Title', 'pressforward-turnkey-theme' ),
        'tooltip'        => __( 'Enter a title for the second row of the second column', 'pressforward-turnkey-theme' ),
        'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
        'section'     => 'block3',
        'default'     => 'B3-R2-C2 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c2-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b3r2c2-link',
      'label'       => __( 'Second Row Second Column Link', 'pressforward-turnkey-theme' ),
      'section'     => 'block3',
      'tooltip'     => __( 'Select a link for the second row of the second column', 'pressforward-turnkey-theme' ),
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r2c2-category', array(
        'type'        => 'select',
        'settings'    => 'b3r2c2-category',
        'label'       => __( 'Second Row Second Column Category', 'pressforward-turnkey-theme' ),
        'description' => __( 'Select a category', 'pressforward-turnkey-theme' ),
        'tooltip'     => __( 'Select a category for the second row of the second column', 'pressforward-turnkey-theme' ),
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
    	'default'     => '<div><h2>Second Row Third Column</h2><hr>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
    	'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c3-icon', array(
        'type'        => 'text',
        'settings'    => 'b3r2c3-icon',
        'label'       => __( 'Second Row Third Column Icon', 'pressforward-turnkey-theme' ),
        'tooltip'     => __( 'Enter the Font Awesome icon name. i.e. fa-camera-retro', 'pressforward-turnkey-theme' ),
        'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
        'section'     => 'block3',
        'default'     => 'fa-book',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c3-title', array(
        'type'        => 'text',
        'settings'    => 'b3r2c3-title',
        'label'       => __( 'Second Row Third Column Title', 'pressforward-turnkey-theme' ),
        'tooltip'     => __( 'Enter a title for the second row of the third column', 'pressforward-turnkey-theme' ),
        'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
        'section'     => 'block3',
        'default'     => 'B3-R2-C3 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b3r2c3-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b3r2c3-link',
      'label'       => __( 'Second Row Third Column Link', 'pressforward-turnkey-theme' ),
      'section'     => 'block3',
      'tooltip'     => __( 'Select a link for the second row of the third column', 'pressforward-turnkey-theme' ),
      'default'     => '#',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b3r2c3-category', array(
        'type'        => 'select',
        'settings'    => 'b3r2c3-category',
        'label'       => __( 'Second Row Third Column Category', 'pressforward-turnkey-theme' ),
        'description' => __( 'Select a category', 'pressforward-turnkey-theme' ),
        'tooltip'     => __( 'Select a category for the second row of the third column', 'pressforward-turnkey-theme' ),
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
      'title'          => __( 'Block 4 Options', 'pressforward-turnkey-theme' ),
      'description'    => __( 'The fourth block of the homepage is a single row designed to feature some text or site information.. The row includes a title (with an option to make it a link) and text. The entire block can be turned on or off.', 'pressforward-turnkey-theme' ),
      'panel'          => 'homepage', // Not typically needed.
      'priority'       => 160,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );
  //Create on/off switch for block 3.
  Kirki::add_field( 'toggle-b4', array(
      'type'        => 'switch',
      'settings'    => 'toggle-b4',
      'label'       => __( 'Block 4', 'pressforward-turnkey-theme' ),
      'section'     => 'block4',
      'tooltip'     => 'This switch turns Block 4 on or off',
      'default'     => '1',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b4-title', array(
      'type'        => 'text',
      'settings'    => 'b4-title',
      'label'       => __( 'Block 4 Title', 'pressforward-turnkey-theme' ),
      'tooltip'        => __( 'Enter a title for Block 4', 'pressforward-turnkey-theme' ),
      'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
      'section'     => 'block4',
      'default'     => 'Block 4 Title',
      'priority'    => 10,
  ) );
  Kirki::add_field( 'b4-title-link', array(
    'type'        => 'dropdown-pages',
    'settings'    => 'b4-title-link',
    'label'       => __( 'Block 4 Title Link', 'pressforward-turnkey-theme' ),
    'section'     => 'block4',
    'tooltip'     => 'Select a title link for Block 4',
    'default'     => '',
    'priority'    => 10,
    'multiple'    => 1,
  ) );
  Kirki::add_field( 'b4-text', array(
      'type'        => 'textarea',
      'settings'    => 'b4-text',
      'label'       => __( 'Block 4 Text', 'pressforward-turnkey-theme' ),
      'tooltip'        => __( 'Enter the text that you want to appear in Block 4', 'pressforward-turnkey-theme' ),
      'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
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
        'title'          => __( 'Block 5 Options', 'pressforward-turnkey-theme' ),
        'description'    => __( 'The fifth block of the homepage is a single row. This row includes a title that can also link to a page or post within the site. The entire block can be turned on or off.', 'pressforward-turnkey-theme' ),
        'panel'          => 'homepage', // Not typically needed.
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ) );
    //Create on/off switch for block 3.
    Kirki::add_field( 'toggle-b5', array(
        'type'        => 'switch',
        'settings'    => 'toggle-b5',
        'label'       => __( 'Block 5', 'pressforward-turnkey-theme' ),
        'tooltip'     => 'This switch turns Block 5 on or off',
        'section'     => 'block5',
        'default'     => '1',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b5-title', array(
        'type'        => 'text',
        'settings'    => 'b5-title',
        'label'       => __( 'Block 5 Title', 'pressforward-turnkey-theme' ),
        'tooltip'        => __( 'Enter a title for Block 5', 'pressforward-turnkey-theme' ),
        'default'     => __( 'This text is entered in the "text" control.', 'pressforward-turnkey-theme' ),
        'section'     => 'block5',
        'default'     => 'Block 5 Title',
        'priority'    => 10,
    ) );
    Kirki::add_field( 'b5-title-link', array(
      'type'        => 'dropdown-pages',
      'settings'    => 'b5-title-link',
      'label'       => __( 'Block 5 Title Link', 'pressforward-turnkey-theme' ),
      'section'     => 'block5',
      'tooltip'     => 'Select a title link for Block 5',
      'default'     => '',
      'priority'    => 10,
      'multiple'    => 1,
    ) );
    Kirki::add_field( 'b5-categories', array(
    	'type'        => 'select',
    	'settings'    => 'b5-categories',
    	'label'       => __( 'Block 5 Categories', 'pressforward-turnkey-theme' ),
    	'section'     => 'block5',
      'tooltip'     => 'Select a category to display posts from in Block 5.',
    	'priority'    => 10,
    	'multiple'    => 999,
      'choices'     => Kirki_Helper::get_terms( 'category' ),
    ) );



/*********************
**********************
Homepage -- Footer
**********************
*********************/
//Create panel
Kirki::add_section( 'Footer', array(
    'title'          => __( 'Footer', 'pressforward-turnkey-theme' ),
    'description'
       => __( 'Edit the content and appearance of the footer on the homepage.', 'pressforward-turnkey-theme' ),
    'panel'          => 'homepage', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_field( 'toggle-footer', array(
    'type'        => 'switch',
    'settings'    => 'toggle-footer',
    'label'       => __( 'Footer', 'pressforward-turnkey-theme' ),
    'section'     => 'footer',
    'tooltip'     => 'This switch turns the footer on or off.',
    'default'     => '1',
    'priority'    => 10,
) );
Kirki::add_field( 'toggle-copyright', array(
    'type'        => 'switch',
    'settings'    => 'toggle-copyright',
    'label'       => __( 'Display Copyright and Sitename', 'pressforward-turnkey-theme' ),
    'section'     => 'footer',
    'tooltip'     => 'This switch turns the copyright and sitename information on or off.',
    'default'     => '1',
    'priority'    => 10,
) );
Kirki::add_field( 'toggle-footer-text', array(
    'type'        => 'switch',
    'settings'    => 'toggle-footer-text',
    'label'       => __( 'Toggle Footer Text', 'pressforward-turnkey-theme' ),
    'section'     => 'footer',
    'tooltip'     => 'This switch turns the footer text on or off.',
    'default'     => '1',
    'priority'    => 10,
) );
Kirki::add_field( 'footer-text', array(
	'type'     => 'textarea',
	'settings' => 'footer-text',
	'label'    => __( 'Footer Text', 'pressforward-turnkey-theme' ),
	'section'  => 'Footer',
  'tooltip'  => 'Enter the text that will appear in the footer.',
	'default'  => esc_attr__( 'This is a defualt value', 'pressforward-turnkey-theme' ),
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
      'title'          => __( 'Fonts', 'pressforward-turnkey-theme' ),
      'description'    => __( 'The options below control the text appearance for the body and header. ', 'pressforward-turnkey-theme' ),
      'panel'          => 'designelements', // Not typically needed.
      'priority'       => 160,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '', // Rarely needed.
  ) );


  Kirki::add_field( 'pftk_opts', array(
	'type'        => 'typography',
	'settings'    => 'body-font',
	'label'       => esc_attr__( 'Body Font', 'pressforward-turnkey-theme' ),
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
			'element' => 'p, body',
		),
	),
) );

Kirki::add_field( 'pftk_opts', array(
'type'        => 'typography',
'settings'    => 'header-font',
'label'       => esc_attr__( 'Header Font', 'pressforward-turnkey-theme' ),
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
    'title'          => __( 'Colors', 'pressforward-turnkey-theme' ),
    'description'    => __( 'The options below control the colors for each block on the home page. At the bottom, there are also options to control the colors for the entire site. ', 'pressforward-turnkey-theme' ),
    'panel'          => 'designelements', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_field( 'pftk_opts', array(
  'type'        => 'custom',
  'settings'    => 'topbar-div',
  'section'     => 'colors',
  'default'     => '<div><h2>Top Bar Styling</h2><hr>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
  'priority'    => 10,
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'topbar',
	'label'       => __( 'Top Bar Background Color', 'pressforward-turnkey-theme' ),
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
	'label'       => __( 'Top Bar Text Color', 'pressforward-turnkey-theme' ),
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
    array(
      'element' => '.dropdown.menu > li.is-dropdown-submenu-parent > a::after',
      'property' => 'border-color',
    )
	),
) );

// slider bg color
Kirki::add_field( 'pftk_opts', array(
  'type'        => 'custom',
  'settings'    => 'slider-div',
  'section'     => 'colors',
  'default'     => '<div><h2>Slider</h2><hr>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
  'priority'    => 10,
) );
Kirki::add_field( 'slider-color-1', array(
	'type'        => 'color',
	'settings'    => 'slider-color-1',
	'label'       => __( 'Slider Gradient (Color #1)', 'pressforward-turnkey-theme' ),
	'section'     => 'colors',
  'tooltip'     => 'Select a gradient color for the top of the slider. This will blend with the second gradient color.',
	'default'     => '#0088CC',
	'priority'    => 10,
	'alpha'       => true,
) );
Kirki::add_field( 'slider-color-2', array(
	'type'        => 'color',
	'settings'    => 'slider-color-2',
	'label'       => __( 'Slider Gradient (Color #2)', 'pressforward-turnkey-theme' ),
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
	'label'       => __( 'Slider Bullets', 'pressforward-turnkey-theme' ),
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
  'default'     => '<div><h2>Block 2</h2><hr>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
  'priority'    => 10,
) );
// b2 bg color
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b2-bg-color',
	'label'       => __( 'Block 2 Background Color', 'pressforward-turnkey-theme' ),
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
	'label'       => __( 'Block 2 Icon Color', 'pressforward-turnkey-theme' ),
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
	'label'       => __( 'Block 2 Link Color', 'pressforward-turnkey-theme' ),
	'section'     => 'colors',
	'priority'    => 10,
  'tooltip'     => 'Select a link color, a hover color, an active link color for block 2.',
  'choices'     => array(
          'link'    => esc_attr__( 'Color', 'pressforward-turnkey-theme' ),
          'hover'   => esc_attr__( 'Hover', 'pressforward-turnkey-theme' ),
          'active'  => esc_attr__( 'Active', 'pressforward-turnkey-theme' ),
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
	'label'       => __( 'Block 2 Text Color', 'pressforward-turnkey-theme' ),
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
	'type'        => 'color',
	'settings'    => 'b2-heading-color',
	'label'       => __( 'Block 2 Heading Color', 'pressforward-turnkey-theme' ),
  'description' => 'Will only apply if the heading is not linked to a page in the Homepage setup.',
	'section'     => 'colors',
	'default'     => '',
  'tooltip'     => 'Select a text color for block 2.',
	'priority'    => 10,
	'alpha'       => true,
  'output' => array(
		array(
			'element'  => '.block-2 h1',
			'property' => 'color',
		),
	),
) );
Kirki::add_field( 'pftk_opts', array(
  'type'        => 'custom',
  'settings'    => 'b3-div',
  'section'     => 'colors',
  'default'     => '<div><h2>Block 3</h2><hr>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
  'priority'    => 10,
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b3-bg-color',
	'label'       => __( 'Block 3 Background Color', 'pressforward-turnkey-theme' ),
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
	'label'       => __( 'Block 3 Icon Color', 'pressforward-turnkey-theme' ),
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
	'label'       => __( 'Block 3 Link Color', 'pressforward-turnkey-theme' ),
	'section'     => 'colors',
	'priority'    => 10,
  'tooltip'     => 'Select a link color, a hover color, an active link color for block 3.',
  'choices'     => array(
          'link'    => esc_attr__( 'Color', 'pressforward-turnkey-theme' ),
          'hover'   => esc_attr__( 'Hover', 'pressforward-turnkey-theme' ),
          'active'  => esc_attr__( 'Active', 'pressforward-turnkey-theme' ),
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
  'default'     => '<div><h2>Block 4</h2><hr>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
  'priority'    => 10,
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b4-bg-color',
	'label'       => __( 'Block 4 Background Color', 'pressforward-turnkey-theme' ),
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
	'label'       => __( 'Block 4 Text Color', 'pressforward-turnkey-theme' ),
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
	'label'       => __( 'Block 4 Link Color', 'pressforward-turnkey-theme' ),
	'section'     => 'colors',
	'priority'    => 10,
  'tooltip'   => 'Select a link color, a hover color, an active link color for block 4',
  'choices'     => array(
          'link'    => esc_attr__( 'Color', 'pressforward-turnkey-theme' ),
          'hover'   => esc_attr__( 'Hover', 'pressforward-turnkey-theme' ),
          'active'  => esc_attr__( 'Active', 'pressforward-turnkey-theme' ),
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
  'default'     => '<div><h2>Block 5</h2><hr>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
  'priority'    => 10,
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'b5-text-color',
	'label'       => __( 'Block 5 Text Color', 'pressforward-turnkey-theme' ),
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
	'label'       => __( 'Block 5 Link Color', 'pressforward-turnkey-theme' ),
	'section'     => 'colors',
	'priority'    => 10,
  'tooltip'   => 'Select a link color, a hover color, an active link color for block 5',
  'choices'     => array(
          'link'    => esc_attr__( 'Color', 'pressforward-turnkey-theme' ),
          'hover'   => esc_attr__( 'Hover', 'pressforward-turnkey-theme' ),
          'active'  => esc_attr__( 'Active', 'pressforward-turnkey-theme' ),
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
	'label'       => __( 'Block 5 Gradient (Color #1)', 'pressforward-turnkey-theme' ),
	'section'     => 'colors',
  'tooltip'     => 'Select a gradient color for the top of block 5. This will blend with the second gradient color.',
	'default'     => '#0088CC',
	'priority'    => 10,
	'alpha'       => true,
) );
Kirki::add_field( 'b5-color-2', array(
	'type'        => 'color',
	'settings'    => 'b5-color-2',
	'label'       => __( 'Block 5 Gradient (Color #2) ', 'pressforward-turnkey-theme' ),
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
  'default'     => '<div><h2>Site Wide</h2><hr>' . esc_html__( '', 'pressforward-turnkey-theme' ) . '</div>',
  'priority'    => 10,
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'color',
	'settings'    => 'body-bg-color',
	'label'       => __( 'Site Background Color ', 'pressforward-turnkey-theme' ),
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
	'label'       => __( 'Post Background Color ', 'pressforward-turnkey-theme' ),
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
	'label'       => __( 'Sitewide Link Color', 'pressforward-turnkey-theme' ),
	'section'     => 'colors',
	'priority'    => 10,
  'tooltip'     => 'Select a link color, a hover color, an active link color for the entire site.',
  'choices'     => array(
          'link'    => esc_attr__( 'Color', 'pressforward-turnkey-theme' ),
          'hover'   => esc_attr__( 'Hover', 'pressforward-turnkey-theme' ),
          'active'  => esc_attr__( 'Active', 'pressforward-turnkey-theme' ),
      ),
      'default'     => array(
             'link'    => '',
             'hover'   => '',
             'active'  => '',
         ),
  'output'    => array(
         array(
           'choice'   => 'link',
           'element'  => 'a, .breadcrumbs a',
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




Kirki::add_field( 'pftk_opts', array(
	'type'        => 'custom',
	'settings'    => 'logo-display-div',
  'label'       => '<h2>Logo Display Options</h2>',
	'section'     => 'content-settings',
	'default'     => '<div><hr><p>' . esc_html__( 'The options below allow users to upload a logo image that will appear at the top of site. ', 'pressforward-turnkey-theme' ) . '</div>',
	'priority'    => 10,
) );
//logo upload
Kirki::add_field( 'image_demo', array(
	'type'        => 'image',
	'settings'    => 'image_demo',
	'label'       => __( 'Logo', 'pressforward-turnkey-theme' ),
	'description' => __( 'Upload a Logo to Display', 'pressforward-turnkey-theme' ),
	'tooltip'     => __( 'Select a logo image to upload.', 'pressforward-turnkey-theme' ),
	'section'     => 'content-settings',
	'default'     => '',
	'priority'    => 10,
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'dimension',
	'settings'    => 'img_height',
	'label'       => __( 'Logo Height', 'pressforward-turnkey-theme' ),
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
	'label'       => __( 'Logo Width', 'pressforward-turnkey-theme' ),
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
	'label'       => __( 'Breadcrumbs', 'pressforward-turnkey-theme' ),
	'section'     => 'content-settings',
  'tooltip'     => 'This switch allows the user to turn Breadcrumbs on or off. Breadcrumbs are a series of links that appear at the top of a post showing the user where they are in the sitemap and providing them links to return to the homepage.',
	'default'     => '1',
	'priority'    => 10,
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'custom',
	'settings'    => 'author-display-div',
  'label'       => '<h2>Author Display Options</h2>',
	'section'     => 'content-settings',
	'default'     => '<div><hr><p>' . esc_html__( 'The options below control how the author name will display on posts. If "Author Name and Link" is set to on, the theme will display the WordPress author as expected. If turned off, the theme will display the text entered in "Text to Display Rather than Author Name." The categories selected in "Display Author for Categories (Exclude Author Link)" will display the authors name without a link to the author\'s archive of posts. Turning the author name and link off however can be overridden for select categories using the "Display Author for Categories (Include Author Link)" option. The categories selected in this option will display the author\'s name and a link to the author\'s archive of posts as normal. ', 'pressforward-turnkey-theme' ) . '</div>',
	'priority'    => 10,
) );
Kirki::add_field( 'author-name-switch', array(
    'type'        => 'switch',
    'settings'    => 'author-name-switch',
    'label'       => __( 'Display Author Name and Link', 'pressforward-turnkey-theme' ),
    'section'     => 'content-settings',
    'tooltip'     => 'This switch turns the author name and link on or off.',
    'default'     => '1',
    'priority'    => 10,

) );

Kirki::add_field( 'alt-author-text', array(
	'type'     => 'text',
	'settings' => 'alt-author-text',
	'label'    => __( 'Text to Display Rather than Author Name', 'pressforward-turnkey-theme' ),
	'section'  => 'content-settings',
  'tooltip'  => 'If Display Author Name and Link is set to off, this text will appear in place of the author’s name.',
	'priority' => 10,
) );

Kirki::add_field( 'author-exclude-cats', array(
	'type'        => 'select',
	'settings'    => 'author-exclude-cats',
	'label'       => __( 'Display Author for Categories (Exclude Author Link)', 'pressforward-turnkey-theme' ),
	'section'     => 'content-settings',
  'tooltip'     => ' If Display Author Name and Link is set to off, author names will be displayed in the selected categories without a link to all of their work on the site.',
	'priority'    => 10,
	'multiple'    => 999,
  'choices'     => Kirki_Helper::get_terms( 'category' ),
) );
Kirki::add_field( 'author-include-cats', array(
	'type'        => 'select',
	'settings'    => 'author-include-cats',
	'label'       => __( 'Display Author for Categories (Include Author Link)', 'pressforward-turnkey-theme' ),
	'section'     => 'content-settings',
  'tooltip'     => ' If Display Author Name and Link is set to off, author names will be displayed in the selected categories with a link to all of their work on the site.',
	'priority'    => 10,
	'multiple'    => 999,
  'choices'     => Kirki_Helper::get_terms( 'category' ),
) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'custom',
	'settings'    => 'nomcount-display-div',
  'label'       => '<h2>PressForward Nomination Count</h2>',
	'section'     => 'content-settings',
  'default'     => '<div><hr><p>' . esc_html__('This option displays the nomination count for only the featured items that appear in the slider.', 'pressforward-turnkey-theme') . '<div>',
	'priority'    => 10,
) );
Kirki::add_field( 'nom-count-switch', array(
    'type'        => 'switch',
    'settings'    => 'nom-count-switch',
    'label'       => __( 'Display Nomination Count on Featured Posts', 'pressforward-turnkey-theme' ),
    'section'     => 'content-settings',
    'tooltip'     => 'This switch turns the nomination count display on or off for individual posts.',
    'default'     => '1',
    'priority'    => 10,

) );
Kirki::add_field( 'pftk_opts', array(
	'type'        => 'custom',
	'settings'    => 'comment-display-div',
  'label'       => '<h2>Comment Form Display Options</h2>',
	'section'     => 'content-settings',
	'default'     => '<div><hr><p>' . esc_html__( 'The comment display options allow users to turn the comment form on for posts in all categories or only for specific categories. ', 'pressforward-turnkey-theme' ) . '</div>',
	'priority'    => 10,
) );
Kirki::add_field( 'comment-control', array(
	'type'        => 'radio',
	'settings'    => 'comment-control',
	'label'       => __( 'Comment Form Display', 'pressforward-turnkey-theme' ),
	'section'     => 'content-settings',
  'tooltip'     => 'Select whether to turn comments on or off. There is also an option to turn on comments for specific categories.',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'1'   => array(
			esc_attr__( 'Turn All Comments ON', 'pressforward-turnkey-theme' ),
			esc_attr__( 'The comment form will display on all posts.', 'pressforward-turnkey-theme' ),
		),
		'2' => array(
			esc_attr__( 'Turn all comments OFF.', 'pressforward-turnkey-theme' ),
			esc_attr__( 'The comment form will not be displayed on any posts.', 'pressforward-turnkey-theme' ),
		),
		'3'  => array(
			esc_attr__( 'Turn comments ON but only for specific categories.', 'pressforward-turnkey-theme' ),
			esc_attr__( 'The comment form will only be displayed on posts from the categories selected in the option below.', 'pressforward-turnkey-theme' ),
		),
	),
) );
Kirki::add_field( 'comment-include-cats', array(
	'type'        => 'select',
	'settings'    => 'comment-include-cats',
	'label'       => __( 'Comments on for Specific Categories', 'pressforward-turnkey-theme' ),
	'section'     => 'content-settings',
  'tooltip'     => 'Select specific categories to allow comments.',
	'priority'    => 10,
	'multiple'    => 999,
  'choices'     => Kirki_Helper::get_terms( 'category' ),
) );



?>
