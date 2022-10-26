<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;
//
// require '../vendor/autoload.php';
require_once "functions.php";

$json = array();
$data = array();
$error = 0;
$token = mt_rand(10000000,99999999); //password reset token


if(isset($_POST['reset_pass']) && $_POST['reset_pass'] != "")
{
  $email = $_POST['reset_pass'];
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

  // check if email exists
  if(validate_mail($email) == true)
  {
    print "invalid";
  }
  else
  {
    // check email in password reset table
    $stmt = "SELECT * FROM pass_reset WHERE email=?";
    $get_stmt =mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($get_stmt, 's', $email);
    mysqli_execute($get_stmt);
    $result = mysqli_stmt_get_result($get_stmt);
    if($result)
    {
      // if email exist, update table
      if(mysqli_num_rows($result) > 0)
      {
        $stmt = "UPDATE pass_reset SET token='$token' WHERE email=?";
        $update_stmt =mysqli_prepare($con, $stmt);
        mysqli_stmt_bind_param($update_stmt, 's', $email);
        if(mysqli_execute($update_stmt))
        {
          $send_mail = recovery_mail($email, $body);
          if($send_mail)
          {

            print "success";
          }
          else
          {
            print "error";
            // print $sent;
          }
        }
        else
        {
          print "error";
        }
      }
      else
      {
        // if email not in pass_reset table, get user details from company table
        $stmt = "SELECT company_id, company_email FROM company WHERE company_email= ? ";
        $get_stmt =mysqli_prepare($con, $stmt);
        mysqli_stmt_bind_param($get_stmt, 's', $email);
        mysqli_execute($get_stmt);
        $result = mysqli_stmt_get_result($get_stmt);

        if($result)
        {
          // if email exists
          if(mysqli_num_rows($result) > 0)
          {
            while($row = mysqli_fetch_assoc($result))
            {
              $user_id = $row['company_id'];
            }
            $stmt = "INSERT INTO pass_reset(email, user, token, user_type) VALUES(?,?,?,'company')";
            $insert_stmt = mysqli_prepare($con, $stmt);
            mysqli_stmt_bind_param($insert_stmt, 'ssi', $email, $user_id, $token);
            if(mysqli_execute($insert_stmt))
            {
              $send_mail = recovery_mail($email, $body);
              if($send_mail)
              {
                print "success";

              }
              else
              {
                print "error";
              }

            }
            else
            {
              print "error";
              // print mysqli_error($con);
            }
          }
          else
          {
            //if email not in company table,  get user details from rider table
            $stmt = "SELECT rider_id, email FROM rider WHERE email= ? ";
            $get_stmt =mysqli_prepare($con, $stmt);
            mysqli_stmt_bind_param($get_stmt, 's', $email);
            mysqli_execute($get_stmt);
            $result = mysqli_stmt_get_result($get_stmt);

            if(mysqli_num_rows($result) > 0)
            {
              while($row = mysqli_fetch_assoc($result))
              {
                $user_id = $row['rider_id'];
              }
              $stmt = "INSERT INTO pass_reset(email, user, token, user_type) VALUES(?,?,?, 'rider')";
              $insert_stmt = mysqli_prepare($con, $stmt);
              mysqli_stmt_bind_param($insert_stmt, 'ssi', $email, $user_id, $token);
              if(mysqli_execute($insert_stmt))
              {
                $send_mail = recovery_mail($email, $body);
                if($send_mail)
                {
                  print "success";

                }
                else
                {
                  print "error";
                }

              }
              else
              {
                print "error";
                // print mysqli_error($con);
              }
            }

          }
        }
      }
    }
  }
}

// get and confirm passcode
if(isset($_POST['passcode']) && $_POST['passcode'] != "")
{
  $passcode = $_POST['passcode'];

  $stmt = "SELECT * FROM  pass_reset WHERE token=?";
  $get_stmt = mysqli_prepare($con, $stmt);
  mysqli_stmt_bind_param($get_stmt, 'i', $passcode);
  mysqli_execute($get_stmt);
  $result = mysqli_stmt_get_result($get_stmt);
  if($result)
  {
    if(mysqli_num_rows($result) == 1)
    {
      while($row = mysqli_fetch_assoc($result))
      {
        $email = $row['email'];
        $type = $row['user_type'];
      }
      session_destroy();
      session_start();
      $_SESSION['recovery_email'] = $email;
      $_SESSION['recovery_type'] = $type;
      print "success";
    }
    else
    {
      print "invalid";
    }
  }
  else
  {

  }
}

// collect and submit password
if(isset($_POST['pass']) && $_POST['pass'] != "" && $_POST['pass'] == $_POST['confirmPass'])
{
  $pass = $_POST['pass'];
  $confirm = $_POST['confirmPass'];
  $email = $_SESSION['recovery_email'];

  if($pass == "" || $confirm == "" || strlen($pass) < 8 || $pass  != $confirm)
  {

  }
  else
  {
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    if($_SESSION['recovery_type'] == "company")
    {
      $stmt = "UPDATE company SET password = ? WHERE company_email = '$email' ";
      $update_stmt = mysqli_prepare($con, $stmt);
      mysqli_stmt_bind_param($update_stmt, "s", $pass);
      if(mysqli_execute($update_stmt))
      {
        $del_stmt = mysqli_query($con, "DELETE FROM pass_reset WHERE email = '$email'");
        if($del_stmt)
        {
          session_destroy();
          print "success";
        }
        else
        {

        }
      }
      else
      {
        print "error";
        // print mysqli_error($con);
      }
    }
    else
    {
      $stmt = "UPDATE rider SET password = ? WHERE email = '$email' ";
      $update_stmt = mysqli_prepare($con, $stmt);
      mysqli_stmt_bind_param($update_stmt, "s", $pass);
      if(mysqli_execute($update_stmt))
      {
        $del_stmt = mysqli_query($con, "DELETE FROM pass_reset WHERE email = '$email'");
        if($del_stmt)
        {
          session_destroy();
          print "success";
        }
        else
        {

        }
      }
      else
      {
        print mysqli_error($con);
      }

    }
  }

}
