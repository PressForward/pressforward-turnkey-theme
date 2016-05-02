<div class="row" id="navrow">

<div class="top-bar" id="main-menu">

    <div class="top-bar-title">

			<ul class="menu">
      <!-- <li><a class="site-title" href="<?php // echo home_url(); ?>">Site Title</a></li> -->


				 <?php $logo = Kirki::get_option( 'pftk_opts', 'image_demo'); ?>
					<?php if (empty($logo) == true): ?>
							<li><a class="site-title" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li>
					<?php else: ?>
						<li><a class="site-logo" href="<?php echo home_url(); ?>"><img class="site-logo-img" src="<?php echo $logo; ?> "></a></li>
					<?php endif; ?>

					</ul>
    </div>

    <div id="responsive-menu">

        <div class="top-bar-right">
						<?php pressforward_tk_theme_top_nav(); ?>
						<!-- <ul class="menu">
                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a data-open="searchform">Search</a></li>
            </ul> -->
        </div>
    </div>

</div>
</div>
