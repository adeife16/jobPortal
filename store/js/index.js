$(document).ready(function() {
  getProducts();
});

// Display Products
function showProducts(data){
  if(data === "" || data === null){
    $("#pro-display").html("<h1>No Product In Stock Please Check Later</h1>");
  }
  else{
    $("#pro-display").html("")
    for(var i=0; i<=data.length; i++){
      var cart = '';
      if(data[i].stock === "in"){
        cart = `<div class="cart text-center">
                  <button type="button" name="add-to-cart" class="btn blue color-white add-to-cart" id="add-to-cart" value="`+data[i].product_id+`"><i class="icon ion-android-cart"></i>Add to Cart</button>
              </div>`
      }
      else{
        cart = `<div class="cart text-center">
                  <p><h4 class="color-blue">Out of Stock</p>
              </div>`
      }
      $("#pro-display").append(`<div class="col-lg-3 col-sm-6">
                  <div class="single_ads_card mt-30">
                    <div class="ads_card_image">
                      <a href="product_details.php?pro_id=`+data[i].product_id+`">
                        <img src="images/products/`+data[i].picture1+`">
                      </a>
                    </div>
                    <div class="ads_card_content">
                      <div class="meta d-flex justify-content-between">
                      </div>
                      <h4 class="title">
                      <a href="product_details.php?pro_id=`+data[i].product_id+`" class="color-purple">`+data[i].product_name+`</a></h4>
                      <div class="ads_price_date d-flex justify-content-between">
                        <span class="color-purple price">&#8358;`+data[i].product_price+`</span>
                      </div>
                      `+cart+`
                    </div>
                  </div>
                </div>`);
    }
  }
}
