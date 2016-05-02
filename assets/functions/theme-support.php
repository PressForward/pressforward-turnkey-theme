<?php

// Adding WP Functions & Theme Support
function pressforward_tk_theme_theme_support() {

	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );

	// Default thumbnail size
	set_post_thumbnail_size(125, 125, true);

	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );

	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );

	// Add HTML5 Support
	add_theme_support( 'html5',
	         array(
	         	'comment-list',
	         	'comment-form',
	         	'search-form',
	         )
	); }

	// Adding post format support
	/* add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	); */

//} /* end theme support */
function construct_gradient($color1, $color2) {
	$gradient = 'background:' . $color1 . ' /* For browsers that do not support gradients */';
  $gradient .= 'background: -webkit-linear-gradient(' . $color1 . ',' . $color2 . ');/* For Safari 5.1 to 6.0 */';
  $gradient .=  'background: -o-linear-gradient(' . $color1 . ',' . $color2 . ');';
  $gradient .=  'background: -moz-linear-gradient(' . $color1 . ',' . $color2 . ');';
  $gradient .=  'background: linear-gradient(' . $color1 . ',' . $color2 . ');';
	return $gradient;
}
?>
