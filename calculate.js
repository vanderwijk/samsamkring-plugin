jQuery('#desired-income').rangeslider({
	polyfill: false, // prevent fallback to default browser slider

	onInit: function() {
		calculate_monthly_payment();
		calculate_required_income();
		calculate_costs();
	},

	onSlide: function(position, value) {
		calculate_monthly_payment();
		calculate_required_income();
		calculate_costs();
	},

});

// calculate required income for eenmanszaak and bv
function calculate_required_income() {
	var desired_income = jQuery('#desired-income').val();

	var a = -0.000000000037936 * Math.pow(desired_income, 4);
	var b = 0.00000026359 * Math.pow(desired_income, 3);
	var c = 0.00021489 * Math.pow(desired_income, 2);

	var d = 0.000000000043457 * Math.pow(desired_income, 4);
	var e = 0.00000051491 * Math.pow(desired_income, 3);
	var f = 0.0022299 * Math.pow(desired_income, 2);

	var required_income_eenmanszaak = a + b - c + 0.79034 * desired_income + 517.5;
	var required_income_bv = d - e + f - 1.478 * desired_income + 1132.76;

	var required_income_eenmanszaak = Math.round(required_income_eenmanszaak / 100) * 100; // round to the nearest 100
	var required_income_bv = Math.round(required_income_bv / 100) * 100;

	numeral.locale('nl-nl');
	var required_income_eenmanszaak = numeral(required_income_eenmanszaak).format('$0,0');
	var required_income_bv = numeral(required_income_bv).format('$0,0');
	jQuery('.required-income-eenmanszaak').html(required_income_eenmanszaak);
	jQuery('.required-income-bv').html(required_income_bv);
}

// calculate monthly payment
function calculate_monthly_payment() {
	var desired_income = jQuery('#desired-income').val();
	var fixed_costs = Number(samsam_options.bank_costs) + Number(samsam_options.administration_costs);
	var monthly_payment = samsam_options.cost_factor * desired_income + fixed_costs;

	numeral.locale('nl-nl');
	var desired_income = numeral(desired_income).format('$0,0.00');
	var desired_income_clean = numeral(desired_income).format('$0,0');
	var fixed_costs = numeral(fixed_costs).format('$0,0.00');
	var monthly_payment = numeral(monthly_payment).format('$0,0.00');
	jQuery('.montly-payment').html(monthly_payment);
	jQuery('.desired-income').html(desired_income);
	jQuery('.fixed-costs').html(fixed_costs);
	jQuery('.rangeslider__handle').html( '<span class="desired">' + desired_income_clean + '</span>');
}

function calculate_costs() {
	var desired_income = jQuery('#desired-income').val();
	var variable_costs = samsam_options.cost_factor * desired_income; // this variable is probably wrongly named
	var surplus = ( samsam_options.surplus_percentage / 100 ) * desired_income * samsam_options.cost_factor - samsam_options.health_and_safety_service_costs;

	numeral.locale('nl-nl');
	var surplus_percentage = numeral(samsam_options.surplus_percentage / 100).format('0.0 %');
	var variable_costs = numeral(variable_costs).format('$0,0.00');
	var surplus = numeral(surplus).format('$0,0.00');
	jQuery('.variable-costs').html(variable_costs);
	jQuery('.surplus-percentage').html(surplus_percentage);
	jQuery('.surplus').html(surplus);
}