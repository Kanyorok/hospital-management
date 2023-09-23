<?php include('../includes/dbconn.php') ?>

<?php 

    if (isset($_GET['id'])){

        $id = $_GET['id'];
    

        $query = "delete from `patients` where `id`= '$id'";

        $result = mysqli_query($connect, $query);

        if(!$result){
            die("Query Failed".mysqli_error());
        } else {
            header('location:../admin/addpatient.php?delete_message=Deleted Data Successfully!');
        }


    }
?>
