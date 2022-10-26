<?php
require_once 'functions.php';
$json = array();
$data = array();
$rating = array();
$session_rating = array();

$session_id = $_SESSION['id'];
$session_type = $_SESSION['session_type'];


// get profile details
if(isset($_POST['getProfile']) && $_POST['getProfile'])
{
  $user_id = $_POST['getProfile'];
  $user_type = $_POST['userType'];


  if($user_id == "" || $user_type == "")
  {

  }
  else
  {
    // profile details for company
    if($user_type == "company")
    {
      $stmt = "SELECT c.*, l.lga_name, s.state_name FROM company c, local_governments l, states s WHERE c.city = l.id AND c.state = s.id AND company_id = ?";
      $get_stmt = mysqli_prepare($con, $stmt);
      mysqli_stmt_bind_param($get_stmt, 's', $user_id);
      mysqli_execute($get_stmt);
      $result = mysqli_stmt_get_result($get_stmt);
      if($result)
      {
        while($row = mysqli_fetch_assoc($result))
        {
          unset($row['password']);
          array_push($data, $row);
        }
        $data = array("user_details" => $data);
        $request = array("employ_request" => "not sent", 'employ_status' => null);
        array_push($json, $data);
        array_push($json, $request);

        // get rating details for company
        $stmt2 = "SELECT s.*, r.first_name, r.last_name, r.picture FROM rating s, employee r WHERE s.rater_id = r.employee_id AND s.user_id = ?";
        // $stmt2 = "SELECT * FROM `rating` WHERE `user_id` = ?";
        $get_stmt2 = mysqli_prepare($con, $stmt2);
        mysqli_stmt_bind_param($get_stmt2, 's', $user_id);
        mysqli_execute($get_stmt2);
        $result2 = mysqli_stmt_get_result($get_stmt2);
        if($result2)
        {
          // if ratings exist
          if(mysqli_num_rows($result2) > 0)
          {
            while($row2 = mysqli_fetch_assoc($result2))
            {
              array_push($rating, $row2);
            }
            $rating = array("ratings" => $rating);
            array_push($json, $rating);

            $stmt3 = "SELECT * FROM rating WHERE `user_id` = ? AND `rater_id` = ?";
            $get_stmt3 = mysqli_prepare($con, $stmt3);
            mysqli_stmt_bind_param($get_stmt3, 'ss', $user_id, $session_id);
            mysqli_execute($get_stmt3);
            $result3 = mysqli_stmt_get_result($get_stmt3);
            if($result3)
            {
              // print_r($result3);
              if(mysqli_num_rows($result3) == 1)
              {
                $session_rating = array('session_rating' => "rated");
              }
              else
              {
                $session_rating = array('session_rating' => "not rated");
              }
            }
            else
            {

            }
            array_push($json, $session_rating);
            print json_encode($json);
          }
          else
          {
            $session_rating = array('session_rating' => "not rated");
            $rating = array("ratings" => null);
            array_push($json, $rating);
            array_push($json, $session_rating);
            print json_encode($json);
          }
        }
      }
    }


    // profile details for employee
    elseif($user_type == "employee")
    {

      $stmt = "SELECT r.*, l.lga_name, s.state_name FROM employee r, local_governments l, states s WHERE r.city = l.id AND r.state = s.id AND employee_id = ?";
      $get_stmt = mysqli_prepare($con, $stmt);
      mysqli_stmt_bind_param($get_stmt, 's', $user_id);
      mysqli_execute($get_stmt);
      $result = mysqli_stmt_get_result($get_stmt);
      if($result)
      {
        while($row = mysqli_fetch_assoc($result))
        {
          unset($row['password']);
          array_push($data, $row);
        }
        $json = array("request" => "success", "user_details" => $data);
      }
      else
      {
        $json = array("request" => mysqli_error($con));
      }
      print json_encode($json);
    }
  }
}
// employment request

if(isset($_POST['employRequest']) && $_POST['employRequest'] != "")
{
  $user = $_POST['employRequest'];

  $stmt = "SELECT r.first_name, r.last_name, c.company_name from employee r, company c WHERE r.employee_id = ? AND c.company_id = ? ";
  $select_stmt = mysqli_prepare($con, $stmt);
  mysqli_stmt_bind_param($select_stmt, "ss", $user, $session_id);
  mysqli_execute($select_stmt);
  $result = mysqli_stmt_get_result($select_stmt);
  if($result)
  {
    while($row = mysqli_fetch_assoc($result))
    {
      $employee_name = $row['first_name'] .' '. $row['last_name'];
      $company_name = $row['company_name'];
    }


    $stmt = "INSERT INTO employment(employee_id, company_id, employee_name, company_name, date_issued) VALUES(?,?,?,?,NOW())";
    $insert_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($insert_stmt, "ssss", $user, $session_id, $employee_name, $company_name);
    if(mysqli_execute($insert_stmt))
    {
      print "success";
    }
    else
    {
      print mysqli_error($con);
    }
  }
  else
  {
    print mysqli_error($con);
  }
}

// employment request cancel
if(isset($_POST['cancelRequest']) && $_POST['cancelRequest'] != "")
{
  $user = $_POST['cancelRequest'];
  $stmt = "DELETE FROM employment WHERE employee_id = ? AND company_id = '$session_id'";
  $delete_stmt = mysqli_prepare($con, $stmt);
  mysqli_stmt_bind_param($delete_stmt, 's', $user);
  if(mysqli_execute($delete_stmt))
  {
    print "success";
  }
  else
  {
    print "error";
  }
}
