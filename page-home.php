<?php
/*
Template Name: Home Page Template
*/
?>

<?php get_header(); ?>

<div class="slider">
 <div  class="container homepage">
    
    <div class="sl-test">
     <?php $feat_posts = get_posts('category=66&posts_per_page=4'); ?>
    <div class="liquid-slider" id ="slider2">
       
       <?php foreach($feat_posts as $post) { ?>
        <div id="slider-content">
        <?php
        $trim_title = get_post_field('post_title', $id);
  
      $short_title = wp_trim_words( $trim_title, $num_words = 15, $more = '… ' );
             echo '<div id="slidertitle"><h1 class="title">' . $short_title . '</h1>';
             echo '<br><h2>By: ' . get_post_field('item_author') . '</h2></div>';
       ?>
        <!-- <div id="slidertitle"><h1 class="title"><?php echo $post->post_title; ?></h1><br><h2>By: <?php echo get_post_field('item_author') ?></h2></div>  --><!-- close #slidertitle -->
      
      <?php 
  
      $trimexcerpt = get_post_field('post_content', $id);
  
      $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 75, $more = '… ' );
  
        echo '<div id="slidertext"><p class="info-title">' .  $shortexcerpt . '</p>';
       ?>
       <a href="<?php echo get_permalink(); ?>" class="btn btn-default"> Read More...</a></div> <!--close #slidertext -->
       <div id="sliderimg">
         <?php echo get_the_post_thumbnail( $post->ID, 'large') ?>
          </div> <!-- close #sliderimg -->
        
       
       
        </div> <!-- close .liquid-slider #slider2 -->
      
      
       <?php } ?>
       </div> <!-- close .sl-test -->
      </div> <!-- close .container .homepage -->
  </div>  <!-- end .container -->
</div> <!-- end .slider-->

<div class="container info">
<div class="row">
<div class="col-md-12">
 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('homepageabout') ) : ?>
      <?php endif; ?>
</div>
</div>
</div>

<main class="categorieshome" role="main">
<div class="container" id="categories">
  <div class="row text-center">
   <!--  <div class="row text-center"> -->
    
       <!-- </div> -->
       <div class="row homecategories">
    <!--Section 1-->
    <div class="col-sm-4 about" id="content1">
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('content1') ) : ?>
      <?php endif; ?>
    </div>
    
    <!--Section 2-->
    <div class="col-sm-4 about content2">
       <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('content2') ) : ?>
      <?php endif; ?>
    </div>
    
    <!--Section 3-->
    <div class="col-sm-4 about content3">
       <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('content3') ) : ?>
      <?php endif; ?>
    </div>
    
  </div> <!--end row-->

     <div class="row homecategories">
    <!--Section 1-->
    <div class="col-sm-4 about content4">
       <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('content4') ) : ?>
      <?php endif; ?>
    </div>
    
    <!--Section 2-->
    <div class="col-sm-4 about content5">
       <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('content5') ) : ?>
      <?php endif; ?>
    </div>
    
    <!--Section 3-->
    <div class="col-sm-4 about content6">
       <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('content6') ) : ?>
      <?php endif; ?>
    </div>
    
  </div> <!--end row-->
  </div>
</main>

</div>
</div>
<?php get_footer(); ?>
