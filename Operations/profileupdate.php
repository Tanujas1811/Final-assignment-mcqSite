<?php

 include '../Classes/database.php';
 $db=new Database();
 $id = $_GET['id'];
 $pgender= $_GET['gen'];
 $pname= $_GET['name'];
 $pmail = $_GET['email'];
 $pno = $_GET['pno'];

 if(isset($_POST['done'])){


 $username = $_POST['username'];
 $gender = $_POST['gender'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 $q = " update userprofile set username='$username', gender='$gender',phone_no=$phone,email='$email' where user_id=$id  ";
 $q2 = " update users set username='$username',email='$email' where id=$id  ";
 $result = $db->query($q);
 $result2= $db->query($q2);
 header("location:../Views/profilepage.php?id=$id");
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
 <h1 class="text-white text-center">  Update Profile </h1>
 </div><br>

 <label> Username: </label>
 <input type="text" name="username" class="form-control" value="<?php echo $pname?>"> <br>

 <label> Gender: </label>
 <input type="text" name="gender" class="form-control" value="<?php echo $pgender?>"> <br>
 <label> Phone-no: </label>
 <input type="text" name="phone" class="form-control" value="<?php echo $pno?>"> <br>
 <label> Email: </label>
 <input type="text" name="email" class="form-control" value="<?php echo $pmail?>"> <br>

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>
