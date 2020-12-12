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
			$this->sv_categories->init();
			$this->sv_wp_rocket->init();
			$this->sv_svg_support->init();
			$this->sv_lightbox->init();
			$this->sv_smooth_scrolling->init();
			$this->sv_scroll_to_top->init();
			$this->sv_maintenance->init();
			
			$this->freemius->init();
			
			add_action('init', array($this, 'wp_init'));
		}
		public function wp_init(){
			if(isset($GLOBALS['sv100'])){
				$this->sv_footer_credits->init();
			}
		}
	}