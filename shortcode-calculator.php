<?php

function calculator_shortcode( $atts ) {

	extract( shortcode_atts( array(
		'show_specification' => '',
		'slider_minimum' => '1000',
		'slider_default' => '2500',
		'slider_maximum' => '4000',
	), $atts ) );

	ob_start(); ?>

	<form class="calculator">
		<input type="range" id="desired-income" min="<?php echo esc_attr( $slider_minimum ) ?>" max="<?php echo esc_attr( $slider_maximum ) ?>" value="<?php echo esc_attr( $slider_default) ?>" step="50">
	</form>

	<div class="wp-block-columns has-3-columns calculator-icons">
		<div class="wp-block-column">
			<img src="/wp-content/plugins/samsamkring-plugin/img/coins.png" alt="Maandelijkse inleg">
			<p class="amount montly-payment"></p>
			<p class="amount-title">Maandelijkse storting</p>
			<p>dit bedrag is inclusief alle kosten.</p>
		</div>
		<div class="wp-block-column">
			<img src="/wp-content/plugins/samsamkring-plugin/img/pig.png" alt="Maandelijks gespaard">
			<p class="amount surplus"></p>
			<p class="amount-title">Maandelijks gespaard</p>
			<p>in de afgelopen 12 maanden (gemiddeld).</p>
		</div>
		<div class="wp-block-column">
			<img src="/wp-content/plugins/samsamkring-plugin/img/person.png" alt="Benodigd inkomen">
			<p class="amount required-income-eenmanszaak"></p>
			<p class="amount-title">Benodigd inkomen</p>
			<p>bruto uit onderneming per maand (ZZP’er).</p>
		</div>
	</div>

<?php if ( esc_attr( $show_specification ) == true ) { // to show cost specification use the shortcode [calculator show_specification=true] ?>

	<p>Bij een gewenst maandinkomen bij arbeidsongeschiktheid van <strong><span class="desired-income"></span></strong> bedraagt de maandelijkse inleg <strong><span class="montly-payment"></span></strong>.</p>
	<p>Het maandbedrag is inclusief de kosten van een privé Premium bunq account. Je spaarbedrag bedoeld voor schenkingen en de arbodienst is <span class="variable-costs"></span> en de bank en administratie kosten bedragen <span class="fixed-costs"></span>. Deelnemers sinds de start in juli 2018 hebben van het spaarbedrag nog <span class="surplus-percentage"></span> (<span class="surplus"></span>) over.</p>
	<p>Indien je een eenmanszaak hebt is een maandelijks bruto inkomen van minimaal <strong><span class="required-income-eenmanszaak"></span></strong> benodigd en voor een BV bedraagt het minimum maandinkomen <strong><span class="required-income-bv"></span></strong>.

<?php
}

	$ob_str = ob_get_contents();
	ob_end_clean();
	return $ob_str;
}
add_shortcode( 'calculator', 'calculator_shortcode' );
