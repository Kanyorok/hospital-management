<?php 

    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "hospital_management");

    $connect = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if(!$connect){
        die("Connection Failed");
    }