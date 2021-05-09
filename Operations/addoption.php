<?php

 include '../Classes/database.php';
 //include '../Classes/posts.php';
 $db=new Database();
 //$post=new Posts();
 if(isset($_POST['done'])){

 $id = $_GET['id'];
 $qid=$_GET['qid'];
 $otitle = $_POST['otitle'];
 $isanswer = $_POST['isanswer'];
 $qtype=$_GET['qtype'];
    $sql="insert into options(question_id,q_type,option_title,is_answer) values($qid,'$qtype','$otitle','$isanswer');";
 $result =$db->query($sql);
 if($result){
 header("location:options.php?id=$id&qid=$qid");
 }
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
 <h1 class="text-white text-center"> Create Post </h1>
 </div><br>

 <label> Option Title: </label>
 <input type="text" name="otitle" class="form-control"> <br>

 <label> If Correct Option then type 1 else 0: </label>
 <input type="text" name="isanswer" class="form-control"> <br>


 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>
