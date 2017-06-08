


$(document).ready(function(){
	var qwe = 0;

	$('#basket .item').each(function() {
		var res =  $(this).text().trim().replace(" руб.", "");
		res = parseInt(res);
		qwe = qwe + res;
	});
	$("#basket .result").text(qwe + " руб.");
});