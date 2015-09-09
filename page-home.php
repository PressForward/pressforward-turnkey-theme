<?php
/*
Template Name: Home Page Template
*/
?>

<?php get_header(); ?>

<!-- BLOCK 1: SLIDER -->

  <?php if ($brew_options['block1-switch'] != 2) {
    echo '<div class="slider">
          <div  class="container homepage">
          <div class="sl-test">';
    
    $postcats = 'category=' . $brew_options['slider-categories'][0] . '&posts_per_page='. $brew_options['slider-post-quantity'];
    $feat_posts = get_posts($postcats);
    echo '<div class="liquid-slider" id ="slider2">';
    
        foreach($feat_posts as $post) {
              echo '<div id="slider-content">';
              
              $trim_title = get_post_field('post_title', $id); 
              $short_title = wp_trim_words( $trim_title, $num_words = 14, $more = '… ' );
              
              echo '<div id="slidertitle"><h1>' . $short_title . '</h1>';
              echo '<br><h2>By: ' . get_the_author() . '</h2></div>';  
                        
              $trimexcerpt = get_post_field('post_content', $id);
              $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 55, $more = '… ' );
                        
              echo '<div id="slidertext"><p class="info-title">' .  $shortexcerpt . '</p>
                <a href="' . get_permalink() .'" alt="' . get_the_title() . '" class="btn btn-default">Read More</a>    
                <h2 class="title">
                  <span><i class="fa fa-circle filled"></i><i class="fa fa-circle-thin empty"></i></span>
                </h2>
                </div> <!-- Close #slider-content -->
                     
                <div id="sliderimg">';
                    echo get_the_post_thumbnail( $post->ID, 'large');
                    echo '</div> <!-- close #sliderimg -->
                </div> <!-- close .liquid-slider #slider2 -->';
        } //<!--closes for each loop -->
    echo '</div> 
    </div> <!-- close .sl-test -->
    </div> <!-- close .container .homepage --> 
    </div> <!-- end .slider -->';
  };
?> <!--End Block 1-Slider-->

<!-- BLOCK 2 -->
<?php if ($brew_options['block2-switch'] != 2 && $brew_options['block2-col-number'] == 3) {
    echo '<main class="block-2" role="main">
            <div class="container" id="participate">
              <div class="row text-center">
                  <div class="col-md-3">
                      <i class="fa' . $brew_options['b2-c1-icon'] . 'fa-3x"></i>
                      <h1 class="widgettitle"><a href="' . get_page_link($brew_options['b2-c1-pagelink']) . '">' . $brew_options['b2-c1-heading'] . '</a></h1>
                    <div class="textwidget">
                      <p>' . $brew_options['b2-c1-text'] . '</p>
                    </div>
                </div>
               
                <div class="col-md-3">
                    <i class="fa' . $brew_options['b2-c2-icon'] . 'fa-3x"></i>
                    <h1 class="widgettitle"><a href="' . get_page_link($brew_options['b2-c2-pagelink']) . '">' . $brew_options['b2-c2-heading'] . '</a></h1>
                  <div class="textwidget">
                  <p>' . $brew_options['b2-c2-text'] .'</p>
                  </div>
                </div>
      
                <div class="col-md-3">
                <i class="fa' . $brew_options['b2-c3-icon'] . 'fa-3x"></i>
                     <h1 class="widgettitle"><a href="' . get_page_link($brew_options['b2-c3-pagelink']) . '">' . $brew_options['b2-c3-heading'] . '</a></h1>
                  <div class="textwidget">
                  <p>' . $brew_options['b2-c3-text'] .'</p>
                  </div>
                </div>

                <div class="col-md-3">
                <i class="fa' . $brew_options['b2-c4-icon'] . 'fa-3x"></i>
                     <h1 class="widgettitle"><a href="' . get_page_link($brew_options['b2-c4-pagelink']) . '">' . $brew_options['b2-c4-heading'] . '</a></h1>
                  <div class="textwidget">
                  <p>' . $brew_options['b2-c4-text'] . '</p>
                  </div>
                </div>
            </div>
        </div>
    </main>';
  } elseif ($brew_options['block2-switch'] != 2 && $brew_options['block2-col-number'] == 2) {
      echo '<main class="block-2" role="main">
            <div class="container" id="participate">
              <div class="row text-center">
      <div class="row text-center">
                  <div class="col-md-4">
                      <i class="fa' . $brew_options['b2-c1-icon'] . 'fa-3x"></i>
                      <h1 class="widgettitle"><a href="' . get_page_link($brew_options['b2-c1-pagelink']) . '">' . $brew_options['b2-c1-heading'] . '</a></h1>
                    <div class="textwidget">
                      <p>' . $brew_options['b2-c1-text'] . '</p>
                    </div>
                </div>
               
                <div class="col-md-4">
                    <i class="fa' . $brew_options['b2-c2-icon'] . 'fa-3x"></i>
                    <h1 class="widgettitle"><a href="' . get_page_link($brew_options['b2-c2-pagelink']) . '">' . $brew_options['b2-c2-heading'] . '</a></h1>
                  <div class="textwidget">
                  <p>' . $brew_options['b2-c2-text'] .'</p>
                  </div>
                </div>
      
                <div class="col-md-4">
                <i class="fa' . $brew_options['b2-c3-icon'] . 'fa-3x"></i>
                     <h1 class="widgettitle"><a href="' . get_page_link($brew_options['b2-c3-pagelink']) . '">' . $brew_options['b2-c3-heading'] . '</a></h1>
                  <div class="textwidget">
                  <p>' . $brew_options['b2-c3-text'] .'</p>
                  </div>
                </div>
                 </div>
        </div>
    </main>';
    } elseif ($brew_options['block2-switch'] != 2 && $brew_options['block2-col-number'] == 1) {
      echo '<main class="block-2" role="main">
            <div class="container" id="participate">
              <div class="row text-center">
      <div class="row text-center">
                  <div class="col-md-6">
                      <i class="fa' . $brew_options['b2-c1-icon'] . 'fa-3x"></i>
                      <h1 class="widgettitle"><a href="' . get_page_link($brew_options['b2-c1-pagelink']) . '">' . $brew_options['b2-c1-heading'] . '</a></h1>
                    <div class="textwidget">
                      <p>' . $brew_options['b2-c1-text'] . '</p>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <i class="fa' . $brew_options['b2-c2-icon'] . 'fa-3x"></i>
                    <h1 class="widgettitle"><a href="' . get_page_link($brew_options['b2-c2-pagelink']) . '">' . $brew_options['b2-c2-heading'] . '</a></h1>
                  <div class="textwidget">
                  <p>' . $brew_options['b2-c2-text'] .'</p>
                  </div>
                </div>
                 </div>
        </div>
    </main>';
    }
?>

<!-- BLOCK 3: CATEGORIES -->
<?php if($brew_options['block3-switch'] != 2 && $brew_options['block3-row-number'] == 2 ){
      global $brew_options;
      echo '<main class="block-3" role="main">
        <div class="container" id="categories">
          <div class="row text-center">
            <div class="row homecategories">
              <!--Section 1-->
                <div class="col-md-4 about" id="content1">
                    <div class="homeinnerwrapper">
                      <i class="fa' . $brew_options['b3-c1-icon'] . 'fa-3x"></i>
                      <div class="homeinnercontent">';
                      $b3_c1_link = get_category_link($brew_options['b3-c1-category']);
                      echo '<a href="' . $b3_c1_link . '"><h1>' . $brew_options['b3-c1-title'] . '</a></h1>
                      <ul>';
                      $b3c1cat = 'cat=' . $brew_options['b3-c1-category'] . '&posts_per_page=3';
                      query_posts($b3c1cat);
                      if ( have_posts() ) : while ( have_posts() ) : the_post();
                        echo '<li><a href="';
                        echo the_permalink() . '">';
                        echo  the_title() . '</a></li>';
                      endwhile; endif;
                      wp_reset_query();
                      echo '</ul>
                      </div>
                      
                    </div>
                </div>
                
              <!--Section 2-->
                <div class="col-md-4 about content2">
                      <div class="homeinnerwrapper">
                      <i class="fa' . $brew_options['b3-c2-icon'] . 'fa-3x"></i>
                      <div class="homeinnercontent">';
                      $b3_c2_link = get_category_link($brew_options['b3-c2-category']);
                      echo '<a href="' . $b3_c2_link . '"><h1>' . $brew_options['b3-c2-title'] . '</a></h1>
                      <ul>';
                      $b3c2cat = 'cat=' . $brew_options['b3-c2-category'] . '&posts_per_page=3';
                      query_posts($b3c2cat);
                      if ( have_posts() ) : while ( have_posts() ) : the_post();
                        echo '<li><a href="';
                        echo the_permalink() . '">';
                        echo  the_title() . '</a></li>';
                      endwhile; endif;
                      wp_reset_query();
                      echo '</ul>
                      </div>
                      
                    </div>
                </div>
          
              <!--Section 3-->
                <div class="col-md-4 about content3">
                   <div class="homeinnerwrapper">
                      <i class="fa' . $brew_options['b3-c3-icon'] . 'fa-3x"></i>
                      <div class="homeinnercontent">';
                      $b3_c3_link = get_category_link($brew_options['b3-c3-category']);
                      echo '<a href="' . $b3_c3_link . '"><h1>' . $brew_options['b3-c3-title'] . '</a></h1>
                      <ul>';
                      $b3c3cat = 'cat=' . $brew_options['b3-c3-category'] . '&posts_per_page=3';
                      query_posts($b3c3cat);
                      if ( have_posts() ) : while ( have_posts() ) : the_post();
                       echo '<li><a href="';
                        echo the_permalink() . '">';
                        echo  the_title() . '</a></li>';
                      endwhile; endif;
                      wp_reset_query();
                      echo '</ul>
                      </div>
                      
                    </div>
                </div>
                
            </div> <!--end row-->

            <div class="row homecategories">
              <!--Section 1-->
                <div class="col-md-4 about content4">
                    <div class="homeinnerwrapper">
                      <i class="fa' . $brew_options['b3-c4-icon'] . 'fa-3x"></i>
                      <div class="homeinnercontent">';
                      $b3_c4_link = get_category_link($brew_options['b3-c4-category']);
                      echo '<a href="' . $b3_c4_link . '"><h1>' . $brew_options['b3-c4-title'] . '</a></h1>
                      <ul>';
                      $b3c4cat = 'cat=' . $brew_options['b3-c4-category'] . '&posts_per_page=3';
                      query_posts($b3c4cat);
                      if ( have_posts() ) : while ( have_posts() ) : the_post();
                         echo '<li><a href="';
                        echo the_permalink() . '">';
                        echo  the_title() . '</a></li>';
                      endwhile; endif;
                      wp_reset_query();
                      echo '</ul>
                      </div>
                      
                    </div>
                </div>
          
              <!--Section 2-->
                <div class="col-md-4 about content5">
                   <div class="homeinnerwrapper">
                      <i class="fa' . $brew_options['b3-c5-icon'] . 'fa-3x"></i>
                      <div class="homeinnercontent">';
                      $b3_c5_link = get_category_link($brew_options['b3-c5-category']);
                      echo '<a href="' . $b3_c5_link . '"><h1>' . $brew_options['b3-c5-title'] . '</a></h1>
                      <ul>';
                      $b3c5cat = 'cat=' . $brew_options['b3-c5-category'] . '&posts_per_page=3';
                      query_posts($b3c5cat);
                      if ( have_posts() ) : while ( have_posts() ) : the_post();
                         echo '<li><a href="';
                        echo the_permalink() . '">';
                        echo  the_title() . '</a></li>';
                      endwhile; endif;
                      wp_reset_query();
                      echo '</ul>
                      </div>
                      
                    </div>
                </div>
          
              <!--Section 3-->
                <div class="col-md-4 about content6">
                   <div class="homeinnerwrapper">
                      <i class="fa' . $brew_options['b3-c6-icon'] . 'fa-3x"></i>
                      <div class="homeinnercontent">';
                      $b3_c6_link = get_category_link($brew_options['b3-c6-category']);
                      echo '<a href="' . $b3_c6_link . '"><h1>' . $brew_options['b3-c6-title'] . '</a></h1>
                      <ul>';
                      $b3c6cat = 'cat=' . $brew_options['b3-c6-category'] . '&posts_per_page=3';
                      query_posts($b3c6cat);
                      if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                          echo '<li><a href="';
                        echo the_permalink() . '">';
                        echo  the_title() . '</a></li>';
                      endwhile; endif; 
                      wp_reset_query();
                      echo '</ul>
                      </div>
                      
                    </div>
                </div>
            </div> <!--end row-->
          </div>
        </div>
      </main>';

} elseif ($brew_options['block3-switch'] != 2 && $brew_options['block3-row-number'] == 1) {
   global $brew_options;
      echo '<main class="block-3" role="main">
        <div class="container" id="categories">
          <div class="row text-center">
            <div class="row homecategories">
              <!--Section 1-->
                <div class="col-md-4 about" id="content1">
                    <div class="homeinnerwrapper">
                      <i class="fa' . $brew_options['b3-c1-icon'] . 'fa-3x"></i>
                      <div class="homeinnercontent">';
                      $b3_c1_link = get_category_link($brew_options['b3-c1-category']);
                      echo '<a href="' . $b3_c1_link . '"><h1>' . $brew_options['b3-c1-title'] . '</a></h1>
                      <ul>';
                      $b3c1cat = 'cat=' . $brew_options['b3-c1-category'] . '&posts_per_page=3';
                      query_posts($b3c1cat);
                      if ( have_posts() ) : while ( have_posts() ) : the_post();
                        echo '<li><a href="';
                        echo the_permalink() . '">';
                        echo  the_title() . '</a></li>';
                      endwhile; endif;
                      wp_reset_query();
                      echo '</ul>
                      </div>
                      
                    </div>
                </div>
                
              <!--Section 2-->
                <div class="col-md-4 about content2">
                      <div class="homeinnerwrapper">
                      <i class="fa' . $brew_options['b3-c2-icon'] . 'fa-3x"></i>
                      <div class="homeinnercontent">';
                      $b3_c2_link = get_category_link($brew_options['b3-c2-category']);
                      echo '<a href="' . $b3_c2_link . '"><h1>' . $brew_options['b3-c2-title'] . '</a></h1>
                      <ul>';
                      $b3c2cat = 'cat=' . $brew_options['b3-c2-category'] . '&posts_per_page=3';
                      query_posts($b3c2cat);
                      if ( have_posts() ) : while ( have_posts() ) : the_post();
                        echo '<li><a href="';
                        echo the_permalink() . '">';
                        echo  the_title() . '</a></li>';
                      endwhile; endif;
                      wp_reset_query();
                      echo '</ul>
                      </div>
                      
                    </div>
                </div>
          
              <!--Section 3-->
                <div class="col-md-4 about content3">
                   <div class="homeinnerwrapper">
                      <i class="fa' . $brew_options['b3-c3-icon'] . 'fa-3x"></i>
                      <div class="homeinnercontent">';
                      $b3_c3_link = get_category_link($brew_options['b3-c3-category']);
                      echo '<a href="' . $b3_c3_link . '"><h1>' . $brew_options['b3-c3-title'] . '</a></h1>
                      <ul>';
                      $b3c3cat = 'cat=' . $brew_options['b3-c3-category'] . '&posts_per_page=3';
                      query_posts($b3c3cat);
                      if ( have_posts() ) : while ( have_posts() ) : the_post();
                       echo '<li><a href="';
                        echo the_permalink() . '">';
                        echo  the_title() . '</a></li>';
                      endwhile; endif;
                      wp_reset_query();
                      echo '</ul>
                      </div>
                      
                    </div>
                </div>
                
            </div> <!--end row-->
                      </div>
        </div>
      </main>';
}
?>
<!-- BLOCK 4: ABOUT -->
<?php if($brew_options['block4-switch'] != 2) {
      echo '<div class="block4" role="main">
      <div class="container info">
        <div class="row">
          <div class="col-md-12" id="infotext">' . $brew_options['about_text'] . '</div>
        </div>
      </div>
      </div>';
    }
?>

<!-- BLOCK 5: Widget Areas -->
<?php if($brew_options['block5-switch'] != 2) {
      echo '<main class="block-5" role="main">
        <div class="container" id="block-5">
          <div class="row">
              <div class="col-md-7">';
                if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('blogexcerpt') ) : 
                endif; 
              echo '</div>

              <div class="col-md-5" id="bloglist">';
                if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('bloglist') ) :
                endif;
              echo '</div>
          </div>
        </div>
      </main>';
    }
    ?>


<?php get_footer(); ?>
