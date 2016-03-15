<?php
/*
Template Name: Home Page Template
*/
?>

<?php get_header(); ?>
<?php $slider_switch = Kirki::get_option( 'pftk_opts', 'slider-switch'); ?>
<?php if ($slider_switch == true): ?>
<div id="content" class="slider-container">

<div class="row">
<div class="medium-12 large-12 columns">
	<div class="orbit" role="region" data-options="autoPlay:false;" aria-label="Editor's Choice" data-orbit>
  	<ul class="orbit-container">
    	<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
    	<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>

			<?php
			//get slider category ids from customizer option
			$pftk_opts = '';
			$slider_category = '';

			$slider_categories_option = Kirki::get_option( 'pftk_opts', 'slider_category');

			//get number of posts from customizer option
			$slider_numposts_option = Kirki::get_option( 'pftk_opts', 'slider_numposts' );

			$postcats = 'category='. $slider_categories_option . '&posts_per_page=' . $slider_numposts_option;
			$feat_posts = get_posts($postcats);
			$bullets = 1;
			foreach($feat_posts as $post) {
        $trim_title = get_post_field('post_title', $id);
        $short_title = wp_trim_words( $trim_title, $num_words = 14, $more = '… ' );
				$trimexcerpt = get_post_field('post_content', $id);
        $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 55, $more = '… ' );
						echo '<li class="orbit-slide">';
						echo '<div class="row">';
						echo '<div id="medium-12 columns"><h1>' . $short_title . '</h1></div>';
						echo '<div class="row">';
						echo '<div class="medium-7 columns">';
						echo '<h2 class="slider-byline">By: ' . get_the_author() . '</h2></br><p class="info-title">' . $shortexcerpt . '</p> <a href="' . get_permalink() . '
						" alt="' . get_the_title() . '" class="pf-tk-button">Read More</a></div>';
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
						echo '<div class="medium-5 columns"><img src="' . $thumb[0] . '" class="thumbnail"></div>';
						echo '</div>';
						echo '</li>';
						$bullets++;
			}
?>
</ul>
<nav class="orbit-bullets">
		<?php
		$counter = 0;
		while($counter < $bullets - 1) {
			if ($counter == 0) {
			echo '<button data-slide="'. $counter . '"><span class="show-for-sr">slide details.</span><span class="show-for-sr">Current Slide</span></button>';
			$counter++;
		} elseif ($counter < $bullets - 1) {
			echo '<button data-slide="'. $counter . '"><span class="show-for-sr">slide details.</span></button>';
			$counter++;
		}
		} ?>
  </nav>
	</div> <!-- close .orbit -->
</div>
</div><!--  close .row #slider -->
</div>
<?php endif; ?>
<!-- </div> end content -->

<!--
Block 2
-->
<?php $toggle_b2 = Kirki::get_option( 'pftk_opts', 'toggle-b2'); ?>
		<?php if ($toggle_b2 == true): ?>
      <div class="block-2" id="block-2">
	              <div class="row">
	                  <div class="large-3 medium-3 columns">
												<?php $b2c1_icon = Kirki::get_option( 'pftk_opts', 'b2c1-icon' );
												echo '<i class="fa ' . $b2c1_icon . ' fa-3x"></i>';
												$b2c1_title = Kirki::get_option( 'pftk_opts', 'b2c1-title');
												$b2c1_link = Kirki::get_option('pftk_opts', 'b2c1-link');
												echo '<h1 class="widgettitle"><a href="' . get_permalink($b2c1_link) . '">' . $b2c1_title . '</a></h1>'; ?>
	                    <div class="textwidget">
												<?php $b2c1_text = Kirki::get_option( 'pftk_opts', 'b2c1-text');
											  echo '<p>' . $b2c1_text . '</p>' ?>
	                    </div>
	                	</div>

										<div class="large-3 medium-3 columns">
											 <?php $b2c2_icon = Kirki::get_option( 'pftk_opts', 'b2c2-icon' );
											 echo '<i class="fa ' . $b2c2_icon . ' fa-3x"></i>';
											 $b2c2_title = Kirki::get_option( 'pftk_opts', 'b2c2-title');
											 $b2c2_link = Kirki::get_option('pftk_opts', 'b2c2-link');
											 echo '<h1 class="widgettitle"><a href="' . get_permalink($b2c2_link) . '">' . $b2c2_title . '</a></h1>'; ?>
										 <div class="textwidget">
											 <?php $b2c2_text = Kirki::get_option( 'pftk_opts', 'b2c2-text');
											 echo '<p>' . $b2c2_text . '</p>' ?>
										 </div>
									 </div>

									 <div class="large-3 medium-3 columns">
											 <?php $b2c3_icon = Kirki::get_option( 'pftk_opts', 'b2c3-icon' );
											 echo '<i class="fa ' . $b2c1_icon . ' fa-3x"></i>';
											 $b2c3_title = Kirki::get_option( 'pftk_opts', 'b2c3-title');
											 $b2c3_link = Kirki::get_option('pftk_opts', 'b2c3-link');
											 echo '<h1 class="widgettitle"><a href="'. get_permalink($b2c3_link) . '">' . $b2c3_title . '</a></h1>'; ?>
										 <div class="textwidget">
											 <?php $b2c3_text = Kirki::get_option( 'pftk_opts', 'b2c3-text');
											 echo '<p>' . $b2c3_text . '</p>' ?>
										 </div>
									 </div>

									 <div class="large-3 medium-3 columns">
 											<?php $b2c4_icon = Kirki::get_option( 'pftk_opts', 'b2c4-icon' );
 											echo '<i class="fa ' . $b2c4_icon . ' fa-3x"></i>';
 											$b2c4_title = Kirki::get_option( 'pftk_opts', 'b2c4-title');
											$b2c4_link = Kirki::get_option('pftk_opts', 'b2c4-link');
 											echo '<h1 class="widgettitle"><a href="'. get_permalink($b2c4_link) . '">' . $b2c4_title . '</a></h1>'; ?>
 										<div class="textwidget">
 											<?php $b2c4_text = Kirki::get_option( 'pftk_opts', 'b2c4-text');
 											echo '<p>' . $b2c4_text . '</p>' ?>
 										</div>
 									</div>

	            </div> <!-- close .row -->
	      </div> <!-- close .block-2 -->
			<?php endif;	?>

<!--block3 test layout-->
<?php $toggle_b3 = Kirki::get_option( 'pftk_opts', 'toggle-b3');
	if ($toggle_b3 == true): ?>
	<div class="block-3">
		<div class="row small-up-1  large-up-3" data-equalizer data-equalize-by-row="true">
				<!--B3 R1 C1 -->
				<div class="column" >
						<div class="b3-wrapper" data-equalizer-watch>
								<?php $b3r1c1_icon = Kirki::get_option('pftk_opts', 'b3r1c1-icon');
								echo '<i class="fa ' . $b3r1c1_icon . ' fa-3x"></i>';

								$b3r1c1_link = Kirki::get_option('pftk_opts', 'b3r1c1-link');
								$b3r1c1_title = Kirki::get_option('pftk_opts', 'b3r1c1-title');

								echo '<h1><a href="' . get_permalink($b3r1c1_link) .'">' . $b3r1c1_title .'</a></h1>'; ?>

								<ul>
									<?php $b3r1c1_category = Kirki::get_option( 'pftk_opts', 'b3r1c1-category');
									$b3c1cat = 'cat=' . $b3r1c1_category . '&posts_per_page=3';
									query_posts($b3c1cat);

									if ( have_posts() ) : while ( have_posts() ) : the_post();
										echo '<li><a href="';
										echo the_permalink() . '">';
										echo  the_title() . '</a></li>';
									endwhile; endif;

									wp_reset_query(); ?>
								</ul>

						</div> <!--END B3-WRAPPER-->
					</div> <!--END COLUMN -->

					<div class="column" >
					    <div class="b3-wrapper" data-equalizer-watch>
					        <?php $b3r1c2_icon = Kirki::get_option('pftk_opts', 'b3r1c2-icon');
					        echo '<i class="fa ' . $b3r1c2_icon . ' fa-3x"></i>';

					        $b3r1c2_link = Kirki::get_option('pftk_opts', 'b3r1c2-link');
					        $b3r1c2_title = Kirki::get_option('pftk_opts', 'b3r1c2-title');

					        echo '<h1><a href="' . get_permalink($b3r1c2_link) .'">' . $b3r1c2_title .'</a></h1>'; ?>

					        <ul>
					          <?php $b3r1c2_category = Kirki::get_option( 'pftk_opts', 'b3r1c2-category');
					          $b3c1cat = 'cat=' . $b3r1c2_category . '&posts_per_page=3';
					          query_posts($b3c1cat);

					          if ( have_posts() ) : while ( have_posts() ) : the_post();
					            echo '<li><a href="';
					            echo the_permalink() . '">';
					            echo  the_title() . '</a></li>';
					          endwhile; endif;

					          wp_reset_query(); ?>
					        </ul>

					    </div> <!--END B3-WRAPPER-->
					  </div> <!--END COLUMN -->

						<div class="column" >
						    <div class="b3-wrapper" data-equalizer-watch>
						        <?php $b3r1c3_icon = Kirki::get_option('pftk_opts', 'b3r1c3-icon');
						        echo '<i class="fa ' . $b3r1c3_icon . ' fa-3x"></i>';

						        $b3r1c3_link = Kirki::get_option('pftk_opts', 'b3r1c3-link');
						        $b3r1c3_title = Kirki::get_option('pftk_opts', 'b3r1c3-title');

						        echo '<h1><a href="' . get_permalink($b3r1c3_link) .'">' . $b3r1c3_title .'</a></h1>'; ?>

						        <ul>
						          <?php $b3r1c3_category = Kirki::get_option( 'pftk_opts', 'b3r1c3-category');
						          $b3c1cat = 'cat=' . $b3r1c3_category . '&posts_per_page=3';
						          query_posts($b3c1cat);

						          if ( have_posts() ) : while ( have_posts() ) : the_post();
						            echo '<li><a href="';
						            echo the_permalink() . '">';
						            echo  the_title() . '</a></li>';
						          endwhile; endif;

						          wp_reset_query(); ?>
						        </ul>

						    </div> <!--END B3-WRAPPER-->
						  </div> <!--END COLUMN -->

	</div> <!--END ROW-->
	<?php $b3_numrows = Kirki::get_option( 'pftk_opts', 'b3-numrows' );
	if ($b3_numrows == 'Two'): ?>
	<div class="row small-up-1  large-up-3" style="margin-top:15px;" data-equalizer data-equalize-by-row="true">
		<div class="column">
				<div class="b3-wrapper" data-equalizer-watch>
						<?php $b3r2c1_icon = Kirki::get_option('pftk_opts', 'b3r2c1-icon');
						echo '<i class="fa ' . $b3r2c1_icon . ' fa-3x"></i>';

						$b3r2c1_link = Kirki::get_option('pftk_opts', 'b3r2c1-link');
						$b3r2c1_title = Kirki::get_option('pftk_opts', 'b3r2c1-title');

						echo '<h1><a href="' . get_permalink($b3r2c1_link) .'">' . $b3r2c1_title .'</a></h1>'; ?>

						<ul>
							<?php $b3r2c1_category = Kirki::get_option( 'pftk_opts', 'b3r2c1-category');
							$b3c1cat = 'cat=' . $b3r2c1_category . '&posts_per_page=3';
							query_posts($b3c1cat);

							if ( have_posts() ) : while ( have_posts() ) : the_post();
								echo '<li><a href="';
								echo the_permalink() . '">';
								echo  the_title() . '</a></li>';
							endwhile; endif;

							wp_reset_query(); ?>
						</ul>

				</div> <!--END B3-WRAPPER-->
			</div> <!--END COLUMN -->

			<div class="column">
			    <div class="b3-wrapper" data-equalizer-watch>
			        <?php $b3r2c2_icon = Kirki::get_option('pftk_opts', 'b3r2c2-icon');
			        echo '<i class="fa ' . $b3r2c2_icon . ' fa-3x"></i>';

			        $b3r2c2_link = Kirki::get_option('pftk_opts', 'b3r2c2-link');
			        $b3r2c2_title = Kirki::get_option('pftk_opts', 'b3r2c2-title');

			        echo '<h1><a href="' . get_permalink($b3r2c2_link) .'">' . $b3r2c2_title .'</a></h1>'; ?>

			        <ul>
			          <?php $b3r2c2_category = Kirki::get_option( 'pftk_opts', 'b3r2c2-category');
			          $b3c1cat = 'cat=' . $b3r2c2_category . '&posts_per_page=3';
			          query_posts($b3c1cat);

			          if ( have_posts() ) : while ( have_posts() ) : the_post();
			            echo '<li><a href="';
			            echo the_permalink() . '">';
			            echo  the_title() . '</a></li>';
			          endwhile; endif;

			          wp_reset_query(); ?>
			        </ul>

			    </div> <!--END B3-WRAPPER-->
			  </div> <!--END COLUMN -->

				<div class="column">
				    <div class="b3-wrapper" data-equalizer-watch>
				        <?php $b3r2c3_icon = Kirki::get_option('pftk_opts', 'b3r2c3-icon');
				        echo '<i class="fa ' . $b3r2c3_icon . ' fa-3x"></i>';

				        $b3r2c3_link = Kirki::get_option('pftk_opts', 'b3r2c3-link');
				        $b3r2c3_title = Kirki::get_option('pftk_opts', 'b3r2c3-title');

				        echo '<h1><a href="' . get_permalink($b3r2c3_link) .'">' . $b3r2c3_title .'</a></h1>'; ?>

				        <ul>
				          <?php $b3r2c3_category = Kirki::get_option( 'pftk_opts', 'b3r2c3-category');
				          $b3c1cat = 'cat=' . $b3r2c3_category . '&posts_per_page=3';
				          query_posts($b3c1cat);

				          if ( have_posts() ) : while ( have_posts() ) : the_post();
				            echo '<li><a href="';
				            echo the_permalink() . '">';
				            echo  the_title() . '</a></li>';
				          endwhile; endif;

				          wp_reset_query(); ?>
				        </ul>

				    </div> <!--END B3-WRAPPER-->
				  </div> <!--END COLUMN -->
				<?php endif; ?>
	</div>
</div><!--end .BLOCK-3-->
<?php endif; ?>

<!--
Block 4
-->
		<?php $toggle_b4 = Kirki::get_option( 'pftk_opts', 'toggle-b4');

		if ($toggle_b4 == true): ?>

			<div class="block-4">
							<div class="row">
									<div class="large-12 medium-12 columns" id="infotext">
										<?php $block4_text = Kirki::get_option('pftk_opts', 'b4-text');
										 $block4_title = Kirki::get_option('pftk_opts', 'b4-title');
										 $block4_title_link = Kirki::get_option('pftk_opts','b4-title-link');

									if (empty($block4_title_link) == FALSE):
										echo '<h1 class="widgettitle"><a href="' . get_the_permalink($block4_title_link) . '">' . $block4_title . '</a></h1>';
									else:
										echo '<h1 class="widgettitle">' . $block4_title . '</h1>';

									endif;
									echo '<p>' . $block4_text . '</p>';
										?>
									</div>
							</div>
			</div>
		<?php endif ?>
<!--
Block 5
-->
		<?php $toggle_b5 = Kirki::get_option( 'pftk_opts', 'toggle-b5');

		if ($toggle_b5 == true): ?>
				<div class="block-5">
					<div class="row">
						<div class="large-12 medium-12 columns">
								<?php
								$block5_title_link = Kirki::get_option( 'pftk_opts', 'b5-title-link');
								$block5_title = Kirki::get_option('pftk_opts', 'b5-title');
								if (empty($block5_title_link) == FALSE):
									echo '<h1 class="widgettitle"><a href="' . get_the_permalink($block5_title_link) . '">' . $block5_title . '</a></h1>';
								else:
									echo '<h1 class="widgettitle">' . $block5_title . '</h1>';
								endif; ?>

						</div>
					</div>
					<div class="row">
						<h2 class="widgettitle"></h2>
							<div class="medium-7 large-7 columns">
								<?php
									$args = array (
									'numberposts' => 1,
									'cat' => 16,
									'posts_per_page' => 1,
									'post_status' => 'publish'
								);
								$query = new WP_Query($args);
								if ($query->have_posts()) {
									while ($query->have_posts() ) {
										$query->the_post();
										echo '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
										echo '<p>' . get_the_excerpt() . '</p>';
									}
									wp_reset_postdata();
								}
								?>
							</div>
							<div class="medium-5 large-5 columns" id="bloglist">
							<?php
								$args = array (
								'numberposts' => 5,
								'cat' => 16,
								'posts_per_page' => 5,
								'post_status' => 'publish'
							);
							$query = new WP_Query($args);
							if ($query->have_posts()) {
								while ($query->have_posts() ) {
									$query->the_post();
									echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
								}
								wp_reset_postdata();
							}
							?>
							</div>
					</div>
				</div>
		<?php endif ?>

<?php get_footer(); ?>
