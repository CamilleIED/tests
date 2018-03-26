<?php
/**
 * Demo class
 *
 * @package Magazine_O
 */

if ( ! class_exists( 'Magazine_O_Demo' ) ) {

	/**
	 * Main class.
	 *
	 * @since 1.0.0
	 */
	class Magazine_O_Demo {

		/**
		 * Singleton instance of Magazine_O_Demo.
		 *
		 * @var Magazine_O_Demo $instance Magazine_O_Demo instance.
		 */
		private static $instance;

		/**
		 * Configuration.
		 *
		 * @var array $config Configuration.
		 */
		private $config;

		/**
		 * Main Magazine_O_Demo instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $config Configuration array.
		 */
		public static function init( $config ) {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Magazine_O_Demo ) ) {
				self::$instance = new Magazine_O_Demo();
				if ( ! empty( $config ) && is_array( $config ) ) {
					self::$instance->config = $config;
					self::$instance->setup_actions();
				}
			}
		}

		/**
		 * Setup actions.
		 *
		 * @since 1.0.0
		 */
		public function setup_actions() {

			// Disable branding.
			add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

			// OCDI import files.
			add_filter( 'pt-ocdi/import_files', array( $this, 'ocdi_files' ), 99 );

			// OCDI after import.
			add_action( 'pt-ocdi/after_import', array( $this, 'ocdi_after_import' ) );
		}

		/**
		 * OCDI files.
		 *
		 * @since 1.0.0
		 */
		public function ocdi_files() {

			$ocdi = isset( $this->config['ocdi'] ) ? $this->config['ocdi'] : array();
			return $ocdi;
		}

		/**
		 * OCDI after import.
		 *
		 * @since 1.0.0
		 */
		public function ocdi_after_import() {

			$front_page_id = get_page_by_title( 'Home' );
			update_option( 'show_on_front', 'page' );

			update_option( 'page_on_front', $front_page_id->ID );

			foreach ( $pages as $option_key => $slug ) {
				$result = get_page_by_path( $slug );
				if ( $result ) {
					if ( is_array( $result ) ) {
						$object = array_shift( $result );
					} else {
						$object = $result;
					}

					update_option( $option_key, $object->ID );
				}
			}
			// Set menu locations.
					$top_menu = get_term_by( 'name', 'top', 'top' );
					$primary_menu = get_term_by( 'name', 'Main', 'main' );
					$footer_menu = get_term_by( 'name', 'Footer nav', 'footer-nav' );

					set_theme_mod( 'nav_menu_locations', array(
							'top-menu' => $top_menu->term_id,
							'primary-menu' => $primary_menu->term_id,
							'footer-menu' => $footer_menu->term_id,
						)
					);
						}
					}

} // End if().
