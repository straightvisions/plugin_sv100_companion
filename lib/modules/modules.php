<?php
	namespace sv100_companion;
	
	class modules extends init {
		public function __construct() {
		
		}
		public function init() {
			$this->load_module('sv_cleanup');
			$this->load_module('sv_footer_credits');
			$this->load_module('sv_human_time');
			$this->load_module('sv_settings');
			$this->load_module('sv_categories');
			$this->load_module('sv_wp_rocket');
			$this->load_module('sv_svg_support');
			$this->load_module('sv_lightbox');
			$this->load_module('sv_smooth_scrolling');
			$this->load_module('sv_scroll_to_top');
			$this->load_module('sv_maintenance');
			$this->load_module('sv_planet_charts');
			$this->load_module('sv_gutenberg');
			$this->load_module('sv_gutenslider');
			$this->load_module('sv_accordion_block');
			$this->load_module('freemius');

			add_action('init', array($this, 'wp_init'));
		}
		public function wp_init(){
			if($this->get_instance('sv100')){
				$this->load_module('sv_footer_credits');
			}
		}
	}