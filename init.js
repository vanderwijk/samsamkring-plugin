jQuery('#desired-income').rangeslider({

	polyfill: false,

	// Default CSS classes
	rangeClass: 'rangeslider',
	disabledClass: 'rangeslider--disabled',
	horizontalClass: 'rangeslider--horizontal',
	verticalClass: 'rangeslider--vertical',
	fillClass: 'rangeslider__fill',
	handleClass: 'rangeslider__handle',

	// Callback function
	onInit: function() {
		calculate_monthly_instalment();
		calculate_required_income();
		calculate_costs();
	},

	// Callback function
	onSlide: function(position, value) {
		calculate_monthly_instalment();
		calculate_required_income();
		calculate_costs();
	},

	// Callback function
	onSlideEnd: function(position, value) {}
});

function calculate_required_income() {
	var desired_income = jQuery('#desired-income').val();

	var a4 = Math.pow(desired_income, 4);
	var a = -0.000000000037936 * a4;

	var b3 = Math.pow(desired_income, 3);
	var b = 0.00000026359 * b3;

	var c2 = Math.pow(desired_income, 2);
	var c = 0.00021489 * c2;

	var d = 0.000000000043457 * a4;
	var e = 0.00000051491 * b3;
	var f = 0.0022299 * c2;
/*
	machtsverheffen
	vermenigvuldigen
	delen
	worteltrekken
	optellen
	aftrekken
*/
	//var required_income_eenmanszaak = ( -0.000000000037936 * ( desired_income ^4 ) ) + ( 0.00000026359 * ( desired_income ^3 ) ) - ( 0.00021489 * ( desired_income ^2 ) ) + ( ( 0.79034 * desired_income) + 517.5);
	//var total_bv =                       0.000000000043457 * desired_income ^4 - 0.00000051491 * desired_income ^3 + 0.0022299 * desired_income ^2 - 1.478 * desired_income + 1132.76;
	//0,000000000043457*[Sliderwaarde]^4 - 0,00000051491*[Sliderwaarde]^3 + 0,0022299*[Sliderwaarde]^2 - 1,478*[Sliderwaarde] + 1132,76
	
	var required_income_eenmanszaak = a + b - c + 0.79034 * desired_income + 517.5;
	var required_income_bv = d - e + f - 1.478 * desired_income + 1132.76;
	numeral.locale('nl-nl');
	var required_income_eenmanszaak = numeral(required_income_eenmanszaak).format('$0,0.00');
	var required_income_bv = numeral(required_income_bv).format('$0,0.00');
	jQuery('#required-income-eenmanszaak').html(required_income_eenmanszaak);
	jQuery('#required-income-bv').html(required_income_bv);
}

function calculate_monthly_instalment() {
	var desired_income = jQuery('#desired-income').val();
	var monthly_instalment = 0.045 * desired_income + 15 + 8;
	numeral.locale('nl-nl');
	var desired_income = numeral(desired_income).format('$0,0.00');
	var monthly_instalment = numeral(monthly_instalment).format('$0,0.00');
	jQuery("#montly-instalment").html(monthly_instalment);
	jQuery("#desired-income-display").html(desired_income);
	jQuery('.rangeslider__handle').html( '<span class="desired">' + desired_income + '</span>');
}

function calculate_costs() {
	var desired_income = jQuery('#desired-income').val();
	var health_and_safety_service = 0.045 * desired_income;
	var surplus = 0.95 * desired_income * 0.045;

	numeral.locale('nl-nl');
	var health_and_safety_service = numeral(health_and_safety_service).format('$0,0.00');
	var surplus = numeral(surplus).format('$0,0.00');
	jQuery("#health_and_safety_service").html(health_and_safety_service);
	jQuery("#surplus").html(surplus);
}