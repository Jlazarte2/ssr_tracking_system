<?php
    $servername = "localhost";
    $username = "admin";
    $password = "admin";
    $databasename = "ssr_database";

    $connections = mysqli_connect($servername, $username, $password, $databasename);
    if ($connections-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
        echo "Failed to connect to MySQL.";
    } else {
        echo "Connected.";
    }
?>