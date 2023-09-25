<?php 
session_start();
include('../includes/dbconn.php');

if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    if (empty($username)) {
        $error['user'] = "Enter Username";
        header('location:../userlogin.php?user_message=' . $error['user']);
    } else if (empty($password)) {
        $error['user'] = "Enter Password";
        header('location:../userlogin.php?user_message=' . $error['user']);
    }

    if (count($error) == 0) {
        $query = "SELECT password FROM admin WHERE username = :username";
        $result = $connect->prepare($query);
        $result->bindParam(":username", $username);
        $result->execute();

        if ($result->rowCount() == 1) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $hashed_password = $row['password'];

            // Use password_verify to check if the provided password matches the stored hash
            if (password_verify($password, $hashed_password)) {
                echo "<script>alert('You are logged in as a user!')</script>";
                $_SESSION['admin'] = $username;
                header('location:../admin/index.php');
                exit();
            } else {
                header('location:../logininterface/adminlogin.php?login_message=Invalid Username or Password!');
            }
        } else {
            header('location:../logininterface/adminlogin.php?login_message=User Does not exist');
        }
    }
}
?>
