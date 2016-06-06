<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header large-12 columns">
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php get_template_part( 'parts/content', 'byline' ); ?>
    </header> <!-- end article header -->

    <section class="entry-content large-12 columns" itemprop="articleBody">
		<?php
		$slidercat = Kirki::get_option('pftk_opts', 'slider_category');
		if (in_category($slidercat)) { ?>
		<div class="large-3 columns" id="feat_img_col">
		<?php the_post_thumbnail('full'); ?>
	</div>
	<div class="large-9 columns">
		<?php the_content(); ?>
	</div>
	<?php } else { ?>
		<div class="large-12 columns">
			<?php the_content(); ?>
		</div>
		<?php } ?>
	</section> <!-- end article section -->

	<footer class="article-footer large-12 columns">
		<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'pressforward-turnkey-theme' ) . '</span> ', ', ', ''); ?></p>	</footer> <!-- end article footer -->
	<?php
	$comment_option = Kirki::get_option('pftk_opts', 'comment-control');
	$comment_include_categories = Kirki::get_option('pftk_opts', 'comment-include-cats');
	if ($comment_option == 1){
		comments_template();
		echo '</article>';

 	} elseif ($comment_option == 2){
		echo '</article>';

	} elseif(in_category($comment_include_categories) && $comment_option == 3) {
	comments_template();
		echo '</article>';

	} else {
		echo '</article>';
	}

?>
