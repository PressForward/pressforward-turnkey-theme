<?php
/*
Template Name: PressForward Feed List
*/
?>

<?php get_header(); ?>
<div class="container">

        <div id="content" class="clearfix row">
        
          <div id="main" class="col-md-offset-1 col-md-10 col-md-offset-1 clearfix" role="main">

            
            <?php if ( function_exists('custom_breadcrumb') ) { custom_breadcrumb(); } ?> 

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
              
              <header class="page-head article-header">
                
                <div class=""><h1 class="page-title entry-title" itemprop="headline"><?php the_title(); ?></h1></div>
              
              </header> <!-- end article header -->
            
              <section class="page-content entry-content clearfix" itemprop="articleBody">


<?php
$query = new WP_Query( array( 'post_type' => pressforward()->pf_feeds->post_type, 'nopaging' => false, 'orderby' => 'title', 'order' => 'ASC') );
				
if ( $query->have_posts() ) : ?>
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
		<div class="entry">
			<?php 
				echo '<p class="feedlistitem"><a href="' . get_post_meta(get_the_ID(), 'feedUrl', true) . '">'; 
				the_title(); 
				echo '</a></p>'; 
			?>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>
</section> <!-- end article section -->
              
              <footer>
        
                <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ', ', '</p>'); ?>
                
              </footer> <!-- end article footer -->
            
            </article> <!-- end article -->
            
            <?php //comments_template('',true); ?>
            </div> <!-- end #main -->
            
        </div> <!-- end #content -->

      </div> <!-- end .container -->
<?php get_footer(); ?>