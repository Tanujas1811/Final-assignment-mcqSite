<?php

 include '../Classes/database.php';
 //include '../Classes/posts.php';
 $db=new Database();
 //$post=new Posts();
 if(isset($_POST['done'])){

 $id = $_GET['id'];
 $qtype = $_POST['qtype'];
 $topic = $_POST['topic'];
 $quest = $_POST['quest'];
 $duration = $_POST['duration'];
    $sql="insert into questions(user_id,q_type,topic,question,duration) values($id,'$qtype','$topic','$quest',$duration);";
 $result =$db->query($sql);
 if($result){
 header("location:../Views/question.php?id=$id");
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
 <h1 class="text-white text-center"> Add Question </h1>
 </div><br>

 <label> Question Type: </label>
 <input type="text" name="qtype" class="form-control"> <br>

 <label> Topic: </label>
 <input type="text" name="topic" class="form-control"> <br>
 <label> Question: </label>
 <input type="text" name="quest" class="form-control"> <br>
 <label> Duration: </label>
 <input type="text" name="duration" class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>
