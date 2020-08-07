<?php

function calculator_shortcode( $atts ) {
	ob_start(); ?>

<form class="calculator">
	<label for="desired-income">Kies je gewenste maandinkomen bij arbeidsongeschiktheid</label>
	<input type="range" id="desired-income" min="1000" max="4000" value="2500" step="50">

	<p>Bij een gewenst maandinkomen bij arbeidsongeschiktheid van <strong><span id="desired-income-display"></span></strong> bedraagt de maandelijkse inleg <strong><span id="montly-instalment"></span>*</strong>.</p>
	<p>Indien je een eenmanszaak hebt is hiervoor is een maandelijks bruto inkomen van minimaal <strong><span id="required-income-eenmanszaak"></span></strong> benodigd en voor een BV bedraagt het minimum maandinkomen <strong><span id="required-income-bv"></span></strong>.
	<p>*Het maandbedrag is inclusief de kosten van een privé Premium bunq account. Je spaarbedrag bedoeld voor schenkingen en de arbodienst is <span id="health_and_safety_service"></span> en de bank en administratie kosten bedragen € 23,00. Deelnemers sinds de start in juli 2018 hebben van het spaarbedrag nog <?php echo esc_html ( get_option( 'surplus_percentage', 95 ) ); ?> % (<span class="surplus"></span>) over.</p>

</form>

<div style="background-color:var(--paletteColor5);padding-left:7%;padding-right:7%;padding-bottom:3%;padding-top:3%" class="wp-block-atomic-blocks-ab-container nomarginbottom ab-block-container alignfull">
	<div class="ab-container-inside">
		<div class="ab-container-content" style="max-width:1290px">
			<div class="wp-block-columns has-3-columns">
				<div class="wp-block-column">
					<div class="wp-block-premium-countup premium-countup__wrap" style="justify-content:center;flex-direction:column;box-shadow:0px 0px 0px undefined ;background-image:url('undefined');background-repeat:no-repeat;background-position:top center;background-size:auto;background-attachment:unset;border:none;border-width:1px;border-radius:0px">
						<div class="premium-countup__icon_wrap" style="margin-right:0;margin-left:0;align-self:center">
							<i class="premium-countup__icon dashicons dashicons-groups"
								style="font-size:40px;color:var(--paletteColor2)"></i></div>
						<div class="premium-countup__info" style="align-self:center">
							<div class="premium-countup__desc">
								<p class="premium-countup__increment" data-interval="1000" data-delay="10"
									style="font-size:30px;font-family:Roboto;color:var(--paletteColor2);font-weight:900">
									1911</p>
								<p class="premium-countup__suffix"
									style="font-size:20px;font-family:Roboto;color:var(--paletteColor2);margin-left:3px">
									deelnemers</p>
							</div>
						</div>
						<h3 class="premium-countup__title"
							style="font-size:16px;font-family:Merriweather Sans;margin-top:1px;margin-bottom:1px;letter-spacing:undefinedpx;font-weight:500;text-transform:none;align-self:center">
							in vijf groepen, SamSamkring, AOV Bouw (2 en 5 jaar) en AOV Profs (2 en 5 jaar).</h3>
					</div>
				</div>

				<div class="wp-block-column">
					<div class="wp-block-premium-countup premium-countup__wrap"
						style="justify-content:center;flex-direction:column;box-shadow:0px 0px 0px undefined ;background-image:url('undefined');background-repeat:no-repeat;background-position:top center;background-size:auto;background-attachment:unset;border:none;border-width:1px;border-radius:0px">
						<div class="premium-countup__icon_wrap" style="margin-right:0;margin-left:0;align-self:center">
							<i class="premium-countup__icon fa fa- fa-stethoscope"
								style="font-size:40px;color:var(--paletteColor2)"></i></div>
						<div class="premium-countup__info" style="align-self:center">
							<div class="premium-countup__desc">
								<p class="premium-countup__increment" data-interval="1000" data-delay="10"
									style="font-size:30px;font-family:Roboto;color:var(--paletteColor2);font-weight:900">
									0.4</p>
								<p class="premium-countup__suffix"
									style="font-size:20px;font-family:Roboto;color:var(--paletteColor2);margin-left:3px">
									% zieke deelnemers</p>
							</div>
						</div>
						<h3 class="premium-countup__title"
							style="font-size:16px;font-family:Merriweather Sans;margin-top:1px;margin-bottom:1px;letter-spacing:undefinedpx;font-weight:500;text-transform:none;align-self:center">
							die schenkingen hebben ontvangen in de afgelopen 22 maanden in SamSamkring. </h3>
					</div>
				</div>

				<div class="wp-block-column">
					<div class="wp-block-premium-countup premium-countup__wrap"
						style="justify-content:center;flex-direction:column;box-shadow:0px 0px 0px undefined ;background-image:url('undefined');background-repeat:no-repeat;background-position:top center;background-size:auto;background-attachment:unset;border:none;border-width:1px;border-radius:0px">
						<div class="premium-countup__icon_wrap" style="margin-right:0;margin-left:0;align-self:center">
							<i class="premium-countup__icon fa fa- fa-eur"
								style="font-size:40px;color:var(--paletteColor2)"></i></div>

							<p style="font-size: 30px; font-family: Roboto; color:var(--paletteColor2); font-weight: 900; margin-bottom: 10px;" class="surplus"></p>

						<h3 style="font-size: 16px; font-family: Merriweather Sans; margin-top: 1px; margin-bottom: 1px; font-weight: 500; align-self: center;">
							gespaard van inleg in de afgelopen 22 maanden in SamSamkring.
						</h3>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php
	$ob_str = ob_get_contents();
	ob_end_clean();
	return $ob_str;
}
add_shortcode( 'calculator', 'calculator_shortcode' );