<?php

function calculator_shortcode( $atts ) {

	$content = '';

	$content .= '<p>&nbsp;</p>';

	$content .= '<form>';
	$content .= '<label for="desired-income">Gewenste inkomen bij arbeidsongeschiktheid</label>';
	$content .= '<p><input type="range" id="desired-income" min="1000" max="4000" step="50"></p>';
	$content .= '<p id="desired-income-display"></p>';
	
	$content .= '<label for="">Maandelijkse storting</label>';
	$content .= '<input type="number" id="montly-instalment">';

	$content .= '</form>';

	$content .= '<script src="/wp-content/plugins/samsamkring-plugin/calculate.js"></script>';

	return $content;

}
add_shortcode( 'calculator', 'calculator_shortcode' );