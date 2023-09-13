<?php $pageTitle = 'Admin Login Page'; include("includes/header.php") ?>
<div class="login-page">
    <div class="container py-5">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6 bg-secondary rounded-3 p-5 text-center">
                    <img src="assets/images/admin.png" width="100" height="100" alt="admin logo">
                    <form method="post">
                        <div class="form-group p-3">
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group p-3">
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                            <input type="submit" class="btn btn-success mt-3" name="login" value="LOGIN">
                        </div>
                    </form>
                </div>
                <div class="col-md-3">    
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>