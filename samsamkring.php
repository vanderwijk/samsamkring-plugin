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
	wp_enqueue_style( 'rangeslider', 'https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.3/rangeslider.min.css', '2.3.3', 'all' );
	wp_enqueue_script( 'rangeslider', 'https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.3/rangeslider.min.js', array('jquery'), '2.3.3', true );
	wp_enqueue_script( 'init', '/wp-content/plugins/samsamkring-plugin/init.js', array('jquery'), '2.3.3', true );
}
add_action('wp_enqueue_scripts', 'samsamkring_enqueues');