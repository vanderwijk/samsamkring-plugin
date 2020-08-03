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
	$content .= '<strong><span id="montly-instalment"></span>*</strong>. ';
	$content .= 'Indien je een eenmanszaak hebt is hiervoor is een maandelijks bruto inkomen van minimaal ';
	$content .= '<strong><span id="required-income-eenmanszaak"></span></strong>';
	$content .= ' benodigd. Als je een BV hebt bedraagt het minimum maandinkomen ';
	$content .= '<strong><span id="required-income-bv"></span></strong>.';
	$content .= '<p>*Het maandbedrag is inclusief de kosten van een privé Premium bunq account.</p>';
	

	$content .= '</form>';

	return $content;

}
add_shortcode( 'calculator', 'calculator_shortcode' );