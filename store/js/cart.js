// add to cart
$(document).on('click', "#add-to-cart", function(e){
  e.preventDefault();
  var product_id = $(this).val();
  addCart(product_id)
})

// display cart
function showCart(data){
  if(data === "" || data === null){

  }
  else{
    $(".cart-tag").html(data.length);
    var total = '';
    var grossTotal = '';
    // update cart modal
    $("#display-cart").html("");
    grossTotal = 0;
    for(var i=0; i<=data.length; i++){
      total = data[i].price * data[i].quantity;
      grossTotal += total;
      $("#display-cart").append
      (`<div class="cart-item">
          <span class="remove-item color-red" id="remove_`+i+`"><button class="btn">X</button></span>
          <input type="hidden" value="`+data[i].product_id+`" id="pro_`+i+`">
          <img src="images/products/`+data[i].picture+`" class="p-2 m-2">
          <h5 class="p-2 m-2 color-blue">`+data[i].product_name+`</h5>
          <div class="p-2 m-2"> <span class="color-blue" style="font-weight: bold">Price: &#8358;<span class="price_`+i+`">`+data[i].price+`</div>
          <div class="p-2 m-2"> <span class="color-blue" style="font-weight: bold">Quantity:<input type="number" class="cart-input" id="cart_`+i+`" value="`+data[i].quantity+`"></div>
          <div class="p-2 m-2"> <span class="color-red total_`+i+`" style="font-weight: bold">Total: <span id="total_`+i+`">`+total+`</div>
        </div>
        <hr>
      `)
      sessionStorage.setItem("cartItems", i+1);
      $("#gross-total").html('&#8358;'+grossTotal)
    }
    console.log(grossTotal);
  }
}

// Change Item Quantity
$(document).on('change', '.cart-input', function(){
  var id = $(this).attr("id");
  id = id.split('_')
  cartNum = id[1];
  var qty = $(this).val();
  var price = $(".price_"+cartNum).html()
  var newTotal = $("#total_"+cartNum).html(qty * price);
  var grossTotal = 0;
  var total;
  var cartItems =   sessionStorage.getItem("cartItems");
  for(var i = 0; i < cartItems; i++){
    total = $("#total_"+i).html();
    grossTotal += parseInt(total);
    console.log(grossTotal);
  $("#gross-total").html('&#8358;'+grossTotal)
  }
})

// remove item from cart
$(document).on('click', '.remove-item', function(){
  var itemId = $(this).attr("id");
  itemId = itemId.split('_');
  itemId = itemId[1];
  var cartItem = $("#pro_"+itemId).val()
  removeFromCart(cartItem)
})

// checkout
$("#checkout").click(function(e){
  e.preventDefault();

})
