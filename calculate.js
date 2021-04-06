jQuery( document ).ready(function($) {

	$('#desired-income').rangeslider({
		polyfill: false, // prevent fallback to default browser slider

		onInit: function() {
			samsam_check();
		},
		onSlide: function(position, value) {
			samsam_check();
		},

	});
});

// calculate required income for eenmanszaak and bv
function samsam_check() {
	var desired_income = jQuery('#desired-income').val();

	var a = -0.000000000037936 * Math.pow(desired_income, 4);
	var b = 0.00000026359 * Math.pow(desired_income, 3);
	var c = 0.00021489 * Math.pow(desired_income, 2);

	var d = 0.000000000043457 * Math.pow(desired_income, 4);
	var e = 0.00000051491 * Math.pow(desired_income, 3);
	var f = 0.0022299 * Math.pow(desired_income, 2);

	// calculate required income
	var required_income_eenmanszaak = a + b - c + 0.79034 * desired_income + 517.5;
	var required_income_bv = d - e + f - 1.478 * desired_income + 1132.76;

	var required_income_eenmanszaak = Math.round(required_income_eenmanszaak / 100) * 100; // round to the nearest 100
	var required_income_bv = Math.round(required_income_bv / 100) * 100;

	// calculate fixed costs
	var fixed_costs = Number(samsam_options.bank_costs) + Number(samsam_options.administration_costs);
	var monthly_payment = samsam_options.cost_factor * desired_income + fixed_costs;

	var variable_costs = samsam_options.cost_factor * desired_income; // this variable is probably wrongly named
	var surplus = ( samsam_options.surplus_percentage / 100 ) * desired_income * samsam_options.cost_factor - samsam_options.health_and_safety_service_costs;
 
	var monthly_costs = monthly_payment - surplus;

	numeral.locale('nl-nl');

	var surplus_percentage = numeral(samsam_options.surplus_percentage / 100).format('0.0 %');
	var variable_costs = numeral(variable_costs).format('$0,0.00');
	var surplus_formatted = numeral(surplus).format('$0,0.00');
	var monthly_costs_formatted = numeral(monthly_costs).format('$0,0.00');

	var desired_income_formatted = numeral(desired_income).format('$0,0.00');
	var desired_income_formatted_clean = numeral(desired_income).format('$0,0');
	var fixed_costs_formatted = numeral(fixed_costs).format('$0,0.00');
	var monthly_payment_formatted = numeral(monthly_payment).format('$0,0.00');

	var required_income_eenmanszaak_formatted = numeral(required_income_eenmanszaak).format('$0,0');
	var required_income_bv_formatted = numeral(required_income_bv).format('$0,0');

	jQuery('.required-income-eenmanszaak').html(required_income_eenmanszaak_formatted);
	jQuery('.required-income-bv').html(required_income_bv_formatted);

	jQuery('.montly-payment').html(monthly_payment_formatted);
	jQuery('.desired-income').html(desired_income_formatted);
	jQuery('.fixed-costs').html(fixed_costs_formatted);
	jQuery('.rangeslider__handle').html( '<span class="desired">' + desired_income_formatted_clean + '</span>');

	jQuery('.variable-costs').html(variable_costs);
	jQuery('.surplus-percentage').html(surplus_percentage);
	jQuery('.surplus').html(surplus_formatted);
	jQuery('.monthly-costs').html(monthly_costs_formatted);

}