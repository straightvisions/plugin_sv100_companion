<?php
	namespace sv100_companion;

	if(!class_exists('\sv_core\core_plugin')) {
		require_once(dirname(__FILE__) . '/lib/core_plugin/core_plugin.php');
	}
	
	class init extends \sv_core\core_plugin {
		const version = 1405;
		const version_core_match = 4013;
		
		public function load(){
			if(!$this->setup( __NAMESPACE__, __FILE__ )){
				return false;
			}
			
			$this->set_section_title( __( 'SV100 Companion', 'sv100_companion' ) );
			$this->set_section_desc( __( 'This Plugin increases your PageSpeed even further. It is optimized to work well with our SV100 Theme.',  'sv100_companion' ) );
			$this->set_section_privacy( '<p>' . $this->get_section_title() . __(' does not collect or share any data',  'sv100_companion').'</p>' );
		}
	}
	
	$GLOBALS[ __NAMESPACE__ ] = new init();
	$GLOBALS[ __NAMESPACE__ ]->load();