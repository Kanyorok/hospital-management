<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once('../includes/dbconn.php');

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
            try {
                $query = "INSERT INTO patients (Full_Name, Blood_type, Contact, Prescription, Age, Appointment, HCondition) VALUES (:fullName, :bloodType, :contact, :prescription, :age, :appointment, :condition)";
                $stmt = $connect->prepare($query);
                $stmt->bindParam(":fullName", $fullName);
                $stmt->bindParam(":bloodType", $bloodType);
                $stmt->bindParam(":contact", $contact);
                $stmt->bindParam(":prescription", $prescription);
                $stmt->bindParam(":age", $age);
                $stmt->bindParam(":appointment", $appointment);
                $stmt->bindParam(":condition", $condition);
                $stmt->execute();

                header('location: ../admin/addpatient.php?register_message=Successfully Added Patient');
            } catch (PDOException $e) {
                header('location: ../admin/addpatient.php?register_message=Data Not Added');
            }
        } else {
            header('location: ../admin/addpatient.php?register_message=' . $error['patient']);
        }
    }
}

