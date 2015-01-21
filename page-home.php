<?php
/*
Template Name: Home Page Template
*/
?>

<?php get_header(); ?>

<div class="slider">
  <div  class="container">
    
    <div class="sl-test">
     <?php $feat_posts = get_posts('category=170'); ?>
    <div class="liquid-slider" id ="slider2">
       <?php foreach($feat_posts as $post) { ?>
        <div id="slider-content">
        <h2 class="title"><?php echo $post->post_title; ?></h2>
         <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail') ?>

      <?php 
  
      $trimtitle = get_post_field('post_content', $id);
  
      $shorttitle = wp_trim_words( $trimtitle, $num_words = 50, $more = '… ' );
  
        echo '<p class="info-title">' .  $shorttitle . '</p>';
       ?>
       <a href="<?php echo get_permalink(); ?>" class="btn btn-default"> Read More...</a>
       
        </div>
      
      
       <?php } ?>
       </div>
      </div>
  </div> <!-- end .container-->
</div> <!-- end .slider-->

<div class="container">
  <div class="row text-center" id="content">
   <!--  <div class="row text-center"> -->
    
       <!-- </div> -->
       <div class="row">
    <!--Section 1-->
    <div class="col-sm-4 about">
      <i class="fa fa-briefcase fa-4x light-gray"></i>
      <h3>Job Announcements</h3>
      <p>Enjoy Wordpress with all of the benefits of Bootstrap.  Quickly build themes while utilizing one of the most powerful frameworks available on the web.</p>
    </div>
    
    <!--Section 2-->
    <div class="col-sm-4 about">
      <i class="fa fa-university fa-4x light-gray"></i>
      <h3>CFPs & Conferences</h3>
      <p>BREW pulls together some of the best open source projects in to one awesome starter theme.  Feel free to fork, edit and contribute.</p>
    </div>
    
    <!--Section 3-->
    <div class="col-sm-4 about">
      <i class="fa fa-info fa-4x light-gray"></i>
      <h3>Resources</h3>
      <p>Font Awesome 4 support is already baked in.  Quickly and easily place icons in menus, buttons, headers, lists and more.</p>
    </div>
    
  </div> <!--end row-->

     <div class="row">
    <!--Section 1-->
    <div class="col-sm-4 about">
      <i class="fa fa-laptop fa-4x light-gray"></i>
      <h3>Announcements</h3>
      <p>Enjoy Wordpress with all of the benefits of Bootstrap.  Quickly build themes while utilizing one of the most powerful frameworks available on the web.</p>
    </div>
    
    <!--Section 2-->
    <div class="col-sm-4 about">
      <i class="fa fa-github-square fa-4x light-gray"></i>
      <h3>Funding & Opportunities</h3>
      <p>BREW pulls together some of the best open source projects in to one awesome starter theme.  Feel free to fork, edit and contribute.</p>
    </div>
    
    <!--Section 3-->
    <div class="col-sm-4 about">
      <i class="fa fa-flag fa-4x light-gray"></i>
      <h3>Reports</h3>
      <p>Font Awesome 4 support is already baked in.  Quickly and easily place icons in menus, buttons, headers, lists and more.</p>
    </div>
    
  </div> <!--end row-->
</div>
</div>
<?php get_footer(); ?>
