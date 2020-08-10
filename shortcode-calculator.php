<?php

function calculator_shortcode( $atts ) {
	ob_start(); ?>

<form class="calculator">
	<input type="range" id="desired-income" min="1000" max="4000" value="2500" step="50">
</form>

<div style="background-color:var(--paletteColor5);" class="wp-block-atomic-blocks-ab-container ab-block-container alignfull calculator-icons">
	<div class="ab-container-inside">
		<div class="ab-container-content" style="max-width:1290px">
			<div class="wp-block-columns has-3-columns">
				<div class="wp-block-column">
					<img src="/wp-content/plugins/samsamkring-plugin/img/coins.png">
					<h3 class="montly-instalment"></h3>
					<h4>Maandelijkse inleg</h4>
				</div>
				<div class="wp-block-column">
					<img src="/wp-content/plugins/samsamkring-plugin/img/pig.png">
					<h3 class="surplus"></h3>
					<h4>Maandelijks gespaard</h4>
				</div>
				<div class="wp-block-column">
					<img src="/wp-content/plugins/samsamkring-plugin/img/person.png">
					<h3 class="required-income-eenmanszaak"></h3>
					<h4>Benodigd inkomen*</h4>
				</div>
			</div>
		</div>
	</div>
</div>

<p>Bij een gewenst maandinkomen bij arbeidsongeschiktheid van <strong><span id="desired-income-display" class="desired-income"></span></strong> bedraagt de maandelijkse inleg <strong><span id="montly-instalment" class="montly-instalment"></span></strong>.</p>
<p>Het maandbedrag is inclusief de kosten van een privé Premium bunq account. Je spaarbedrag bedoeld voor schenkingen en de arbodienst is <span id="health_and_safety_service" class="health_and_safety_service"></span> en de bank en administratie kosten bedragen € 23,00. Deelnemers sinds de start in juli 2018 hebben van het spaarbedrag nog <?php echo esc_html ( get_option( 'surplus_percentage', 95 ) ); ?> % (<span class="surplus"></span>) over.</p>
<p>*Indien je een eenmanszaak hebt is een maandelijks bruto inkomen van minimaal <strong><span id="required-income-eenmanszaak" class="required-income-eenmanszaak"></span></strong> benodigd en voor een BV bedraagt het minimum maandinkomen <strong><span id="required-income-bv" class="required-income-bv"></span></strong>.
<p>&nbsp;</p>

<?php
	$ob_str = ob_get_contents();
	ob_end_clean();
	return $ob_str;
}
add_shortcode( 'calculator', 'calculator_shortcode' );