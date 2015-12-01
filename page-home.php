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
          <?php 
          $postcats = 'category=' . $brew_options['slider-categories'][0] . '&posts_per_page=4';
          $feat_posts = get_posts($postcats); ?>
        <div class="liquid-slider" id ="slider2">
          <?php foreach($feat_posts as $post) { ?>
              <div id="slider-content">
                  <?php $trim_title = get_post_field('post_title', $id);
                        $short_title = wp_trim_words( $trim_title, $num_words = 14, $more = '… ' );
                        echo '<div id="slidertitle"><h1>' . $short_title . '</h1>';
                        echo '<br><h2>By: ' . get_the_author() . '</h2></div>';  ?>
                  <?php $trimexcerpt = get_post_field('post_content', $id);
                        $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 55, $more = '… ' );
                        echo '<div id="slidertext"><p class="info-title">' .  $shortexcerpt . '</p>';  ?>
                  <a href="<?php echo get_permalink(); ?>" alt="<?php echo get_the_title() ?>" class="btn btn-default">Read More</a>
                  
                  <h2 class="title">
              <span><i class="fa fa-circle filled"></i><i class="fa fa-circle-thin empty"></i></span>
</h2>
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

<main class="um-notice" role="main">
<div class="container" id="um-notice" >
  <div class="row text-center">
    <div class="col-md-12">
      <p><i class="fa fa-asterisk"></i> Heads up! Our Editor-at-Large sign up and user registration process is changing next year. <a href="http://dhnow.org/1Tov478"> Read about the forthcoming changes here. </a></p>
    </div>
  </div> <!-- close row -->
</div>

</main>


<!-- BLOCK 2-PARTICIPATE -->

<main class="participatehome" role="main">
    <div class="container" id="participate">
        <div class="row text-center">
            <div class="col-md-3">
                <i class="fa <?php echo $brew_options['b2-c1-icon'] ?> fa-3x"></i>
              <h1 class="widgettitle"><a href="<?php echo get_page_link($brew_options['b2-c1-pagelink']); ?>"><?php echo $brew_options['b2-c1-heading'] ?></a></h1>
              <div class="textwidget">
              <p><?php echo $brew_options['b2-c1-text'] ?></p>
              </div>
            </div>
           
            <div class="col-md-3">
                <i class="fa <?php echo $brew_options['b2-c2-icon'] ?> fa-3x"></i>
                <h1 class="widgettitle"><a href="<?php echo get_page_link($brew_options['b2-c2-pagelink']); ?>"><?php echo $brew_options['b2-c2-heading'] ?></a></h1>
              <div class="textwidget">
              <p><?php echo $brew_options['b2-c2-text'] ?></p>
              </div>
            </div>
  
            <div class="col-md-3">
            <i class="fa <?php echo $brew_options['b2-c3-icon'] ?> fa-3x"></i>
                 <h1 class="widgettitle"><a href="<?php echo get_page_link($brew_options['b2-c3-pagelink']); ?>"><?php echo $brew_options['b2-c3-heading'] ?></a></h1>
              <div class="textwidget">
              <?php if (is_user_logged_in() ) {
                echo '<a class="btn btn-default" href="' .get_dashboard_url() . '/admin.php?page=pf-menu" role="button">Nominate Content</a>';
              } else {
                echo '<a class="btn btn-default" href="' . get_site_url() . '/registration" role="button">Log In</a>';
              } ?>
              </div>
            </div>

            <div class="col-md-3">
            <i class="fa <?php echo $brew_options['b2-c4-icon'] ?> fa-3x"></i>
                 <h1 class="widgettitle"><a href="<?php echo get_page_link($brew_options['b2-c4-pagelink']); ?>"><?php echo $brew_options['b2-c4-heading'] ?></a></h1>
              <div class="textwidget">
              <?php if (is_user_logged_in() ) {
                echo '<a class="btn btn-default" href="' . get_edit_profile_url() . '" role="button">Manage Volunteer Dates</a> ';
              } else {
                 echo '<p>' . $brew_options['b2-c4-text'] . '</p>';
              } ?>
              </div>
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
          <div class="col-md-4 about" id="content1">
              <div class="homeinnerwrapper">
                <i class="fa <?php echo $brew_options['b3-c1-icon'] ?> fa-3x"></i>
                <div class="homeinnercontent">
                <?php $b3_c1_link = get_category_link( $brew_options['b3-c1-category'] ); ?>
                 <?php echo '<a href="' . $b3_c1_link . '"><h1>' . $brew_options['b3-c1-title'] . '</h1>'; ?>
                <ul>
                <?php $b3c1cat = 'cat=' . $brew_options['b3-c1-category'] . '&posts_per_page=3' ?>
                <?php query_posts($b3c1cat); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></li>
                <?php endwhile; endif; ?>
                <?php wp_reset_query(); ?>
                </ul>
                </div>
                
              </div>
          </div>
          
        <!--Section 2-->
          <div class="col-md-4 about content2">
                <div class="homeinnerwrapper">
                <i class="fa <?php echo $brew_options['b3-c2-icon'] ?> fa-3x"></i>
                <div class="homeinnercontent">
                <?php $b3_c2_link = get_category_link( $brew_options['b3-c2-category'] ); ?>
                 <?php echo '<a href="' . $b3_c2_link . '"><h1>' . $brew_options['b3-c2-title'] . '</h1>'; ?>
                <ul>
                <?php $b3c2cat = 'cat=' . $brew_options['b3-c2-category'] . '&posts_per_page=3' ?>
                <?php query_posts($b3c2cat); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></li>
                <?php endwhile; endif; ?>
                <?php wp_reset_query(); ?>
                </ul>
                </div>
                
              </div>
          </div>
    
        <!--Section 3-->
          <div class="col-md-4 about content3">
             <div class="homeinnerwrapper">
                <i class="fa <?php echo $brew_options['b3-c3-icon'] ?> fa-3x"></i>
                <div class="homeinnercontent">
                <?php $b3_c3_link = get_category_link( $brew_options['b3-c3-category'] ); ?>
                 <?php echo '<a href="' . $b3_c3_link . '"><h1>' . $brew_options['b3-c3-title'] . '</h1>'; ?>
                <ul>
                <?php $b3c3cat = 'cat=' . $brew_options['b3-c3-category'] . '&posts_per_page=3' ?>
                <?php query_posts($b3c3cat); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></li>
                <?php endwhile; endif; ?>
                <?php wp_reset_query(); ?>
                </ul>
                </div>
                
              </div>
          </div>
          
      </div> <!--end row-->

      <div class="row homecategories">
        <!--Section 1-->
          <div class="col-md-4 about content4">
              <div class="homeinnerwrapper">
                <i class="fa <?php echo $brew_options['b3-c4-icon'] ?> fa-3x"></i>
                <div class="homeinnercontent">
                <?php $b3_c4_link = get_category_link( $brew_options['b3-c4-category'] ); ?>
                 <?php echo '<a href="' . $b3_c4_link . '"><h1>' . $brew_options['b3-c4-title'] . '</h1>'; ?>
                <ul>
                <?php $b3c4cat = 'cat=' . $brew_options['b3-c4-category'] . '&posts_per_page=3' ?>
                <?php query_posts($b3c4cat); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></li>
                <?php endwhile; endif; ?>
                <?php wp_reset_query(); ?>
                </ul>
                </div>
                
              </div>
          </div>
    
        <!--Section 2-->
          <div class="col-md-4 about content5">
             <div class="homeinnerwrapper">
                <i class="fa <?php echo $brew_options['b3-c5-icon'] ?> fa-3x"></i>
                <div class="homeinnercontent">
                <?php $b3_c5_link = get_category_link( $brew_options['b3-c5-category'] ); ?>
                 <?php echo '<a href="' . $b3_c5_link . '"><h1>' . $brew_options['b3-c5-title'] . '</h1>'; ?>
                <ul>
                <?php $b3c5cat = 'cat=' . $brew_options['b3-c5-category'] . '&posts_per_page=3' ?>
                <?php query_posts($b3c5cat); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></li>
                <?php endwhile; endif; ?>
                <?php wp_reset_query(); ?>
                </ul>
                </div>
                
              </div>
          </div>
    
        <!--Section 3-->
          <div class="col-md-4 about content6">
             <div class="homeinnerwrapper">
                <i class="fa <?php echo $brew_options['b3-c6-icon'] ?> fa-3x"></i>
                <div class="homeinnercontent">
                <?php $b3_c6_link = get_category_link( $brew_options['b3-c6-category'] ); ?>
                 <?php echo '<a href="' . $b3_c6_link . '"><h1>' . $brew_options['b3-c6-title'] . '</h1>'; ?>
                <ul>
                <?php $b3c6cat = 'cat=' . $brew_options['b3-c6-category'] . '&posts_per_page=3' ?>
                <?php query_posts($b3c6cat); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></li>
                <?php endwhile; endif; ?>
                <?php wp_reset_query(); ?>
                </ul>
                </div>
                
              </div>
          </div>
      </div> <!--end row-->
    </div>
  </div>
</main>



<!-- BLOCK 4: ABOUT -->
<div class="block4" role="main">
<div class="container info">
  <div class="row">
    <div class="col-md-12" id="infotext">
        <?php echo $brew_options['about_text'] ?>
    </div>
  </div>
</div>
</div>

<!-- BLOCK 5: BLOG -->
<main class="bloghome" role="main">
  <div class="container" id="blog">
    <div class="row">
     <h2>Blog</h2>
        <div class="col-md-7" id="blog-excerpt">
         <?php $blogcat = 'cat=' . $brew_options['blog-category'] . '&posts_per_page=1' ?>
                <?php query_posts($blogcat); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
                    <p><?php the_excerpt(); ?></p>
                <?php endwhile; endif; ?>
              
        </div>

        <div class="col-md-5" id="bloglist">
        <?php $blogcat2 = 'cat=' . $brew_options['blog-category'] . '&posts_per_page=5' ?>
                <ul>
                <?php query_posts($blogcat2); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></li>
                <?php endwhile; endif; ?>
                </ul>
        </div>
    </div>
  </div>
</main>


<?php get_footer(); ?>
