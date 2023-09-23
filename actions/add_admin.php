<?php

    include('../includes/dbconn.php');

    $error = array();

    if(isset($_POST['add_admin'])){
        $username = $_POST['uname'];
        $password = $_POST['pass'];
        $image = $_FILES['img']['name'];

        if (empty($username)){
            $error['admin'] = 'Enter Username';
            header('location:../admin/addadmin.php?register_message='.$error['admin'].'');
        } else if(empty($password)) {
            $error['admin'] = 'Enter Password';
            header('location:../admin/addadmin.php?register_message='.$error['admin'].'');
        } else if(empty($image)){
            $error['admin'] = 'Upload Profile Image';
            header('location:../admin/addadmin.php?register_message='.$error['admin'].'');
        }

        if(count($error) == 0) {
            $query = "INSERT INTO admin (username, password, profile) VALUES ('$username', '$password', '$image')";

            $result = mysqli_query($connect, $query);
            header('location:../admin/addadmin.php?register_message='.$error['admin'].'');
        }
    }


?>