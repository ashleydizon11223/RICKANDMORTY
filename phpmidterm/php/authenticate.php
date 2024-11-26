<?php
//include database connection file
include('database/connection.php');

//Star a session to manage user data
session_start();

//Check if the form is submitted using log in botton
if(isset($_POST['login']))
{
   //Sanitized the username input to prevent sql injection
   $username = $conn->real_escape_string($_POST['username']);

   //get password (NOTE: not yet encrypted)
   $password = $_POST['password'];
   
   // creat an sql query to select username from database
   $sql_username = "SELECT * FROM users WHERE username= '$username'";

   //execute the query
   $result = $conn->query($sql_username);

   // chech if the quary returned any results
   if($result->num_rows > 0 )
   {
        //Fetch all associated records based on username 
        //multiple records
        $row = $result -> fetch_assoc();

        //verify the providied password against the stored hash password.
        if(password_verify($password, $row['password']))
        {
           //declare session variables // password is correct
           $_SESSION['username'] = $username;
           $_SESSION['role'] = $row['role'];
           //redirect the user to appropriate dashboard
           if($row['role'] == 'admin'){
            header("Location: admin_dashboard.php");
           }
           elseif($row['role'] == 'client'){
            header("Location: client_dashboard.php");
           }

        }
        else
        {
            header("location: index.php?incorrect");
        }
   }
   else
   {
    header("location: index.php?incorrect");
   }
}
else
{
    header("location: index.php");
}
?> 