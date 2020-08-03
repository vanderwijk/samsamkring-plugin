function calculate_required_income() {
	var x = jQuery('#desired-income').val();
	var a = -0.000000000037936 * x;
	var a4 = Math.pow(a, 4);
	var b = 0.00000026359 * x;
	var b3 = Math.pow(b, 3);
	var c = 0.00021489 * x;
	var c2 = Math.pow(c, 2);
	var total_eenmanszaak = -0.000000000037936 * x ^4 + 0.00000026359 * x ^3 - 0.00021489 * x ^2 + 0.79034 * x + 517.5;
	//var total_bv = 0.000000000043457 * x ^4 - 0.00000051491 * x ^3 + 0.0022299 * x ^2 - 1.478 * x + 1132.76;
	//var total = a4 + b3 - c2 + 0.79034 * x + 517.5;
	jQuery('#required-income-display').html(total_eenmanszaak);
}

function calculate_monthly_instalment() {
	var x = jQuery('#desired-income').val();
	var total = 0.045 * x + 15
	jQuery("#montly-instalment").html(Number(total).toFixed(2));
	jQuery('#desired-income-display').html(x);
}

jQuery('#desired-income').on('change keyup paste', function () {
	calculate_monthly_instalment();
	calculate_required_income();
});