<?php
require_once 'config.php';

function pre($array){
  echo "<pre>";
  print_r($array);
  echo "</pre>";
}
function certificate_upload($filename, $company_id)
{
  $allowed_ext = ["jpg","jpeg","png","pdf","doc","docx"]; // These will be the only file extensions allowed
  $uploadDirectory = "../assets/images/company_certificate/";
  $fileName = $_FILES[$filename]['name'];
  $fileSize =$_FILES[$filename]['size'];
  $fileTmpName =$_FILES[$filename]['tmp_name'];
  $file_type=$_FILES[$filename]['type'];
  $error = $_FILES[$filename]['error'];
  $tmp = explode('.',$fileName);
  $fileExtension=strtolower(end($tmp));
  $newName = $company_id . "." . $fileExtension;
  $uploadPath = $uploadDirectory  . $newName;
  if ($fileSize > 1000000)
  {

    return "large";

  }

  elseif (!in_array($fileExtension, $allowed_ext))
  {
    return "invalid";
  }
  else
  {
    if ($error == 0)
    {

      if (move_uploaded_file($fileTmpName , $uploadPath))
      {
        return "success";
      }
      else
      {
        return $error ;
      }
    }
    else
    {
      return $error;
    }

  }

}
function logo_upload($filename, $company_id)
{
  $allowed_ext = ["jpg","jpeg","png"]; // These will be the only file extensions allowed
  $uploadDirectory = "../assets/images/company_logo/";
  $fileName = $_FILES[$filename]['name'];
  $fileSize =$_FILES[$filename]['size'];
  $fileTmpName =$_FILES[$filename]['tmp_name'];
  $file_type=$_FILES[$filename]['type'];
  $error = $_FILES[$filename]['error'];
  $tmp = explode('.',$fileName);
  $fileExtension=strtolower(end($tmp));
  $newName = $company_id . "." . $fileExtension;
  $uploadPath = $uploadDirectory . $newName;

  if ($fileSize > 1000000)
  {

    return "large";

  }

  elseif (!in_array($fileExtension, $allowed_ext))
  {
    return "invalid";
  }
  else
  {
    if ($error == 0)
    {

      if (move_uploaded_file($fileTmpName , $uploadPath))
      {
        return "success";
      }
      else
      {
        return $error ;
      }
    }
    else
    {
      return $error;
    }

  }

}
function profile_upload($filename, $rider_id)
{
  $allowed_ext = ["jpg","jpeg","png", "pdf", "doc", "docx"]; // These will be the only file extensions allowed
  $uploadDirectory = "../assets/images/profile_picture/";
  $fileName = $_FILES[$filename]['name'];
  $fileSize =$_FILES[$filename]['size'];
  $fileTmpName =$_FILES[$filename]['tmp_name'];
  $file_type=$_FILES[$filename]['type'];
  $error = $_FILES[$filename]['error'];
  $tmp = explode('.',$fileName);
  $fileExtension=strtolower(end($tmp));
  $newName = $rider_id . "." . $fileExtension;
  $uploadPath = $uploadDirectory . $newName;

  if ($fileSize > 1000000)
  {

    return "large";

  }

  elseif (!in_array($fileExtension, $allowed_ext))
  {
    return "invalid";
  }
  else
  {
    if ($error == 0)
    {

      if (move_uploaded_file($fileTmpName , $uploadPath))
      {
        return "success";
      }
      else
      {
        return $error ;
      }
    }
    else
    {
      return $error;
    }

  }

}

function cv_upload($filename, $rider_id)
{
  $allowed_ext = ["jpg","jpeg","png", "pdf", "doc", "docx"]; // These will be the only file extensions allowed
  $uploadDirectory = "../assets/images/cv/";
  $fileName = $_FILES[$filename]['name'];
  $fileSize =$_FILES[$filename]['size'];
  $fileTmpName =$_FILES[$filename]['tmp_name'];
  $file_type=$_FILES[$filename]['type'];
  $error = $_FILES[$filename]['error'];
  $tmp = explode('.',$fileName);
  $fileExtension=strtolower(end($tmp));
  $newName = $rider_id . "." . $fileExtension;
  $uploadPath = $uploadDirectory . $newName;

  if ($fileSize > 1000000)
  {

    return "large";

  }

  elseif (!in_array($fileExtension, $allowed_ext))
  {
    return "invalid";
  }
  else
  {
    if ($error == 0)
    {

      if (move_uploaded_file($fileTmpName , $uploadPath))
      {
        return "success";
      }
      else
      {
        return $error ;
      }
    }
    else
    {
      return $error;
    }

  }

}

function license_upload($filename, $rider_id)
{
  $allowed_ext = ["jpg","jpeg","png", "pdf", "doc", "docx"]; // These will be the only file extensions allowed
  $uploadDirectory = "../assets/images/license/";
  $fileName = $_FILES[$filename]['name'];
  $fileSize =$_FILES[$filename]['size'];
  $fileTmpName =$_FILES[$filename]['tmp_name'];
  $file_type=$_FILES[$filename]['type'];
  $error = $_FILES[$filename]['error'];
  $tmp = explode('.',$fileName);
  $fileExtension=strtolower(end($tmp));
  $newName = $rider_id . "." . $fileExtension;
  $uploadPath = $uploadDirectory . $newName;

  if ($fileSize > 1000000)
  {

    return "large";

  }

  elseif (!in_array($fileExtension, $allowed_ext))
  {
    return "invalid";
  }
  else
  {
    if ($error == 0)
    {

      if (move_uploaded_file($fileTmpName , $uploadPath))
      {
        return "success";
      }
      else
      {
        return $error ;
      }
    }
    else
    {
      return $error;
    }

  }

}

// function encrypt ($pure_string, $encryption_key) {
//     $cipher     = 'AES-256-CBC';
//     $options    = OPENSSL_RAW_DATA;
//     $hash_algo  = 'sha256';
//     $sha2len    = 32;
//     $ivlen = openssl_cipher_iv_length($cipher);
//     $iv = openssl_random_pseudo_bytes($ivlen);
//     $ciphertext_raw = openssl_encrypt($pure_string, $cipher, $encryption_key, $options, $iv);
//     $hmac = hash_hmac($hash_algo, $ciphertext_raw, $encryption_key, true);
//     return $iv.$hmac.$ciphertext_raw;
// }
// function decrypt ($encrypted_string, $encryption_key) {
//     $cipher     = 'AES-256-CBC';
//     $options    = OPENSSL_RAW_DATA;
//     $hash_algo  = 'sha256';
//     $sha2len    = 32;
//     $ivlen = openssl_cipher_iv_length($cipher);
//     $iv = substr($encrypted_string, 0, $ivlen);
//     $hmac = substr($encrypted_string, $ivlen, $sha2len);
//     $ciphertext_raw = substr($encrypted_string, $ivlen+$sha2len);
//     $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $encryption_key, $options, $iv);
//     $calcmac = hash_hmac($hash_algo, $ciphertext_raw, $encryption_key, true);
//     if(function_exists('hash_equals')) {
//         if (hash_equals($hmac, $calcmac))
//         {
//             return $original_plaintext;
//         }
//     }
//     else {
//         if ($this->hash_equals_custom($hmac, $calcmac))
//         {
//             return $original_plaintext;
//         }
//     }
// }
/**
* (Optional)
* hash_equals() function polyfilling.
* PHP 5.6+ timing attack safe comparison
*/
function hash_equals_custom($knownString, $userString) {
  if (function_exists('mb_strlen')) {
    $kLen = mb_strlen($knownString, '8bit');
    $uLen = mb_strlen($userString, '8bit');
  } else {
    $kLen = strlen($knownString);
    $uLen = strlen($userString);
  }
  if ($kLen !== $uLen) {
    return false;
  }
  $result = 0;
  for ($i = 0; $i < $kLen; $i++) {
    $result |= (ord($knownString[$i]) ^ ord($userString[$i]));
  }
  return 0 === $result;
}


$string = "This is the original string!";

// $encrypted = encrypt($string, ENCRYPTION_KEY);
// $decrypted = decrypt($encrypted, ENCRYPTION_KEY);

function validate($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

function assoc($array, $key, $value)
{
  $array[$key] = $value;
  return $array;
}

function generate_userid()
{
  global $con;
  $get = mysqli_query($con, "SELECT MAX(user_id) AS max_id FROM tft_users ");
  if ($get)
  {
    $row = mysqli_fetch_array($get);
    $rand_id = $row['max_id'];
    $rand_id = intval($rand_id);
  }
  return $rand_id;
}
function get_ip()
{
  $ip = getenv('HTTP_CLIENT_IP')?:
  getenv('HTTP_X_FORWARDED_FOR')?:
  getenv('HTTP_X_FORWARDED')?:
  getenv('HTTP_FORWARDED_FOR')?:
  getenv('HTTP_FORWARDED')?:
  getenv('REMOTE_ADDR');

  return $ip;
}

// select random rider
function select_random_rider($table)
{
  $data = array();
  $table = $table;
  global $con;
  $range_result = mysqli_query($con, " SELECT MAX(`id`) AS max_id , MIN(`id`) AS min_id FROM $table ");
  $range_row = mysqli_fetch_object($range_result );
  $random = mt_rand( $range_row->min_id , $range_row->max_id );
  $result = mysqli_query($con, " SELECT r.*, s.state_name, c.lga_name FROM $table r, states s, local_governments c WHERE r.state = s.id AND r.city = c.id AND r.id >= $random LIMIT 0,20 ");
  if($result)
  {
    while($row = mysqli_fetch_assoc($result))
    {
      array_push($data, $row);
    }
    return $data;
  }
  else
  {
    return 'error';
  }
}
// select random company
function select_random_company($table)
{
  $data = array();
  $table = $table;
  global $con;
  $range_result = mysqli_query($con, " SELECT MAX(`id`) AS max_id , MIN(`id`) AS min_id FROM $table ");
  $range_row = mysqli_fetch_object($range_result );
  $random = mt_rand( $range_row->min_id , $range_row->max_id );
  $result = mysqli_query($con, " SELECT e.*, s.state_name, c.lga_name FROM $table e, states s, local_governments c WHERE e.state = s.id AND e.city = c.id AND e.id >= $random LIMIT 0,20 ");
  if($result)
  {
    while($row = mysqli_fetch_assoc($result))
    {
      array_push($data, $row);
    }
    return $data;
  }
  else
  {
    return 'error';
    // return mysqli_error($con);
  }
}

// check for duplicate email in rider and company tables
function validate_mail($email)
{

  global $con;
  $check_table = mysqli_query($con, "SELECT c.*, r.* FROM company c, rider r WHERE c.company_email ='$email' OR r.email='$email'");
  if(mysqli_num_rows($check_table) > 0)
  {
    return false;
  }
  else
  {
    return true;
  }
}

// check for duplicate phone number in rider and company tables
function validate_phone($phone)
{
  global $con;
  $check_table = mysqli_query($con, "SELECT c.*, r.* FROM company c, rider r WHERE c.company_number= $phone OR r.phone=$phone OR c.company_number_optional=$phone OR r.phone_option=$phone");
  if(mysqli_num_rows($check_table) > 0)
  {
    return false;
  }
  else
  {
    return true;
  }
}

// send recovery mail
function recovery_mail($email, $body)
{

  $mail = new PHPMailer(true);
  // send verification mail
  try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP

    $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $email_link;                  //SMTP username
    $mail->Password   = 'Nifemi64';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable SMTP encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    // $mail->Port       = 465;
    $mail->Port       = 587;
    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    // Recipients
    $mail->setFrom($email_link, 'JAAD Logistics');
    // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress($email, 'JAAD User');               //Name is optional
    $mail->addReplyTo($email_link, 'JAAD Logistics');
    // $mail->setFrom($email_link, 'JAAD Logistics');
    // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    // $mail->addAddress($company_email, $company_name);               //Name is optional
    // $mail->addReplyTo($email_link, 'JAAD Logistics');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    // Content
    // $link = $web_link."verify.php?token=".$hash_link;
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recover Your JAAD Account!';
    $mail->Body    =  $body;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $sent = $mail->send();
    return $sent;
  }
  catch (Exception $e)
  {
    // print "error";
    print "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // return false;
  }
}


// rider search
function rider_search($page, $state, $city)
{
  global $con;
  $result_array = array();
  $json = array();
  if($page == "")
  {

  }
  else
  {
    $last_row = $page * 20;

        $result = mysqli_query($con, "SELECT r.*, s.state_name, c.lga_name FROM rider r, states s, local_governments c WHERE r.state = s.id AND r.city = c.id AND r.city = '$city' AND r.state = '$state'  ORDER BY r.id DESC LIMIT $last_row, 20 ");

    if($result)
    {
      if(mysqli_num_rows($result) == 0)
      {
        return "empty";
      }
      while($row = mysqli_fetch_assoc($result))
      {
        array_push($json, $row);
      }
      return $json;
    }
    else
    {
      print mysqli_error($con);
      return 'error';
    }
  }
}
// company search
function company_search($page, $state, $city)
{
  global $con;
  $result_array = array();
  $json = array();
  if($page == "")
  {

  }
  else
  {
    $last_row = $page * 20;

        $result = mysqli_query($con, "SELECT r.*, s.state_name, c.lga_name FROM company r, states s, local_governments c WHERE r.state = s.id AND r.city = c.id AND r.city = '$city' AND r.state = '$state'  ORDER BY r.id DESC LIMIT $last_row, 20 ");

    if($result)
    {
      if(mysqli_num_rows($result) == 0)
      {
        return "empty";
      }
      while($row = mysqli_fetch_assoc($result))
      {
        array_push($json, $row);
      }
      return $json;
    }
    else
    {
      print mysqli_error($con);
      return 'error';
    }
  }
}
