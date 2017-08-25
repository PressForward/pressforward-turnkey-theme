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
      $feat_posts = get_posts($postcats);

      foreach($feat_posts as $post) {
        $trim_title = get_post_field('post_title', $id);
        $short_title = wp_trim_words( $trim_title, $num_words = 15, $more = '… ' );
				$trimexcerpt = get_post_field('post_content', $id);
				$authorid = $post->post_author;

				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
				if ( is_plugin_active( 'pressforward/pressforward.php' ) ) {
  			//plugin is activated
				$itemauth = get_post_meta($post->ID, 'item_author', true);
				}
        $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 50, $more = '… ' );
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
        echo '<li class="orbit-slide">
        <figure class="orbit-figure">
          <img class="orbit-image" src="' . $thumb[0] . '" alt="Space">
          <figcaption class="orbit-caption">' . $short_title . '</figcaption>
        </figure>
      </li>'; } ?>
    </ul>
  </div>
  <nav class="orbit-bullets">
    <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
    <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
    <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
    <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
  </nav>
</div>
</div> <!-- end 12 columns -->
</div>  <!-- end row -->

<div class="row">
  <div class="large-8 columns">
    <div class="row">
      <div class="large-5 columns">
      <img class="orbit-image" src="http://placehold.it/1200x600/666&text=featimg" alt="Space">
      </div>
      <div class="large-7 columns">
        <h1>Title</h1>
        <p>text goes here</p>
      </div>
    </div>
  </div>
  <?php get_sidebar(); ?>
<?php get_footer(); ?>
