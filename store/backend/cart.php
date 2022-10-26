<?php
require_once 'functions.php';
$session_id = $_SESSION['id'];
$json = array();
$data = array();
$data2 = array();
$request = array();

// Add Product to cart
if(isset($_POST['addCart']))
{
  $pro_id = $_POST['addCart'];
  if($pro_id == "")
  {
    $request = array("status" => "error");
    array_push($json, $request);
    print json_encode($json);
  }
  else
  {
    // get product details
    $get_pro = mysqli_query($con, "SELECT * FROM products WHERE product_id= '$pro_id'");
    if($get_pro)
    {
      if(mysqli_num_rows($get_pro) == 1)
      {
        while($row = mysqli_fetch_assoc($get_pro))
        {
          $price = $row['product_price'];
          $picture = $row['picture1'];
        }
        // Check if product exist in cart
        $check_cart = mysqli_query($con, "SELECT * FROM cart WHERE product_id= '$pro_id' AND user_id='$session_id'");
        if($check_cart)
        {
          // if product exist, update qty else add product
          if(mysqli_num_rows($check_cart) == 1)
          {
            while($row = mysqli_fetch_assoc($check_cart))
            {
              $qty = $row['quantity'];
              $pro_price = $row['price'];
              $pro_picture = $row['picture'];
            }
            $qty = $qty + 1;
            $update_cart = mysqli_query($con, "UPDATE cart SET quantity = '$qty' WHERE product_id= '$pro_id' AND user_id = '$session_id'");
          }
          else
          {
            $update_cart = mysqli_query($con, "INSERT INTO cart(`product_id`, `user_id`, `price`, `picture`) VALUES('$pro_id', '$session_id', '$price', '$picture') ");
          }

          $get_cart = mysqli_query($con, "SELECT c.*, p.product_name FROM cart c, products p WHERE c.product_id = p.product_id AND user_id='$session_id'");
          if($get_cart)
          {
            $cart = array();

            if(mysqli_num_rows($get_cart) > 0)
            {
              while($row = mysqli_fetch_assoc($get_cart))
              {
                array_push($cart, $row);
              }
            }
          }
          $request = array("status" => "success");
          $cart = array("cart" => $cart);
          array_push($json, $request);
          array_push($json, $cart);
          print json_encode($json);
        }
        else
        {
          $request = array("status" => "error");
          array_push($json, $request);
          print json_encode($json);
        }

      }
      else
      {
        $request = array("status" => "invalid");
        array_push($json, $request);
        print json_encode($json);
      }
    }
    else
    {
      $request = array("status" => "error");
      array_push($json, $request);
      print json_encode($json);
    }
    // return new cart details
  }
}

if(isset($_POST['getCart']))
{
  $user_id = $_POST['getCart'];
  if($user_id != $session_id)
  {

  }
  else
  {
    $get_cart = mysqli_query($con, "SELECT c.*, p.product_name FROM cart c, products p WHERE c.product_id = p.product_id AND user_id='$session_id'");
    if($get_cart)
    {
      $cart = array();

      if(mysqli_num_rows($get_cart) > 0)
      {
        while($row = mysqli_fetch_assoc($get_cart))
        {
          array_push($cart, $row);
        }
        $request = array("status" => "success");
        $cart = array("cart" => $cart);
        array_push($json, $request);
        array_push($json, $cart);
        print json_encode($json);
      }
      else
      {
        $request = array("status" => "empty");
        array_push($json, $request);
        print json_encode($json);
      }
    }
    else
    {

    }
  }
}


// remove item from cart
if(isset($_POST['removeItem']))
{
  $pro_id = $_POST['removeItem'];
  if($pro_id == "")
  {

  }
  else
  {
    $stmt = "DELETE FROM cart WHERE product_id=?";
    $del_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($del_stmt, "s", $pro_id);
    if(mysqli_execute($del_stmt))
    {
      print "success";
    }
    else
    {
      print "error";
    }
  }
}
