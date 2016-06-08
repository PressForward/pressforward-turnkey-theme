<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'pressforward-turnkey-theme';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'pressforward-turnkey-theme' ),
				'background-image'      => esc_attr__( 'Background Image', 'pressforward-turnkey-theme' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'pressforward-turnkey-theme' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'pressforward-turnkey-theme' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'pressforward-turnkey-theme' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'pressforward-turnkey-theme' ),
				'inherit'               => esc_attr__( 'Inherit', 'pressforward-turnkey-theme' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'pressforward-turnkey-theme' ),
				'cover'                 => esc_attr__( 'Cover', 'pressforward-turnkey-theme' ),
				'contain'               => esc_attr__( 'Contain', 'pressforward-turnkey-theme' ),
				'background-size'       => esc_attr__( 'Background Size', 'pressforward-turnkey-theme' ),
				'fixed'                 => esc_attr__( 'Fixed', 'pressforward-turnkey-theme' ),
				'scroll'                => esc_attr__( 'Scroll', 'pressforward-turnkey-theme' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'pressforward-turnkey-theme' ),
				'left-top'              => esc_attr__( 'Left Top', 'pressforward-turnkey-theme' ),
				'left-center'           => esc_attr__( 'Left Center', 'pressforward-turnkey-theme' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'pressforward-turnkey-theme' ),
				'right-top'             => esc_attr__( 'Right Top', 'pressforward-turnkey-theme' ),
				'right-center'          => esc_attr__( 'Right Center', 'pressforward-turnkey-theme' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'pressforward-turnkey-theme' ),
				'center-top'            => esc_attr__( 'Center Top', 'pressforward-turnkey-theme' ),
				'center-center'         => esc_attr__( 'Center Center', 'pressforward-turnkey-theme' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'pressforward-turnkey-theme' ),
				'background-position'   => esc_attr__( 'Background Position', 'pressforward-turnkey-theme' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'pressforward-turnkey-theme' ),
				'on'                    => esc_attr__( 'ON', 'pressforward-turnkey-theme' ),
				'off'                   => esc_attr__( 'OFF', 'pressforward-turnkey-theme' ),
				'all'                   => esc_attr__( 'All', 'pressforward-turnkey-theme' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'pressforward-turnkey-theme' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'pressforward-turnkey-theme' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'pressforward-turnkey-theme' ),
				'greek'                 => esc_attr__( 'Greek', 'pressforward-turnkey-theme' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'pressforward-turnkey-theme' ),
				'khmer'                 => esc_attr__( 'Khmer', 'pressforward-turnkey-theme' ),
				'latin'                 => esc_attr__( 'Latin', 'pressforward-turnkey-theme' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'pressforward-turnkey-theme' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'pressforward-turnkey-theme' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'pressforward-turnkey-theme' ),
				'arabic'                => esc_attr__( 'Arabic', 'pressforward-turnkey-theme' ),
				'bengali'               => esc_attr__( 'Bengali', 'pressforward-turnkey-theme' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'pressforward-turnkey-theme' ),
				'tamil'                 => esc_attr__( 'Tamil', 'pressforward-turnkey-theme' ),
				'telugu'                => esc_attr__( 'Telugu', 'pressforward-turnkey-theme' ),
				'thai'                  => esc_attr__( 'Thai', 'pressforward-turnkey-theme' ),
				'serif'                 => _x( 'Serif', 'font style', 'pressforward-turnkey-theme' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'pressforward-turnkey-theme' ),
				'monospace'             => _x( 'Monospace', 'font style', 'pressforward-turnkey-theme' ),
				'font-family'           => esc_attr__( 'Font Family', 'pressforward-turnkey-theme' ),
				'font-size'             => esc_attr__( 'Font Size', 'pressforward-turnkey-theme' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'pressforward-turnkey-theme' ),
				'line-height'           => esc_attr__( 'Line Height', 'pressforward-turnkey-theme' ),
				'font-style'            => esc_attr__( 'Font Style', 'pressforward-turnkey-theme' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'pressforward-turnkey-theme' ),
				'top'                   => esc_attr__( 'Top', 'pressforward-turnkey-theme' ),
				'bottom'                => esc_attr__( 'Bottom', 'pressforward-turnkey-theme' ),
				'left'                  => esc_attr__( 'Left', 'pressforward-turnkey-theme' ),
				'right'                 => esc_attr__( 'Right', 'pressforward-turnkey-theme' ),
				'center'                => esc_attr__( 'Center', 'pressforward-turnkey-theme' ),
				'justify'               => esc_attr__( 'Justify', 'pressforward-turnkey-theme' ),
				'color'                 => esc_attr__( 'Color', 'pressforward-turnkey-theme' ),
				'add-image'             => esc_attr__( 'Add Image', 'pressforward-turnkey-theme' ),
				'change-image'          => esc_attr__( 'Change Image', 'pressforward-turnkey-theme' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'pressforward-turnkey-theme' ),
				'add-file'              => esc_attr__( 'Add File', 'pressforward-turnkey-theme' ),
				'change-file'           => esc_attr__( 'Change File', 'pressforward-turnkey-theme' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'pressforward-turnkey-theme' ),
				'remove'                => esc_attr__( 'Remove', 'pressforward-turnkey-theme' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'pressforward-turnkey-theme' ),
				'variant'               => esc_attr__( 'Variant', 'pressforward-turnkey-theme' ),
				'subsets'               => esc_attr__( 'Subset', 'pressforward-turnkey-theme' ),
				'size'                  => esc_attr__( 'Size', 'pressforward-turnkey-theme' ),
				'height'                => esc_attr__( 'Height', 'pressforward-turnkey-theme' ),
				'spacing'               => esc_attr__( 'Spacing', 'pressforward-turnkey-theme' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'pressforward-turnkey-theme' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'pressforward-turnkey-theme' ),
				'light'                 => esc_attr__( 'Light 200', 'pressforward-turnkey-theme' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'pressforward-turnkey-theme' ),
				'book'                  => esc_attr__( 'Book 300', 'pressforward-turnkey-theme' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'pressforward-turnkey-theme' ),
				'regular'               => esc_attr__( 'Normal 400', 'pressforward-turnkey-theme' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'pressforward-turnkey-theme' ),
				'medium'                => esc_attr__( 'Medium 500', 'pressforward-turnkey-theme' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'pressforward-turnkey-theme' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'pressforward-turnkey-theme' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'pressforward-turnkey-theme' ),
				'bold'                  => esc_attr__( 'Bold 700', 'pressforward-turnkey-theme' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'pressforward-turnkey-theme' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'pressforward-turnkey-theme' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'pressforward-turnkey-theme' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'pressforward-turnkey-theme' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'pressforward-turnkey-theme' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'pressforward-turnkey-theme' ),
				'add-new'           	=> esc_attr__( 'Add new', 'pressforward-turnkey-theme' ),
				'row'           		=> esc_attr__( 'row', 'pressforward-turnkey-theme' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'pressforward-turnkey-theme' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'pressforward-turnkey-theme' ),
				'back'                  => esc_attr__( 'Back', 'pressforward-turnkey-theme' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'pressforward-turnkey-theme' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'pressforward-turnkey-theme' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'pressforward-turnkey-theme' ),
				'none'                  => esc_attr__( 'None', 'pressforward-turnkey-theme' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'pressforward-turnkey-theme' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'pressforward-turnkey-theme' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'pressforward-turnkey-theme' ),
				'initial'               => esc_attr__( 'Initial', 'pressforward-turnkey-theme' ),
				'select-page'           => esc_attr__( 'Select a Page', 'pressforward-turnkey-theme' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'pressforward-turnkey-theme' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'pressforward-turnkey-theme' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'pressforward-turnkey-theme' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'pressforward-turnkey-theme' ),
			);

			// Apply global changes from the kirki/config filter.
			// This is generally to be avoided.
			// It is ONLY provided here for backwards-compatibility reasons.
			// Please use the kirki/{$config_id}/l10n filter instead.
			$config = apply_filters( 'kirki/config', array() );
			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			// Apply l10n changes using the kirki/{$config_id}/l10n filter.
			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
