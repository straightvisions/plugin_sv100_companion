<?php
	namespace sv100_companion;
	
	class freemius extends init {
		public function __construct() {
		
		}
		
		public function init() {
			$this->load_sdk();
			do_action( 'sv100_companion_freemius_loaded' );
		}
		
		public function load_sdk() {
			global $sv100_companion_freemius;
			
			if ( ! isset( $sv100_companion_freemius ) ) {
				// Include Freemius SDK.
				require_once($this->get_path('lib/freemius/start.php'));

				$sv100_companion_freemius = fs_dynamic_init( array(
					'id'                  => '4082',
					'slug'                => 'sv100-companion',
					'type'                => 'plugin',
					'public_key'          => 'pk_bb203616096bc726f69ca51a0bbe3',
					'is_premium'          => false,
					'has_addons'          => true,
					'has_paid_plans'      => false,
					'menu'                => array(
						'slug'           => 'sv100_companion',
						'parent'         => array(
							'slug' => 'straightvisions',
						),
					),
				) );
			}
			
			return $sv100_companion_freemius;
		}
	}