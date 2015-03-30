<?php
/*
Template Name: Home Page Template
*/
?>

<?php get_header(); ?>

<!-- BLOCK 1: SLIDER -->

<div class="slider">
 <div  class="container homepage">
    <div class="sl-test">
          <?php $feat_posts = get_posts('category=66&posts_per_page=4'); ?>
        <div class="liquid-slider" id ="slider2">
          <?php foreach($feat_posts as $post) { ?>
              <div id="slider-content">
                  <?php $trim_title = get_post_field('post_title', $id);
                        $short_title = wp_trim_words( $trim_title, $num_words = 14, $more = '… ' );
                        echo '<div id="slidertitle"><h1 class="title">' . $short_title . '</h1>';
                        echo '<br><h2>By: ' . get_the_author() . '</h2></div>';  ?>
                  <?php $trimexcerpt = get_post_field('post_content', $id);
                        $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 75, $more = '… ' );
                        echo '<div id="slidertext"><p class="info-title">' .  $shortexcerpt . '</p>';  ?>
                  <a href="<?php echo get_permalink(); ?>" alt="<?php echo get_the_title() ?>" class="btn btn-default">Read More</a>
              </div> <!-- Close #slider-content -->
               
              <div id="sliderimg">
                 <?php echo get_the_post_thumbnail( $post->ID, 'large') ?>
              </div> <!-- close #sliderimg -->

        </div> <!-- close .liquid-slider #slider2 -->
        <?php } ?> <!--closes for each loop -->
    </div> 
 </div> <!-- close .sl-test -->
</div> <!-- close .container .homepage --> 
</div> <!-- end .slider -->

<!-- BLOCK 2-PARTICIPATE -->

<main class="participatehome" role="main">
    <div class="container" id="participate">
        <div class="row text-center">
            <div class="col-md-3">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('participate1') ) : ?>
                <?php endif; ?>
            </div>
           
            <div class="col-md-3">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('participate2') ) : ?>
                <?php endif; ?>
            </div>
  
            <div class="col-md-3">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('participate3') ) : ?>
                <?php endif; ?>
            </div>

            <div class="col-md-3">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('participate4') ) : ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<!-- BLOCK 3: CATEGORIES -->
<?php global $brew_options ?>
<main class="categorieshome" role="main">
  <div class="container" id="categories">
    <div class="row text-center">
      <div class="row homecategories">
        <!--Section 1-->
          <div class="col-sm-4 about" id="content1">
              <div class="homeinnercontent">
                <i class="fa <?php echo $brew_options['b3-c1-icon'] ?> fa-3x"></i>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('content1') ) : ?>
                <?php endif; ?>
              </div>
          </div>
          
        <!--Section 2-->
          <div class="col-sm-4 about content2">
             <div class="homeinnercontent">
                <i class="fa <?php echo $brew_options['b3-c2-icon'] ?> fa-3x"></i>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('content2') ) : ?>
                <?php endif; ?>
              </div>
          </div>
    
        <!--Section 3-->
          <div class="col-sm-4 about content3">
            <div class="homeinnercontent">
              <i class="fa <?php echo $brew_options['b3-c3-icon'] ?> fa-3x"></i>
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('content3') ) : ?>
              <?php endif; ?>
            </div>
          </div>
          
      </div> <!--end row-->

      <div class="row homecategories">
        <!--Section 1-->
          <div class="col-sm-4 about content4">
              <div class="homeinnercontent">
              <i class="fa <?php echo $brew_options['b3-c6-icon'] ?> fa-3x"></i>
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('content4') ) : ?>
              <?php endif; ?>
              </div>
          </div>
    
        <!--Section 2-->
          <div class="col-sm-4 about content5">
          <div class="homeinnercontent">
              <i class="fa <?php echo $brew_options['b3-c6-icon'] ?> fa-3x"></i>
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('content5') ) : ?>
              <?php endif; ?>
              </div>
          </div>
    
        <!--Section 3-->
          <div class="col-sm-4 about content6">
          <div class="homeinnercontent">
              <i class="fa <?php echo $brew_options['b3-c6-icon'] ?> fa-3x"></i>
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('content6') ) : ?>
              <?php endif; ?>
              </div>
          </div>
    
      </div> <!--end row-->
    </div>
  </div>
</main>



<!-- BLOCK 4: ABOUT -->
<div class="container info">
  <div class="row">
    <div class="col-md-12">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('homepageabout') ) : ?>
        <?php endif; ?>
    </div>
  </div>
</div>


<!-- BLOCK 5: BLOG -->
<main class="bloghome" role="main">
  <div class="container" id="blog">
    <div class="row">
        <div class="col-md-7">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('blogexcerpt') ) : ?>
          <?php endif; ?>
        </div>

        <div class="col-md-5" id="bloglist">
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('bloglist') ) : ?>
          <?php endif; ?>
        </div>
    </div>
  </div>
</main>

</div>
</div>
<?php get_footer(); ?>
