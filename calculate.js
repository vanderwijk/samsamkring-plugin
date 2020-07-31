function calculate_required_income() {
	var x = jQuery('#desired-income').val();
	var a = -0.000000000037936 * x;
	var a4 = Math.pow(a, 4);
	var b = 0.00000026359 * x;
	var b3 = Math.pow(b, 3);
	var c = 0.00021489 * x;
	var c2 = Math.pow(c, 2);
	//var total = -0.000000000037936 * x ^4 + 0.00000026359 * x ^3 - 0.00021489* x ^2 + 0.79034*x + 517.5;
	var total = a4 + b3 - c2 + 0.79034 * x + 517.5;
	jQuery('#montly-instalment').val(total);
}

function calculate_monthly_instalment() {
	var x = jQuery('#desired-income').val();
	var total = 0.045 * x + 15
	jQuery("#montly-instalment").val(Number(total).toFixed(2));
	jQuery('#desired-income-display').html(x);
}

jQuery('#desired-income').on('change keyup paste', function () {
	calculate_monthly_instalment();
});