#PressForward Turnkey Theme 
This repository contains a Turnkey Wordpress theme optimized for use with the [PressForward Plugin](http://www.pressforward.org). This theme is currently in development.

##Installation Requirements
This theme is based on [Brew](https://github.com/slightlyoffbeat/brew) a Bootstrap, HTML5 Wordpress theme by Dan Wild. In order for the Brew Child theme to work properly you must first install [Brew](https://github.com/slightlyoffbeat/brew) and then this child theme.  

Several areas in the child theme that display specific categories or icons are currently hardcoded.  In a future release these will be included in the theme options but for now must be changed by hand.  Below is a list of the files and lines where categories or icons need to be changed and a description of what these areas do. 

### `page-home.php`
- **Slider** Line 14
    + Add the id number for the category that should appear in the slider.
    + The slider pulls the most recent four posts.  This can be changed to include more or less but may require edits to the navigation styling. 

### `functions.php`
- **Homepage Content Areas** Lines 116-174
    + The code in this section creates widgetized areas on the home page.  
    + The icons for each category are currently hard coded in. To change the icon change the `<i>` class for each widget.  
    + To learn more about the icons available see the [Font Awesome references](#FontAwesome) below. 
- **Homepage Participate Widgets** Lines 186-224
    + The code in this section generates the participation excerpts and icons.
    + The icons for each category are currently hard coded in. To change the icon change the `<i>` class for each widget.
    + To learn more about the icons available see the [Font Awesome references](#FontAwesome) below. ]

###`single.php`
- **Featured Icons/Images for Individual Post Pages**
    + On lines 17-63 of `single.php` there is an *If* statement that controls whether a featured image or an icon appears for each category.  Currently the if statement sets up a particular icon for each category.
    + Category ids will need to be adjusted to match the categories on your particular site.
    + The icons for each category are also currently hard coded.  To change the icon for a particular category change the `<i>`. 
- **Author Display**
    + Currently the Author is set to only display for two particular categories.  If you would like to display a default author name on all but a few categories change the categories in the array in the if statement on line 73.
    ```
    <?php if (in_category(array(66, 87))) {
    echo 'by <span class="author"><em>' . get_the_author() . '</em></span> -'; 
    } else {
    echo 'by <span class="author"><em>the Editors</em></span> -'; 
    } ?>
    ```
    + If not, comment out lines 73-77 and uncomment line 72.
    ```
    <!-- by <span class="author"><em><?php echo bones_get_the_author_posts_link() ?></em></span> -  -->
    ```
-**Features Currently Inactive on `Single.php`**
    + Author Info -- uncomment this to display a short author bio.  Pulls from the user profile in wordpress. 
    ```
    <?php // get_template_part( 'author-info' ); ?> 
    ```
    + Comments Template -- uncomment this to display the comment form on individual pages. 
    ``` 
    <?php comments_template(); ?>
    ```
    + Sidebar -- the side bar is disabled by default in this child theme.  To restore the sidebar uncomment `<?php comments_template(); ?>` and change the size of the grid on the main div: `<div id="main" class="col-md-12" role="main">` at the top of `single.php`.  Be sure the column numbers in `single.php` and in `sidebar.php` add to 12.  For more information on the grid see the Bootstrap documentation.
 
##FontAwesome
+ To learn more about available icons see the [Font Awesome](http://fortawesome.github.io/Font-Awesome/icons/) site.
+ To learn more about the html markup for icons see the [Font Awesome examples](http://fortawesome.github.io/Font-Awesome/examples/) page.

