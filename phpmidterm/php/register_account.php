<?php

include('database/connection.php');

if(isset($_POST['register']))
{
   
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];

   $username = $conn->real_escape_string($_POST['username']);
   $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
   $role = "client";

  
   $check_sql = "SELECT username FROM users WHERE username='$username'";
 
   $result = $conn->query($check_sql);
   
   if($result->num_rows > 0)
   {
        header("Location: register.php?message=Username already exists, please choose another one");
   }
   else
   {
        
        $sql = "INSERT INTO users (`ID`, `firstname`, `lastname`, `username`, `password`, `role`)
        VALUES (null, '$firstname', '$lastname', '$username', '$password', '$role')";

        if($conn->query($sql) === TRUE)
        {
            header('Location: index.php');
        }
        else{
            echo "Error ".$sql."<br>".$conn->error;
        }
   }
}

?>  