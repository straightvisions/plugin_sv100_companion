<?php
	if ( current_user_can( 'activate_plugins' ) ) {
		?>
        <div class="sv_section_description"><?php echo $module->get_section_desc(); ?></div>

        <h3 class="divider"><?php _e( 'Tweaks', 'sv100' ); ?></h3>
        <div class="sv_setting_flex">
			<?php
				echo $module->get_setting('show_link_manage_reusable_blocks')->form();
			?>
        </div>
		<?php
	}
?>