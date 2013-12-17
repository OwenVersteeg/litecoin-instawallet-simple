function calculateWithdrawal(minFee, precision)
{
    var amount = parseFloat(parseFloat(document.getElementById("amount").value).toFixed(precision));
    var fee = amount * 0.02;
	fee = Math.max(isNaN(fee) ? 0 : fee, parseFloat(minFee));
	
	var calc = parseFloat(parseFloat(amount + fee).toFixed(precision));

	var temp = isNaN(calc) ? "" : calc.toString();
	document.getElementById("totalfunds").value = temp;
	document.getElementById("transferfee").value = fee;
}