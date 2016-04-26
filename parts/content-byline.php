<?php
$author_name_switch = Kirki::get_option('pftk_opts', 'author-name-switch');
$alt_author_text = Kirki::get_option('pftk_opts', 'alt-author-text');
$author_exclude_cats = Kirki::get_option('pftk_opts', 'author-exclude-cats');
$author_include_cats = Kirki::get_option('pftk_opts', 'author-include-cats');
?>
<p class="byline">
	<?php
	if ( $author_name_switch == 1) { ?>
	Posted on <?php the_time('F j, Y') ?> by <?php the_author_posts_link(); ?>  - <?php the_category(', ') ?>
<?php } elseif ($author_name_switch != 1 && in_category($author_exclude_cats)) { ?>
	Posted on <?php the_time('F j, Y') ?> by <?php the_author(); ?>  - <?php the_category(', ') ?>
<?php } elseif ($author_name_switch != 1 && in_category($author_include_cats)) { ?>
	Posted on <?php the_time('F j, Y') ?> by <?php the_author_posts_link(); ?>  - <?php the_category(', ') ?>
<?php } else { ?>
	Posted on <?php the_time('F j, Y') ?> by <?php echo $alt_author_text; ?>  - <?php the_category(', ') ?>
<?php } ?>
</p>
