<?php session_start(); $pageTitle = 'Add/Remove Admin'; include("../includes/header.php"); include("../includes/dbconn.php"); 
    $currentAdmin = $_SESSION['admin'];
    $query = "SELECT * FROM admin WHERE username !='$currentAdmin'";
    $result = mysqli_query($connect, $query);
    $output = "";

    if(!$result){
        die("Query failed!".mysqli_error());
    } else{
        $data = array();

        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
    }

    if (mysqli_num_rows($result) < 1) {
        $output = "<h5 class='text-center'>No New Admin</h5>";
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
                                <h5 class="text-center">All Admitted Patients</h5>
                                <table class="table table-bordered">
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th class="action-th">Action</th>
                                    <?php
                                        $index = 0;
                                        foreach ($data as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo $data[$index]['username']?></td>
                                        <td>
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
                                        <form action="../actions/add_admin.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <tr>
                                                  <td>
                                                    <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Patient Name">
                                                  </td>
                                                  <td>
                                                    <input type="text" name="ill" class="form-control" autocomplete="off" placeholder="Enter Past Condition">
                                                  </td>
                                                  <td>
                                                    <input type="text" name="blood" class="form-control" autocomplete="off" placeholder="Enter Blood Type">
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <input type="text" name="appointment" class="form-control" autocomplete="off" placeholder="Enter Appointment Date">
                                                  </td>
                                                  <td>
                                                    <input type="text" name="contact" class="form-control" autocomplete="off" placeholder="Enter Patient Contact">
                                                  </td>
                                                  <td>
                                                    <input type="text" name="age" class="form-control" autocomplete="off" placeholder="Enter Patient Age">
                                                  </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" rows="4">
                                                        <textarea name="prescribe" cols="75" placeholder="Give Prescription"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="text-center">
                                                        <input type="submit" class="btn btn-success"  name="add_admin" value="ADD NEW PATIENT">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <?php

                                                        if(isset($_GET['register_message'])){
                                                            echo "
                                                            <td colspan='3' class=text-center>
                                                                <h6 class='alert alert-danger' role='alert'>".$_GET['register_message']."</h6>
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