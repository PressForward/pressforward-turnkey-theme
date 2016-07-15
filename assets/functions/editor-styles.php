<?php
// Adds your styles to the WordPress editor
add_action( 'init', 'pftk_add_editor_styles' );
function pftk_add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/assets/css/style.min.css' );
}
