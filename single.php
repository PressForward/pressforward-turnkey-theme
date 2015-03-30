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
							<?php if ( in_category('77')) {
							//JOBS--BRIEFCASE ICON
							echo '<div class="col-md-2 featimg text-center">
								  <i class="fa fa-briefcase fa-5x"></i>
								  </div> <!--close col-md-2 featimg-->
								  <div class="col-md-10" id="postcontent">';
							} else if (in_category('74')) {
							//CFPS--LAPTOP ICON	
								echo '<div class="col-md-2 featimg text-center">
								  <i class="fa fa-info fa-5x"></i>
								  </div> <!--close col-md-2 featimg-->
								  <div class="col-md-10" id="postcontent">';
								 } else if (in_category('81')) {
								//ANNOUNCEMENTS--BULLHORN ICON
								echo '<div class="col-md-2 featimg text-center">
								  <i class="fa fa-bullhorn fa-5x"></i>
								  </div> <!--close col-md-2 featimg-->
								  <div class="col-md-10" id="postcontent">';
								} else if (in_category('75')) {
								//RESOURCES--INFO ICON
								echo '<div class="col-md-2 featimg text-center">
								  <i class="fa fa-info fa-5x"></i>
								  </div> <!--close col-md-2 featimg-->
								  <div class="col-md-10" id="postcontent">';
								} else if (in_category('79')) {
								//FUNDING & OPPS--MONEY ICON
									echo '<div class="col-md-2 featimg text-center">
								  <i class="fa fa-money fa-5x"></i>
								  </div> <!--close col-md-2 featimg-->
								  <div class="col-md-10" id="postcontent">';
								} else if (in_category('78')) {
								//REPORTS--FLAG ICON
								echo '<div class="col-md-2 featimg text-center">
								  <i class="fa fa-flag fa-5x"></i>
								  </div> <!--close col-md-2 featimg-->
								  <div class="col-md-10" id="postcontent">';
								} else if (in_category('87')) {
								//BLOG--PENCIL ICON
								echo '<div class="col-md-2 featimg text-center">
								  <i class="fa fa-pencil fa-5x"></i>
								  </div> <!--close col-md-2 featimg-->
								  <div class="col-md-10" id="postcontent">';
								} else if (in_category('66')) {
								//EDITORS CHOICE -- FEATURED IMAGE NO ICON
								echo '<div class="col-md-3 featimg">' . get_the_post_thumbnail( $post->ID, array(250,250)) . '</div> <!--close col-md-3 featimg-->
								<div class="col-md-9" id="postcontent">';
								} ?>
							

							
							<header class="article-header">
								<div class="titlewrap clearfix">
									<h1 class="single-title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									
									<p class="byline vcard">
										<!-- 02. AUTHOR DISPLAY CONDITIONAL BY CATEGORY 

										UNCOMMENT THIS SECTION AND COMMENT OUT LINES 73-77 TO RESTORE AUTHOR FUNCTIONALITY TO ALL PAGES --> 
										by <span class="author"><em><?php echo bones_get_the_author_posts_link() ?></em></span> 
										<!--CONTROLS AND LIMITS THE DISPLAY OF THE AUTHOR TO ONLY TWO CATEGORIES (Editor's Choice & the DHNow Blog-->
										<?php if (in_category(array(66, 87))) {
										echo 'by <span class="author"><em>' . get_the_author() . '</em></span> -'; 
										} else {
										echo 'by <span class="author"><em>the Editors</em></span> -'; 
										} ?>
										<time class="updated" datetime="<?php get_the_time('Y-m-j') ?>"><?php echo get_the_time(get_option('date_format')) ?></time>
										<span class="sticky-ind pull-right"><i class="fa fa-star"></i></span>
									</p>
								</div>
								
							</header> <?php // end article header ?>
							
							

							</section>

							<section class="entry-content single-content clearfix" itemprop="articleBody">
								<?php the_content(); ?>
								
								<?php wp_link_pages(
                                	array(

                                        'before' => '<div class="page-link"><span>' . __( 'Pages:', 'brew' ) . '</span>',
                                        'after' => '</div>'
                                	) 
                                ); ?>
							</section> <?php // end article section ?>
							</div>
							<footer class="article-footer single-footer clearfix">
								<?php if (in_category('66')) {
									echo '<div class="col-md-3 ec-customfields"><span class="tags pull-left">';
									printf( '<span class="">' . __( 'in %1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?> <?php the_tags( '<span class="tags-title">' . __( '<i class="fa fa-tags"></i>', 'bonestheme' ) . '</span> ', ', ', '' );
									echo  '</span></div>';
									$chief = get_post_meta($post->ID, 'editor-in-chief', true);
									$large = get_post_meta($post->ID, 'editors-at-large', true);	
									echo '<div class=" col-md-9 editors">
											<p>This content was selected for <em>Digital Humanities Now</em> by Editor-in-Chief ' . $chief . 'based on nominations by Editors-at-Large' . $large . '</p>
											</div>';
								} else {
									echo '<span class="tags pull-left">';
									printf( '<span class="">' . __( 'in %1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?> <?php the_tags( '<span class="tags-title">' . __( '<i class="fa fa-tags"></i>', 'bonestheme' ) . '</span> ', ', ', '' );
									echo '</span>';
								} ?>
								
								<!-- </div> -->
              					<!-- <span class="commentnum pull-right"><a href="<?php comments_link(); ?>"><?php comments_number( '<i class="fa fa-comment"></i> 0', '<i class="fa fa-comment"></i> 1', '<i class="fa fa-comment"></i> %' ); ?></a></span> 
              				
								</div>	 -->
            				</footer> <?php // end article footer ?>
						</article> <?php // end article ?>

						
					<!-- 03. AUTHOR INFO  -->
					 <?php // get_template_part( 'author-info' ); ?> 

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
         <?php // comments_template(); ?>

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

				</div> <?php // end #main ?>
				<!-- 05. SIDEBAR -->
				 <?php //get_sidebar(); ?> 

			</div> <?php // end #content ?>

    </div> <?php // end ./container ?>

<?php get_footer(); ?>
