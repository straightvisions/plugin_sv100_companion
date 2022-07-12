<?php
namespace sv100_companion;

class sv_simply_schedule_appointments extends modules {
	public function init() {
		// Module Info
		$this->set_section_title( __('Simply Schedule Appointments','sv100_companion') )
		->set_section_desc( __('Tweaks', 'sv100_companion') )
		->set_section_type( 'settings' )
		->load_settings()
		->get_root()->add_section($this);

		if($this->get_setting('lazyload')->get_data()){
			add_filter( 'ssa/performance/lazy_load', '__return_true' );
		}
	}
	public function load_settings(): sv_simply_schedule_appointments{
		$this->get_setting('lazyload')
			 ->set_title( __( 'Enable Lazyload for iframe', 'sv100_companion' ) )
			 ->load_type( 'checkbox' );
		
		return $this;
	}
}