<?php 

    $dsn = "mysql:host=localhost;dbname=hospital_management";
    $dbusername = "root";
    $dbpassword = "";

    try {
        $connect = new PDO($dsn, $dbusername, $dbpassword);
        $connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: ".$e -> getMessage();
    }