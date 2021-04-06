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
			}
			
			if(is_admin() && $this->get_setting( 'show_gutenberg_widget_screen' )->get_data()) {
				add_theme_support( 'widgets-block-editor' );
			}else{
				remove_theme_support( 'widgets-block-editor' );
			}
			
			return $this;
		}

		
		public function load_settings(){
			$this->get_setting( 'show_link_manage_reusable_blocks' )
			     ->set_title( __( 'Reusable blocks admin menu entry', 'sv100_companion' ) )
			     ->set_description( __( 'Show manage reusable blocks link in backend menu.', 'sv100_companion' ) )
			     ->load_type( 'checkbox' );
			
			$this->get_setting( 'show_gutenberg_widget_screen' )
			     ->set_title( __( 'Show Block Editor in widget screen (Experimental!)', 'sv100_companion' ) )
			     ->set_description( __( 'Enables / Disables Block Editor in widget screen', 'sv100_companion' ) )
			     ->set_default_value(false)
			     ->load_type( 'checkbox' );
			
			
			return $this;
		}
	}
