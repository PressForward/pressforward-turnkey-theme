<?php
/*
Template Name: Home Page Template
*/
?>

<?php get_header(); ?>

	<div id="content" class="sliderrow">

		<div id="inner-content" class="row">

		    <div class="large-12 medium-12 columns">
				<?php
				$categoriesopt = Kirki::get_option('pftk_opts', 'slider_category');
				echo $categoriesopt;
				$postcats = 'category=' . $categoriesopt . '&posts_per_page=4';
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
                <a href="' . get_permalink() .'" alt="' . get_the_title() . '" class="pf-tk-button">Read More</a>
                <h2 class="title">
                  <span><i class="fa fa-circle filled"></i><i class="fa fa-circle-thin empty"></i></span>
                </h2>
                </div> <!-- Close #slider-content -->

                <div id="sliderimg">';
                    echo get_the_post_thumbnail( $post->ID, 'medium');
                    echo '</div> <!-- close #sliderimg -->
                </div> <!-- close .liquid-slider #slider2 -->';
        } //<!--closes for each loop -->
    echo '</div>
    </div> <!-- close .sl-test -->
    </div> <!-- close .container .homepage -->
    </div> <!-- end .slider -->';

?> <!--End Block 1-Slider-->

<!--
Block 2
-->

      <div class="block-2" id="block-2">
	              <div class="row">
	                  <div class="large-3 medium-3 columns">
	                      <i class="fa fa-taxi fa-3x"></i>
	                      <h1 class="widgettitle"><a href="#">Title Goes Here</a></h1>
	                    <div class="textwidget">
	                      <p>Text goes here</p>
	                    </div>
	                </div>

	                 <div class="large-3 medium-3 columns">
	                      <i class="fa fa-taxi fa-3x"></i>
	                      <h1 class="widgettitle"><a href="#">Title Goes Here</a></h1>
	                    <div class="textwidget">
	                      <p>Text goes here</p>
	                    </div>
	                </div>

	                 <div class="large-3 medium-3 columns">
	                      <i class="fa fa-taxi fa-3x"></i>
	                      <h1 class="widgettitle"><a href="#">Title Goes Here</a></h1>
	                    <div class="textwidget">
	                      <p>Text goes here</p>
	                    </div>
	                </div>
	                <div class="large-3 medium-3 columns">
	                      <i class="fa fa-taxi fa-3x"></i>
	                      <h1 class="widgettitle"><a href="#">Title Goes Here</a></h1>
	                    <div class="textwidget">
	                      <p>Text goes here</p>
	                    </div>
	                </div>
	            </div> <!-- close .row -->
	      </div> <!-- close .block-2 -->

<!--
Block 3
-->
						<div class="block-3">
            <div class="row homecategories">
              <!--Section 1-->
                <div class="large-4 medium-4 columns about" id="content1">
                    <div class="homeinnerwrapper">
                      <i class="fa ' . $brew_options['b3-c1-icon'] . ' fa-3x"></i>
                      <div class="homeinnercontent">
                      <h1><a href="#">Category Link</a></h1>
                      <ul>
                      <?php $b3c1cat = 'cat=2&posts_per_page=3';
                      query_posts($b3c1cat);
                      if ( have_posts() ) : while ( have_posts() ) : the_post();
                        echo '<li><a href="';
                        echo the_permalink() . '">';
                        echo  the_title() . '</a></li>';
                      endwhile; endif;
                      wp_reset_query(); ?>
                      </ul>
                      </div>

                    </div> <!-- close homeinnerwrapper -->
                </div> <!-- close #content1 -->

              <!--Section 2-->
							<div class="large-4 medium-4 columns about" id="content2">
									<div class="homeinnerwrapper">
										<i class="fa-taxi"></i>
										<div class="homeinnercontent">
										<h1><a href="#">Category Link</a></h1>
										<ul>
										<?php $b3c2cat = 'cat=2&posts_per_page=3';
										query_posts($b3c2cat);
										if ( have_posts() ) : while ( have_posts() ) : the_post();
											echo '<li><a href="';
											echo the_permalink() . '">';
											echo  the_title() . '</a></li>';
										endwhile; endif;
										wp_reset_query(); ?>
										</ul>
										</div>
									</div>
								</div>

              <!--Section 3-->
							<div class="large-4 medium-4 columns about" id="content3">
									<div class="homeinnerwrapper">
										<i class="fa-taxi fa-3x"></i>
										<div class="homeinnercontent">
										<h1><a href="#">Category Link</a></h1>
										<ul>
										<?php $b3c3cat = 'cat=2&posts_per_page=3';
										query_posts($b3c3cat);
										if ( have_posts() ) : while ( have_posts() ) : the_post();
											echo '<li><a href="';
											echo the_permalink() . '">';
											echo  the_title() . '</a></li>';
										endwhile; endif;
										wp_reset_query(); ?>
										</ul>
										</div>
									</div>
								</div>

            </div> <!--end row-->
						<div class="row homecategories">
							<!--Section 1-->
								<div class="large-4 medium-4 columns about" id="content1">
										<div class="homeinnerwrapper">
											<i class="fa ' . $brew_options['b3-c1-icon'] . ' fa-3x"></i>
											<div class="homeinnercontent">
											<h1><a href="#">Category Link</a></h1>
											<ul>
											<?php $b3c1cat = 'cat=2&posts_per_page=3';
											query_posts($b3c1cat);
											if ( have_posts() ) : while ( have_posts() ) : the_post();
												echo '<li><a href="';
												echo the_permalink() . '">';
												echo  the_title() . '</a></li>';
											endwhile; endif;
											wp_reset_query(); ?>
											</ul>
											</div>

										</div>
								</div>

							<!--Section 2-->
							<div class="large-4 medium-4 columns about" id="content2">
									<div class="homeinnerwrapper">
										<i class="fa-taxi"></i>
										<div class="homeinnercontent">
										<h1><a href="#">Category Link</a></h1>
										<ul>
										<?php $b3c2cat = 'cat=2&posts_per_page=3';
										query_posts($b3c2cat);
										if ( have_posts() ) : while ( have_posts() ) : the_post();
											echo '<li><a href="';
											echo the_permalink() . '">';
											echo  the_title() . '</a></li>';
										endwhile; endif;
										wp_reset_query(); ?>
										</ul>
										</div>
									</div>
								</div>

							<!--Section 3-->
							<div class="large-4 medium-4 columns about" id="content3">
									<div class="homeinnerwrapper">
										<i class="fa-taxi fa-3x"></i>
										<div class="homeinnercontent">
										<h1><a href="#">Category Link</a></h1>
										<ul>
										<?php $b3c3cat = 'cat=2&posts_per_page=3';
										query_posts($b3c3cat);
										if ( have_posts() ) : while ( have_posts() ) : the_post();
											echo '<li><a href="';
											echo the_permalink() . '">';
											echo  the_title() . '</a></li>';
										endwhile; endif;
										wp_reset_query(); ?>
										</ul>
										</div>
									</div>
								</div>

						</div> <!--end row-->
          </div> <!--end .block-3 -->

<!--
Block 4
-->
			<div class="block-4">
							<div class="row">
									<div class="large-12 medium-12 columns" id="infotext">
										<h2>About Block #4</h2>
									</div>
							</div>
			</div>

<!--
Block 5
-->
				<div class="block-5">
					<div class="row">
							<div class="medium-7 large-7 columns">
								most recent post
							</div>
							<div class="medium-5 large-5 columns" id="bloglist">
								bloglist
							</div>
					</div>
				</div>


<?php get_footer(); ?>
