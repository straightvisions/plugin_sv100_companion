<?php
	namespace sv100_companion;
	
	class freemius extends init {
		public function __construct() {
		
		}
		
		public function init() {
			$this->load_sdk();
		}
		
		public function load_sdk() {
			global $sv100_companion_freemius;
			
			if ( ! isset( $sv100_companion_freemius ) ) {
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

			do_action( 'sv100_companion_freemius_loaded' );
			
			return $sv100_companion_freemius;
		}
	}