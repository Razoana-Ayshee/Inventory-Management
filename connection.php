<?php
$name_server = "localhost";
$name_user = "root";
$password = "";
$name_database = "inventory_management";

// Create connection
$connection = mysqli_connect($name_server, $name_user, $password,$name_database);
// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}