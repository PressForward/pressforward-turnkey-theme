<div class="top-bar" id="main-menu">

    <div class="top-bar-title">
        <ul class="menu">
            <li class="menu-text"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li>
        </ul>
    </div>

    <div id="responsive-menu">
        <div class="top-bar-right">
            <ul class="vertical medium-horizontal menu" data-responsive-menu="accordion medium-dropdown">
                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a data-open="searchform">Search</a></li>
            </ul>
        </div>

        <div class="top-bar-right">
            <?php joints_top_nav(); ?>
        </div>
    </div>

</div>
