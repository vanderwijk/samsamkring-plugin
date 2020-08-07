<?php

/**
 * Plugin Name:       SamSamKring Plugin
 * Plugin URI:        https://www.samsamkring.nl/
 * Description:       Calculator
 * Version:           1.1
 * Requires at least: 5.4
 * Requires PHP:      7.2
 * Author:            Johan van der Wijk
 * Author URI:        https://thewebworks.nl
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       samsam
 * Domain Path:       /languages
 */



// Load plugin textdomain
function samsam_load_textdomain() {
	load_plugin_textdomain( 'samsam', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'samsam_load_textdomain' );

require_once( 'options.php' );
require_once( 'shortcode-calculator.php' );

function samsam_enqueues() {
	wp_enqueue_style( 'rangeslider', '/wp-content/plugins/samsamkring-plugin/node_modules/rangeslider.js/dist/rangeslider.css', 'all' );
	wp_enqueue_style( 'calculate', '/wp-content/plugins/samsamkring-plugin/calculate.css', 'all' );

	wp_enqueue_script( 'rangeslider', '/wp-content/plugins/samsamkring-plugin/node_modules/rangeslider.js/dist/rangeslider.min.js', array( 'jquery' ), '2.3.3', true );
	wp_enqueue_script( 'numeral', '/wp-content/plugins/samsamkring-plugin/node_modules/numeral/min/numeral.min.js', array(), '2.0.6', true );
	wp_enqueue_script( 'numeral-nl', '/wp-content/plugins/samsamkring-plugin/node_modules/numeral/min/locales/nl-nl.min.js', array( 'jquery' ), '2.0.6', true );
	wp_enqueue_script( 'calculate', '/wp-content/plugins/samsamkring-plugin/calculate.js', array( 'jquery' ), '1.1', true );

	$health_and_safety_service_factor = get_option( 'health_and_safety_service_factor', 0.045 );
	$surplus_percentage = get_option( 'surplus_percentage', 95 );
	
	$scriptData = array(
		'health_and_safety_service_factor' => $health_and_safety_service_factor,
		'surplus_percentage' => $surplus_percentage,
	);

	wp_localize_script( 'calculate', 'samsam_options', $scriptData );

}
add_action( 'wp_enqueue_scripts', 'samsam_enqueues' );