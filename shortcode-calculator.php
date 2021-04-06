<?php

function calculator_shortcode( $atts ) {

	extract( shortcode_atts( array(
		'show_specification' => '',
		'show_required_income' => '',
		'slider_minimum' => '1000',
		'slider_default' => '2500',
		'slider_maximum' => '4000',
	), $atts ) );

	ob_start(); ?>

	<form class="calculator">
		<input type="range" id="desired-income" min="<?php echo esc_attr( $slider_minimum ) ?>" max="<?php echo esc_attr( $slider_maximum ) ?>" value="<?php echo esc_attr( $slider_default) ?>" step="50">
	</form>

	<div class="wp-block-columns calculator-icons">
		<div class="wp-block-column">
			<svg width="300" height="300" viewBox="0 0 300 300" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle cx="151" cy="93" r="31" fill="#FCDA45"/>
				<circle cx="151" cy="94" r="21" fill="#FBBF2B"/>
				<path fill="<?php echo get_option( 'piggybank_color', '#A12242' ); ?>" d="M254.635 160.028C253.328 151.013 249.998 142.746 245.243 135.014C236.818 121.33 225.114 111.126 211.086 103.497C192.313 93.2935 172.163 88.5053 150.82 88.6552V88.6342C150.69 88.6292 150.551 88.6392 150.418 88.6342C150.407 88.6342 150.387 88.6342 150.376 88.6342C147.267 88.5312 144.18 88.7631 141.083 88.959C128.837 89.7466 116.983 92.2691 105.552 96.6606C103.415 97.4742 102.631 97.0414 101.742 95.0645C97.8234 86.3545 91.3445 80.161 82.6344 76.2122C76.4602 73.4058 69.9391 73.02 63.3048 73C61.1619 72.995 60.5014 73.4428 60.5124 75.7185C60.6256 92.542 60.5645 109.371 60.5996 126.19C60.6056 127.76 60.2227 129.026 59.2785 130.319C55.6031 135.301 52.541 140.641 50.3519 146.436C49.7225 148.124 48.7923 148.609 47.0373 148.574C41.3582 148.466 35.6791 148.537 30 148.537V208.518C38.25 208.518 46.5111 208.554 54.7611 208.482C56.3408 208.466 57.3421 208.899 58.2612 210.243C62.6804 216.751 68.0658 222.413 74.1428 227.407C75.2895 228.354 75.6503 229.388 75.6453 230.842C75.5982 243.557 75.6142 256.277 75.6142 268.999H120.733C120.733 263.681 120.733 258.363 120.733 253.05C120.733 249.988 120.733 249.992 123.836 250.641C132.587 252.463 141.421 253.535 150.378 253.401V253.422C150.518 253.427 150.656 253.417 150.802 253.422C150.813 253.422 150.813 253.422 150.823 253.422C159.775 253.71 168.584 252.521 177.334 250.765C180.447 250.143 180.437 250.086 180.437 253.314C180.442 258.54 180.442 263.77 180.442 269H225.55C225.55 256.361 225.587 243.712 225.52 231.079C225.509 229.417 226.031 228.361 227.295 227.291C240.255 216.31 249.61 202.981 253.771 186.338C254.271 184.335 254.881 182.301 254.979 180.257C255.058 178.24 254.908 161.922 254.635 160.028Z"/>
				<path d="M150.836 213.561C149.821 213.561 148.851 213.159 148.135 212.442L127.573 191.878C126.081 190.386 126.081 187.968 127.573 186.475C129.066 184.983 131.485 184.983 132.977 186.475L147.059 200.562V135.608C147.059 133.496 148.768 131.788 150.879 131.788C152.992 131.788 154.701 133.496 154.701 135.608V200.472L168.799 186.378C170.291 184.885 172.709 184.885 174.201 186.378C175.693 187.87 175.693 190.289 174.201 191.78L153.536 212.442C152.821 213.159 151.85 213.561 150.836 213.561Z" fill="white"/>
				<circle cx="180" cy="26" r="20" fill="#FCDA45"/>
				<circle cx="180" cy="26" r="13" fill="#FBBF2B"/>
				<circle cx="130" cy="59" r="26" fill="#FCDA45"/>
				<circle cx="130" cy="59" r="17" fill="#FBBF2B"/>
			</svg>
			<p class="amount montly-payment"></p>
			<p class="amount-title"><?php _e( 'Monthly deposit', 'samsam' ); ?></p>
			<p><?php echo get_option( 'monthly_deposit_label' ); ?></p>
		</div>
		<div class="wp-block-column">
			<svg width="300" height="300" viewBox="0 0 300 300" fill="none" xmlns="http://www.w3.org/2000/svg">
				<circle cx="150" cy="73" r="31" fill="#FCDA45"/>
				<circle cx="150" cy="74" r="21" fill="#FBBF2B"/>
				<path fill="<?php echo get_option( 'piggybank_color', '#A12242' ); ?>" d="M254.635 160.028C253.328 151.013 249.998 142.746 245.243 135.014C236.818 121.33 225.114 111.126 211.086 103.497C192.313 93.2935 172.163 88.5053 150.82 88.6552V88.6342C150.69 88.6292 150.551 88.6392 150.418 88.6342C150.407 88.6342 150.387 88.6342 150.376 88.6342C147.267 88.5312 144.18 88.7631 141.083 88.959C128.837 89.7466 116.983 92.2691 105.552 96.6606C103.415 97.4742 102.631 97.0414 101.742 95.0645C97.8234 86.3545 91.3445 80.161 82.6344 76.2122C76.4602 73.4058 69.9391 73.02 63.3048 73C61.1619 72.995 60.5014 73.4428 60.5124 75.7185C60.6256 92.542 60.5645 109.371 60.5996 126.19C60.6056 127.76 60.2227 129.026 59.2785 130.319C55.6031 135.301 52.541 140.641 50.3519 146.436C49.7225 148.124 48.7923 148.609 47.0373 148.574C41.3582 148.466 35.6791 148.537 30 148.537V208.518C38.25 208.518 46.5111 208.554 54.7611 208.482C56.3408 208.466 57.3421 208.899 58.2612 210.243C62.6804 216.751 68.0658 222.413 74.1428 227.407C75.2895 228.354 75.6503 229.388 75.6453 230.842C75.5982 243.557 75.6142 256.277 75.6142 268.999H120.733C120.733 263.681 120.733 258.363 120.733 253.05C120.733 249.988 120.733 249.992 123.836 250.641C132.587 252.463 141.421 253.535 150.378 253.401V253.422C150.518 253.427 150.656 253.417 150.802 253.422C150.813 253.422 150.813 253.422 150.823 253.422C159.775 253.71 168.584 252.521 177.334 250.765C180.447 250.143 180.437 250.086 180.437 253.314C180.442 258.54 180.442 263.77 180.442 269H225.55C225.55 256.361 225.587 243.712 225.52 231.079C225.509 229.417 226.031 228.361 227.295 227.291C240.255 216.31 249.61 202.981 253.771 186.338C254.271 184.335 254.881 182.301 254.979 180.257C255.058 178.24 254.908 161.922 254.635 160.028Z"/>
				<path d="M150.699 126.78C151.715 126.78 152.685 127.181 153.4 127.898L173.962 148.462C175.454 149.954 175.454 152.372 173.962 153.865C172.468 155.357 170.05 155.358 168.558 153.865L154.476 139.778V204.732C154.476 206.844 152.767 208.553 150.656 208.553C148.543 208.553 146.834 206.844 146.834 204.732V139.868L132.737 153.963C131.245 155.455 128.826 155.455 127.334 153.963C125.843 152.47 125.843 150.051 127.334 148.56L147.999 127.898C148.715 127.182 149.686 126.779 150.699 126.78Z" fill="white"/>
			</svg>
			<p class="amount monthly-costs"></p>
			<p class="amount-title"><?php _e( 'Monthly costs', 'samsam' ); ?></p>
			<p><?php echo get_option( 'monthly_costs_label' ); ?></p>
		</div>
		<div class="wp-block-column">
			<svg width="300" height="300" viewBox="0 0 300 300" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill="<?php echo get_option( 'piggybank_color', '#A12242' ); ?>" d="M254.635 160.028C253.328 151.013 249.998 142.746 245.243 135.014C236.818 121.33 225.114 111.126 211.086 103.497C192.313 93.2935 172.163 88.5053 150.82 88.6552V88.6342C150.69 88.6292 150.551 88.6392 150.418 88.6342C150.407 88.6342 150.387 88.6342 150.376 88.6342C147.267 88.5312 144.18 88.7631 141.083 88.959C128.837 89.7466 116.983 92.2691 105.552 96.6606C103.415 97.4742 102.631 97.0414 101.742 95.0645C97.8234 86.3545 91.3445 80.161 82.6344 76.2122C76.4602 73.4058 69.9391 73.02 63.3048 73C61.1619 72.995 60.5014 73.4428 60.5124 75.7185C60.6256 92.542 60.5645 109.371 60.5996 126.19C60.6056 127.76 60.2227 129.026 59.2785 130.319C55.6031 135.301 52.541 140.641 50.3519 146.436C49.7225 148.124 48.7923 148.609 47.0373 148.574C41.3582 148.466 35.6791 148.537 30 148.537V208.518C38.25 208.518 46.5111 208.554 54.7611 208.482C56.3408 208.466 57.3421 208.899 58.2612 210.243C62.6804 216.751 68.0658 222.413 74.1428 227.407C75.2895 228.354 75.6503 229.388 75.6453 230.842C75.5982 243.557 75.6142 256.277 75.6142 268.999H120.733C120.733 263.681 120.733 258.363 120.733 253.05C120.733 249.988 120.733 249.992 123.836 250.641C132.587 252.463 141.421 253.535 150.378 253.401V253.422C150.518 253.427 150.656 253.417 150.802 253.422C150.813 253.422 150.813 253.422 150.823 253.422C159.775 253.71 168.584 252.521 177.334 250.765C180.447 250.143 180.437 250.086 180.437 253.314C180.442 258.54 180.442 263.77 180.442 269H225.55C225.55 256.361 225.587 243.712 225.52 231.079C225.509 229.417 226.031 228.361 227.295 227.291C240.255 216.31 249.61 202.981 253.771 186.338C254.271 184.335 254.881 182.301 254.979 180.257C255.058 178.24 254.908 161.922 254.635 160.028Z"/>
				<circle cx="180" cy="136" r="20" fill="#FCDA45"/>
				<circle cx="180" cy="136" r="13" fill="#FBBF2B"/>
				<circle cx="114.5" cy="164.5" r="26.5" fill="#FCDA45"/>
				<circle cx="114.5" cy="164.5" r="17.5" fill="#FBBF2B"/>
				<circle cx="154" cy="196" r="31" fill="#FCDA45"/>
				<circle cx="154" cy="197" r="21" fill="#FBBF2B"/>
			</svg>
			<p class="amount surplus"></p>
			<p class="amount-title"><?php _e( 'Monthly savings', 'samsam' ); ?></p>
			<p><?php echo get_option( 'monthly_savings_label' ); ?></p>
		</div>
<?php if ( esc_attr( $show_required_income ) == true ) { // to show required income use the shortcode [calculator show_required_income=true] ?>
		<div class="wp-block-column">
			<svg width="300" height="300" viewBox="0 0 300 300" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect x="217" y="39" width="46" height="224" fill="#D2D3D3"/>
				<rect x="217" y="97" width="46" height="166" fill="<?php echo get_option( 'piggybank_color', '#A12242' ); ?>"/>
				<path opacity="0.38" d="M229.34 106.658C231.157 106.658 232.6 106.904 233.671 107.399C234.737 107.894 235.507 108.736 235.974 109.924C236.442 111.114 236.676 112.776 236.676 114.913C236.676 117.024 236.442 118.681 235.974 119.882C235.507 121.086 234.738 121.934 233.671 122.427C232.6 122.922 231.157 123.168 229.34 123.168C227.55 123.168 226.128 122.921 225.073 122.427C224.016 121.934 223.256 121.086 222.787 119.882C222.32 118.68 222.088 117.024 222.088 114.913C222.088 112.776 222.32 111.114 222.787 109.924C223.256 108.736 224.016 107.894 225.073 107.399C226.128 106.904 227.55 106.658 229.34 106.658ZM229.34 111.027C229.021 111.027 228.78 111.093 228.62 111.227C228.459 111.36 228.351 111.702 228.3 112.249C228.245 112.796 228.219 113.685 228.219 114.913C228.219 116.143 228.245 117.032 228.3 117.58C228.352 118.127 228.459 118.469 228.62 118.602C228.78 118.735 229.02 118.802 229.34 118.802C229.688 118.802 229.942 118.735 230.104 118.602C230.263 118.469 230.376 118.127 230.443 117.58C230.51 117.033 230.545 116.144 230.545 114.913C230.545 113.685 230.51 112.796 230.443 112.249C230.376 111.702 230.263 111.36 230.104 111.227C229.941 111.093 229.688 111.027 229.34 111.027ZM249.782 107.219L234.551 134.872H229.501L244.731 107.219H249.782ZM249.941 118.921C251.757 118.921 253.199 119.17 254.27 119.662C255.336 120.157 256.106 120.999 256.573 122.187C257.042 123.377 257.276 125.04 257.276 127.179C257.276 129.29 257.042 130.946 256.573 132.148C256.106 133.35 255.337 134.198 254.27 134.693C253.199 135.186 251.757 135.434 249.941 135.434C248.149 135.434 246.727 135.185 245.672 134.693C244.618 134.198 243.855 133.35 243.388 132.148C242.921 130.946 242.687 129.29 242.687 127.179C242.687 125.04 242.921 123.377 243.388 122.187C243.855 120.999 244.618 120.157 245.672 119.662C246.728 119.169 248.149 118.921 249.941 118.921ZM249.941 123.29C249.62 123.29 249.379 123.357 249.22 123.49C249.058 123.623 248.953 123.958 248.899 124.491C248.844 125.027 248.82 125.921 248.82 127.178C248.82 128.406 248.844 129.295 248.899 129.842C248.954 130.389 249.058 130.731 249.22 130.864C249.379 130.998 249.619 131.064 249.941 131.064C250.289 131.064 250.541 130.998 250.703 130.864C250.864 130.731 250.977 130.389 251.042 129.842C251.111 129.295 251.144 128.406 251.144 127.178C251.144 125.921 251.112 125.027 251.042 124.491C250.978 123.958 250.864 123.623 250.703 123.49C250.541 123.357 250.289 123.29 249.941 123.29Z" fill="white"/>
				<path d="M85.6322 135C85.6322 135 36 135 36 184.757V263H188V194.708C188 194.708 188 135 128.44 135H85.6322V135Z" fill="#D1D3D4"/>
				<circle cx="112" cy="91" r="55" fill="#D1D3D4"/>
			</svg>
			<p class="amount required-income-eenmanszaak"></p>
			<p class="amount-title"><?php _e( 'Required income', 'samsam' ); ?></p>
			<p><?php echo get_option( 'required_income_label' ); ?></p>
		</div>
<?php } ?>
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
