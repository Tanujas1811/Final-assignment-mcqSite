<?php

 include '../Classes/database.php';
 $db=new Database();
 $id = $_GET['id'];
 $pstatus=$_GET['status'];
 $prole=$_GET['role'];

 if(isset($_POST['done'])){
  $status = $_POST['status'];
  $role = $_POST['role'];
 
 $q = " update users set status='$status', user_role='$role' where id=$id  ";

 $result = $db->query($q);
 
 header('location:../Views/usertable.php');
 }

?>

<!DOCTYPE html>
<html>
<head>
 <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h1 class="text-white text-center">  Update Operation </h1>
 </div><br>

 <label> Status: </label>
 <input type="text" name="status" class="form-control" value="<?php echo $pstatus?>"><br>

 <label> Role: </label>
 <input type="text" name="role" class="form-control" value="<?php echo $prole?>"> <br>

 <button class="btn btn-success" type="submit" name="done" > Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>
