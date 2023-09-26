<?php

    header('Acess-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    //initializing the api
    include_once('../core/initialize.php');

    //instantiate patient
    $patient = new Post($connect);

    //Query the patients
    $result = $patient -> read();

    //get the row count
    $num_of_rows = $result->rowCount();

    if($num_of_rows > 0) {
        $post_arr = array();
        $post_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $post_item = array (
                'Full_Name' => $Full_Name,
                'Blood_type' => $Blood_type,
                'Contact' => $Contact,
                'Prescription' => $Prescription,
                'Age' => $age,
                'Appointment' => $Appointment,
                'HCondition' => $HCondition
            );
            array_push($post_arr['data'], $post_item);
        }
        echo json_encode($post_arr);
    }else{
        echo json_encode(array('message' => 'No patients found'));
    }
