<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php if (is_front_page()) { bloginfo('name'); } else { wp_title(''); } ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png?v=2">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php //echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>

    <header class="header">

      <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
        
          <div class="container-fluid">
            <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
			
              <!-- <a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>/" title="<?php // bloginfo( 'name' ) ?>" rel="homepage"><?php //bloginfo('name'); ?></a> -->
             <?php global $brew_options ;
				$themelogo = $brew_options['logo_uploader']['url'];
				$banner = $brew_options['banner_uploader']['url']; ?>

			<a class="navbar-brand" href="<?php bloginfo ('url');?>" title="<?php bloginfo('name')?>" rel="homepage">
				<img height:  src="<?php echo $themelogo ;?> " alt ="logo" /></a>
            </div> <!--close navbar-header -->
			<div class="navbar-collapse collapse navbar-responsive-collapse">
				<!-- <form class="navbar-form navbar-right" role="search">
        			<div class="form-group">
          			<input type="text" class="form-control" placeholder="Search">
        		</div>
        			<button type="submit" class="btn btn-default">Submit</button>
      			</form> -->

              <?php bones_main_nav(); ?>
             <!--  <img style="padding: 15px;" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/pfpublication.png" height="50px" width="auto"/> -->
		</div>
          </div>

      
        
      </nav>
		
		</header> <?php // end header ?>
