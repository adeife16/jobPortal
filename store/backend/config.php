<?php
    mysqli_report(MYSQLI_REPORT_STRICT);
    error_reporting(-1);
    // error_reporting(0);

    // $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    // $hostname = $cleardb_url["host"];
    // $user = $cleardb_url["user"];
    // $pass = $cleardb_url["pass"];
    // $dbname = substr($cleardb_url["path"],1);
    // $active_group = 'default';
    // $query_builder = TRUE;
    //
    $hostname = 'sql202.hyperphp.com';
    $user = 'hp_28507677';
    $pass = 'J@LD4Tdu.giZPZd';
    $dbname = 'hp_28507677_tft';

    // $hostname = 'localhost';
    // $user = 'root';
    // $pass = '';
    // $dbname = 'logistics';

    // $success = array();
    // $error = array();

    $con = mysqli_connect($hostname,$user,$pass,$dbname);

        if (!$con) {

            header("location: error.php");
            echo "<script>alert('Database not connected!')";
            // array_push($error, mysqli_error($con));

    }

  $email_link = 'apextech2010@outlook.com';

    // $web_link = 'https://jaadlogistics.herokuapp.com/';
    $web_link = 'http://localhost/logistics/';
      // $web_link = 'http://adeinfo.hyperphp.com/';

    session_start();
