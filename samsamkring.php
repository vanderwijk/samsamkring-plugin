<?php

/**
 * Plugin Name:       SamSamKring Plugin
 * Plugin URI:        https://www.samsamkring.nl/
 * Description:       SamSam check and other functions
 * Version:           2.0.2
 * Requires at least: 5.4
 * Author:            Johan van der Wijk
 * Author URI:        https://thewebworks.nl
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       samsam
 * Domain Path:       /languages
 */

define('SAMSAM_PLUGIN_URL', plugins_url() . '/samsamkring-plugin/' );
define('SAMSAM_PLUGIN_VER', '2.0.3');

// load plugin textdomain
function samsam_load_textdomain() {
	load_plugin_textdomain( 'samsam', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'samsam_load_textdomain' );

require_once( 'samsam-options.php' );
require_once( 'shortcode-calculator.php' );

function samsam_enqueues() {
	wp_enqueue_style( 'rangeslider', SAMSAM_PLUGIN_URL . 'node_modules/rangeslider.js/dist/rangeslider.css', array(), '2.3.2', 'all');
	wp_enqueue_style( 'calculate', SAMSAM_PLUGIN_URL . 'calculate.css', array(), SAMSAM_PLUGIN_VER, 'all');

	wp_enqueue_script( 'rangeslider', SAMSAM_PLUGIN_URL . 'node_modules/rangeslider.js/dist/rangeslider.min.js', array( 'jquery' ), '2.3.2', true );
	wp_enqueue_script( 'numeral', SAMSAM_PLUGIN_URL . 'node_modules/numeral/min/numeral.min.js', array(), '2.0.6', true );
	wp_enqueue_script( 'numeral-nl', SAMSAM_PLUGIN_URL . 'node_modules/numeral/min/locales/nl-nl.min.js', array( 'jquery' ), '2.0.6', true );
	wp_enqueue_script( 'calculate', SAMSAM_PLUGIN_URL . 'calculate.js', array( 'jquery' ), SAMSAM_PLUGIN_VER, true );

	// dynamic values for JS calculations -> check for empty because default value for get_option doesn't work
	if ( empty( get_option( 'administration_costs' ))) { $administration_costs = 15; } else { $administration_costs = get_option( 'administration_costs' ); }
	if ( empty( get_option( 'bank_costs' ))) { $bank_costs = 8; } else { $bank_costs = get_option( 'bank_costs' ); }
	if ( empty( get_option( 'health_and_safety_service_costs' ))) { $health_and_safety_service_costs = 5; } else { $health_and_safety_service_costs = get_option( 'health_and_safety_service_costs' ); }
	if ( empty( get_option( 'cost_factor' ))) { $cost_factor = 0.045; } else { $cost_factor = get_option( 'cost_factor' ); }
	if ( empty( get_option( 'surplus_percentage' ))) { $surplus_percentage = 95; } else { $surplus_percentage = get_option( 'surplus_percentage' ); }
	
	$scriptData = array(
		'administration_costs' => $administration_costs,
		'bank_costs' => $bank_costs,
		'health_and_safety_service_costs' => $health_and_safety_service_costs,
		'cost_factor' => $cost_factor,
		'surplus_percentage' => $surplus_percentage
	);

	wp_localize_script( 'calculate', 'samsam_options', $scriptData );
}
add_action( 'wp_enqueue_scripts', 'samsam_enqueues' );