<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->

<div class="top-bar" id="top-bar-menu">
	<div class="top-bar-left float-left">
		<ul class="menu">
			<?php $logo = Kirki::get_option( 'pftk_opts', 'image_demo');
			$width = Kirki::get_option( 'pftk_opts', 'img_width');
			$height = Kirki::get_option( 'pftk_opts', 'img_height');
					?>
			<?php if (empty($logo) == true): ?>
					<li class="menu-text"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li>
			<?php else: ?>
				<li class="menu-text"><a href="<?php echo home_url(); ?>"><img src="<?php echo $logo; ?> " height=<?php echo $height; ?> width=<?php echo $width; ?>></a></li>
			<?php endif; ?>

		</ul>
	</div>
	<div class="top-bar-right show-for-medium">
		<?php pressforward_tk_theme_top_nav(); ?>
	</div>
	<div class="top-bar-right float-right show-for-small-only">
		<ul class="menu">
			<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
			<li><a data-toggle="off-canvas"><?php _e( 'Menu', 'pressforward-turnkey-theme' ); ?></a></li>
		</ul>
	</div>
</div>
