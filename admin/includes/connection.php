<?php

$servername = "localhost";
$serverusername = "root";
$password = "";
$databasename = "upload_images";

$conn = new mysqli($servername, $serverusername, $password, $databasename) 
    or die ($conn->connect_error.'Error establishing connection to database');

?>
