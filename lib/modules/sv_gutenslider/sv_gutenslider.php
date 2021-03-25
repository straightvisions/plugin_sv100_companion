<?php
	namespace sv100_companion;

	/**
	 * @version         1.00
	 * @author			straightvisions GmbH
	 * @package			sv100_companion
	 * @copyright		2017 straightvisions GmbH
	 * @link			https://straightvisions.com
	 * @since			1.0
	 * @license			See license.txt or https://straightvisions.com
	 */

	class sv_gutenslider extends modules {
		public function init() {
			// Section Info
			$this->set_section_title( __( 'Gutenslider', 'sv100_companion' ) )
				->set_section_desc( __( 'Tweaks for Gutenslider', 'sv100_companion' ) )
				->set_section_type( 'settings' )
				->load_settings()
				->get_root()->add_section($this);

			if($this->get_setting('assets_on_demand')->get_data()){
				add_action( 'wp_print_scripts', array($this, 'wp_print_scripts'), 100 );
				add_action( 'wp', array($this, 'wp_print_scripts'), 100 );
			}
			if($this->get_setting('disable_dashicons')->get_data()){
				add_action( 'wp', array($this, 'no_dashicons'), 1 );
				add_action( 'wp_footer', array($this, 'no_dashicons'), 1 );
				add_action( 'wp_enqueue_scripts', array($this, 'no_dashicons'), 1 );

				add_action( 'wp', array($this, 'no_dashicons'), 100 );
				add_action( 'wp_footer', array($this, 'no_dashicons'), 100 );
				add_action( 'wp_enqueue_scripts', array($this, 'no_dashicons'), 100 );
			}
		}
		public function wp_print_scripts() {
			if(is_admin()){
				return $this;
			}

			if($this->has_block_frontend('eedee/block-gutenslider')){
				return $this;
			}

			wp_dequeue_script('eedee-gutenslider-slick-js');
			wp_dequeue_script('eedee-gutenslider-js');
			wp_dequeue_script('eedee-gutenslider-block-js');
			wp_dequeue_style('eedee-gutenslider-block-editor-css');

			unregister_block_type('eedee/block-gutenslider');

			return $this;
		}
		public function no_dashicons() {
			if(is_admin()){
				return $this;
			}

			wp_dequeue_style('dashicons');

			return $this;
		}
		public function load_settings(): sv_gutenslider{
			$this->get_setting('assets_on_demand')
				->set_title( __( 'Load Assets on Demand', 'sv100_companion' ) )
				->set_description( __('Load Assets (CSS/JS) only, when Gutenberg Block is loaded on a page', 'sv100_companion' ) )
				->load_type( 'checkbox' );

			$this->get_setting('disable_dashicons')
				->set_title( __( 'Disable Dashicons', 'sv100_companion' ) )
				->set_description( __('Dashicons will not be loaded on frontend', 'sv100_companion' ) )
				->load_type( 'checkbox' );

			return $this;
		}
	}