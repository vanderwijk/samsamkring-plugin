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
	},

	// Callback function
	onSlide: function(position, value) {
		calculate_monthly_instalment();
		calculate_required_income();
	},

	// Callback function
	onSlideEnd: function(position, value) {}
});

function calculate_required_income() {
	var desired_income = jQuery('#desired-income').val();
	var a = -0.000000000037936 * desired_income;
	var a4 = Math.pow(a, 4);
	var b = 0.00000026359 * desired_income;
	var b3 = Math.pow(b, 3);
	var c = 0.00021489 * desired_income;
	var c2 = Math.pow(c, 2);
	var required_income_eenmanszaak = -0.000000000037936 * desired_income ^4 + 0.00000026359 * desired_income ^3 - 0.00021489 * desired_income ^2 + 0.79034 * desired_income + 517.5;
	//var total_bv = 0.000000000043457 * desired_income ^4 - 0.00000051491 * desired_income ^3 + 0.0022299 * desired_income ^2 - 1.478 * desired_income + 1132.76;
	//var total = a4 + b3 - c2 + 0.79034 * desired_income + 517.5;
	numeral.locale('nl-nl');
	var required_income_eenmanszaak = numeral(required_income_eenmanszaak).format('$0,0.00');
	jQuery('#required-income-eenmanszaak').html(required_income_eenmanszaak);
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