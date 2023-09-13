<?php include('../includes/dbconn.php'); ?>
<?php 

    if(isset($_POST['login'])){
        $username = $_POST['uname'];
        $password = $_POST['password'];

        $error = array();

        if (empty($username)) {
            $error['admin'] = "Enter Username";
            header('location:../adminlogin.php?user_message= ' . $error['admin'].'');
        } else if (empty($password)) {
            $error['admin'] = "Enter Password";
            header('location:../adminlogin.php?user_message= ' . $error['admin'].'');
        }
        

        if(count($error) == 0) {
            
            $query = "SELECT * FROM admin WHERE username='$username' AND password='password'";

            $result = mysqli_query($connect, $query);

            if(mysqli_num_rows($result) == 1) {
                echo "<script>alert('You are logged in as an admin!')</script>";
                $_SESSION['admin'] = $username;
                // header('location:adminlogin.php?login_message=You have logged in as admin!');
            }else{
                header('location:../adminlogin.php?login_message=Invalid Username or Password!');
            }

        }
    }

?>