<?php
/*
Template Name: Home Page Template (Image Focused)
*/
?>
<?php get_header(); ?>
<div class="row">
<div class="large-12 columns">
<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
  <div class="orbit-wrapper">
    <div class="orbit-controls">
      <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
      <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
    </div>
    <ul class="orbit-container">
      <?php
      $pftk_opts = '';
			$slider_category = '';
      $slider_categories_option = Kirki::get_option( 'pftk_opts', 'slider_category');
      $postcats = 'category='. $slider_categories_option . '&posts_per_page=4';
      $slider_numposts_option = Kirki::get_option( 'pftk_opts', 'slider_numposts' );
			$slider_title_num_words = Kirki::get_option('pftk_opts', 'slider-title-numwords');
			$slider_excerpt_num_words = Kirki::get_option('pftk_opts', 'slider-excerpt-numwords');
      $feat_posts = get_posts($postcats);
      $bullets = 1;
      foreach($feat_posts as $post) {
        $trim_title = get_post_field('post_title', $id);
        $short_title = wp_trim_words( $trim_title, $num_words = 15, $more = '… ' );
				$trimexcerpt = get_post_field('post_content', $id);
				$authorid = $post->post_author;

				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
				if ( is_plugin_active( 'pressforward/pressforward.php' ) ) {
  			//plugin is activated
				$itemauth = get_post_meta($post->ID, 'item_author', true);
      } else {
        $itemauth = $post->post_author;
      }
        //$shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 50, $more = '… ' );
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
        echo '<li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="' . $thumb[0] . '" alt="Space">
          <figcaption class="orbit-caption">' . $short_title . '</figcaption>
        </figure>
      </li>';
      $bullets++; } ?>
    </ul>
  </div>
  <nav class="orbit-bullets">
    <?php $counter = 0;
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
</div>
</div> <!-- end 12 columns -->
</div>  <!-- end row -->

<div class="row">
  <div class="large-8 columns">
    <p>new row</p>

<!-- LOOP GOES HERE -->
<?php
$postcats = 'posts_per_page=3';
query_posts($postcats);

if ( have_posts() ) : while ( have_posts() ) : the_post();?>
      <div class="row">
<!-- POST IMAGE -->
      <div class="large-3 columns">
        <img src="http://via.placeholder.com/200x200">
      </div>
<!-- POST EXCERPT -->
      <div class="large-9 columns">
      <?php  echo '<h2><a href="';
        echo the_permalink() . '">';
        echo  the_title() . '</a></h2>';
        echo the_excerpt(); ?>
        </div>

    </div>
  <?php endwhile; endif; ?>
  </div>
<!-- SIDEBAR -->
  <div class="large-4 columns">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eu neque vel nisl consectetur dictum. Suspendisse ipsum libero, lacinia nec pharetra eget, faucibus pretium dolor. Maecenas pulvinar id nunc ut tempus. Quisque vulputate enim sit amet nibh sodales, ut euismod elit pharetra. Fusce vehicula turpis vel nibh dapibus, sit amet pharetra est venenatis. In pulvinar purus a mi sollicitudin, nec faucibus lacus facilisis. Sed cursus venenatis mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget nisi nec felis vestibulum efficitur. Donec in auctor velit, ac tincidunt tortor. Pellentesque luctus varius tincidunt. Maecenas porta lectus et ex aliquam vehicula. Nunc semper nisi nec massa vestibulum egestas. Sed id imperdiet metus. Nulla iaculis sed ligula quis tincidunt. </p>
  </div>
</div>





<?php get_footer(); ?>
