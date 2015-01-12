<?php
/*
Template Name: Home Page Template
*/
?>

<?php get_header(); ?>

<div class="slider">
  <div  class="container" >
    
    <div class="sl-test">
     <?php $feat_posts = get_posts('category=2'); ?>
    <div class="liquid-slider" id ="slider2" style="width: 100%;">
       <?php foreach($feat_posts as $post) { ?>
        <div>
        <h2 class="title"><?php echo $post->post_title; ?></h2>
    	<?php 
	
			$trimtitle = get_post_field('post_content', $id);
	
			$shorttitle = wp_trim_words( $trimtitle, $num_words = 150, $more = '… ' );
	
				echo '<p class="info-title">' .  $shorttitle . '</p>';
    	 ?>
    	 <a href="<?php echo get_permalink(); ?>"> Read More...</a>
        <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail') ?>
        </div>
      
      
       <?php } ?>
       </div>
      </div>
  </div> <!-- end .container-->
</div> <!-- end #banner-->

<div class="container">
  <div class="row text-center">
   <!--  <div class="row text-center"> -->
    
       <!-- </div> -->
       <div class="row text-center">
    <!--Section 1-->
    <div class="col-sm-4 about">
      <i class="fa fa-laptop fa-4x light-gray"></i>
      <h3>Built with Bootstrap</h3>
      <p>Enjoy Wordpress with all of the benefits of Bootstrap.  Quickly build themes while utilizing one of the most powerful frameworks available on the web.</p>
    </div>
    
    <!--Section 2-->
    <div class="col-sm-4 about">
      <i class="fa fa-github-square fa-4x light-gray"></i>
      <h3>Free and Open-Source</h3>
      <p>BREW pulls together some of the best open source projects in to one awesome starter theme.  Feel free to fork, edit and contribute.</p>
    </div>
    
    <!--Section 3-->
    <div class="col-sm-4 about">
      <i class="fa fa-flag fa-4x light-gray"></i>
      <h3>Over 350 Icons</h3>
      <p>Font Awesome 4 support is already baked in.  Quickly and easily place icons in menus, buttons, headers, lists and more.</p>
    </div>
    
  </div>
</div>

<?php get_footer(); ?>
