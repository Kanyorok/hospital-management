<?php session_start(); $pageTitle = 'Add/Remove Admin'; include("../includes/header.php"); include("../includes/dbconn.php"); 
    $currentAdmin = $_SESSION['admin'];

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM `patients` where `id`='$id'";

        $result = mysqli_query($connect, $query);

        if(!$result){
            die("Query Failed".mysqli_error());
        } else {

            $row = mysqli_fetch_assoc($result);

        }
    }
?>

<?php 

    if(isset($_POST['update_patient'])) {

        if(isset($_GET['id_new'])){
            $id_new = $_GET['id_new'];
        }

        $fullName = $_POST['fname'];
        $condition = $_POST['ill'];
        $bloodType = $_POST['blood'];
        $age = $_POST['age'];
        $appointment = $_POST['appointment'];
        $contact = $_POST['contact'];
        $prescription = $_POST['prescribe'];

        $query = "UPDATE `patients` set 
            `FULL_Name` = '$fullName', 
            `Blood_type` = '$bloodType', 
            `Age` = '$age',
            `HCondition` = '$condition',
            `Prescription` = '$prescription',
            `Contact` ='$contact',
            `Appointment` = '$appointment' where `id` = '$id_new'";

        $result = mysqli_query($connect, $query);

        if(!$result){
            die("Query Failed".mysqli_error());
        } else {
            header('location:addpatient.php?update_message=Updated Patient Data Successfully!');
        }

    }

?>

<div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 side-bar">
                    <?php 
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">Update Patient</h5>
                                <form action="updatepatient.php?id_new=<?php echo $id; ?>" method="post">
                                <div class="form-group">
                                    <label for="fname">
                                        Full Name
                                    </label>
                                    <Input type="text" name="fname" class="form-control" autocomplete="off" value="<?php echo $row['Full_Name'] ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="ill">
                                        Health Condition
                                    </label>
                                    <Input type="text" name="ill" class="form-control" autocomplete="off" value="<?php echo $row['HCondition'] ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="blood">
                                        Blood Type
                                    </label>
                                    <Input type="text" name="blood" class="form-control" autocomplete="off" value="<?php echo $row['Blood_type'] ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="appointment">
                                        Appointment
                                    </label>
                                    <Input type="date" name="appointment" class="form-control" autocomplete="off" value="<?php echo $row['Appointment'] ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="contact">
                                        Contacts
                                    </label>
                                    <Input type="text" name="contact" class="form-control" autocomplete="off" value="<?php echo $row['Contact'] ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="age">
                                        Age
                                    </label>
                                    <Input type="text" name="age" class="form-control" autocomplete="off" value="<?php echo $row['age'] ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="age">
                                        Prescription
                                    </label>
                                    <textarea name="prescribe" cols="75" rows="4" placeholder="Give Prescription"><?php echo $row['Prescription'] ?></textarea>
                                </div>
                                <div class="text-center mt-4">
                                    <input type="submit" class="btn btn-success" name="update_patient" value="UPDATE Patient">
                                </div>
                            </form>                       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("../includes/footer.php") ?>

