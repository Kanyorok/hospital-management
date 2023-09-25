<?php require_once('../includes/dbconn.php') ?>

<?php 

    if (isset($_GET['id'])){

        $id = $_GET['id'];
    

        $query = "delete from `patients` where `id`= '$id'";

        $result = $connect -> prepare($query);
        $result->execute();

        if($result->execute()){
            header('location:../admin/addpatient.php?delete_message=Deleted Data Successfully!');
        } else {
            die("Query Failed");
        }


    }
?>
