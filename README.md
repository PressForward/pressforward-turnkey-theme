#PressForward Turnkey Theme 
This repository contains a Turnkey Wordpress theme optimized for use with the [PressForward Plugin](http://www.pressforward.org). 

**This theme is currently functional but is in development.**

##Theme Requirements
This theme is based on [Brew](https://github.com/slightlyoffbeat/brew) a Bootstrap and HTML5 Wordpress theme by Dan Wild. In order for the Brew Child theme to work properly you must first install [Brew](https://github.com/slightlyoffbeat/brew) and then this child theme.  

##Installation
This theme is currently underdevelopment and requires several pages to be edited in order for the theme to function. Several areas in the child theme display specific categories or icons and are currently hardcoded.  In a future release these will be included in the theme options but for now must be changed by hand.  Below is a list of the files and lines where categories or icons need to be changed and a description of what these areas control. 

###Homepage
####Block 1: Slider
+ The slider appears in the first block on the homepage and pulls the most recent four posts from a specific category.  The category is defined in **`page-home.php`** within the wordpress posts loop at the top of the file.  
+ Post category id numbers will vary by installation. To customize the category that the slider will pull posts from edit the `get_posts()` WordPress query in the `$feat_posts` variable. 
+ The first parameter inside of the `get_posts()` query sets the category id for the slider and the second controls the number of posts it will.   
+ `<?php $feat_posts = get_posts('category=66&posts_per_page=4'); ?>`
+  The slider can pull more than 4 of the most recent posts however changing this paremeter might require additional customizations to the styling of the slider.

####Block 2 and 3: Content Areas
+ Each widget area in these blocks are a widgetized area. They will appear as "Participate Block 1 - Participate Block 4" and "Content Widget 1 through Content Widget 6" in the widgets area of WordPress.
+ By default, the block is composed of four widgets but this can be customized by adjusting the grid for the second block in `page-home.php` and removing or adding widgets.
+ The icons above the title for each content area are found in `functions.php` and are currently hardcoded. 
+ To change the icons locate the widget definition within `functions.php` under the `<!--CONTENT AREA WIDGET DEFINITIONS -->` heading.  
+ Each widget is defined by a block of code that looks similar to this: 
```php
register_sidebar(array(
'id' => 'participate1',
'name' => __( 'Partcipate Block 1 Widget', 'bonestheme' ),
'description' => __( 'The first participate block widget.', 'bonestheme' ),
'before_widget' => '<div id="%1$s" class="widget participatewidget %2$s">',
'after_widget' => '</div>',
'before_title' => '<i class="fa fa-question-circle fa-3x"></i><h1 class="widgettitle">',
'after_title' => '</h1>',
 ));
```
+ To change the icon adjust the icon code on the `before_title` line of the widget definition. To view available icons view the [FontAwesome](http://www.fontawesome.com) documentation.

####Blocks 3, 4, 5: About Section, Block and Footer
+ These blocks contain widgetized areas that can be customized. Currently these blocks are designed to house about text, a blog roll, and footer logos or text.
+ Block 3: Contains one widget in a full 12 column row.
+ Block 4: Contains two widgets each in a 6 column row. 
+ Block 5: Contains three widgets each in a 4 column row. 
+ As with all of the blocks on the home page these can be changed or adapted by changing the bootstrap grid.
+ The widget code for each is found in `fuctions.php` in the `<!--CONTENT AREA WIDGET DEFINITIONS -->` section.

###Post Pages
On the post page there is one element that is category based and will need to be adjusted during installation.  The post page is set to display either a featured image or a category specific icon. Which category displays a featured image and which displays an icon is determined by an "if statement" in `single.php`.

To adjust both the category id numbers and the icons that appear for each category edit if statement in the Category Featured Images section (#01). The if statement looks similar to this: 
```php
<?php if ( in_category('77')) {
//JOBS--BRIEFCASE ICON
echo '<div class="col-md-2 featimg text-center">
      <i class="fa fa-briefcase fa-5x"></i>
      </div> <!--close col-md-2 featimg-->
      <div class="col-md-10" id="postcontent">';
} else if (in_category('74')) {
//CFPS--LAPTOP ICON 
    echo '<div class="col-md-2 featimg text-center">
      <i class="fa fa-info fa-5x"></i>
      </div> <!--close col-md-2 featimg-->
      <div class="col-md-10" id="postcontent">';
     } else if (in_category('81')) {
    //ANNOUNCEMENTS--BULLHORN ICON
    echo '<div class="col-md-2 featimg text-center">
      <i class="fa fa-bullhorn fa-5x"></i>
      </div> <!--close col-md-2 featimg-->
      <div class="col-md-10" id="postcontent">';
    } else if (in_category('75')) {
    //RESOURCES--INFO ICON
    echo '<div class="col-md-2 featimg text-center">
      <i class="fa fa-info fa-5x"></i>
      </div> <!--close col-md-2 featimg-->
      <div class="col-md-10" id="postcontent">';
    } else if (in_category('79')) {
    //FUNDING & OPPS--MONEY ICON
        echo '<div class="col-md-2 featimg text-center">
      <i class="fa fa-money fa-5x"></i>
      </div> <!--close col-md-2 featimg-->
      <div class="col-md-10" id="postcontent">';
    } else if (in_category('78')) {
    //REPORTS--FLAG ICON
    echo '<div class="col-md-2 featimg text-center">
      <i class="fa fa-flag fa-5x"></i>
      </div> <!--close col-md-2 featimg-->
      <div class="col-md-10" id="postcontent">';
    } else if (in_category('87')) {
    //BLOG--PENCIL ICON
    echo '<div class="col-md-2 featimg text-center">
      <i class="fa fa-pencil fa-5x"></i>
      </div> <!--close col-md-2 featimg-->
      <div class="col-md-10" id="postcontent">';
    } else if (in_category('66')) {
    //EDITORS CHOICE -- FEATURED IMAGE NO ICON
    echo '<div class="col-md-3 featimg">' . get_the_post_thumbnail( $post->ID, array(250,250)) . '</div> <!--close col-md-3 featimg-->
    <div class="col-md-9" id="postcontent">';
    } ?>
```
In the first seven blocks an icon is defined. To change the icon adjust the icon code within the `<i>` tags. Further information on available icons and icon markup can be found on the FontAwesome website.

The final block pulls the post's featured image thumbnail using the `get_the_post_thumbnail()` function and sets the size to 250px by 250px. 

`Single.php` (the post template) also contains numerous options for customization that are turned off by default.  Comments, Author Profile Cards, and default category authors are options that are, by default, commented out.  Uncommenting the labeled sections will reinsitute these features.

Currently inactive features:
- Author Info -- uncomment this to display a short author bio.  Pulls from the user profile in wordpress. 
```php
<?php // get_template_part( 'author-info' ); ?> 
```
+ Comments Template -- uncomment this to display the comment form on individual pages. 
```php
<?php comments_template(); ?>
```
+ Sidebar -- the side bar is disabled by default in this child theme.  To restore the sidebar uncomment `<?php comments_template(); ?>` and change the size of the grid on the main div: `<div id="main" class="col-md-12" role="main">` at the top of `single.php`.  Be sure the column numbers in `single.php` and in `sidebar.php` add to 12.  For more information on the grid see the Bootstrap documentation.
 
Links to Documentation for Libraries Used and References: 
+ [FontAwesome](http://fortawesome.github.io/Font-Awesome/)
+ [Bones](http://themble.com/bones/)
+ [Bootstrap](http://getbootstrap.com/)
+ [Liquid Slider](http://liquidslider.com/)

