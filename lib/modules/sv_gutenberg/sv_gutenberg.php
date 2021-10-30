<?php
	namespace sv100_companion;
	
	/**
	 * @version         4.004
	 * @author			straightvisions GmbH
	 * @package			sv_100
	 * @copyright		2017 straightvisions GmbH
	 * @link			https://straightvisions.com
	 * @since			1.0
	 * @license			See license.txt or https://straightvisions.com
	 */
	
	class sv_gutenberg extends modules {
		public function init() {
			$this->load_settings()
			     ->register_scripts()
			     ->set_section_title( __( 'Gutenberg', 'sv100_companion' ) )
			     ->set_section_desc( __( 'Gutenberg Enhancements', 'sv100_companion' ) )
			     ->set_section_type( 'settings' )
				 ->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) )
			     ->get_root()
			     ->add_section( $this );
		}
		
		public function register_scripts(){
			if(is_admin() && $this->get_setting( 'show_link_manage_reusable_blocks' )->get_data()) {
				add_menu_page( __( 'Reusable Blocks', 'sv100_companion' ), __( 'Reusable Blocks', 'sv100_companion' ),
					'read', 'edit.php?post_type=wp_block', '', '', 21 );
				
				
				$this->get_script( 'gutenberg_editor_fixes' )
				     ->set_is_gutenberg()
				     ->set_is_enqueued()
				     ->set_path( 'lib/backend/css/fixes.css' );
	
				
			}
			
			return $this;
		}

		
		public function load_settings(){
			$this->get_setting( 'show_link_manage_reusable_blocks' )
			     ->set_title( __( 'Reusable blocks admin menu entry', 'sv100_companion' ) )
			     ->set_description( __( 'Show manage reusable blocks link in backend menu.', 'sv100_companion' ) )
			     ->load_type( 'checkbox' );
			
			return $this;
		}
	
	}
