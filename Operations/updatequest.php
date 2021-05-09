<?php

 include '../Classes/database.php';
 $db=new Database();
 $id = $_GET['id'];
 $pstatus=$_GET['status'];
 $pquest=$_GET['quest'];
 $ptopic=$_GET['topic'];
 $qid=$_GET['qid'];

 if(isset($_POST['done'])){
  $status = $_POST['status'];
  $quest= $_POST['quest'];
  $topic= $_POST['topic'];
 
 $q = " update questions set status='$status', question='$quest',topic='$topic' where question_id=$qid ;";

 $result = $db->query($q);
 
 header("location:../Views/question.php?id=$id");
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
 <h1 class="text-white text-center">  Update Question </h1>
 </div><br>

 <label> Status: </label>
 <input type="text" name="status" class="form-control" value="<?php echo $pstatus?>"><br>

 <label> Question: </label>
 <input type="text" name="quest" class="form-control" value="<?php echo $pquest?>"> <br>
 <label> Topic: </label>
 <input type="text" name="topic" class="form-control" value="<?php echo $ptopic?>"> <br>

 <button class="btn btn-success" type="submit" name="done" > Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>
