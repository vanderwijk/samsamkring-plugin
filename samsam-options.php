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

function samsam_admin_scripts(){
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_style( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'samsam_admin_scripts' );

// Register the settings
function samsam_register_settings() {
	register_setting( 'samsam-settings-group', 'administration_costs', 'samsam_sanitisation' );
	register_setting( 'samsam-settings-group', 'bank_costs', 'samsam_sanitisation' );
	register_setting( 'samsam-settings-group', 'health_and_safety_service_costs', 'samsam_sanitisation' );
	register_setting( 'samsam-settings-group', 'cost_factor', 'samsam_sanitisation' );
	register_setting( 'samsam-settings-group', 'surplus_percentage', 'samsam_sanitisation' );
	register_setting( 'samsam-settings-group', 'show_specification' );

	register_setting( 'samsam-settings-group', 'monthly_deposit_label', array('type' => 'string', 'sanitize_callback' => 'samsam_sanitisation', 'default' => 'dit bedrag is inclusief alle kosten.') );
	register_setting( 'samsam-settings-group', 'monthly_costs_label', array('type' => 'string', 'sanitize_callback' => 'samsam_sanitisation', 'default' => 'in de afgelopen 12 maanden (gemiddeld).') );
	register_setting( 'samsam-settings-group', 'monthly_savings_label', array('type' => 'string', 'sanitize_callback' => 'samsam_sanitisation', 'default' => 'in de afgelopen 12 maanden (gemiddeld).') );
	register_setting( 'samsam-settings-group', 'required_income_label', array('type' => 'string', 'sanitize_callback' => 'samsam_sanitisation', 'default' => 'bruto uit onderneming per maand (ZZP’er).') );
	register_setting( 'samsam-settings-group', 'piggybank_color', array('type' => 'string', 'sanitize_callback' => 'samsam_sanitisation', 'default' => '#A12242') );
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
			<h2 class="title"><?php _e( 'Costs and Savings', 'samsam' ); ?></h2>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">
						<label for="administration_costs">
							<?php _e( 'Administration costs', 'samsam' ); ?>
						</label>
					</th>
					<td>
						<input type="text" id="administration_costs" name="administration_costs" value="<?php echo esc_html ( get_option( 'administration_costs' ) ); ?>" />
						<p class="description"><?php _e( 'Monthly administration costs.', 'samsam' ); ?> <?php _e( 'The default value is', 'samsam' ); ?> <?php echo ADMINISTRATION_COSTS; ?>.</p>
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
						<p class="description"><?php _e( 'Monthly bank costs.', 'samsam' ); ?> <?php _e( 'The default value is', 'samsam' ); ?> <?php echo BANK_COSTS; ?>.</p>
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
						<p class="description"><?php _e( 'Monthly costs for the Health and Safety Service.', 'samsam' ); ?> <?php _e( 'The default value is', 'samsam' ); ?> <?php echo HEALTH_AND_SAFETY_SERVICE_COSTS; ?>.</p>
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
						<p class="description"><?php _e( 'Description of this option.', 'samsam' ); ?> <?php _e( 'The default value is', 'samsam' ); ?> <?php echo DEFAULT_COST_FACTOR; ?>.</p>
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
						<p class="description"><?php _e( 'Historic savings percentage (standardized to default cost factor).', 'samsam' ); ?> <?php _e( 'The default value is', 'samsam' ); ?> <?php echo SURPLUS_PERCENTAGE; ?>.</p>
					</td>
				</tr>
			</table>
			<h2 class="title"><?php _e( 'Labels', 'samsam' ); ?></h2>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">
						<label for="monthly_deposit_label">
							<?php _e( 'Monthly deposit', 'samsam' ); ?>
						</label>
					</th>
					<td>
						<input type="text" id="monthly_deposit_label" name="monthly_deposit_label" value="<?php echo esc_html ( get_option( 'monthly_deposit_label' ) ); ?>" class="regular-text"/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="monthly_costs_label">
							<?php _e( 'Monthly costs', 'samsam' ); ?>
						</label>
					</th>
					<td>
						<input type="text" id="bank_costs" name="monthly_costs_label" value="<?php echo esc_html ( get_option( 'monthly_costs_label' ) ); ?>" class="regular-text"/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="monthly_savings_label">
							<?php _e( 'Monthly savings', 'samsam' ); ?>
						</label>
					</th>
					<td>
						<input type="text" id="monthly_savings_label" name="monthly_savings_label" value="<?php echo esc_html ( get_option( 'monthly_savings_label' ) ); ?>" class="regular-text"/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="required_income_label">
							<?php _e( 'Required income', 'samsam' ); ?>
						</label>
					</th>
					<td>
						<input type="text" id="required_income_label" name="required_income_label" value="<?php echo esc_html ( get_option( 'required_income_label' ) ); ?>" class="regular-text"/>
					</td>
				</tr>
			</table>
			<h2 class="title"><?php _e( 'Colors', 'samsam' ); ?></h2>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">
						<label for="piggybank_color">
							<?php _e( 'Piggybank color', 'samsam' ); ?>
						</label>
					</th>
					<td>
						<input type="text" class="color-picker" id="piggybank_color" name="piggybank_color" value="<?php echo esc_html ( get_option( 'piggybank_color' ) ); ?>" />
					</td>
				</tr>
			</table>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" />
			</p>
		</form>
	</div>

	<script>
		// Color picker
		jQuery(document).ready(function($) {
			$('.color-picker').wpColorPicker();
		});
	</script>

<?php };