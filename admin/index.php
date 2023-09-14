<?php session_start(); $pageTitle = 'Admin Dashboard'; include("../includes/header.php"); include("../includes/dbconn.php") ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-2 side-bar">
                    <?php 
                        include("sidenav.php");
                    ?>
                </div>
                <!-- Main Body -->
                <div class="col-md-10">
                    <h4 class="my-2 text-center"> Admin Dashboard </h4>
                    <div class="col-md-12 my-1">
                        <div class="row d-flex justify-content-around gap-3">
                            <div class="col-md-3 bg-success main-content mx-2">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php 
                                                $query = "SELECT * FROM admin";
                                                $result = mysqli_query($connect, $query);
                                                $display_data = mysqli_num_rows($result);
                                            ?>
                                            <h5 class="my-2 text-white first-admin-card"><?php echo $display_data; ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Admins</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fa fa-users-cog fa-3x my-4 admin-cog"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info main-content mx-2">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white first-admin-card">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Doctors</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fa fa-user-md fa-3x my-4 admin-cog"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning main-content mx-2">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white first-admin-card">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Patients</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fa fa-procedures fa-3x my-4 admin-cog"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-danger main-content mx-2 my-2">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white first-admin-card">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Reports</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fa fa-file fa-3x my-4 admin-cog"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning main-content mx-2 my-2">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white first-admin-card">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Job Requests</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fa fa-briefcase fa-3x my-4 admin-cog"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-success main-content mx-2 my-2">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white first-admin-card">Ksh. 0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Income</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fa fa-money-bill-trend-up fa-3x my-4 admin-cog"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("../includes/footer.php") ?>