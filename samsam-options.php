<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Error!' );
}


// Create custom plugin settings menu and register the settings
function samsam_create_menu() {
	add_submenu_page( 'options-general.php', __( 'SamSam Options', 'samsam' ), __( 'SamSam Options', 'samsam' ), 'manage_options', 'samsam-plugin/options.php', 'samsam_settings_page' );
	add_action( 'admin_init', 'samsam_register_settings' );
}
add_action( 'admin_menu', 'samsam_create_menu' );


// Register the settings
function samsam_register_settings() {
	register_setting( 'samsam-settings-group', 'administration_costs', 'samsam_sanitisation' );
	register_setting( 'samsam-settings-group', 'bank_costs', 'samsam_sanitisation' );
	register_setting( 'samsam-settings-group', 'health_and_safety_service_costs', 'samsam_sanitisation' );
	register_setting( 'samsam-settings-group', 'cost_factor', 'samsam_sanitisation' );
	register_setting( 'samsam-settings-group', 'surplus_percentage', 'samsam_sanitisation' );
	register_setting( 'samsam-settings-group', 'show_specification' );
}

function samsam_sanitisation ( $input ) {
	$input = sanitize_text_field( $input );
	return $input;
}

function samsam_settings_page() { ?>
	<div class="wrap">
		<h2><?php _e( 'SamSam Options', 'samsam' ); ?></h2>
		<form method="post" action="options.php">
			<?php settings_fields( 'samsam-settings-group' ); ?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">
						<label for="administration_costs">
							<?php _e( 'Administration costs', 'samsam' ); ?>
						</label>
					</th>
					<td>
						<input type="text" id="administration_costs" name="administration_costs" value="<?php echo esc_html ( get_option( 'administration_costs' ) ); ?>" />
						<p class="description"><?php _e( 'Monthly administration costs.', 'samsam' ); ?> <?php _e( 'The default value is', 'samsam' ); ?> 15.</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="bank_costs">
							<?php _e( 'Bank costs', 'samsam' ); ?>
						</label>
					</th>
					<td>
						<input type="text" id="bank_costs" name="bank_costs" value="<?php echo esc_html ( get_option( 'bank_costs' ) ); ?>" />
						<p class="description"><?php _e( 'Monthly bank costs.', 'samsam' ); ?> <?php _e( 'The default value is', 'samsam' ); ?> 8.</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="health_and_safety_service_costs">
							<?php _e( 'Health and Safety Service costs', 'samsam' ); ?>
						</label>
					</th>
					<td>
						<input type="text" id="health_and_safety_service_costs" name="health_and_safety_service_costs" value="<?php echo esc_html ( get_option( 'health_and_safety_service_costs' ) ); ?>" />
						<p class="description"><?php _e( 'Monthly costs for the Health and Safety Service.', 'samsam' ); ?> <?php _e( 'The default value is', 'samsam' ); ?> 5.</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="cost_factor">
							<?php _e( 'Cost factor', 'samsam' ); ?>
						</label>
					</th>
					<td>
						<input type="text" id="cost_factor" name="cost_factor" value="<?php echo esc_html ( get_option( 'cost_factor' ) ); ?>" />
						<p class="description"><?php _e( 'Description of this option.', 'samsam' ); ?> <?php _e( 'The default value is', 'samsam' ); ?> 0.045.</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="surplus_percentage">
							<?php _e( 'Surplus percentage', 'samsam' ); ?>
						</label>
					</th>
					<td>
						<input type="text" id="surplus_percentage" name="surplus_percentage" value="<?php echo esc_html ( get_option( 'surplus_percentage' ) ); ?>" />
						<p class="description"><?php _e( 'Historic savings percentage.', 'samsam' ); ?> <?php _e( 'The default value is', 'samsam' ); ?> 95.</p>
					</td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" />
			</p>
		</form>
	</div>

<?php };