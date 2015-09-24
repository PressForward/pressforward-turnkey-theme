<?php

/**
	ReduxFramework Sample Config File
	For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
**/

if ( !class_exists( "ReduxFramework" ) ) {
	return;
} 

if ( !class_exists( "Redux_Framework_sample_config" ) ) {
	class Redux_Framework_sample_config {

		public $args = array();
		public $sections = array();
		public $theme;
		public $ReduxFramework;

		public function __construct( ) {

			// Just for demo purposes. Not needed per say.
			$this->theme = wp_get_theme();

			// Set the default arguments
			$this->setArguments();
			
			// Set a few help tabs so you can see how it's done
			$this->setHelpTabs();

			// Create the sections and fields
			$this->setSections();
			
			if ( !isset( $this->args['opt_name'] ) ) { // No errors please
				return;
			}
			
			$this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
			

			// If Redux is running as a plugin, this will remove the demo notice and links
			//add_action( 'redux/plugin/hooks', array( $this, 'remove_demo' ) );
			
			// Function to test the compiler hook and demo CSS output.
			//add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2); 
			// Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.

			// Change the arguments after they've been declared, but before the panel is created
			//add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
			
			// Change the default value of a field after it's been set, but before it's been used
			//add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );

			// Dynamically add a section. Can be also used to modify sections/fields
			add_filter('redux/options/'.$this->args['opt_name'].'/sections', array( $this, 'dynamic_section' ) );

		}


		/**

			This is a test function that will let you see when the compiler hook occurs. 
			It only runs if a field	set with compiler=>true is changed.

		**/

		function compiler_action($options, $css) {
			echo "<h1>The compiler hook has run!";
			//print_r($options); //Option values
			
			// print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
			/*
			// Demo of how to use the dynamic CSS and write your own static CSS file
		    $filename = dirname(__FILE__) . '/style' . '.css';
		    global $wp_filesystem;
		    if( empty( $wp_filesystem ) ) {
		        require_once( ABSPATH .'/wp-admin/includes/file.php' );
		        WP_Filesystem();
		    }

		    if( $wp_filesystem ) {
		        $wp_filesystem->put_contents(
		            $filename,
		            $css,
		            FS_CHMOD_FILE // predefined mode settings for WP files
		        );
		    }
			*/
		}



		/**
		 
		 	Custom function for filtering the sections array. Good for child themes to override or add to the sections.
		 	Simply include this function in the child themes functions.php file.
		 
		 	NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
		 	so you must use get_template_directory_uri() if you want to use any of the built in icons
		 
		 **/

		function dynamic_section($sections){
		    //$sections = array();
		    $sections[] = array(
		        'title' => __('Section via hook', 'brew-framework'),
		        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'brew-framework'),
				'icon' => 'fa fa-paperclip',
				    // Leave this as a blank section, no options just some intro text set above.
		        'fields' => array()
		    );

		    return $sections;
		}
		
		
		/**

			Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

		**/
		
		function change_arguments($args){
		    //$args['dev_mode'] = true;
		    
		    return $args;
		}
			
		
		/**

			Filter hook for filtering the default value of any given field. Very useful in development mode.

		**/

		function change_defaults($defaults){
		    $defaults['str_replace'] = "Testing filter hook!";
		    
		    return $defaults;
		}


		// Remove the demo link and the notice of integrated demo from the redux-framework plugin
		function remove_demo() {
			
			// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
			if ( class_exists('ReduxFrameworkPlugin') ) {
				remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2 );
			}

			// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
			remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );	

		}


		public function setSections() {

			/**
			 	Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
			 **/


			// Background Patterns Reader
			$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
			$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
			$sample_patterns      = array();

			if ( is_dir( $sample_patterns_path ) ) :
				
			  if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
			  	$sample_patterns = array();

			    while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

			      if( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
			      	$name = explode(".", $sample_patterns_file);
			      	$name = str_replace('.'.end($name), '', $sample_patterns_file);
			      	$sample_patterns[] = array( 'alt'=>$name,'img' => $sample_patterns_url . $sample_patterns_file );
			      }
			    }
			  endif;
			endif;

			ob_start();

			$ct = wp_get_theme();
			$this->theme = $ct;
			$item_name = $this->theme->get('Name'); 
			$tags = $this->theme->Tags;
			$screenshot = $this->theme->get_screenshot();
			$class = $screenshot ? 'has-screenshot' : '';

			$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;','brew-framework' ), $this->theme->display('Name') );

			?>
			<div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
				<?php if ( $screenshot ) : ?>
					<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
					<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr( $customize_title ); ?>">
						<img src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
					</a>
					<?php endif; ?>
					<img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>" alt="<?php esc_attr_e( 'Current theme preview' ); ?>" />
				<?php endif; ?>

				<h4>
					<?php echo $this->theme->display('Name'); ?>
				</h4>

				<div>
					<ul class="theme-info">
						<li><?php printf( __('By %s','brew-framework'), $this->theme->display('Author') ); ?></li>
						<li><?php printf( __('Version %s','brew-framework'), $this->theme->display('Version') ); ?></li>
						<li><?php echo '<strong>'.__('Tags', 'brew-framework').':</strong> '; ?><?php printf( $this->theme->display('Tags') ); ?></li>
					</ul>
					<p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
					<?php if ( $this->theme->parent() ) {
						printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.' ) . '</p>',
							__( 'http://codex.wordpress.org/Child_Themes','brew-framework' ),
							$this->theme->parent()->display( 'Name' ) );
					} ?>
					
				</div>

			</div>

			<?php
			$item_info = ob_get_contents();
			    
			ob_end_clean();

			$sampleHTML = '';
			if( file_exists( dirname(__FILE__).'/info-html.html' )) {
				/** @global WP_Filesystem_Direct $wp_filesystem  */
				global $wp_filesystem;
				if (empty($wp_filesystem)) {
					require_once(ABSPATH .'/wp-admin/includes/file.php');
					WP_Filesystem();
				}  		
				$sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__).'/info-html.html');
			}

			/**
			 	ABOUT THIS THEME TAB
			 		
			 **/		
			$this->sections[] = array(
				'icon' => 'fa fa-info-circle',
				'title' => __('Getting Started', 'brew-framework'),
				'desc' => __('<h4>About this theme</h4><p>This theme was designed to compliment and extend the functionality of the PressForward plugin.  While the plugin is not required to use this theme, the functionality, options, and design of this theme were created with the plugin in mind. For more information on PressFoward visit <a href="http://www.pressforward.org" target="__blank">www.pressforward.org</a>.</p>
					'),
				'fields' => array(
					array(
						'id'=>'raw_new_info',
						'type' => 'raw',
						'content' => $item_info,
						)
					), 
				);

			/**
			 	GENERAL SETTINGS TAB
			 		1. Tracking Code for Google Analytics 
			 		2. Logo Uploader (uploads a logo to the header)
			 **/

			// ACTUAL DECLARATION OF SECTIONS

			$this->sections[] = array(
				'icon' => 'fa fa-wrench',
				'title' => __('General Settings', 'brew-framework'),
				'fields' => array (
					array (
						'id'=>'tracking-code',
						'type' => 'textarea',
						//'required' => array('layout','equals','1'),	
						'title' => __('Tracking Code', 'brew-framework'), 
						'subtitle' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'brew-framework'),
						'validate' => 'js',
						'desc' => 'Validate that it\'s javascript!',
					),
					array (
					    'id'       => 'opt-media',
					    'type'     => 'media', 
					    'url'      => true,
					    'title'    => __('Media w/ URL', 'brew-framework'),
					    'desc'     => __('Basic media uploader with disabled URL input field.', 'brew-framework'),
					    'subtitle' => __('Upload any media using the WordPress native uploader', 'brew-framework'),
					    'width' => 550,
					    'default'  => array(
					        'url'=>'http://chnmdev.gmu.edu/fellows/regan/PressFwd/wp-content/uploads/2014/10/PFLogo_transparent.png'
					    )
					),
					array(
				    'id'       => 'use-logo',
				    'type'		=> 'button_set',
				    'desc'	   => __('Logo files should be long rather than tall due to height restrictions in the navigation bar area.'),
				    'title'    => __('Use an uploaded image for logo', 'brew-framework'),
				    //Must provide key => value pairs for options
				    'options' => array(
				        '1' => 'ON', 
				        '2' => 'OFF'
				     ), 
				    'default' => '1'
					),
					array(
				    'id'       => 'logo-text',
				    'type'     => 'text',
				    'title'    => __('Custom Text to Display Rather than Logo', 'brew-framework')
					),
					array(
    					'id'       => 'comments-setup-buttons',
					    'type'     => 'button_set',
					    'title'    => __('Display Comments', 'brew-framework'),
					    //Must provide key => value pairs for options
					    'options' => array(
					        '1' => 'Turn all comments ON', 
					        '2' => 'Turn all comments OFF', 
					        '3' => 'Turn comments ON, but only for specific categories (select below).'
					     ), 
					    'default' => '1'
					),
					array (
	            	'id'       => 'comments-on-cat',
				    'type'     => 'select',
				    'multi'	   => true,
				    'title'    => __('Post Categories with Comments ON', 'brew-framework'), 
				    'subtitle' => __('If <i>Turn comments ON, but only for specific categories</i> is selected above, use this option to select which categories comments should appear on.'),
				    'data' => 'categories',
				    'default' => '1'
	            	),

				),
			);



$homepage_info = "The theme homepage is composed of several 'blocks' of content. Each block can be configured here. For more information see our github page.";
$this->sections[] = array (
	'icon' => 'fa fa-home',
	'title' => __('Homepage Settings', 'brew-framework'),
	'heading' => 'Homepage Settings',
	'desc' => __('<p class="reduxinfo">This panel provides options for setting up the homepage. Use the tabs to the left to navigate through the options for each homepage block.  For more information visit the theme documentation and setup guide.</p>'),
	'fields' => array(
		array(
			'id'=>'raw_info',
			'type' => 'raw',
			'content' => $homepage_info,
			),
		),
	);
$this->sections[] = array(
				'title' => __('Navigation Bar', 'brew-framework'),
				'icon' => 'fa fa-th',
				'subsection' => true,
				'fields' => array (
					array(
				    'id'       => 'nav-bar-background',
				    'type'     => 'color',
				    'title'    => __('Navigation Bar Background', 'brew-framework'), 
				    'validate' => 'color',
				    'output'    => array(
				    	'background-color' => '.navbar-inverse, .navbar-inverse .navbar-nav > .active > a')
					),
					array(
				    'id'       => 'nav-bar-hover',
				    'type'     => 'color',
				    'title'    => __('Navigation Bar Hover Background', 'brew-framework'), 
				    'validate' => 'color',
				    'output'    => array(
				    	'background-color' => '.navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > .active > a:hover, 
				    	.navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus,
				    	.navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus
				    	')
					),
					array(
				    'id'       => 'nav-bar-hover-border',
				    'type'     => 'color',
				    'title'    => __('Navigation Bar Item Hover Border', 'brew-framework'), 
				    'validate' => 'color',
				    'output'    => array(
				    	'border-top-color' => '.nav > li > a:hover, .nav .open > a, .nav .open > a:hover, .nav .open > a:focus')
					),
					array(
				    'id'       => 'nav-bar-border-color',
				    'type'     => 'color',
				    'title'    => __('Navigation Bar Bottom Border Color', 'brew-framework'), 
				    'validate' => 'color',
				    'output'    => array(
				    	'border-bottom-color' => '.navbar-inverse')
					),
					array(
				    'id'       => 'nav-bar-text',
				    'type'     => 'color',
				    'title'    => __('Navigation Bar Text Color', 'brew-framework'), 
				    'validate' => 'color',
				    'output'    => array(
				    	'color' => '.navbar-inverse .navbar-nav > li > a, .navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a, .navbar-brand > h1')
					),
					
				),
			);

$this->sections[] = array(
    'title' => __('Slider', 'brew-framework'),
    'heading'	=> 'Slider (or Block 1) Settings',
    'icon' => 'fa fa-th',
    'subsection' => true,
    'fields' => array (
    	$fields = 
    		$fields = array(
			    'id'       => 'block1-switch',
			    'type'     => 'button_set',
			    'title'    => __('Slider (Block 1)', 'brew-framework'),
			    'subtitle' => __('Turn the slider on or off.', 'brew-framework'),
			    //Must provide key => value pairs for options
			    'options' => array(
			        '1' => 'ON', 
			        '2' => 'OFF', 
			     ), 
			    'default' => '1'
			),
			array(
				    'id'       => 'background-slider',
				    'type'     => 'color_gradient',
				    'title'    => __('Slider Gradient', 'brew-framework'),
				    'desc'     => __('Choose a start and end color for the slider.', 'brew-framework'),
				    'validate' => 'color'
				    ),
			array(
				    'id'       => 'slider-text',
				    'type'     => 'color',
				    'title'    => __('Text Color', 'brew-framework'), 
				    'validate' => 'color',
				    'output'    => array('color' => '#slidertitle h1, #slidertitle h2, #slidertitle h3, .slider p')
					),
    		array(
			    'id'       => 'slider-categories',
			    'type'     => 'select',
			    'multi'    => true,
			    'title'    => __('Slider Categories', 'brew-framework'), 
			    'subtitle' => __('The categories that the slider should pull from to display the most recent posts.', 'brew-framework'),
			    'data' => 'categories'
			),
			array(
			    'id'       => 'slider-post-quantity',
			    'type'     => 'button_set',
			    'title'    => __('Number of Posts to Display in Slider', 'brew-framework'),
			    //Must provide key => value pairs for options
			    'options' => array(
			        '4' => 'Four Posts (Default)', 
			        '5' => 'Five Posts',
			        '6' => 'Six Posts', 

			     ), 
			    'default' => '4'
			),
    	),
	);
/**
BLOCK 2 SETTINGS
**/
$this->sections[] = array (
	'title' => __('Block 2', 'brew-framework'),
	'subsection' => true,
	'icon' => 'fa fa-th',
	'heading' => 'Block 2 Settings',
	'desc' => __('This panel provides options for setting up the second block on the homepage. Each section below represents one column within the second block.'),
	'fields' => array (
				//START BLOCK 2 OPTIONS
		$fields = array(
	    'id'       => 'block2-switch',
	    'type'     => 'button_set',
	    'title'    => __('Block 2', 'brew-framework'),
	    'subtitle' => __('Turn block 2 on or off.', 'brew-framework'),
	    //Must provide key => value pairs for options
	    'options' => array(
	        '1' => 'ON', 
	        '2' => 'OFF', 
	     ), 
	    'default' => '1'
		),
		$fields = array(
	    'id'       => 'block2-col-number',
	    'type'     => 'button_set',
	    'title'    => __('Number of Block 2 columns', 'brew-framework'),
	    'subtitle' => __('Choose how many columns you would like to appear in block 2.', 'brew-framework'),
	    //Must provide key => value pairs for options
	    'options' => array(
	        '1' => 'Two Columns', 
	        '2' => 'Three Columns',
	        '3' => 'Four Columns'
	     ), 
	    'default' => '3'
		),
		/**
		BLOCK 2 CUSTOM STYLING
		**/
		array (
					'id' => 'block2-colors-start',
					'type' => 'section',
					'title' => __('Custom Styling', 'brew-framework'),
					'indent' => true
					),		
				array(
				    'id'       => 'background-block2',
				    'type'     => 'color',
				    'title'    => __('Background Color', 'brew-framework'), 
				    'validate' => 'color',
				    'output'    => array('background-color' => '.block-2')
					),
				array(
				    'id'       => 'block-2-text',
				    'type'     => 'color',
				    'title'    => __('Text Color', 'brew-framework'), 
				    'validate' => 'color',
				    'output'    => array('color' => '.block-2 p')
					),
				array(
				    'id'       => 'block-2-links',
				    'type'     => 'link_color',
				    'title'    => __('Link Color  <a href="http://www.w3schools.com/css/css_link.asp" target="__blank"><i class="fa fa-question-circle"></i></a>', 'brew-framework'), 
				   	'output'    => array('.block-2 a')
					),
				array (
					'id' => 'block2-colors-end',
					'type' => 'section',
					'indent' => false,
					), //END BLOCK 2 Styling OPTIONS
				array (
					'id' => 'block2-start',
					'type' => 'section',
					'title' => __('Column 1', 'brew-framework'),
					'indent' => true
					),
				array (
					'id'       => 'b2-c1-icon',
	            	'type'     => 'text',
		            'title'    => __('Icon', 'brew-framework'),
		            'subtitle' => __('First column icon.', 'brew-framework'),
		            'desc'     => __('The css sytle for the <a href="http://www.fontawesome.io" target="__blank">FontAwesome</a> icon. (i.e. fa-cab)')
					),
				array (
					'id'       => 'b2-c1-heading',
		            'type'     => 'text',
		            'title'    => __('Heading', 'brew-framework'),
		            'subtitle' => __('First column heading.', 'brew-framework'),
					),
				array (
					'id'       => 'b2-c1-pagelink',
		            'type'     => 'select',
		            'multi' 	=> false,
		            'title'    => __('Heading Link', 'brew-framework'), 
		            'subtitle' => __('Select a page to link to from the heading.', 'brew-framework'),
		            'desc'     => __('Select a page to link to.', 'brew-framework'),
		            // Must provide key => value pairs for select options
		            'data' => _('page'),
					),
				array (
				    'id'=>'b2-c1-text',
				    'type' => 'textarea',
				    'title' => __('Add text', 'brew-framework'), 
				    'subtitle' => __('Text to appear under the icon and heading in the first column. (HTML allowed)', 'brew-framework'),
				    'validate' => 'html_custom',
				    'default' => '<p>This is the <strong>first column.</strong></p>',
				    'allowed_html' => array(
				        'a' => array(
				            'href' => array(),
				            'title' => array()
				        ),
				        'br' => array(),
				        'em' => array(),
				        'strong' => array()
				    )
				),
				array (
					'id' => 'block2-end',
					'type' => 'section',
					'indent' => false,
					), //END BLOCK 2 OPTIONS
				//START BLOCK 2 C2 OPTIONS
				array (
					'id' => 'block2-c2-start',
					'type' => 'section',
					'title' => __('Column 2', 'brew-framework'),
					'indent' => true
					),
				array (
					'id'       => 'b2-c2-icon',
	            	'type'     => 'text',
		            'title'    => __('Icon', 'brew-framework'),
		            'subtitle' => __('Second column icon', 'brew-framework'),
		            'desc'     => __('The css sytle for the <a href="http://www.fontawesome.io" target="__blank">FontAwesome</a> icon. (i.e. fa-cab)')
					),
				array (
					'id'       => 'b2-c2-heading',
		            'type'     => 'text',
		            'title'    => __('Heading', 'brew-framework'),
		            'subtitle' => __('Second column heading', 'brew-framework'),
		  			),
				array (
					'id'       => 'b2-c2-pagelink',
		            'type'     => 'select',
		            'multi' 	=> false,
		            'title'    => __('Heading Link', 'brew-framework'), 
		            'subtitle' => __('Select a page to link to from the heading.', 'brew-framework'),
		            'data' => _('page'),
					),
				array (
				    'id'=>'b2-c2-text',
				    'type' => 'textarea',
				    'title' => __('Add text', 'brew-framework'), 
				    'subtitle' => __('Text for the second column. (HTML allowed)', 'brew-framework'),
				    'validate' => 'html_custom',
				    'default' => '<p>This is the <strong>first column.</strong></p>',
				    'allowed_html' => array(
				        'a' => array(
				            'href' => array(),
				            'title' => array()
				        ),
				        'br' => array(),
				        'em' => array(),
				        'strong' => array()
				    )
				),
				array (
					'id' => 'block2-c2-end',
					'type' => 'section',
					'indent' => false,
					), //END BLOCK2 C2 OPTIONS
				
				//START BLOCK 2 C3 OPTIONS
				array (
					'id' => 'block2-c3-start',
					'type' => 'section',
					'title' => __('Column 3', 'brew-framework'),
					'indent' => true
					),
				array (
					'id'       => 'b2-c3-icon',
	            	'type'     => 'text',
		            'title'    => __('Icon', 'brew-framework'),
		            'subtitle' => __('Third column icon.', 'brew-framework'),
		            'desc'     => __('The css sytle for the <a href="http://www.fontawesome.io" target="__blank">FontAwesome</a> icon. (i.e. fa-cab)')
					),
				array (
					'id'       => 'b2-c3-heading',
		            'type'     => 'text',
		            'title'    => __('Heading', 'brew-framework'),
		            'subtitle' => __('Third column heading.', 'brew-framework'),
		            ),
				array (
					'id'       => 'b2-c3-pagelink',
		            'type'     => 'select',
		            'multi' 	=> false,
		            'title'    => __('Heading Link', 'brew-framework'), 
		            'subtitle' => __('Select a page to link to from the heading.', 'brew-framework'),
		            'data' => _('page'),
					),
				array (
				    'id'=>'b2-c3-text',
				    'type' => 'textarea',
				    'title' => __('Add text', 'brew-framework'), 
				    'subtitle' => __('Text for the third column. (HTML allowed)', 'brew-framework'),
				    'validate' => 'html_custom',
				    'default' => '<p>This is the <strong>first column.</strong></p>',
				    'allowed_html' => array(
				        'a' => array(
				            'href' => array(),
				            'title' => array()
				        ),
				        'br' => array(),
				        'em' => array(),
				        'strong' => array()
				    )
				),
				array (
					'id' => 'block2-c3-end',
					'type' => 'section',
					'indent' => false,
					), //END BLOCK2 C3 OPTIONS
				//START BLOCK 2 C4 OPTIONS
				array (
					'id' => 'block2-c4-start',
					'type' => 'section',
					'title' => __('Column 4', 'brew-framework'),
					'indent' => true
					),
				array (
					'id'       => 'b2-c4-icon',
	            	'type'     => 'text',
		            'title'    => __('Icon', 'brew-framework'),
		            'subtitle' => __('Fourth column icon', 'brew-framework'),
		            'desc'     => __('The css sytle for the <a href="http://www.fontawesome.io" target="__blank">FontAwesome</a> icon. (i.e. fa-cab)')
					),
				array (
					'id'       => 'b2-c4-heading',
		            'type'     => 'text',
		            'title'    => __('Heading', 'brew-framework'),
		            'subtitle' => __('Fourth column heading.', 'brew-framework'),
					),
				array (
					'id'       => 'b2-c4-pagelink',
		            'type'     => 'select',
		            'multi' 	=> false,
		            'title'    => __('Heading Link', 'brew-framework'), 
		            'subtitle' => __('Select a page to link to from the heading.', 'brew-framework'),
		            'data' => _('page'),
					),
				array (
				    'id'=>'b2-c4-text',
				    'type' => 'textarea',
				    'title' => __('Add text', 'brew-framework'), 
				    'subtitle' => __('Text for the fourth column. (HTML allowed)', 'brew-framework'),
				    'validate' => 'html_custom',
				    'default' => '<p>This is the <strong>fourth column.</strong></p>',
				    'allowed_html' => array(
				        'a' => array(
				            'href' => array(),
				            'title' => array()
				        ),
				        'br' => array(),
				        'em' => array(),
				        'strong' => array()
				    )
				),
				array (
					'id' => 'block2-c4-end',
					'type' => 'section',
					'indent' => false,
					), //END BLOCK2 C4 OPTIONS

				),
				);

/**
BLOCK 3 OPTIONS
**/
$this->sections[] = array(
    'title' => __('Block 3', 'brew-framework'),
    'icon' => 'fa fa-th',
    'heading'	=> 'Block 3',
    'subsection' => true,
    'desc' => 'Use this section to set up categories that appear in each block on the homepage as well as to select which icons appear with each category.',
        'fields' => array (
		        $fields = array(
			    'id'       => 'block3-switch',
			    'type'     => 'button_set',
			    'title'    => __('Block 3', 'brew-framework'),
			    'subtitle' => __('Turn block 3 on or off.', 'brew-framework'),
			    //Must provide key => value pairs for options
			    'options' => array(
			        '1' => 'ON', 
			        '2' => 'OFF', 
			     ), 
			    'default' => '1'
				),
				$fields = array(
			    'id'       => 'block3-row-number',
			    'type'     => 'button_set',
			    'title'    => __('Number of Rows in Block 3', 'brew-framework'),
			    'subtitle' => __('Choose how many rows you would like to appear in block 3.', 'brew-framework'),
			    //Must provide key => value pairs for options
			    'options' => array(
			        '1' => 'One Row', 
			        '2' => 'Two Rows'
			     ), 
			    'default' => '2'
				),
				/**
				CUSTOM STYLING BLOCK 3
				**/
				array (
					'id' => 'block3-colors-start',
					'type' => 'section',
					'title' => __('Custom Styling', 'brew-framework'),
					'indent' => true
					),		
				array(
				    'id'       => 'background-block3',
				    'type'     => 'color',
				    'title'    => __('Background Color', 'brew-framework'), 
				    'validate' => 'color',
				    'output'    => array('background-color' => '.block-3')
					),
				array(
				    'id'       => 'block-3-links',
				    'type'     => 'link_color',
				    'title'    => __('Link Color  <a href="http://www.w3schools.com/css/css_link.asp" target="__blank"><i class="fa fa-question-circle"></i></a>', 'brew-framework'), 
				   	'output'    => array('.homeinnercontent a')
					),
				array (
					'id' => 'block3-colors-end',
					'type' => 'section',
					'indent' => false,
					), //END BLOCK 3 Styling OPTIONS
				
        	array (
			'id' => 'block3-c1-start',
			'type' => 'section',
			'title' => __('Row 1 Block 1', 'brew-framework'),
			'indent' => true
			), //START BLOCK 3 SECTION 1 OPTIONS
		            array (
		            'id'       => 'b3-c1-icon',
		            'type'     => 'text',
		            'title'    => __('Icon', 'brew-framework'),
		            'subtitle'     => __('The css sytle for the <a href="http://www.fontawesome.io" target="__blank">FontAwesome</a> icon. (i.e. fa-cab)')
					),
		             array (
		            'id'       => 'b3-c1-title',
		            'type'     => 'text',
		            'title'    => __('Title', 'brew-framework'),
		            ),
		            array (
		            	'id'       => 'b3-c1-category',
					    'type'     => 'select',
					    'title'    => __('Category to Display', 'brew-framework'), 
					    'subtitle' => __('The categories that the slider should pull from to display the most recent posts.', 'brew-framework'),
					    'data' => 'categories',
					    'default' => '1'
		            	),
            array (
			'id' => 'block3-c1-end',
			'type' => 'section',
			'indent' => false,
			), //END BLOCK3 C1 OPTIONS
            
            array (
			'id' => 'block3-c2-start',
			'type' => 'section',
			'title' => __('Row 1 Block 2', 'brew-framework'),
			'indent' => true
			), //START BLOCK 3 SECTION 1 OPTIONS
		            array (
		            'id'       => 'b3-c2-icon',
		            'type'     => 'text',
		            'title'    => __('Icon', 'brew-framework'),
		            'subtitle'     => __('The css sytle for the <a href="http://www.fontawesome.io" target="__blank">FontAwesome</a> icon. (i.e. fa-cab)')
		            ),
		            array (
		            'id'       => 'b3-c2-title',
		            'type'     => 'text',
		            'title'    => __('Title', 'brew-framework'),
		            ),
		            array (
	            	'id'       => 'b3-c2-category',
				    'type'     => 'select',
				    'title'    => __('Category to Display', 'brew-framework'), 
				    'subtitle' => __('The categories that the second column should pull from.', 'brew-framework'),
				    'data' => 'categories',
				    'default' => '1'
	            	),
            array (
			'id' => 'block3-c2-end',
			'type' => 'section',
			'indent' => false,
			), //END BLOCK3 C2 OPTIONS

    		array (
			'id' => 'block3-c3-start',
			'type' => 'section',
			'title' => __('Row 1 Block 3', 'brew-framework'),
			'indent' => true
			), //START BLOCK 3 SECTION 3 OPTIONS
			        array (
			        'id'       => 'b3-c3-icon',
			        'type'     => 'text',
			        'title'    => __('Icon', 'brew-framework'),
			        'subtitle'     => __('The css sytle for the <a href="http://www.fontawesome.io" target="__blank">FontAwesome</a> icon. (i.e. fa-cab)')
			        ),
			        array (
		            'id'       => 'b3-c3-title',
		            'type'     => 'text',
		            'title'    => __('Title', 'brew-framework'),
		            ),
		            array (
		            	'id'       => 'b3-c3-category',
					    'type'     => 'select',
					    'title'    => __('Category to Display', 'brew-framework'), 
					    'subtitle' => __('The categories that the third column should pull from to display the most recent posts.', 'brew-framework'),
					    'data' => 'categories',
		            	'default' => '1'
		            	),
            array (
			'id' => 'block3-c3-end',
			'type' => 'section',
			'indent' => false,
			), //END BLOCK3 C3 OPTIONS



        	array (
			'id' => 'block3-c4-start',
			'type' => 'section',
			'title' => __('Row 2 Block 1', 'brew-framework'),
			'indent' => true
			), //START BLOCK 3 SECTION 1 OPTIONS
		             array (
		            'id'       => 'b3-c4-icon',
		            'type'     => 'text',
		            'title'    => __('Icon', 'brew-framework'),
		            'subtitle'     => __('The css sytle for the <a href="http://www.fontawesome.io" target="__blank">FontAwesome</a> icon. (i.e. fa-cab)')
		            ),
		             array (
		            'id'       => 'b3-c4-title',
		            'type'     => 'text',
		            'title'    => __('Title', 'brew-framework'),
		            ),
		            array (
	            	'id'       => 'b3-c4-category',
				    'type'     => 'select',
				    'title'    => __('Category to Display', 'brew-framework'), 
				    'subtitle' => __('The categories that the first column in row 2 should pull from to display the most recent posts.', 'brew-framework'),
				    'data' => 'categories',
				    'default' => '1'
	            	),

            array (
			'id' => 'block3-c4-end',
			'type' => 'section',
			'indent' => false,
			), //END BLOCK3 C4 OPTIONS


     		array (
			'id' => 'block3-c5-start',
			'type' => 'section',
			'title' => __('Row 2 Block 2', 'brew-framework'),
			'indent' => true
			), //START BLOCK 3 SECTION 1 OPTIONS

		            array (
		            'id'       => 'b3-c5-icon',
		            'type'     => 'text',
		            'title'    => __('Icon', 'brew-framework'),
		            'subtitle'     => __('The css sytle for the <a href="http://www.fontawesome.io" target="__blank">FontAwesome</a> icon. (i.e. fa-cab)')
		            ),
		            array (
		            'id'       => 'b3-c5-title',
		            'type'     => 'text',
		            'title'    => __('Title', 'brew-framework'),
		            ),
		            array (
	            	'id'       => 'b3-c5-category',
				    'type'     => 'select',
				    'title'    => __('Category to Display', 'brew-framework'), 
				    'subtitle' => __('The categories that the second column in row 2 should pull from to display the most recent posts.', 'brew-framework'),
				    'data' => 'categories',
				    'default' => '1'
	            	),

              array (
			'id' => 'block3-c5-end',
			'type' => 'section',
			'indent' => false,
			), //END BLOCK3 C5 OPTIONS


            array (
			'id' => 'block3-c6-start',
			'type' => 'section',
			'title' => __('Row 2 Block 3', 'brew-framework'),
			'indent' => true
			), //START BLOCK 3 SECTION 6 OPTIONS
		            array (
		            'id'       => 'b3-c6-icon',
		            'type'     => 'text',
		            'title'    => __('Icon', 'brew-framework'),
		            'subtitle'     => __('The css sytle for the <a href="http://www.fontawesome.io" target="__blank">FontAwesome</a> icon. (i.e. fa-cab)')
		            ),
		            array (
		            'id'       => 'b3-c6-title',
		            'type'     => 'text',
		            'title'    => __('Title', 'brew-framework'),
		            'subtitle' => __('Title for Content Area 6', 'brew-framework'),
		            'desc'     => __('This is the description field, again good for additional info.', 'brew-framework')
		            ),
		            array (
		            	'id'       => 'b3-c6-category',
					    'type'     => 'select',
					    'title'    => __('Category to Display', 'brew-framework'), 
					    'subtitle' => __('The categories that the last column in row 2 should pull from to display the most recent posts.', 'brew-framework'),
					    'data' => 'categories',
					    'default' => '1'
		            	),
           	array (
			'id' => 'block3-c6-end',
			'type' => 'section',
			'indent' => false,
			) //END BLOCK3 C6 OPTIONS
        ),
	);
			$this->sections[] = array(
			    'title'   => __('Block 4', 'brew-framework'),
			    'icon'    => 'fa fa-th',
			    'subsection' => true,
			    'heading' => 'Block 4',
			    'desc'    => __('Use this section to display paragraph text in the fourth block.'),
			    'fields'  => array(
			    	$fields = array(
				    'id'       => 'block4-switch',
				    'type'     => 'button_set',
				    'title'    => __('Block 4', 'brew-framework'),
				    'subtitle' => __('Turn block 4 on or off.', 'brew-framework'),
				    //Must provide key => value pairs for options
				    'options' => array(
				        '1' => 'ON', 
				        '2' => 'OFF', 
				     ), 
				    'default' => '1'
					),
					array (
						'id'=>'about_text',
						'type' => 'textarea',
						'title' => 'Text for the fourth block. (HTML allowed)'
						//'required' => array('layout','equals','1'),	
					),
					array (
					'id' => 'block4-colors-start',
					'type' => 'section',
					'title' => __('Custom Styling', 'brew-framework'),
					'indent' => true
					),		
				array(
				    'id'       => 'background-block4',
				    'type'     => 'color',
				    'title'    => __('Block 4 Color', 'brew-framework'), 
				    'validate' => 'color',
				    'output'    => array('background-color' => '.block4')
					),
				array(
				    'id'       => 'block-4-textcolor',
				    'type'     => 'color',
				    'title'    => __('Block 4 Text Color', 'brew-framework'), 
				    'validate' => 'color',
				    'output'    => array('color' => '.block4 > p, #infotext > p, block4 > h1,block4 > h2,block4 > h3,block4 > h4,block4 > h5,block4 > h6')
					),
				array(
				    'id'       => 'block-4-links',
				    'type'     => 'link_color',
				    'title'    => __('Link Color  <a href="http://www.w3schools.com/css/css_link.asp" target="__blank"><i class="fa fa-question-circle"></i></a>', 'brew-framework'), 
				   	'output'    => array('.block4 a')
					),
				array (
					'id' => 'block4-colors-end',
					'type' => 'section',
					'indent' => false,
					), //END BLOCK 3 Styling OPTIONS
					
			        
			    ),
			);
			$this->sections[] = array(
    			'title'   => __('Block 5', 'brew-framework'),
			    'icon'    => 'fa fa-th',
			    'subsection' => true,
			    'heading' => 'Block 5 ',
			    'desc'    => __('<h4><strong>Block 5 is composed of two widget areas that can be configured in the Wordpress Widgets panel.</strong></h4>'),
			'fields'  => array(
			    	$fields = array(
				    'id'       => 'block5-switch',
				    'type'     => 'button_set',
				    'title'    => __('Block 5', 'brew-framework'),
				    'subtitle' => __('Turn block 5 on or off.', 'brew-framework'),
				    'description' => __('Block 5 contains two widgets. If this option is set to ON, the widgets can be setup in the widgets menu (under Appearances on the Wordpress Dashboard Menu.)'),
				    //Must provide key => value pairs for options
				    'options' => array(
				        '1' => 'ON', 
				        '2' => 'OFF', 
				     ), 
				    'default' => '1'
					),  
				array(
				    'id'       => 'background-block5',
				    'type'     => 'color_gradient',
				    'title'    => __('Blog Gradient Color', 'brew-framework'),
				    'desc'     => __('Pick a start and end color for block 5.', 'brew-framework'),
				    'validate' => 'color',
				    ),
				array(
				    'id'       => 'block-5-textcolor',
				    'type'     => 'color',
				    'title'    => __('Block 5 Text Color', 'brew-framework'), 
				    'validate' => 'color',
				    'output'    => array('color' => '.block-5 > p, .block-5  h1, .block-5 h2,.block-5 h3,.block-5 h4,.block-5 h5,.block-5 h6, #block-5 > p')
					),
				array(
				    'id'       => 'block-5-links',
				    'type'     => 'link_color',
				    'title'    => __('Link Color  <a href="http://www.w3schools.com/css/css_link.asp" target="__blank"><i class="fa fa-question-circle"></i></a>', 'brew-framework'), 
				   	'output'    => array('.block-5 a')
					),
				array (
					'id' => 'block5-colors-end',
					'type' => 'section',
					'indent' => false,
					), //END BLOCK 3 Styling OPTIONS
			        
			    ),
			);
			$this->sections[] = array(
				'title' => __('Block 6', 'brew-framework'),
				'icon' => 'fa fa-th',
				'desc' => 'Block 6 is composed of four widget areas that can be configured in the Wordpress Widgets panel.',
				'subsection' => true,
				'fields' => array (
						array(
				    'id'       => 'block6-switch',
				    'type'     => 'button_set',
				    'title'    => __('Block 6', 'brew-framework'),
				    'subtitle' => __('Turn block 6 on or off.', 'brew-framework'),
				    'description' => __('Block 6 contains four widgets. If this option is set to ON, the widgets can be setup in the widgets menu (under Appearances on the Wordpress Dashboard Menu.'),
				    //Must provide key => value pairs for options
				    'options' => array(
				        '1' => 'ON', 
				        '2' => 'OFF', 
				     ), 
				    'default' => '1'
					),
					array(
					'id'       => 'block6-col-number',
				    'type'     => 'button_set',
				    'title'    => __('Number of Block 6 columns', 'brew-framework'),
				    'subtitle' => __('Choose how many columns you would like to appear in block 2.', 'brew-framework'),
				    //Must provide key => value pairs for options
				    'options' => array(
				        '1' => 'Two Columns', 
				        '2' => 'Three Columns',
				        '3' => 'Four Columns'
				     ), 
				    'default' => '3'
					),
					array(
				    'id'       => 'background-block6',
				    'type'     => 'color',
				    'title'    => __('Block 6 Color (Footer)', 'brew-framework'), 
				    'subtitle' => __('Pick a background color for the sixth block (default: #142736).', 'brew-framework'),
				    'validate' => 'color',
				    'output'    => array('background-color' => '#footer')
					),
					),
				);
			$this->sections[] = array(
				'title' => __('Footer', 'brew-framework'),
				'icon' => 'fa fa-th',
				'subsection' => true,
				'fields' => array (
						array(
				    'id'       => 'background-copyright',
				    'type'     => 'color',
				    'title'    => __('Subfloor Color (Copyright area)', 'brew-framework'), 
				    'subtitle' => __('Pick a background color for the subfloor. (default: #142736).', 'brew-framework'),
				    'validate' => 'color',
				    'output'    => array('background-color' => '#sub-floor')
					),		

				),
			);

			$this->sections[] = array(
				'icon' => 'fa fa-list-alt',
				'title' => __('Posts Index Page', 'brew-framework'),
				'desc' => __('Index page set up.'),
				'fields' => array (
					array(
				    'id'       => 'Category1-Tab Title',
				    'type'     => 'text',
				    'title'    => __('Tab 1 Name', 'brew-framework')
					),
					array(
	            	'id'       => 'tab1-category',
				    'type'     => 'select',
				    'title'    => __('Category to Display', 'brew-framework'), 
				    'subtitle' => __('Category that should be displayed on the first tab on the index page.', 'brew-framework'),
				    'data' => 'categories',
				    'default' => '1'
	            	),
					array(
				    'id'       => 'Category2-Tab Title',
				    'type'     => 'text',
				    'title'    => __('Tab 2 Name', 'brew-framework')
					),
					array(
	            	'id'       => 'tab2-category',
				    'type'     => 'select',
				    'title'    => __('Category to Display', 'brew-framework'), 
				    'subtitle' => __('Category that should be displayed on the second tab on the index page.', 'brew-framework'),
				    'data' => 'categories',
				    'default' => '1'
	            	),
					array(
				    'id'       => 'Category3-Tab Title',
				    'type'     => 'text',
				    'title'    => __('Tab 3 Name', 'brew-framework')
					),
					array(
	            	'id'       => 'tab3-category',
				    'type'     => 'select',
				    'title'    => __('Category to Display', 'brew-framework'), 
				    'subtitle' => __('Category that should be displayed on the third tab on the index page.', 'brew-framework'),
				    'data' => 'categories',
				    'default' => '1'
	            	),
					array(
				    'id'       => 'Category4-Tab Title',
				    'type'     => 'text',
				    'title'    => __('Tab 4 Name', 'brew-framework')
					),
					array(
	            	'id'       => 'tab4-category',
				    'type'     => 'select',
				    'title'    => __('Category to Display', 'brew-framework'), 
				    'subtitle' => __('Category that should be displayed on the fourth tab on the index page.', 'brew-framework'),
				    'data' => 'categories',
				    'default' => '1'
	            	),
					array(
				    'id'       => 'Category5-Tab Title',
				    'type'     => 'text',
				    'title'    => __('Tab 5 Name', 'brew-framework')
					),
					array(
	            	'id'       => 'tab5-category',
				    'type'     => 'select',
				    'title'    => __('Category to Display', 'brew-framework'), 
				    'subtitle' => __('Category that should be displayed on the fifth tab on the index page.', 'brew-framework'),
				    'data' => 'categories',
				    'default' => '1'
	            	),
					array(
				    'id'       => 'Category6-Tab Title',
				    'type'     => 'text',
				    'title'    => __('Tab 6 Name', 'brew-framework')
					),
					array(
	            	'id'       => 'tab6-category',
				    'type'     => 'select',
				    'title'    => __('Category to Display', 'brew-framework'), 
				    'subtitle' => __('Category that should be displayed on the sixth tab on the index page.', 'brew-framework'),
				    'data' => 'categories',
				    'default' => '1'
	            	),
					array(
				    'id'       => 'Category7-Tab Title',
				    'type'     => 'text',
				    'title'    => __('Tab 7 Name', 'brew-framework')
					),
					array(
	            	'id'       => 'tab7-category',
				    'type'     => 'select',
				    'title'    => __('Category to Display', 'brew-framework'), 
				    'subtitle' => __('Category that should be displayed on the last tab on the index page.', 'brew-framework'),
				    'data' => 'categories',
				    'default' => '1'
	            	),
				),
			);



			$this->sections[] = array(
				'icon' => 'fa fa-folder',
				'title' => __('Content Settings', 'brew-framework'),
				'desc' => __('Choose how certain content is displayed'),
				'fields' => array (
					array (
						'id' => 'breadcrumb',
						'type' => 'switch',
						'title' => __('Breadcrumbs', 'brew-framework'),
						'desc' => __('Turn breadcrumbs on or off (site-wide)', 'brew-framework'),
						'default' => 1,
					),
					array (						
						'id' => 'author_profile',
						'type' => 'switch',
						'title' => __('Author Profiles', 'brew-framework'),
						'desc' => 'Display an author profile after a post',
						'default' => 2,
					),
					array (
						'id' => 'nom-count',
						'type' => 'switch',
						'title' => __('Nomination Count', 'brew-framework'),
						'desc' => __('Turn breadcrumbs on or off (site-wide)', 'brew-framework'),
						'default' => 1,
					),
					array(
				    'id'       => 'general-link-color',
				    'type'     => 'link_color',
				    'title'    => __('Link Color  <a href="http://www.w3schools.com/css/css_link.asp" target="__blank"><i class="fa fa-question-circle"></i></a>', 'brew-framework'), 
				   	'output'    => array('a')
					),
					array(
				    'id'       => 'general-text-color',
				    'type'     => 'color',
				    'title'    => __('Text Color', 'brew-framework'), 
				    'validate' => 'color',
				    'output'    => array(
				    	'color' => 'p')
					),
					array(
				    'id'       => 'general-headings-color',
				    'type'     => 'color',
				    'title'    => __('Heading Color', 'brew-framework'), 
				    'validate' => 'color',
				    'output'    => array(
				    	'color' => 'h1.single-title.entry-title > a, h1,h1, h2, h3, h4, h5, h6')
					),

			array (
			'id' => 'author-ops',
			'type' => 'section',
			'title' => __('Author Display Options', 'brew-framework'),
			'subtitle' => __('The three options below control how the author field displays on posts.  If the author field is set to on, the theme will display the wordpress author as expected.  If turned off, the theme will display the text in the second option and will only display the wordpress author for the categories excluded in option 3.', 'brew-framework'),
			'indent' => true
			), //START BLOCK 3 SECTION 1 OPTIONS

		           array (						
						'id' => 'author',
						'type' => 'switch',
						'title' => __('1. Display Author Name and Link', 'brew-framework'),
						'desc' => 'Display the name of the author.',
						'default' => '1',
					),
					
					array (
					'id'       => 'author-display-alttext',
	            	'type'     => 'text',
		            'title'    => __('2. Text to display rather than author', 'brew-framework'),
		            'desc'     => __('Text to display in place of the author when the above option is turned off. <i>ex: <strong>By: the Editors</strong></i> OR <i><strong>By: the PressForward Team<strong></i>', 'brew-framework')
					),
					array (
					    'id'       => 'author-display-excluded-categories',
					    'type'     => 'select',
					    'default'  => '1',
					    'multi'    => true,
					    'title'    => __('3. Categories to Exclude', 'brew-framework'), 
					    'desc'     => __('The categories selected here will display the author name even when option #1 is turned off. The author name <i><strong>will not be linked to the author archives.</strong></i> This is useful if you plan to display the original post author from the PressForward item rather than the wordpress author. ', 'brew-framework'),
					    'data'	   => 'categories'
						),
					array (
					    'id'       => 'author-display-included-categories',
					    'type'     => 'select',
					    'default'  => '1',
					    'multi'    => true,
					    'title'    => __('4. Categories to Include', 'brew-framework'), 
					    'desc'     => __('The categories selected here will display the author name <i><strong>AND</strong></i> link even when option #1 is turned off.', 'brew-framework'),
					    'data'	   => 'categories'
						),

              array (
			'id' => 'other-ops-end',
			'type' => 'section',
			'indent' => false,
			), 
					
					array (
						'id'=>'featured',
						'type' => 'select',
						'title' => __('Display Featured Images', 'brew-framework'), 
						'desc' => __('This is the description field, again good for additional info.', 'brew-framework'),
						'options' => array(
							'1' => 'Never',
							'2' => 'Always',
							'3' => 'Index only',
							'4' => 'Single post only',
							),
						'default' => '1'
					),
				),
			);		
					
					

			$theme_info = '<div class="redux-framework-section-desc">';
			$theme_info .= '<p class="redux-framework-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'brew-framework').'<a href="'.$this->theme->get('ThemeURI').'" target="_blank">'.$this->theme->get('ThemeURI').'</a></p>';
			$theme_info .= '<p class="redux-framework-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'brew-framework').$this->theme->get('Author').'</p>';
			$theme_info .= '<p class="redux-framework-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'brew-framework').$this->theme->get('Version').'</p>';
			$theme_info .= '<p class="redux-framework-theme-data description theme-description">'.$this->theme->get('Description').'</p>';
			$tabs = $this->theme->get('Tags');
			if ( !empty( $tabs ) ) {
				$theme_info .= '<p class="redux-framework-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'brew-framework').implode(', ', $tabs ).'</p>';	
			}
			$theme_info .= '</div>';

			if(file_exists(dirname(__FILE__).'/README.md')){
			$this->sections['theme_docs'] = array(
						'icon' => ReduxFramework::$_url.'assets/img/glyphicons/glyphicons_071_book.png',
						'title' => __('Documentation', 'brew-framework'),
						'fields' => array(
							array(
								'id'=>'17',
								'type' => 'raw',
								'content' => file_get_contents(dirname(__FILE__).'/README.md')
								),				
						),
						
						);
			}//if




			if(file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
			    $tabs['docs'] = array(
					'icon' => 'fa fa-book',
					    'title' => __('Documentation', 'brew-framework'),
			        'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
			    );
			}

		}	

		public function setHelpTabs() {

			// Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
			$this->args['help_tabs'][] = array(
			    'id' => 'redux-opts-1',
			    'title' => __('Theme Information 1', 'brew-framework'),
			    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'brew-framework')
			);

			$this->args['help_tabs'][] = array(
			    'id' => 'redux-opts-2',
			    'title' => __('Theme Information 2', 'brew-framework'),
			    'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'brew-framework')
			);

			// Set the help sidebar
			$this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'brew-framework');

		}


		/**
			
			All the possible arguments for Redux.
			For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

		 **/
		public function setArguments() {
			
			$theme = wp_get_theme(); // For use with some settings. Not necessary.

			$this->args = array(
	            
	            // TYPICAL -> Change these values as you need/desire
				'opt_name'          	=> 'brew_options', // This is where your data is stored in the database and also becomes your global variable name.
				'display_name'			=> 'PressForward TurnKey Theme Options', // $theme->get('Name'), // Name that appears at the top of your panel
				'display_version'		=> '', //$theme->get('Version'), // Version that appears at the top of your panel
				'menu_type'          	=> 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
				'allow_sub_menu'     	=> true, // Show the sections below the admin menu item or not
				'menu_title'			=> __( 'PressForward Theme Options', 'brew-framework' ),
	            'page'		 	 		=> __( 'PressForward Theme Options', 'brew-framework' ),
	            'google_api_key'   	 	=> '', // Must be defined to add google fonts to the typography module
	            'global_variable'    	=> '', // Set a different name for your global variable other than the opt_name
	            'dev_mode'           	=> false, // Show the time the page took to load, etc
	            'customizer'         	=> true, // Enable basic customizer support

	            // OPTIONAL -> Give you extra features
	            'page_priority'      	=> null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	            'page_parent'        	=> 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	            'page_permissions'   	=> 'manage_options', // Permissions needed to access the options panel.
	            'menu_icon'          	=> '', // Specify a custom URL to an icon
	            'last_tab'           	=> '', // Force your panel to always open to a specific tab (by id)
	            'page_icon'          	=> 'fa fa-bell-o', // Icon displayed in the admin panel next to your menu_title
	            'page_slug'          	=> '_options', // Page slug used to denote the panel
	            'save_defaults'      	=> true, // On load save the defaults to DB before user clicks save or not
	            'default_show'       	=> false, // If true, shows the default value next to each field that is not the default value.
	            'default_mark'       	=> '', // What to print by the field's title if the value shown is default. Suggested: *


	            // CAREFUL -> These options are for advanced use only
	            'transient_time' 	 	=> 60 * MINUTE_IN_SECONDS,
	            'output'            	=> true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
	            'output_tab'            => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
	            //'domain'             	=> 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
	            'footer_credit'      	=> ' ', // Disable the footer credit of Redux. Please leave if you can help it.
	            

	            // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	            'database'           	=> '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	            
	        
	            'show_import_export' 	=> true, // REMOVE
	            'system_info'        	=> false, // REMOVE
	            
	            'help_tabs'          	=> array(),
	            'help_sidebar'       	=> '', // __( '', $this->args['domain'] );            
				);


			// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.		
			$this->args['share_icons'][] = array(
			    'url' => 'https://github.com/slightlyoffbeat',
			    'title' => 'My GitHub', 
			    'icon' => 'fa fa-github-square'
			    // 'img' => '', // You can use icon OR img. IMG needs to be a full URL.
			);		
			$this->args['share_icons'][] = array(
			    'url' => 'http://twitter.com/slightlyoffbeat',
			    'title' => 'Follow me on Twitter', 
			    'icon' => 'fa fa-twitter-square'
			);

			
	 
			// Panel Intro text -> before the form
			
				$this->args['intro_text'] = __('<p>Welcome to the PressForward TurnKey Theme options framework (powered by Redux).', 'brew-framework');
			

			// Add content after the form.
			$this->args['footer_text'] = __('<p>Open the pod bay doors, please.</p>', 'brew-framework');

		}
	}
	new Redux_Framework_sample_config();

}


/** 

	Custom function for the callback referenced above

 */
if ( !function_exists( 'redux_my_custom_field' ) ):
	function redux_my_custom_field($field, $value) {
	    print_r($field);
	    print_r($value);
	}
endif;

/**
 
	Custom function for the callback validation referenced above

**/
if ( !function_exists( 'redux_validate_callback_function' ) ):
	function redux_validate_callback_function($field, $value, $existing_value) {
	    $error = false;
	    $value =  'just testing';
	    /*
	    do your validation
	    
	    if(something) {
	        $value = $value;
	    } elseif(something else) {
	        $error = true;
	        $value = $existing_value;
	        $field['msg'] = 'your custom error message';
	    }
	    */
	    
	    $return['value'] = $value;
	    if($error == true) {
	        $return['error'] = $field;
	    }
	    return $return;
	}
endif;

function newIconFont() {
    // Uncomment this to remove elusive icon from the panel completely
    wp_deregister_style( 'redux-elusive-icon' );
    wp_deregister_style( 'redux-elusive-icon-ie7' );
 
    wp_register_style(
        'redux-font-awesome',
        '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css',
        array(),
        time(),
        'all'
    );  
    wp_enqueue_style( 'redux-font-awesome' );
}
// This example assumes the opt_name is set to redux_demo.  Please replace it with your opt_name value.
add_action( 'redux/page/brew_options/enqueue', 'newIconFont' );
