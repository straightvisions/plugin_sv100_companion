<?php
	namespace sv100_companion;
	
	require_once( dirname(__FILE__) . '/lib/core_plugin/core_plugin.php' );
	
	class init extends \sv_core\core_plugin {
		const version = 1400;
		const version_core_match = 4001;
		
		public function __construct() {
			if(!$this->setup( __NAMESPACE__, __FILE__ )){
				return false;
			}
			
			/**
			 * @desc            information for the about section
			 * @return    void
			 * @author            Matthias Bathke
			 * @since            1.0
			 */
			
			$this->set_section_title( __( 'SV100 Companion', $this->get_root()->get_prefix() ) );
			$this->set_section_desc( __( 'This Plugin increases your PageSpeed even further. It is optimized to work well with our SV100 Theme.', $this->get_root()->get_prefix() ) );
			$this->set_section_privacy( '<p>' . $this->get_section_title() . __('does not collect or share any data', $this->get_root()->get_prefix()).'</p>' );
		}
	}
	
	$GLOBALS[ __NAMESPACE__ ] = new init();