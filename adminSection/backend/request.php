<?php
require 'functions.php';

$json = array();
$data = array();
$viewed = array();
$not_viewed = array();

// get all request
if(isset($_POST['getAllReq']))
{
  $get_req = mysqli_query($con, "SELECT * FROM employment WHERE view = 'no' ORDER BY id DESC");
  if($get_req)
  {
    while($row = mysqli_fetch_assoc($get_req))
    {
      array_push($not_viewed, $row);
    }
    $get_req = mysqli_query($con, "SELECT * FROM employment WHERE view = 'yes' ORDER BY id DESC");
    if($get_req)
    {
      while($row = mysqli_fetch_assoc($get_req))
      {
        array_push($viewed, $row);
      }
      array_push($json, array("not_viewed" => $not_viewed));
      array_push($json, array("viewed" => $viewed));
    }
    print json_encode($json);
  }
}

// get a request

if(isset($_POST['getReq']))
{
  $company = $_POST['getReq'];
  $rider = $_POST['rider'];

  $stmt = "SELECT * FROM employment WHERE rider_id = ? AND company_id = ?";
  $get_stmt = mysqli_prepare($con, $stmt);
  mysqli_stmt_bind_param($get_stmt, 'ss', $rider, $company);
  mysqli_execute($get_stmt);
  $result = mysqli_stmt_get_result($get_stmt);
  if($result)
  {
    if(mysqli_num_rows($result) == 1)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        $view = $row['view'];
        array_push($json, $row);
      }
      // set view status to yes before sending data
      if($view == 'no')
      {
        $stmt = "UPDATE employment SET view = 'yes' WHERE rider_id = ? AND company_id = ?";
        $update_stmt =  mysqli_prepare($con, $stmt);
        mysqli_stmt_bind_param($update_stmt, 'ss', $rider, $company);
        if(mysqli_execute($update_stmt))
        {
          $json = array("request" => "success", "details" => $json);
          print json_encode($json);
        }
        else
        {
          $json = array("request" => "success", "details" => null);
          // print mysqli_error($con);
        }

      }
      // if view status already yes send data
      else
      {
        $json = array("request" => "success", "details" => $json);
        print json_encode($json);
      }
    }
  }
  else
  {
    $json = array("request" => "success", "details" => $null);
    // print mysqli_error($con);
  }
}
