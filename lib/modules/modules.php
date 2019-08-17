<?php
	namespace sv100_companion;
	
	class modules extends init {
		public function __construct() {
		
		}
		public function init() {
			$this->sv_cleanup->init();
			$this->sv_footer_credits->init();
			$this->sv_human_time->init();
			$this->sv_settings->init();
			
			$this->freemius->init();
			
			add_action('init', array($this, 'wp_init'));
		}
		public function wp_init(){
			if(isset($GLOBALS['sv100'])){
				$this->sv_footer_credits->init();
			}

			if(did_action('sv100_init')){
				add_action( 'admin_menu', array( $this , 'add_theme_page' ), 100 );
			}
		}
		public function add_theme_page(){
			\add_theme_page(
				$this->get_instance('sv100')->get_section_title(),		// page title
				$this->get_instance('sv100')->get_section_title(),		// menu title
				'edit_theme_options',		// capability
				$this->get_instance('sv100')->get_prefix(),			// menu slug
				function(){	// callable function
					$this->get_instance('sv100')->load_page();
				}
			);
		}
	}