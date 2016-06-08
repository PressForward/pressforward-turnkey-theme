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

add_filter( 'kirki/my_config/l10n', function( $l10n ) {

	$l10n['background-color']      = esc_attr__( 'Background Color', pressforward-turnkey-theme );
	$l10n['background-image']      = esc_attr__( 'Background Image', pressforward-turnkey-theme );
	$l10n['no-repeat']             = esc_attr__( 'No Repeat', pressforward-turnkey-theme );
	$l10n['repeat-all']            = esc_attr__( 'Repeat All', pressforward-turnkey-theme );
	$l10n['repeat-x']              = esc_attr__( 'Repeat Horizontally', pressforward-turnkey-theme );
	$l10n['repeat-y']              = esc_attr__( 'Repeat Vertically', pressforward-turnkey-theme );
	$l10n['inherit']               = esc_attr__( 'Inherit', pressforward-turnkey-theme );
	$l10n['background-repeat']     = esc_attr__( 'Background Repeat', pressforward-turnkey-theme );
	$l10n['cover']                 = esc_attr__( 'Cover', pressforward-turnkey-theme );
	$l10n['contain']               = esc_attr__( 'Contain', pressforward-turnkey-theme );
	$l10n['background-size']       = esc_attr__( 'Background Size', pressforward-turnkey-theme );
	$l10n['fixed']                 = esc_attr__( 'Fixed', pressforward-turnkey-theme );
	$l10n['scroll']                = esc_attr__( 'Scroll', pressforward-turnkey-theme );
	$l10n['background-attachment'] = esc_attr__( 'Background Attachment', pressforward-turnkey-theme );
	$l10n['left-top']              = esc_attr__( 'Left Top', pressforward-turnkey-theme );
	$l10n['left-center']           = esc_attr__( 'Left Center', pressforward-turnkey-theme );
	$l10n['left-bottom']           = esc_attr__( 'Left Bottom', pressforward-turnkey-theme );
	$l10n['right-top']             = esc_attr__( 'Right Top', pressforward-turnkey-theme );
	$l10n['right-center']          = esc_attr__( 'Right Center', pressforward-turnkey-theme );
	$l10n['right-bottom']          = esc_attr__( 'Right Bottom', pressforward-turnkey-theme );
	$l10n['center-top']            = esc_attr__( 'Center Top', pressforward-turnkey-theme );
	$l10n['center-center']         = esc_attr__( 'Center Center', pressforward-turnkey-theme );
	$l10n['center-bottom']         = esc_attr__( 'Center Bottom', pressforward-turnkey-theme );
	$l10n['background-position']   = esc_attr__( 'Background Position', pressforward-turnkey-theme );
	$l10n['background-opacity']    = esc_attr__( 'Background Opacity', pressforward-turnkey-theme );
	$l10n['on']                    = esc_attr__( 'ON', pressforward-turnkey-theme );
	$l10n['off']                   = esc_attr__( 'OFF', pressforward-turnkey-theme );
	$l10n['all']                   = esc_attr__( 'All', pressforward-turnkey-theme );
	$l10n['cyrillic']              = esc_attr__( 'Cyrillic', pressforward-turnkey-theme );
	$l10n['cyrillic-ext']          = esc_attr__( 'Cyrillic Extended', pressforward-turnkey-theme );
	$l10n['devanagari']            = esc_attr__( 'Devanagari', pressforward-turnkey-theme );
	$l10n['greek']                 = esc_attr__( 'Greek', pressforward-turnkey-theme );
	$l10n['greek-ext']             = esc_attr__( 'Greek Extended', pressforward-turnkey-theme );
	$l10n['khmer']                 = esc_attr__( 'Khmer', pressforward-turnkey-theme );
	$l10n['latin']                 = esc_attr__( 'Latin', pressforward-turnkey-theme );
	$l10n['latin-ext']             = esc_attr__( 'Latin Extended', pressforward-turnkey-theme );
	$l10n['vietnamese']            = esc_attr__( 'Vietnamese', pressforward-turnkey-theme );
	$l10n['hebrew']                = esc_attr__( 'Hebrew', pressforward-turnkey-theme );
	$l10n['arabic']                = esc_attr__( 'Arabic', pressforward-turnkey-theme );
	$l10n['bengali']               = esc_attr__( 'Bengali', pressforward-turnkey-theme );
	$l10n['gujarati']              = esc_attr__( 'Gujarati', pressforward-turnkey-theme );
	$l10n['tamil']                 = esc_attr__( 'Tamil', pressforward-turnkey-theme );
	$l10n['telugu']                = esc_attr__( 'Telugu', pressforward-turnkey-theme );
	$l10n['thai']                  = esc_attr__( 'Thai', pressforward-turnkey-theme );
	$l10n['serif']                 = _x( 'Serif', 'font style', pressforward-turnkey-theme );
	$l10n['sans-serif']            = _x( 'Sans Serif', 'font style', pressforward-turnkey-theme );
	$l10n['monospace']             = _x( 'Monospace', 'font style', pressforward-turnkey-theme );
	$l10n['font-family']           = esc_attr__( 'Font Family', pressforward-turnkey-theme );
	$l10n['font-size']             = esc_attr__( 'Font Size', pressforward-turnkey-theme );
	$l10n['font-weight']           = esc_attr__( 'Font Weight', pressforward-turnkey-theme );
	$l10n['line-height']           = esc_attr__( 'Line Height', pressforward-turnkey-theme );
	$l10n['font-style']            = esc_attr__( 'Font Style', pressforward-turnkey-theme );
	$l10n['letter-spacing']        = esc_attr__( 'Letter Spacing', pressforward-turnkey-theme );
	$l10n['top']                   = esc_attr__( 'Top', pressforward-turnkey-theme );
	$l10n['bottom']                = esc_attr__( 'Bottom', pressforward-turnkey-theme );
	$l10n['left']                  = esc_attr__( 'Left', pressforward-turnkey-theme );
	$l10n['right']                 = esc_attr__( 'Right', pressforward-turnkey-theme );
	$l10n['color']                 = esc_attr__( 'Color', pressforward-turnkey-theme );
	$l10n['add-image']             = esc_attr__( 'Add Image', pressforward-turnkey-theme );
	$l10n['change-image']          = esc_attr__( 'Change Image', pressforward-turnkey-theme );
	$l10n['remove']                = esc_attr__( 'Remove', pressforward-turnkey-theme );
	$l10n['no-image-selected']     = esc_attr__( 'No Image Selected', pressforward-turnkey-theme );
	$l10n['select-font-family']    = esc_attr__( 'Select a font-family', pressforward-turnkey-theme );
	$l10n['variant']               = esc_attr__( 'Variant', pressforward-turnkey-theme );
	$l10n['subsets']               = esc_attr__( 'Subset', pressforward-turnkey-theme );
	$l10n['size']                  = esc_attr__( 'Size', pressforward-turnkey-theme );
	$l10n['height']                = esc_attr__( 'Height', pressforward-turnkey-theme );
	$l10n['spacing']               = esc_attr__( 'Spacing', pressforward-turnkey-theme );
	$l10n['ultra-light']           = esc_attr__( 'Ultra-Light 100', pressforward-turnkey-theme );
	$l10n['ultra-light-italic']    = esc_attr__( 'Ultra-Light 100 Italic', pressforward-turnkey-theme );
	$l10n['light']                 = esc_attr__( 'Light 200', pressforward-turnkey-theme );
	$l10n['light-italic']          = esc_attr__( 'Light 200 Italic', pressforward-turnkey-theme );
	$l10n['book']                  = esc_attr__( 'Book 300', pressforward-turnkey-theme );
	$l10n['book-italic']           = esc_attr__( 'Book 300 Italic', pressforward-turnkey-theme );
	$l10n['regular']               = esc_attr__( 'Normal 400', pressforward-turnkey-theme );
	$l10n['italic']                = esc_attr__( 'Normal 400 Italic', pressforward-turnkey-theme );
	$l10n['medium']                = esc_attr__( 'Medium 500', pressforward-turnkey-theme );
	$l10n['medium-italic']         = esc_attr__( 'Medium 500 Italic', pressforward-turnkey-theme );
	$l10n['semi-bold']             = esc_attr__( 'Semi-Bold 600', pressforward-turnkey-theme );
	$l10n['semi-bold-italic']      = esc_attr__( 'Semi-Bold 600 Italic', pressforward-turnkey-theme );
	$l10n['bold']                  = esc_attr__( 'Bold 700', pressforward-turnkey-theme );
	$l10n['bold-italic']           = esc_attr__( 'Bold 700 Italic', pressforward-turnkey-theme );
	$l10n['extra-bold']            = esc_attr__( 'Extra-Bold 800', pressforward-turnkey-theme );
	$l10n['extra-bold-italic']     = esc_attr__( 'Extra-Bold 800 Italic', pressforward-turnkey-theme );
	$l10n['ultra-bold']            = esc_attr__( 'Ultra-Bold 900', pressforward-turnkey-theme );
	$l10n['ultra-bold-italic']     = esc_attr__( 'Ultra-Bold 900 Italic', pressforward-turnkey-theme );
	$l10n['invalid-value']         = esc_attr__( 'Invalid Value', pressforward-turnkey-theme );

	return $l10n;

} );
?>
