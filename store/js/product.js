// get product id fron url
const url = window.location.href;
function getProId(string){
	var split_string = string.split('?');
	split_string = split_string[1];
	split_string = split_string.split('=');
	return split_string[1];
}
$(document).ready(function() {
  var owl = $('#product-carousel');
  owl.owlCarousel({
    nav: false,
    dots: false,
    items: 1,
    loop: true,
    navText: ["&#xf007","&#xf006"],
    autoplay: true,
    autoplayTimeout: 3000
  });
  var proId = getProId(url);
  if(proId === "" || proId === null){

  }
  else{
    getPro(proId);
  }
});

// display product details
function showPro(data){
	gallery(data.picture1, data.picture2, data.picture3);
	console.log(data);
	if(data.stock === "in"){
		var stock = 'In Stock';
		var cart = '<button type="button" name="add-to-cart" class="btn blue color-white add-to-cart" id="add-to-cart" value="'+data.product_id+'"><i class="icon ion-android-cart"></i>Add to Cart</button>';
	}
	else{
		var stock = 'Out of Stock';
		var cart = '<p><h4 class="color-blue">Out of Stock</p>';
	}
	$("#product-details").html
	(`
		<tr>
			<td>Product Name</td>
			<td><h4>`+data.product_name+`</h4></td>
		</tr>
		<tr>
			<td>Product Price</td>
			<td><h4>&#8358;`+data.product_price+`</h4></td>
		</tr>
		<tr>
			<td>Description</td>
			<td>`+data.product_desc+`</td>
		</tr>
		<tr>
			<td>Stock</td>
			<td>`+stock+`</td>
		</tr>
		<tr colspan="2">
			<td>`+cart+`</td>
		</tr>

	`)
}


// product lightbox
function gallery(img1, img2, img3){

	$("#thumbnail1, #display-image").attr('src', "images/products/"+img1)
	$("#thumbnail2").attr('src', "images/products/"+img2)
	$("#thumbnail3").attr('src', "images/products/"+img3)

}

function showImage(image){
	image = image.src;
	$("#display-image").attr('src', image)
}
function openModal(image) {
	image = image.src;
  // document.getElementById("myModal").style.display = "block";
  $("#zoom-image").attr('src', image);
}
