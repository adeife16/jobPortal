<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';

$json = array();
$data = array();
$error = 0;
require_once "functions.php";


if(isset($_POST['company_name']) && $_POST['company_name'] != "")
{
  $company_name = $_POST['company_name'];
  $company_address = $_POST['company_address'];
  $company_email = $_POST['company_email'];
  $company_website = $_POST['company_website'];
  $company_password = $_POST['company_password'];
  $company_password_confirm = $_POST['company_password_confirm'];
  $company_phone = $_POST['company_phone_compulsory'];
  $company_phone_optional = $_POST['company_phone_optional'];
  $company_employees = $_POST['company_employees'];
  $company_state = $_POST['company_state'];
  $company_city = $_POST['company_city'];
  // $captcha_response = $_POST['captcha'];
  $company_id = "JAAD" . str_shuffle(substr(md5(time().mt_rand().time()), 0,8));

  // check if all form elements are empty
  if($company_name == "")
  {

  }
  elseif($company_address == "")
  {

  }
  elseif($company_email == "")
  {

  }
  elseif( strlen($company_password) < 8)
  {

  }
  elseif($company_password != $company_password_confirm)
  {

  }
  elseif($company_phone == "")
  {

  }
  elseif($company_employees == "")
  {

  }
  elseif($company_state == "")
  {

  }
  elseif($company_city == "")
  {

  }
  else
  {
    $validate_mail = validate_mail(strval($company_email));
    $validate_phone = validate_phone($company_phone);
    if($company_phone_optional != "")
    {
      $validate_phone_option = validate_phone($company_phone_optional);

    }
    else{

      $validate_phone_option = "";
    }
    if($validate_mail == true && $validate_phone == true)
    {
      if(isset($_FILES['company_certificate']['name']) && $_FILES['company_certificate']['name'] != "")
      {
        $company_certificate = certificate_upload('company_certificate', $company_id);
        if($company_certificate == "success")
        {
          $tmp = explode('/',$_FILES['company_certificate']['type']);
          $ext = strtolower(end($tmp));
          if($ext == "jpeg")
          {
            $ext = "jpg";
          }
          $company_certificate = strval($company_id) . '.' . $ext;
        }
        else
        {
          print $_FILES['company_certificate']['error'];
          // print 'error';
        }
      }
      if(isset($_FILES['logo']['name']) && $_FILES['logo']['name'] != "")
      {
        $company_logo = logo_upload('logo', $company_id);
        if($company_logo == "success")
        {
          $tmp = explode('/',$_FILES['logo']['type']);
          $ext = strtolower(end($tmp));
          if($ext == "jpeg")
          {
            $ext = "jpg";
          }
          $company_logo = strval($company_id) . '.' . $ext;

        }
        else
        {
          print $_FILES['logo']['error'];
          // print 'error';
        }
      }

      $hash_link = str_shuffle(substr(md5(time().mt_rand().time()), 0,25));
      $company_password = password_hash($company_password, PASSWORD_DEFAULT);

      $body = '<!DOCTYPE html>
      <html lang="en">
      <head>
      <meta charset="UTF-8">
      <title>RESUME Account Activation</title>
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
      <p>Thank you for signing up on our website. Please click on the link below to activate your account.<p>
      <a href="'.$web_link.'verify.php?token='.$hash_link.'?type=company" style = "color: #fff;">Activate Account</a>
      </div>
      </body>
      </html>';

      $mail = new PHPMailer(true);

      // send verification mail
      try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        // $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
        $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $email_link;                     //SMTP username
        $mail->Password   = 'Nifemi64';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;
        // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        // Recipients
        $mail->setFrom($email_link, 'RESUME.COM');
        // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $mail->addAddress($company_email, $company_name);               //Name is optional
        $mail->addReplyTo($email_link, 'RESUME.COM');
        $mail->setFrom($email_link, 'RESUME.COM');
        // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        // $mail->addAddress($company_email, $company_name);               //Name is optional
        // $mail->addReplyTo($email_link, 'JAAD Logistics');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        // Content
        $link = $web_link."verify.php?token=".$hash_link;
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Activate Your RESUME Account!';
        $mail->Body    =  $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $sent = $mail->send();
        // if mail sent, fill database
        if($sent)
        {
          $stmt = "INSERT INTO company(code,company_id,company_name,company_address,company_email,website,password,company_number,company_number_optional,employees,state,city,certificate,logo,date_registered) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())";

          $insert_stmt = mysqli_prepare($con, $stmt);

          mysqli_stmt_bind_param($insert_stmt, "sssssssssiiiss", $hash_link, $company_id, $company_name, $company_address, $company_email, $company_website, $company_password, $company_phone, $company_phone_optional, $company_employees, $company_state, $company_city, $company_certificate, $company_logo);
          $result = mysqli_stmt_execute($insert_stmt);
          if($result)
          {
            print "success";
          }
          else
          {
            print mysqli_error($con);
            // print "error";
          }

      }
    }
      catch (Exception $e)
      {
        // print "error";
        print "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }

      // $stmt = "INSERT INTO company_verify(code,company_id,company_name,company_address,company_email,website,password,company_number,company_number_optional,employees,state,city,certificate,logo) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

      // $insert_stmt = mysqli_prepare($con, $stmt);

      // mysqli_stmt_bind_param($insert_stmt, "sssssssssiiiss", $hash_link, $company_id, $company_name, $company_address, $company_email, $company_website, $company_password, $company_phone, $company_phone_optional, $company_employees, $company_state, $company_city, $company_certificate, $company_logo);
      // $result = mysqli_stmt_execute($insert_stmt);
      // if($result)
      // {
      //     print "success";
      // }
      // else
      // {
      //     print mysqli_error($con);
      // }
    }
    else
    {
      if($validate_mail == false)
      {
        print "duplicate mail";
      }
      else if($validate_phone == false || $validate_phone_option == false)
      {
        print "duplicate phone";
      }
    }
  }

}

if(isset($_POST['company_verify']) && $_POST['company_verify'] != "")
{
  $token = $_POST['company_verify'];
  if($token != "")
  {
    $stmt = "SELECT * FROM company WHERE code = ?";
    $copy_stmt = mysqli_prepare($con, $stmt);
    mysqli_stmt_bind_param($copy_stmt, 's', $token);
    mysqli_stmt_execute($copy_stmt);
    $result = mysqli_stmt_get_result($copy_stmt);
    if($result)
    {
      if(mysqli_num_rows($result) == 1)
      {
        $stmt = "UPDATE company SET status='active' WHERE code=?";
        $update_stmt = mysqli_prepare($con, $stmt);
        mysqli_stmt_bind_param($update_stmt, "s", $token);
        $result = mysqli_stmt_execute($update_stmt);
        if($result)
        {
          print "success";
        }
        else
        {

        }
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
  else
  {

  }
}
?>
