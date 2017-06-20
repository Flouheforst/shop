function openNav() {
    document.getElementById("mySidenav").style.width = "70%";
    // document.getElementById("flipkart-navbar").style.width = "50%";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.body.style.backgroundColor = "rgba(0,0,0,0)";
}
$("#basket").hide();
$("#reviews").hide();
$(document).ready(function(){
	var qwe = 0;

	$('#settings .item').each(function() {
		var res =  $(this).text().trim().replace(" руб.", "");
		res = parseInt(res);
		qwe = qwe + res;
	});

	$("#prd .reviews").click(function(){
		$(this).addClass("active");
		$("#prd .description").removeClass("active");
		$("#description").hide();
		$("#reviews").show();
	});

	$("#prd .description").click(function(){
		$(this).addClass("active");
		$("#prd .reviews").removeClass("active");
		$("#description").show();
		$("#reviews").hide();
	});
	$("#settings .result").text(qwe + " руб.");


	$(".add-basket").click(function(e){
		e.preventDefault();
		
		var idPrd = $(this).data("id");
		var price = $(this).data("price");
		
		document.getElementById("idProduct").value = idPrd;
		document.getElementById("price").value = price;
	});

	$("#settings .basket").click(function(e){
		e.preventDefault();
		$("#settings .data-user").removeClass("active");
		$(this).addClass("active");
		$("#settings #data-user").hide();
		$("#settings #basket").show();
	});

	$("#settings .data-user").click(function(e){
		e.preventDefault();
		$("#settings .basket").removeClass("active");
		$(this).addClass("active");
		$("#settings #data-user").show();
		$("#settings #basket").hide();
	});

	setTimeout(function() {
		$("#hit .form-err .alert-danger").hide();
	}, 2000);
});