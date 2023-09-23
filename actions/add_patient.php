<?php

include('../includes/dbconn.php');

$error = array();

if(isset($_POST['add_patient'])){
    $fullName = $_POST['fname'];
    $condition = $_POST['ill'];
    $bloodType = $_POST['blood'];
    $age = $_POST['age'];
    $appointment = $_POST['appointment'];
    $contact = $_POST['contact'];
    $prescription = $_POST['prescribe'];
    
    if (empty($fullName)){
        $error['patient'] = 'Enter Patient Name';
    } else if(empty($condition)) {
        $error['patient'] = 'Enter Condition (e.g., Asthma, Cancer, etc)';
    } else if(empty($bloodType)){
        $error['patient'] = 'Give Blood Type or "Nil"';
    } else if(empty($age)){
        $error['patient'] = 'Enter Patient Age';
    } else if(empty($appointment)){
        $error['patient'] = 'Enter Appointment Date';
    } else if(empty($contact)){
        $error['patient'] = 'Patient Contact (phone/email)';
    } else if(empty($prescription)){
        $error['patient'] = 'Enter Patient Prescription';
    }

    if(count($error) == 0) {
        // Escape user inputs to prevent SQL injection
        $fullName = mysqli_real_escape_string($connect, $fullName);
        $bloodType = mysqli_real_escape_string($connect, $bloodType);
        $contact = mysqli_real_escape_string($connect, $contact);
        $prescription = mysqli_real_escape_string($connect, $prescription);
        
        // Insert the data into the database
        $query = "INSERT INTO patients (Full_Name, Blood_type, Contact, Prescription, Age, Appointment) VALUES ('$fullName', '$bloodType', '$contact', '$prescription', '$age', '$appointment')";
        $result = mysqli_query($connect, $query);
        
        if($result) {
            header('location:../admin/addpatient.php?register_message=Successfully Added Patient');
        } else {
            header('location:../admin/addpatient.php?register_message=Data Not Added');
        }
    } else {
        header('location:../admin/addpatient.php?register_message='.$error['patient']);
    }
}

?>
