<?php
/*
Template Name: PressForward Feed List
*/
?>

<?php get_header(); ?>




 <div class="container">  

			<div id="content" class="clearfix row">

				<div id="main" class="col-md-offset-1 col-md-10 col-md-offset-1 clearfix" role="main">


<?php
$query = new WP_Query( array( 'post_type' => pressforward()->pf_feeds->post_type, 'nopaging' => true ) );
				
if ( $query->have_posts() ) : ?>
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
		<div class="entry">
			
			<?php echo '<a href="' . get_the_guid() . '">' ?><?php echo the_title() . '</a>' ?>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>

				</div>
			</div>
</div>
<?php get_footer(); ?>

<a href="wwww">title</a>
