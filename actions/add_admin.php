<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('../includes/dbconn.php');

    $error = array();

    if (isset($_POST['add_admin'])) {
        $username = $_POST['uname'];
        $password = $_POST['pass'];
        $image = $_FILES['img']['name'];

        if (empty($username)) {
            $error['admin'] = 'Enter Username';
        } else if (empty($password)) {
            $error['admin'] = 'Enter Password';
        } else if (empty($image)) {
            $error['admin'] = 'Upload Profile Image';
        }

        if (count($error) == 0) {
            // Upload the image to a directory (e.g., 'uploads/')
            $upload_dir = '../assets/profiles/';
            $target_file = $upload_dir . basename($image);

            if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO admin (username, password, profile) VALUES (:username, :password, :profile)";
                $result = $connect->prepare($query);
                $result->bindParam(":username", $username);
                $result->bindParam(":password", $hashed_password); // Store the hashed password
                $result->bindParam(":profile", $target_file); // Store the file path in the database

                if ($result->execute()) {
                    header('location: ../admin/addadmin.php?register_message=Admin added successfully');
                } else {
                    $error['admin'] = 'Failed to add admin';
                }
            } else {
                $error['admin'] = 'Failed to upload image';
            }
        }

        // Success, redirect to a success page or back to the admin page
        header('location: ../admin/addadmin.php?register_message=Admin added successfully');
    }
} else {
    header('location: ../admin/addadmin.php');
}
?>
