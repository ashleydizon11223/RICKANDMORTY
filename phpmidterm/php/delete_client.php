<?php
  session_start();
  if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin')
  {
    header("Location: index.php");
  }
  //include connection string
  include('database/connection.php');


  //check if client ID is provided in the URL
  if(isset($_GET['ID'])){
        $client_ID = $_GET['ID'];
        //Delete client from the database
        $delete_sql= "DELETE FROM users WHERE ID = '$client_ID'";
        if($conn->query($delete_sql) === TRUE){
            header("Location: admin_dashboard.php?deletesuccess");
        }
        else{
            echo "Error Deleting Client:" .$conn->error;
        }
  }
  else {
    header("Location: admin_dashboard.php");
  }
?>