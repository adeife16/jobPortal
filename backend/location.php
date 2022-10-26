<?php
    require_once "functions.php";

    $json = array();
    $data = array();

    // Get states

    if(isset($_POST['get_states']))
    {
        $get_states = mysqli_query($con, "SELECT * FROM states");

        if($get_states)
        {
            while($row = mysqli_fetch_array($get_states))
            {
                array_push($json, $row);
            }

            print json_encode($json);
        }

    }

    // Get Cities

    if(isset($_POST['get_cities']))
    {
        $state_id = $_POST['get_cities'];
        $get_cities = mysqli_query($con, "SELECT id,lga_name FROM local_governments WHERE state_id = '$state_id' ");

        if($get_cities)
        {
            while($row = mysqli_fetch_array($get_cities))
            {
                array_push($json, $row);
            }
            print json_encode($json);
        }
        else
        {
            print mysqli_error($con);
        }
    }
// Get Location
    if(isset($_POST['get_location']))
    {
      $states = array();
      $cities = array();
      $get_states = mysqli_query($con, "SELECT id, state_name FROM states");

      if($get_states)
      {
        while($row = mysqli_fetch_array($get_states))
        {
          array_push($states, $row);
        }
        $get_cities = mysqli_query($con, "SELECT id, state_id, lga_name FROM local_governments");
        if($get_cities)
        {
          while ($row = mysqli_fetch_array($get_cities))
          {
            array_push($cities,$row);
          }
        }
        array_push($json, array("states" => $states));
        array_push($json, array("cities" => $cities));

        print json_encode($json);
      }

    }
