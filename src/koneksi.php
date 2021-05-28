<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";

    try {
        $dbh = new PDO("mysql:host=$hostname;dbname=minimarket500", $username, $password);
        // echo "Connected to database"; // check for connection
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $koneksi = mysqli_connect("$hostname", "$username", "", "minimarket500");
    if ($koneksi->connect_error) {
        die("Koneksi error: " . $koneksi->connect_error);
    }
