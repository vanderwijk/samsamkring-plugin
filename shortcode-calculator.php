<?php

function calculator_shortcode( $atts ) {
	ob_start(); ?>

	<form class="calculator">
		<input type="range" id="desired-income" min="1000" max="4000" value="2500" step="50">
	</form>

	<div class="wp-block-columns has-3-columns calculator-icons">
		<div class="wp-block-column">
			<img src="/wp-content/plugins/samsamkring-plugin/img/coins.png" alt="Maandelijkse inleg">
			<h3 class="montly-payment"></h3>
			<h4>Maandelijkse inleg</h4>
			<p>dit bedrag is inclusief alle kosten bij het inkomen van jouw keuze.</p>
		</div>
		<div class="wp-block-column">
			<img src="/wp-content/plugins/samsamkring-plugin/img/pig.png" alt="Maandelijks gespaard">
			<h3 class="surplus"></h3>
			<h4>Maandelijks gespaard</h4>
			<p>door deelnemers van het eerste uur met hetzelfde inkomen als jouw keuze.</p>
		</div>
		<div class="wp-block-column">
			<img src="/wp-content/plugins/samsamkring-plugin/img/person.png" alt="Benodigd inkomen">
			<h3 class="required-income-eenmanszaak"></h3>
			<h4>Benodigd inkomen</h4>
			<p>bij jouw keuze, als je een eenmanszaak/vof hebt (<span class="required-income-bv"></span> bij een BV).</p>
		</div>
	</div>

	<p>Bij een gewenst maandinkomen bij arbeidsongeschiktheid van <strong><span class="desired-income"></span></strong> bedraagt de maandelijkse inleg <strong><span class="montly-payment"></span></strong>.</p>
	<p>Het maandbedrag is inclusief de kosten van een privé Premium bunq account. Je spaarbedrag bedoeld voor schenkingen en de arbodienst is <span class="variable-costs"></span> en de bank en administratie kosten bedragen <span class="fixed-costs"></span>. Deelnemers sinds de start in juli 2018 hebben van het spaarbedrag nog <span class="surplus-percentage"></span> (<span class="surplus"></span>) over.</p>
	<p>Indien je een eenmanszaak hebt is een maandelijks bruto inkomen van minimaal <strong><span class="required-income-eenmanszaak"></span></strong> benodigd en voor een BV bedraagt het minimum maandinkomen <strong><span class="required-income-bv"></span></strong>.

<?php
	$ob_str = ob_get_contents();
	ob_end_clean();
	return $ob_str;
}
add_shortcode( 'calculator', 'calculator_shortcode' );