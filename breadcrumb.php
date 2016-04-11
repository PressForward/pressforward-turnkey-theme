<?php
$breadcrumb_nav = Kirki::get_option( 'pftk_opts', 'breadcrumbs');
 if ($breadcrumb_nav == true):
    echo custom_breadcrumb();
  endif;
  ?>
