<?php

function calculator_shortcode( $atts ) {

	$content = '';

	$content .= '<p>&nbsp;</p>';

	$content .= '<style></style>';

	$content .= '<form class="calculator">';
	$content .= '<label for="desired-income">Kies je gewenste maandinkomen bij arbeidsongeschiktheid</label>';
	$content .= '<input type="range" id="desired-income" min="1000" max="4000" value="2500" step="50">';
	
	$content .= '<p>Bij een gewenst maandinkomen bij arbeidsongeschiktheid van ';
	$content .= '<strong><span id="desired-income-display"></span></strong> ';
	$content .= 'bedraagt de maandelijkse inleg ';
	$content .= '<strong><span id="montly-instalment"></span>*</strong>.</p>';
	$content .= '<p>Indien je een eenmanszaak hebt is hiervoor is een maandelijks bruto inkomen van minimaal ';
	$content .= '<strong><span id="required-income-eenmanszaak"></span></strong>';
	$content .= ' benodigd en voor een BV bedraagt het minimum maandinkomen ';
	$content .= '<strong><span id="required-income-bv"></span></strong>.';
	$content .= '<p>*Het maandbedrag is inclusief de kosten van een privé Premium bunq account. Je spaarbedrag bedoeld voor schenkingen en de arbodienst is <span id="health_and_safety_service"></span> en de bank en administratie kosten bedragen € 23,00. Deelnemers sinds de start in juli 2018 hebben van het spaarbedrag nog 95% (<span id="surplus"></span>) over.</p>';

	$content .= '</form>';

	return $content;

}
add_shortcode( 'calculator', 'calculator_shortcode' );