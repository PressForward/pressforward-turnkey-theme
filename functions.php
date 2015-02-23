<?php

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
		wp_enqueue_script( 'childjs', get_stylesheet_directory_uri() . '/library/js/bootstrap.min.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'ls_scripts');

//REDUX FRAMEWORK TEST
function add_another_section_bl($sections){
    $sections = array();
    $sections[] = array(
        'title' => __('Theme Colors', 'Redux_Framework_sample_config'),
        'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'Redux_Framework_sample_config'),
        // Redux ships with the glyphicons free icon pack, included in the options folder.
        // Feel free to use them, add your own icons, or leave this blank for the default.
        'icon' => trailingslashit(get_template_directory_uri()) . 'options/img/icons/glyphicons_062_attach.png',
        // Leave this as a blank section, no options just some intro text set above.
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
            'default' => 1,
          ),
        array (
             'id'        => 'logo_uploader',
             'type'      => 'media',
             'url'       => true,
            'title'     => __('Logo Uploader'),
            'compiler'  => 'true',
            //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc'      => __('Basic media uploader with disabled URL input field.', 'brew-framework'),
              'subtitle'  => __('Upload any media using the WordPress native uploader', 'brew-framework'),
             'default'   => array('url' => 'http://s.wordpress.org/style/images/codeispoetry.png'),
             //'hint'      => array(
            //    'title'     => 'Hint Title',
            //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
             //)
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

    return $sections;
}
add_filter("redux/options/brew_options/sections", 'add_another_section_bl');

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
  return '... </p>';
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
//OPEN GRAPH METADATA
<?php
function add_opengraph_markup() {
  if (is_single()) {
    global $post;
    global $brew_options ;
    // $themelogo = $brew_options['logo_uploader']['url'];
    if(get_the_post_thumbnail($post->ID, 'thumbnail')) {
      $thumbnail_id = get_post_thumbnail_id($post->ID);
      $thumbnail_object = get_post($thumbnail_id);
      $image = $thumbnail_object->guid;
    } else {
      // set default image
      $image =  $brew_options['logo_uploader']['url'];
    }
    //$description = get_bloginfo('description');
    $description = substr(strip_tags($post->post_content),0,200) . '...';
?>
<meta property="og:title" content="<?php the_title(); ?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?=$image?>" />
<meta property="og:url" content="<?php the_permalink(); ?>" />
<meta property="og:description" content="<?=$description?>" />
<meta property="og:site_name" content="<?=get_bloginfo('name')?>" />
 
<?php
  }
}
add_action('wp_head', 'add_opengraph_markup');
?>
