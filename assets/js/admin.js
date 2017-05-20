$("#category .add-cat .alert-success").hide();
$("#category .add-cat .alert-danger").hide();
$(".bg-layer").hide();
$("#category").hide();
$("#product").hide();
$("#comment").hide();
$("#user").hide();

(function ($) {
	$('.spinner .btn:first-of-type').on('click', function() {
		$('.spinner input').val( parseInt($('.spinner input').val(), 10) + 1);
	});
	$('.spinner .btn:last-of-type').on('click', function() {
		$('.spinner input').val( parseInt($('.spinner input').val(), 10) - 1);
	});
})(jQuery);

$(document).ready(function(){

	$(".sidebar-navbar-collapse ul .statistic").click(function(e){
		e.preventDefault();
		$(".sidebar-navbar-collapse ul li").removeClass("active");
		$(this).addClass("active");
		$("#statistic").show();
		$("#product").hide();
		$("#category").hide();
		$("#user").hide();
		$("#comment").hide();
	});

	$(".sidebar-navbar-collapse ul .product").click(function(e){
		e.preventDefault();
		$(".sidebar-navbar-collapse ul li").removeClass("active");
		$(this).addClass("active");
		$("#statistic").hide();
		$("#product").show();
		$("#category").hide();
		$("#user").hide();
		$("#comment").hide();
	});
	$(".sidebar-navbar-collapse ul .category").click(function(e){
		e.preventDefault();
		$(".sidebar-navbar-collapse ul li").removeClass("active");
		$(this).addClass("active");
		$("#statistic").hide();
		$("#product").hide();
		$("#category").show();
		$("#user").hide();
		$("#comment").hide();
	});
	$(".sidebar-navbar-collapse ul .user").click(function(e){
		e.preventDefault();
		$(".sidebar-navbar-collapse ul li").removeClass("active");
		$(this).addClass("active");
		$("#statistic").hide();
		$("#product").hide();
		$("#category").hide();
		$("#user").show();
		$("#comment").hide();
	});
	$(".sidebar-navbar-collapse ul .comment").click(function(e){
		e.preventDefault();
		$(".sidebar-navbar-collapse ul li").removeClass("active");
		$(this).addClass("active");
		$("#statistic").hide();
		$("#product").hide();
		$("#category").hide();
		$("#user").hide();
		$("#comment").show();
	});

	var trigger = true;

	$("body").mousedown(function(event){
		var X = event.pageX - 320; 
    	var Y = event.pageY - 250; 

	    if(event.button == 1){
	        if (trigger === true) {
				trigger = false;
				$(".widget").css({
							position: 'fixed',
							display: 'block',
							top: Y,
							left: X,
							"z-index" : "10000"
						});
				$(".bg-layer").show();
	        } else {
	        	trigger = true;
	        	$(".widget").css({
							display: 'none'
						});
				$(".bg-layer").hide();
	        }
	    } 
	});

	$("#product .product").click(function(){
		var X = event.pageX - 60; 
    	var Y = event.pageY - 130; 

		$(".product-widget").css({
			position: 'fixed',
			display: 'block',
			top: Y,
			left: X,
			"z-index" : "1200"
		});

		$(".bg-layer").show();

		var idPrd = $(this).data("id");

		$(".product-widget li").data("id", idPrd);
	});

	$("#admin-wrapp .option2").click(function(){
		$("#myModal").show();
	});
	$(".widget .material-button-toggle").click(function(){
		$(".widget").css({
							display: 'none',
							"z-index" : "0"
						});
		$(".bg-layer").hide();
		$(".product-widget li").removeData("id");

	});
	$(".product-widget .material-button-toggle").click(function(){
		$(".product-widget").css({
							display: 'none',
							"z-index" : "0"
						});
		$("#myModal").css({
			"z-index" : "-1"
		});
		$(".bg-layer").hide();
		$(".product-widget li").removeData("id");

	});
 

	$(".product-widget option .option1").click(function(){
		alert("1");
	});
	$(".product-widget option .option2").click(function(){
		alert("2");
	});
	$(".product-widget option .option3").click(function(){
		alert("3");
	});



	$("#category .add-cat button").click(function(e){
		e.preventDefault();
		var category = $("#category .add-cat input").val();
		if (category.length !== 0) {
			$("#category .add-cat .alert-danger").hide();

			$.ajax({
				url : "http://localhost/shop/addCat",
				method: 'POST',
				data : {cat : category},

				success: function() {
					$("#category .add-cat .alert-success").show();
				} 
			});
		} else {
			$("#category .add-cat .alert-danger").show();
		}
	});

	$("#category .categor .tree .add-under-cat").click(function(){
		var underCat = prompt('Введите подкатегорию');
		var id = $(this).data('id');
		
		if (underCat.length !== 0 ) {
			$.ajax({
				url : "http://localhost/shop/addUnderCat",
				method: 'POST',
				data : {
					id : id,
					underCat : underCat
				},

				success: function() {
					$("#category .add-cat .alert-success").show();
				}
			})
		} else {
			$("#category .add-cat .alert-danger").show();
		}
	});

	$("#category .categor .tree .del-def").click(function(){
		var id = $(this).data('id');
		alert(id + "def");
	});

	$("#category .categor .tree .del-under").click(function(){
		var id = $(this).data('id');
		alert(id + "under");
	});
		
	/*
	$("#product .addUnderCategory").click(function(){
		console.log($("#product input[type='radio']:checked").val());	
		console.log($("#product input[type='file']").val());	
	});
	*/

});