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
       <?php global $brew_options ?>
        
          <div class="container">
            <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
            <div class="navbar-header">
             
				<div class="logo-nav">
							<a class="navbar-brand" href="<?php bloginfo ('url');?>" title="<?php bloginfo('name')?>" rel="homepage">
							<img  src="<?php echo $brew_options['opt-media']['url']; ?> " alt ="logo" /></a>
						</div>
              <!-- <a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>/" title="<?php // bloginfo( 'name' ) ?>" rel="homepage"><?php //bloginfo('name'); ?></a> -->
            

			<a id="simple-menu" href="#sidr">Toggle menu</a>
 
						<div id="sidr">
						  <!-- Your content -->
						  <?php bones_main_nav(); ?>
							<div id="search">
		                	
		                	<form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline">
		    					<fieldset>
		    						<div class="input-group">
		      							<input type="text" name="s" id="search" placeholder="Search for ..." value="<?php the_search_query(); ?>" class="form-control" />
		      							<span class="input-group-btn">
		        							<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
		      							</span>
		    						</div> <!--close input group-->
		    					</fieldset>
							</form><!--close nav form-->
			             </div>
			             <li><a href="https://pressforward.org"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/pfpublication.png" height="20" width="20"/></li></a>    
						</div>

            </div> <!--close navbar-header -->
		<div class="navbar-collapse collapse navbar-responsive-collapse">
			<div class="row">
				<div class="col-md-12 topbar">
						<div class="logo">
							<a class="navbar-brand" href="<?php bloginfo ('url');?>" title="<?php bloginfo('name')?>" rel="homepage">
							<img  src="<?php echo $brew_options['opt-media']['url']; ?> " alt ="logo" /></a>
						</div>
					<div class="menu-container">
						<div class="nav-container">
	              			<?php bones_main_nav(); ?>
							
	              		</div><!--close nav container-->
	              		
		              	<div class="search-container">
		              			<ul class="nav navbar-nav navbar-right">
						        <li class="dropdown" id="menu1">
							             <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
							               <i class="fa fa-search"></i>
							                <b class="caret"></b>
							             </a>
							             <div class="dropdown-menu">
							                <div id="search">
							                	<form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline">
							    					<fieldset>
							    						<div class="input-group">
							      							<input type="text" name="s" id="search" placeholder="Search for ..." value="<?php the_search_query(); ?>" class="form-control" />
							      							<span class="input-group-btn">
							        							<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
							      							</span>
							    						</div> <!--close input group-->
							    					</fieldset>
												</form><!--close nav form-->
								             </div>    
							             </div> <!--close .dropdown-menu-->
	           					</li><!-- close .drowpdown-->
	           					<li><a href="https://pressforward.org"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/pfpublication.png" height="20" width="20"/></li></a>
	           					</ul>
			            </div> <!--close search-container--> 			
              		</div><!--menu container-->
             	</div><!--close topbar-->
            </div> <!--CLOSE ROW-->
		</div>
    </div>
</nav>
		</header> <?php // end header ?>
