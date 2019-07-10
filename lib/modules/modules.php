<?php
	namespace sv100_companion;
	
	class modules extends init {
		public function __construct() {
		
		}
		public function init() {
			$this->sv_cleanup->init();
			$this->sv_human_time->init();
			
			$this->freemius->init();
			
			add_action('init', array($this, 'wp_init'));
		}
		public function wp_init(){
			if(isset($GLOBALS['sv100'])){
				$this->sv_footer_credits->init();
			}
		}
	}