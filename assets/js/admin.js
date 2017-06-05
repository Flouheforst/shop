$("#category .add-cat .alert-success").hide();
$("#category .add-cat .alert-danger").hide();

$(".bg-layer").hide();
$("#category").hide();
$("#product").hide();
$("#comment").hide();
$("#user").hide();
$(".user-deleted").hide();
$("#feedback").hide();

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
		$("#feedback").hide();
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
		$("#feedback").hide();

	});

	$(".sidebar-navbar-collapse ul .feedback").click(function(e){
		e.preventDefault();
		$(".sidebar-navbar-collapse ul li").removeClass("active");
		$(this).addClass("active");
		$("#statistic").hide();
		$("#product").hide();
		$("#category").hide();
		$("#feedback").show();
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
		$("#feedback").hide();

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
		$("#feedback").hide();

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
		$("#feedback").hide();

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

	$("#admin-wrapp .option1").click(function(){
		var id = $(".product-widget li").data("id");

		$.ajax({
			url : "http://localhost/shop/delProduct",
			method: 'POST',
			data : {id : id},

			success: function(data) {
				if (data === "success") {
					alert("Товар удален");
					$(".product-widget").css({
							display: 'none'
						});
					$(".bg-layer").hide();
				}
			} 
		})
	});


	$("#admin-wrapp .option2").click(function(){
		alert($(".product-widget li").data("id"));
	});

	$("#admin-wrapp .option3").click(function(){
		var idSee = $(".product-widget li").data("id");

		$.ajax({
			url : "http://localhost/shop/seeProduct",
			method: 'POST',
			data : {id : idSee},

			success: function(data) {
				var data = $.parseJSON(data);
				console.log(data[0]["id"]);
				window.location.href = "http://localhost/shop/admin/Product?id=" + data[0]["id"] + "&articul=" + data[0]["vendor_code"];
				
			} 
		})
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

	$("#user .del-user").click(function(){
		var idClient = $(this).data("idclient");

		$.ajax({
			url : "http://localhost/shop/delUser",
			method: 'POST',
			data : {
				idClient : idClient
				},

			success: function() {
				$(".user-deleted").show();
				setTimeout(function() {
					$(".user-deleted").hide();
				}, 2000);
			}
		})
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

		$.ajax({
			url : "http://localhost/shop/del-def",
			method: 'POST',
			data : {
				defCat : id
			},

			success: function(data) {

				$("#category .add-cat #category").show();
				setTimeout(function() {
					$("#category .add-cat #category").hide();
				}, 2000);
			}
		})
		
	});

	$("#category .categor .tree .del-under").click(function(){
		var id = $(this).data('id');

		$.ajax({
			url : "http://localhost/shop/del-under",
			method: 'POST',
			data : {
				defUnder : id
			},

			success: function(data) {
				if (data === "success") {
					$("#category .add-cat #category").show();
					setTimeout(function() {
						$("#category .add-cat #category").hide();
					}, 2000);
				}
				
			}
		})
	});
		
	/*
	 
	$("#product .addUnderCategory").click(function(){
		console.log($("#product input[type='radio']:checked").val());	
		console.log($("#product input[type='file']").val());	
	});
	*/
	$("#statistic .product").click(function(){
		var product = $(this).data("product");

		$.ajax({
			url : "http://localhost/shop/admin/product",
			method: 'POST',
			data : {
				product : product
			},

			success: function(data) {
				var data = $.parseJSON(data);
				if (data.status === "ok") {
					$('#statistic .item-stat').empty();
					var out = '';
					var btn = "";
					btn += "<div class='col-lg-12'>";
					btn += "<a class='back' href='http://localhost/shop/admin'>Назад <i class='fa fa-arrow-left' aria-hidden='true'></i></a>";
					btn += "</div>";

					for(val in data.resProduct){
						var products = data.resProduct[val];

						out += '<div class="col-lg-3" >';
						out += '<a href="#">';
						out += '<div class="products" data-id="  ">';
						out += '<p class="vendor_code">' + products["vendor_code"] + '</p>';
						out += '<p class="name"><a href="">' + products["name"] + ': </a></p>';
						out += '<div class="img-wrap">';
						out += '<img class="img-responsive" src="' + products["photo"] + '">';
						out += '</div>';
						out += '<p class="price">Цена: ' + products["price"] + ' <span><i class="fa fa-rub" aria-hidden="true"></i></span> </p>';
						out += '<p class="quantity">Кол-во: <span>' + products["quantity"] + '</span></p>';
						out += '<p class="hover-list">Бренд: <span>' + products["brand"] + '</span></p>';
						out += '<p class="hover-list">Размер: <span>' + products["dimensions"] + '</span></p>';
						out += '</div>';
						out += '</a>';
						out += '</div>';
					}
					
					$('#statistic .item-stat').append(btn);
					$('#statistic .item-stat').append(out);
				} else {
					alert("Ничего не найдено");
				}
			}
		})
	});

	$("#statistic .getUser").click(function(){
		$.ajax({
			url : "http://localhost/shop/getUser",
			method: 'POST',

			success: function(data) {
				var data = $.parseJSON(data);
				if (data.status === "ok") {
					
					$('#statistic .item-stat').empty();
					var out = '';
					var btn = "";
					btn += "<div class='col-lg-12'>";
					btn += "<a class='back' href='http://localhost/shop/admin'>Назад <i class='fa fa-arrow-left' aria-hidden='true'></i></a>";
					btn += "</div>";

					out+= "<div class='col-lg-12'>";
					out+= "<table class='table'>";
					out+= "<thead>";
					out+= "<tr>";
					out+= "<th>#id</th>";
					out+= "<th>Email</th>";
					out+= "<th>Ф.И.О</th>";
					out+= "<th style='width: 36px;'></th>";
					out+= "</tr>";
					out+= "</thead>";
					for(val in data.allClient){
						var products = data.allClient[val];
						console.log(products);
					
						out+= "<tbody>";
						out+= "<tr data-idClient=''>";
						out+= "<td># " + products["idclient"] + "</td>";
						out+= "<td>" + products["email"] + "</td>";
						out+= "<td>" + products["full_name"] + "</td>";
						out+= "<td>";
						out+= "</td>";
						out+= " </tr>";
						out+= "</tbody>";
					}
					out+= " </table>";
					out+= " </div>";

					
					$('#statistic .item-stat').append(btn);
					$('#statistic .item-stat').append(out);


				}
			}
		})
	});
});