function openNav() {
    document.getElementById("mySidenav").style.width = "70%";
    // document.getElementById("flipkart-navbar").style.width = "50%";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.body.style.backgroundColor = "rgba(0,0,0,0)";
}

$(document).ready(function(){
	$(".add-basket").click(function(e){
		e.preventDefault();
		
		var idPrd = $(this).data("id");
		var price = $(this).data("price");
		
		document.getElementById("idProduct").value = idPrd;
		document.getElementById("price").value = price;
	});

	
});