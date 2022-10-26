<?php
require_once 'functions.php';
// session_start();
$json = array();
$data = array();

$session_id = $_SESSION['id'];
$session_type = $_SESSION['session_type'];

// Rate user
if (isset($_POST['rate']))
{
  $rating = $_POST['rate'];
  $review = $_POST['review'];
  $user_id = $_POST['userId'];
  $user_type = $_POST['type'];

  if($rating == "" || $review == "")
  {

  }
  else
  {
    $stmt = "INSERT INTO rating(user_id, rater_id, rating, comment, date_rated) VALUES(?,?,?,?,NOW())";
    $insert_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($insert_stmt, 'ssis', $user_id, $session_id, $rating, $review);
    if(mysqli_execute($insert_stmt))
    {
      $stmt = "SELECT rating FROM rating WHERE user_id = ?";
      $get_stmt = mysqli_prepare($con, $stmt);
      mysqli_stmt_bind_param($get_stmt, 's', $user_id);
      mysqli_execute($get_stmt);
      $result = mysqli_stmt_get_result($get_stmt);
      if($result)
      {
        $rate = 0;
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_assoc($result))
          {
            array_push($data, $row);
          }
          for($i = 0; $i < count($data); $i++)
          {
            array_push($json, $data[$i]['rating']);
          }
          $sum = array_sum($json);

          $number =  mysqli_num_rows($result);

          $avg_rating = $sum / $number;
          if($user_type == 'employee')
          {
            $stmt = "UPDATE employee SET avg_rating = ? WHERE employee_id = ?";
          }
          else
          {
            $stmt = "UPDATE company SET avg_rating = ? WHERE company_id = ?";
          }
          $update_stmt = mysqli_prepare($con, $stmt);
          mysqli_stmt_bind_param($update_stmt, 'is', $avg_rating, $user_id);
          if(mysqli_execute($update_stmt))
          {
            print "success";
          }
        }
      }
    }
    else
    {
      // print "error";
      print mysqli_error($con);
    }
  }
}
