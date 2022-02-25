<?php
	namespace sv100_companion;
	
	/**
	 * @version         1.00
	 * @author			straightvisions GmbH
	 * @package			sv100_companion
	 * @copyright		2022 straightvisions GmbH
	 * @link			https://straightvisions.com
	 * @since			1.00
	 * @license			See license.txt or https://straightvisions.com
	 */
	
	class sv_video_autoplay extends modules {
		public function init() {
			$this->set_section_title( __( 'Video Autoplay', 'sv100_companion' ) )
				 ->set_section_desc( __( 'Tweaks for Video Autoplay', 'sv100_companion' ) )
				 ->set_section_type( 'settings' )
				 ->load_settings()
                 ->register_scripts()
				 ->get_root()
                 ->add_section($this);
		}
        
        public function load_settings(): sv_video_autoplay{
            $this->get_setting('autoplay_videos')
				->set_title( __( 'Autoplay Videos', 'sv100_companion' ) )
				->set_description( __('Play videos automatically on page load', 'sv100_companion' ) )
				->load_type( 'checkbox' );

			return $this;
		}

        protected function register_scripts(): sv_video_autoplay{
            if($this->get_setting( 'autoplay_videos' )->get_data()) {
                $this->get_script('autoplay')
                    ->set_type('js')
                    ->set_path('lib/js/autoplay.js')
                    ->set_is_enqueued();
            }
            return $this;
        }
    }