<?php
	namespace sv100_companion;

	class sv_woocommerce extends modules {
		public function init() {
			// Module Info
			$this->set_section_title( __('WooCommerce','sv100_companion') );
			$this->set_section_desc( __('Tweaks', 'sv100_companion') )
				->set_section_type( 'settings' )
				->load_settings()
				->get_root()->add_section($this);

			if($this->get_setting('load_assets_on_demand')->get_data()) {
				add_action('template_redirect', array($this, 'template_redirect'), 999);
				add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts'), 999);
			}
		}
		public function load_settings(): sv_woocommerce{
			$this->get_setting('load_assets_on_demand')
				->set_title( __( 'Load Assets on demand', 'sv100_companion' ) )
				->load_type( 'checkbox' );

			return $this;
		}
		public function template_redirect(): sv_woocommerce {
			if (! is_plugin_active('woocommerce/woocommerce.php') && ! is_plugin_active_for_network('woocommerce/woocommerce.php')) {
				return $this;
			}

			// Skip Woo Pages
			if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
				return $this;
			}

			// Otherwise...
			remove_action('wp_enqueue_scripts', array(\WC_Frontend_Scripts::class, 'load_scripts'));
			remove_action('wp_print_scripts', array(\WC_Frontend_Scripts::class, 'localize_printed_scripts'), 5);
			remove_action('wp_print_footer_scripts', array(\WC_Frontend_Scripts::class, 'localize_printed_scripts'), 5);

			return $this;
		}
		public function wp_enqueue_scripts(): sv_woocommerce {
			if(is_admin()){
				return $this;
			}

			$block_types = \WP_Block_Type_Registry::get_instance()->get_all_registered();
			foreach ( $block_types as $block_type ) {
				if(strpos($block_type->name, 'woocommerce/') !== false){
					if($this->has_block_frontend($block_type->name)){
						return $this;
					}
				}
			}

			wp_dequeue_style( 'wc-block-style' ); // WooCommerce

			return $this;
		}
	}