<?php
  require_once 'functions.php';

  $json = array();
  $data = array();
  $request = array();


  // Get all products
  if(isset($_POST['getProducts']))
  {
    $get_prod = mysqli_query($con, "SELECT * FROM products");
    if($get_prod)
    {
      if(mysqli_num_rows($get_prod) > 0)
      {
        while($row = mysqli_fetch_assoc($get_prod))
        {
          array_push($data, $row);
        }
        $request = array("status" => "success");
        $data = array("products" => $data);
        array_push($json, $request);
        array_push($json, $data);
        print json_encode($json);
      }
    }
  }

// get a product Detail
if(isset($_POST['getPro']))
{
  $pro_id = $_POST['getPro'];
  if($pro_id == "")
  {

  }
  else
  {
    $stmt = "SELECT * FROM products WHERE product_id=?";
    $get_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($get_stmt, "s", $pro_id);
    mysqli_execute($get_stmt);
    $result = mysqli_stmt_get_result($get_stmt);
    if($result)
    {
      if(mysqli_num_rows($result) == 1)
      {
        while($row = mysqli_fetch_assoc($result))
        {
          array_push($data, $row);
        }
        $request = array("status" => "success");
        $data = array("product" => $data);
        array_push($json, $request);
        array_push($json, $data);
        print json_encode($json);
      }
    }
  }
}
