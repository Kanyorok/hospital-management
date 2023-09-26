<?php 

    $dsn = "mysql:host=localhost;dbname=hospital_management";
    $dbusername = "root";
    $dbpassword = "";

    try {
        $connect = new PDO($dsn, $dbusername, $dbpassword);
        $connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connect -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $connect -> setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

        define('APP_NAME', 'hospital_management API');
    } catch (PDOException $e) {
        echo "Connection failed: ".$e -> getMessage();
    }
    