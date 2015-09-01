<!-- 
Features on this page: 
01. Category Featured Images 
02. Author Display Conditional by Category
03. Author Info (off by default)
04. Comment Template (off by default)
05. Sidebar (off by default) 
-->

<?php get_header(); ?>
<div class="container">  
	<div id="content" class="clearfix row">
		<div id="main" class="col-md-12" role="main">
       		<?php get_template_part( 'breadcrumb' ); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>			
				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					<!-- 01. CATEGORY FEATURED IMAGES -->
					<!-- This if statement determines the icon (or featured image) that displays on the individual post page.  -->
						<?php global $brew_options ?>
						<?php 	
							$b3c1cat = $brew_options['b3-c1-category']; 
							$b3c2cat = $brew_options['b3-c2-category'];
							$b3c3cat = $brew_options['b3-c3-category'];
							$b3c4cat = $brew_options['b3-c4-category']; 
							$b3c5cat = $brew_options['b3-c5-category']; 
							$b3c6cat = $brew_options['b3-c6-category']; 
							$slidercat = $brew_options['slider-categories'];
						?>  

						<?php if ( in_category($b3c1cat)) {
							echo '<div class="col-md-2 featimg text-center">';
							echo '<i class="fa ' . $brew_options['b3-c1-icon'] .' fa-5x"></i></div> <!--close col-md-2 featimg--><div class="col-md-10" id="postcontent">';
						} else if (in_category($b3c2cat)) {
							echo '<div class="col-md-2 featimg text-center">';
							echo '<i class="fa ' . $brew_options['b3-c2-icon'] .' fa-5x"></i></div> <!--close col-md-2 featimg--><div 
								</div> <!--close col-md-2 featimg-->
								<div class="col-md-10" id="postcontent">';
						} else if (in_category($b3c3cat)) {
							echo '<div class="col-md-2 featimg text-center">';
							echo '<i class="fa ' . $brew_options['b3-c3-icon'] .' fa-5x"></i></div> <!--close col-md-2 featimg--><div class="col-md-10" id="postcontent">';
						} else if (in_category($b3c4cat)) {
							echo '<div class="col-md-2 featimg text-center">';
							echo '<i class="fa ' . $brew_options['b3-c4-icon'] .' fa-5x"></i></div> <!--close col-md-2 featimg--><div class="col-md-10" id="postcontent">';
						} else if (in_category($b3c5cat)) {
							echo '<div class="col-md-2 featimg text-center">';
							echo '<i class="fa ' . $brew_options['b3-c5-icon'] .' fa-5x"></i></div> <!--close col-md-2 featimg--><div class="col-md-10" id="postcontent">';
						} else if (in_category($b3c6cat)) {
							echo '<div class="col-md-2 featimg text-center">';
							echo '<i class="fa ' . $brew_options['b3-c6-icon'] .' fa-5x"></i></div> <!--close col-md-2 featimg--><div class="col-md-10" id="postcontent">';
						} else if (in_category('87')) {
							echo '<div class="col-md-2 featimg text-center">
								  <i class="fa fa-pencil fa-5x"></i>
								  </div> <!--close col-md-2 featimg-->
								  <div class="col-md-10" id="postcontent">';
						} else if (in_category($slidercat)) {
							echo '<div class="col-md-3 featimg">' . get_the_post_thumbnail( $post->ID, array(250,250)) . '</div> <!--close col-md-3 featimg-->
								<div class="col-md-9" id="postcontent">';
						} ?>
							

							
					<header class="article-header">
						<div class="titlewrap clearfix">
							<h1 class="single-title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
							
							<?php $excludedcategories = $brew_options['author-display-excluded-categories']; ?>
							<?php $includedcategories = $brew_options['author-display-included-categories']; ?>
							<p class="byline vcard">										
								<?php if ( $brew_options['author'] == 1) { ?>
									by <span class="author"><em><?php echo bones_get_the_author_posts_link() ?> - </em></span>
								<?php } elseif ($brew_options['author'] != 1 && in_category($excludedcategories)) { ?>
									by <span class="author"><em><?php echo get_the_author() ?> - </em></span>
								<?php } elseif ($brew_options['author'] != 1 && in_category($includedcategories)) { ?>
									by <span class="author"><em><?php echo bones_get_the_author_posts_link() ?> - </em></span>
								<?php } else { ?>
									<span class="author"><em></em><?php echo $brew_options['author-display-alttext']; ?> - </em></span>
								<?php } ?>

								
								<time class="updated" datetime="<?php get_the_time('Y-m-j') ?>"><?php echo  get_the_time(get_option('date_format')) ?></time>
								<span class="sticky-ind pull-right"><i class="fa fa-star"></i></span>
							</p>
						</div> <!-- close titlewrap -->
									
					</header> <?php // end article header ?>
								
							

					<section class="entry-content single-content clearfix" itemprop="articleBody">
						<?php the_content(); ?>
									
						<?php wp_link_pages(
	                        array(
	                        'before' => '<div class="page-link"><span>' . __( 'Pages:', 'brew' ) . '</span>',
	                        'after' => '</div>' ) 
	                    ); ?>
					</section> <?php // end article section ?>
					</div> <!-- close main ???? -->
			
					<footer class="article-footer single-footer clearfix">
						<?php
							echo '<span class="tags pull-left">';
							printf( '<span class="">' . __( 'in %1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?> <?php the_tags( '<span class="tags-title">' . __( '<i class="fa fa-tags"></i>', 'bonestheme' ) . '</span> ', ', ', '  ' );
							echo '</span>  ';
						?>
								
						<!-- </div> -->
		              	<span class="commentnum pull-right"><a href="<?php comments_link(); ?>"><?php comments_number( '<i class="fa fa-comment"></i> 0  ', '<i class="fa fa-comment"></i> 1  ', '<i class="fa fa-comment"></i> %  ' ); ?></a>
		              	<?php if ($brew_options['nom-count'] == 1) {
		              				
		              				$nomcount = get_post_meta($post->ID, 'nomination_count', true);
									if ($nomcount > 0) {
									echo '<img src="' . get_stylesheet_directory_uri() . '/library/images/pfpublication.png" height="15px" />' . $nomcount;
									}
								} ?>
						</span> 
						<?//php the_author_posts_link(); ?>
		              				
						<!-- </div>	???? --> 
		            </footer> <?php // end article footer ?>
				</article> <?php // end article ?>

						
				<!-- 03. AUTHOR INFO  -->
				<?php get_template_part( 'author-info' ); ?> 

				<?php if ( is_single() ) {?>
					<div id="single-post-nav">
					    <ul class="pager">
							<?php $trunc_limit = 30; ?>
						      <?php if( '' != get_previous_post() ) { ?>
						        <li class="previous">
						          <?php previous_post_link( '<span class="previous-page">%link</span>', __( '<i class="fa fa-caret-left"></i>', 'bones' ) . '&nbsp;' . brew_truncate_text( get_previous_post()->post_title, $trunc_limit ) ); ?>
						        </li>
						      <?php } // end if ?>

						      <?php if( '' != get_next_post() ) { ?>
						        <li class="next">
						          <?php next_post_link( '<span class="no-previous-page-link next-page">%link</span>', '&nbsp;' . brew_truncate_text( get_next_post()->post_title, $trunc_limit ) . '&nbsp;' . __( '<i class="fa fa-caret-right"></i>', 'bones' ) ); ?>
						        </li>
						      <?php } // end if ?>
						</ul>
					</div><!-- #single-post-nav -->
				<?php } ?>
		
		<!-- 04. COMMENT TEMPLATE -->
          <?php global $brew_options;
       		 if ( $brew_options['comments-setup-buttons'] == 1) {
       		 	comments_template();
       		 } elseif ( $brew_options['comments-setup-buttons'] == 2) {
       		 	echo '<p></p>';
       		 } elseif ($brew_options['comments-setup-buttons'] == 3) {
       		 	if (in_category($brew_options['comments-on-cat'])) {
       		 		comments_template();
       		 	} 	
       		}	
       	?>
			<?php endwhile; ?>
			<?php else : ?>
				<article id="post-not-found" class="hentry clearfix">
						<header class="article-header">
							<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
						</header>
						<section class="entry-content">
							<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
						</section>
						<footer class="article-footer">
								<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
						</footer>
				</article>
			<?php endif; ?>

			</div> <!-- End main -->				
				<!-- 05. SIDEBAR -->
		<?php //get_sidebar(); ?> 

			</div> <?php // end #content ?>

    </div> <?php // end ./container ?>

<?php get_footer(); ?>
