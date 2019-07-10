<?php
	namespace sv100_companion;
	
	class modules extends init {
		public function __construct() {
		
		}
		public function init() {
			$this->sv_cleanup->init();
			$this->sv_human_time->init();
			$this->sv_footer_credits->init();
			$this->freemius->init();
		}
	}