<?php
session_start();
include '../Classes/user.php'; 
include_once '../Classes/database.php';
include_once '../Operations/message.php';
$db=new Database();
 $user = new User(); // Checking for user logged in or not

 if (isset($_REQUEST['submit'])){
 extract($_REQUEST);
 $username=$_POST['username'];
 $email=$_POST['email'];
 $password=$_POST['pwd'];
 $role=$_POST['role'];


 $register = $user->reg_user($username, $email,$password);
 if ($register) {
  $ret=$db->query("SELECT id FROM users WHERE email='$email';");
  $sql="SELECT id FROM users WHERE email='$email';";
        $row =$db->fetch_row($ret);
        $_SESSION['id']=$row[0];
 // Registration Success
 echo '<script type="text/Javascript">';
 echo 'alert("Successfully Registered")';
 echo '</script>';
 echo 'Registration successful ';
 array_push($_SESSION['success'],"You're logged in.");
 header("location:../Views/dashboard.php");
 } else {
 array_push($_SESSION['errors'],"Registration failed. Email or Username already exits please try again");
 header("location:register.php");
 echo '<script type="text/Javascript">';
 echo 'alert("Registration failed. Email or Username already exits please try again")';
 echo '</script>';
 }
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP PostgreSQL Registration </title>
  <meta name="keywords" content="PHP,PostgreSQL,Insert,Login">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register Here </h2>
  <form method="post">
  
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter name" name="username" requuired>
    </div>
    
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    
    
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
     
    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
  </form>
</div>

</body>
</html>



