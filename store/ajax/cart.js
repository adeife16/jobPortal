function addCart(pro_id){
  if(pro_id === "" || pro_id === null){

  }
  else{
    $.ajax({
      url: 'backend/cart.php',
      type: 'POST',
      data: {addCart: pro_id}
    })
    .done(function(response) {
      data = JSON.parse(response);
      if(data[0].status === "success"){
        alert_success("Added to cart");
        showCart(data[1].cart);
      }
      else{
        alert_failure("Unable to add to cart please contact admin");
      }
    })
    .fail(function() {
      console.log("error");
    })

  }
}


function getCart(userId){
  $.ajax({
    url: 'backend/cart.php',
    type: 'POST',
    cache: false,
    data: {getCart: userId}
  })
  .done(function(response) {
    data = JSON.parse(response);
    if(data[0].status === "success"){
      showCart(data[1].cart);
    }
    else if(data[0].status === "empty"){
      sessionStorage.setItem("cartItems", 0);
      $("#display-cart").html('<h2 class="blue color-white text-center">Cart is Empty</h2>');
      $("#gross-total").html('&#8358;'+0)
      $(".cart-tag").html(sessionStorage.getItem("cartItems"));

    }
    else{
      $("#display-cart").html('<h2 class="blue color-white text-center">Cart is Empty</h2>');
      $("#gross-total").html('&#8358;'+0)
    }
  })
  .fail(function() {
    console.log("error");
  })

}


// remove item from cart
function removeFromCart(id){
  if(id === "" || id === null){

  }
  else{
    $.ajax({
      url: 'backend/cart.php',
      type: 'POST',
      data: {removeItem: id}
    })
    .done(function(response) {
      if(response === "success"){
        var sessionId = sessionStorage.getItem("session_id");
        getCart(sessionId);
      }
      else{

      }
    })
    .fail(function() {
      console.log("error");
    })

  }
}
