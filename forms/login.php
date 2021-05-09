<?php
session_start();
    include '../Classes/user.php';
    include_once '../Classes/database.php';
    include_once '../Operations/message.php';
   $db=new Database();
  $user = new User();
	if (isset($_REQUEST['submit'])) {
        extract($_REQUEST);
      
        $email=$_POST['email'];
        $password=$_POST['pwd'];
       // echo $sql="SELECT id FROM users WHERE email='$email'";



       $ret=$db->query("SELECT id FROM users WHERE email='$email'");
       $row =$db->fetch_row($ret);
       
       //print_r($ret);
       //while ($row = pg_fetch_row($ret)) {
       //echo $id=$row[7];
      //}
     
        //$id=$db->getResult();
      $_SESSION['id']=$row[0];
      //print_r($row);
      //die('here');
	    $login = $user->check_login($email, $password);
	    if ($login) {
            echo 'login successful';
          // Registration Success
          array_push($_SESSION['success'],"You're logged in.");
	       header("location:../Views/dashboard.php");
	    } else {
          // Registration Failed

          $error="Wrong username or password";
          echo '<script type="text/Javascript">';
          echo 'alert("Wrong username or password")';
          echo '</script>';
          array_push($_SESSION['errors'],"Wrong username or password");
            header('Location:login.php');
	        
	    }
    }
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP PostgreSQ Login  </title>
  <meta name="keywords" content="PHP,PostgreSQL,Insert,Login">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Login Here </h2>
  <form method="post">
  
     
    <div class="form-group" >
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