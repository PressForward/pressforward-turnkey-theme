#Brew Child Theme--Set Up--DRAFT
##Installation
You must plugin the proper category ids in the following places: 

`page-home.php`: To get posts to show up on the slider the category id number on line 14: `<?php $feat_posts = get_posts('category=66&posts_per_page=4'); ?>` must be changed.  Accordingly, the number of posts per page can be adjusted. 

`single.php`: Categories are hard coded on this page to do several things. 
1. The if statement on lines 15-61 controls the icons for each post category. The categories will need to be adjusted or nothing will show up in the space next to the post. Currently there are 8 different categories. 7 of these contain varying font-awesome icons.  The 8th block displays the post featured image on the editors choice (slider) category. The last block within the if statement controls all posts that do not fit one of the above categories.
1. The if statement on lines 71-75 controls where the author is displayed. The default is for the author to display on any editors choice or blog pieces but not on any of the news categories.  Change the category ids on line 71 for each post category an author should appear on.
1. The final if statement in this file is on lines 100-113. It controls the layout of the footer on individual post pages. It is currently set to default to a grid layout and display a set of custom fields only on editors choice pieces. 

Default category icons can be edited in two places: 
1. `single.php`: the if statement on lines 15-61 controls which icons appear for which post categories.
1. `functions.php`: the icons for each category widget on the home page can be found in the register_sidebar functions in the `before_widget` section on lines 79-137 and 149-187.