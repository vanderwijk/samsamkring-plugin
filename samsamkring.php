<?php

/**
 * Plugin Name:       SamSamKring Plugin
 * Plugin URI:        https://www.samsamkring.nl/
 * Description:       Calculator
 * Version:           1.0
 * Requires at least: 5.4
 * Requires PHP:      7.2
 * Author:            Johan van der Wijk
 * Author URI:        https://thewebworks.nl
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       samsamkring
 * Domain Path:       /languages
 */


// Load plugin textdomain
function samsamkring_load_textdomain() {
	load_plugin_textdomain( 'samsamkring', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'samsamkring_load_textdomain' );

require_once( 'shortcode-calculator.php' );

function samsamkring_enqueues() {
	wp_enqueue_style( 'rangeslider', '/wp-content/plugins/samsamkring-plugin/node_modules/rangeslider.js/dist/rangeslider.css', 'all' );
	wp_enqueue_style( 'calculate', '/wp-content/plugins/samsamkring-plugin/calculate.css', 'all' );
	wp_enqueue_script( 'rangeslider', '/wp-content/plugins/samsamkring-plugin/node_modules/rangeslider.js/dist/rangeslider.min.js', array('jquery'), '2.3.3', true );

	wp_enqueue_script( 'numeral', '/wp-content/plugins/samsamkring-plugin/node_modules/numeral/min/numeral.min.js', array(), '2.0.6', true );
	wp_enqueue_script( 'numeral-nl', '/wp-content/plugins/samsamkring-plugin/node_modules/numeral/min/locales/nl-nl.min.js', array('jquery'), '2.0.6', true );
	wp_enqueue_script( 'init', '/wp-content/plugins/samsamkring-plugin/init.js', array('jquery'), '1.0', true );
}
add_action('wp_enqueue_scripts', 'samsamkring_enqueues');