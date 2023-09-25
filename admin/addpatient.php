<?php
session_start();
$pageTitle = 'Add/Remove Admin';
include("../includes/header.php");
require_once("../includes/dbconn.php");

$currentAdmin = $_SESSION['admin'];
$query = "SELECT * FROM patients";
$result = $connect->prepare($query);
$result->execute();
$finalOutcome = $result->fetchAll(PDO::FETCH_ASSOC);
$output = "";

if (!$result) {
    die("Query failed!" . print_r($connect->errorInfo(), true));
}

$data = []; 

if (count($finalOutcome) < 1) {
    $output = "<h5 class='text-center'>No New Patients</h5>";
} else {
    $data = $finalOutcome;
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
                                <h5 class="text-center">All Patients</h5>
                                <table class="table table-bordered">
                                    <th>Patient ID</th>
                                    <th>Patient Name</th>
                                    <th>Appointment Date</th>
                                    <th>Prescription</th>
                                    <th class="action-th">Action</th>
                                    <?php
                                        $index = 0;
                                        foreach ($data as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo $data[$index]['Full_Name']?></td>
                                        <td><?php echo $data[$index]['Appointment']?></td>
                                        <td><?php echo $data[$index]['Prescription']?></td>
                                        <td>
                                            <a href="updatepatient.php?id=<?php echo $data[$index]['id']?>" class="btn btn-success">Update</a>
                                                <br />
                                                <br />
                                            <a href="../actions/delete.php?id=<?php echo $data[$index]['id']?>">
                                                <button class="btn btn-danger">
                                                        Remove
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $index++; } ?>
                                </table>
                                <?php echo $output; ?>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center">Add Patient</h5>
                                <table class="table table-bordered">
                                    <thead class="text-center">
                                        <th colspan="3">Patient Data Capture</th>
                                    </thead>
                                    <tbody>
                                        <form action="../actions/add_patient.php" method="post">
                                            <div class="form-group">
                                                <input type="hidden" name="source_form" value="form2">
                                                <tr>
                                                  <td>
                                                    <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Patient Name">
                                                  </td>
                                                  <td>
                                                    <input type="text" name="ill" class="form-control" autocomplete="off" placeholder="Pre-exiting Health Condition">
                                                  </td>
                                                  <td>
                                                    <input type="text" name="blood" class="form-control" autocomplete="off" placeholder="Enter Blood Type">
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <input type="date" name="appointment" class="form-control" autocomplete="off" placeholder="Enter Appointment Date">
                                                  </td>
                                                  <td>
                                                    <input type="text" name="contact" class="form-control" autocomplete="off" placeholder="Enter Patient Contact (Phone/Email)">
                                                  </td>
                                                  <td>
                                                    <input type="text" name="age" class="form-control" autocomplete="off" placeholder="Enter Patient Age">
                                                  </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <textarea name="prescribe" cols="75" rows="4" placeholder="Give Prescription"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-center">
                                                        <input type="submit" class="btn btn-success"  name="add_patient" value="ADD NEW PATIENT">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <?php

                                                        if(isset($_GET['register_message'])){
                                                            echo "
                                                            <td colspan='3' class=text-center>
                                                                <h6 class='alert alert-success' role='alert'>".$_GET['register_message']."</h6>
                                                            </td>
                                                            ";
                                                        }
                                                    
                                                    ?>
                                                     <?php

                                                        if(isset($_GET['delete_message'])){
                                                            echo "
                                                            <td colspan='3' class=text-center>
                                                                <h6 class='alert alert-danger' role='alert'>".$_GET['delete_message']."</h6>
                                                            </td>
                                                            ";
                                                        }

                                                    ?>
                                                    <?php

                                                        if(isset($_GET['update_message'])){
                                                            echo "
                                                            <td colspan='3' class=text-center>
                                                                <h6 class='alert alert-success' role='alert'>".$_GET['update_message']."</h6>
                                                            </td>
                                                            ";
                                                        }

                                                    ?>
                                                </tr>
                
                                            </div>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("../includes/footer.php") ?>