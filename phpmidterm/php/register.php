<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css?v=<php echo time(); ?>">
  
    <title>REGISTRATION PAGE</title>
</head>

<body>

    <h2>REGISTRATION PAGE</h2>
    <span>
        <?php
     if(isset($_GET['message'])){
        echo $_GET['message'];
        }
    ?></span>
    <form action="register_account.php" method="post" >
        <input type="text" name="firstname" id="" placeholder="Enter First Name">
        <br><br>
        <input type="text" name="lastname" id="" placeholder="Enter Last Name">
        <br><br>
        <input type="text" name="username" id="" placeholder="Enter Username">
        <br><br>
        <input type="password" name="password" id="" placeholder="Enter Password">
        <input type="submit" name="register" value="Register">
        <br><br>


    </form>
    
        
    
</body>
</html>