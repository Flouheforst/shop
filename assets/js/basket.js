


$(document).ready(function(){
	var qwe = 0;

	$('#basket .item').each(function() {
		var res =  $(this).text().trim().replace(" руб.", "");
		res = parseInt(res);
		qwe = qwe + res;
	});
	$("#basket .result").text(qwe + " руб.");

	$(".remove-itemBasket").click(function(){
		var id = $(this).data("id");
		$.ajax({
			url : "http://localhost/shop/delItemBasket",
			method: 'POST',
			data : {id : id},

			success: function(data) {
				if (data === "1") {
					alert();
				}
			} 
		})
	});
});