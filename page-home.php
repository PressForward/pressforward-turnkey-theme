<?php
/*
Template Name: Home Page Template
*/
?>

<?php get_header(); ?>
	
	<div id="content">
	
		<div id="inner-content" class="row">
	
		    <main id="main" class="large-12 medium-12 columns" role="main">
				<?php
				$postcats = 'category=80&posts_per_page=4';
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

?> <!--End Block 1-Slider-->					
			    					
			</main> <!-- end #main -->

		    <?php get_sidebar(); ?>
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>