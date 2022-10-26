<?php
require 'functions.php';

$json = array();
$data = array();



if(isset($_POST['email']) && $_POST['email'] != "")
{
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  if($email == "" || $pass == "")
  {
    print "empty";
  }

  else
  {
    $stmt = "SELECT * FROM admin WHERE email = ?";
    $get_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($get_stmt, "s", $email);
    mysqli_execute($get_stmt);
    $result = mysqli_stmt_get_result($get_stmt);
    if($result)
    {
      if(mysqli_num_rows($result)  == 1)
      {
        while($row = mysqli_fetch_assoc($result))
        {
          $admin_id = $row['admin_id'];
          $first_name = $row['first_name'];
          $last_name = $row['last_name'];
          $password = $row['password'];
          $picture = $row['picture'];
        }

        if(password_verify($pass, $password))
        {
          session_destroy();
          session_start();

          $_SESSION['id'] = $admin_id;
          $_SESSION['name'] = $first_name . ' ' . $last_name;
          $_SESSION['email'] = $email;
          $_SESSION['picture'] = $picture;
          $_SESSION['session_type'] = "admin";

          $request = array("status" => "success");
          array_push($json, $request);

          $session = array("session_id" => $_SESSION['id'], "session_name" => $_SESSION['name'], "session_email" => $_SESSION['email'], "session_picture" => $_SESSION['picture'], "session_type" => $_SESSION['session_type']);

          array_push($json, $session);
          print json_encode($json);

        }
        else
        {
          $request = array('status' =>  'invalid');
          array_push($json, $request);

          print json_encode($json);

        }

      }
      else
      {
        $request = array('status' =>  'invalid');
        array_push($json, $request);

        print json_encode($json);
      }
    }
    else
    {
      $request = array('status' =>  'invalid');
      array_push($json, $request);

      print json_encode($json);
    }
  }
}

// reset password

if(isset($_POST['passReset']) && $_POST['passReset'] != "")
{
  $email = $_POST['passReset'];
  $token = str_shuffle(substr(mt_rand(10000000,99999999) * time(), 0,8));
  $body = '<!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
  <title>JAAD Account Activation</title>
  <style>
  .wrapper{
    padding: 20px;
    color: #444;
    font-size: 1.3em;
  }
  a{
    background: #3a9663;
    text-decoration: none;
    padding: 8px 15px;
    border_radius: 5px;
    color: white;
  }
  </style>
  </head>

  <body>
  <div class="wrapper">
  <p>Hello, your account recovery code is given below,  <p>
  <p><h4>'.$token.'</h4></p>
  <p>Copy the code and paste in the verification box</p>
  <!--  <p>You can also click the button below to verify your account</p>
  <a href="'.$web_link.'recovery.php?token='.$token.'?user='.$email.'" style = "color: #fff;">Click Here</a>
  -->
  <p><h4>If you didn\'t request for account recovery please ignore</h4></p>
  </div>
  </body>
  </html>';

  $stmt = "SELECT * FROM admin WHERE email = ?";
  $get_stmt = mysqli_prepare($con, $stmt);
  mysqli_stmt_bind_param($get_stmt, 's', $email);
  mysqli_execute($get_stmt);
  $result = mysqli_stmt_get_result($get_stmt);
  if($result)
  {
    if(mysqli_num_rows($result) == 1)
    {
      $user = mysqli_fetch_assoc($result);

      $stmt = "SELECT * FROM pass_reset WHERE email = ?";
      $get_stmt = mysqli_prepare($con, $stmt);
      mysqli_stmt_bind_param($get_stmt, 's', $email);
      mysqli_execute($get_stmt);
      $result = mysqli_stmt_get_result($get_stmt);
      if($result)
      {
        if(mysqli_num_rows($result) == 1)
        {
          $stmt = "UPDATE pass_reset SET token = $token WHERE email = ?";
          $update_stmt = mysqli_prepare($con, $stmt);
          mysqli_stmt_bind_param($update_stmt, 's', $email);
          if(mysqli_execute($update_stmt))
          {
            $request = array('status' =>  'success');
            array_push($json, $request);
            recovery_mail($email, $body);

          }
          else
          {
            $request = array('status' =>  mysqli_error($con));
            array_push($json, $request);
          }
        }
        else
        {
          $user_id = $user['admin_id'];
          $stmt = "INSERT INTO pass_reset(email, user, token, user_type) VALUES(?,?,?,'admin')";
          $insert_stmt = mysqli_prepare($con, $stmt);
          mysqli_stmt_bind_param($insert_stmt, 'sss', $email, $user_id, $token);
          if(mysqli_execute($insert_stmt))
          {
            if(recovery_mail($email, $body))
            {
              $request = array('status' =>  'success');
              array_push($json, $request);
            }
          }
          else
          {
            $request = array('status' =>  mysqli_error($con));
            array_push($json, $request);
          }
        }
      }
    }
  }
  else
  {
    $request = array('status' =>  'error');
    array_push($json, $request);
  }

    print json_encode($json);
}


// change password
if(isset($_POST['changePass']))
{
  $email = 'admin@jaad.com';
  $pass = $_POST['changePass'];
  $pass = password_hash($pass, PASSWORD_DEFAULT);

  $update = mysqli_query($con, "UPDATE admin SET password = '$pass' WHERE email = '$email'");
  if($update)
  {
    print "success";
  }
  else
  {
    print mysqli_error($con);
  }
}
