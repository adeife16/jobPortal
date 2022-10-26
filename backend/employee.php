<?php
require_once "functions.php";

$json = array();
$data = array();
$req = array();


// Get all riders
if(isset($_POST['get_all_rider']))
{

  $page = 20 * $_POST['get_all_rider'];

  $get_rider = mysqli_query($con, "SELECT r.*, s.state_name, c.lga_name FROM rider r, states s, local_governments c WHERE r.state = s.id AND r.city = c.id ORDER BY r.id DESC LIMIT $page,20 ");

  if($get_rider)
  {
    if(mysqli_num_rows($get_rider) > 0)
    {
      while($row = mysqli_fetch_assoc($get_rider))
      {
        unset($row['password']);
        array_push($data, $row);
      }
    }
    shuffle($data);
    $data = array("status" => "success", "riders" => $data);
    array_push($json, $data);
    print json_encode($json);
  }
  else
  {
    print mysqli_error($con);
  }


}

// search riders
if(isset($_POST['getRider']))
{
  $state = $_POST['getRider'];
  $city = $_POST['city'];
  $page = $_POST['page'];
  if($state == "" || $city == "")
  {

  }
  else
  {
    $result = rider_search($page, $state, $city);
    if($result == 'error' || $result == 'empty')
    {
      print $result;
    }
    else
    {
      print json_encode($result);

    }
    // if(!isset($_POST['lastValue']))
    // $stmt = "SELECT r.*, s.state_name, c.lga_name FROM rider r, states s, local_governments c WHERE r.state = s.id AND r.city = c.id AND r.city = ? AND r.state = ? ";
    // $result = mysqli_query($con, "SELECT r.*, s.state_name, c.lga_name FROM rider r, states s, local_governments c WHERE r.state = s.id AND r.city = c.id AND r.city = '$city' AND r.state = '$state' ORDER BY r.id DESC  LIMIT 20 ");
    // $get_stmt = mysqli_prepare($con, $stmt);
    // mysqli_stmt_bind_param($get_stmt, 'ii', $city, $state);
    // mysqli_execute($get_stmt);
    // $result = mysqli_stmt_get_result($get_$stmt);

  //   if($result)
  //   {
  //     while($row = mysqli_fetch_assoc($result))
  //     {
  //       unset($row['password']);
  //       array_push($json, $row);
  //     }
  //     print json_encode($json);
  //   }
  //   else
  //   {
  //     print mysqli_error($con);
  //   }
  // }
}
}
// get more riders
if(isset($_POST['getMoreRiders']) && $_POST['getMoreRiders'] != "")
{

}

// get more search content
if(isset($_POST['getMoreSearch']))
{

}
