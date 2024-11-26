<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "markdizon";
//Connection string to connect database
$conn = new mysqli($host, $user, $password, $dbname);

if($conn  -> connect_error){

    die("Connection failed: ".$conn  -> connect_error);

}

?>  