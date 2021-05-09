<?php

 include '../Classes/database.php';
 $db=new Database();
 $id = $_GET['id'];
 $pans=$_GET['ans'];
 $qid=$_GET['qid'];
 $tid=$_GET['tid'];

 if(isset($_POST['done'])){
  
 $ans=$_POST['ans'];
 
 $q = " update text set answer='$ans' where text_id=$tid ;";

 $result = $db->query($q);
 
 header("location:options.php?id=$id&qid=$qid");
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
 <h1 class="text-white text-center">  Update Option </h1>
 </div><br>

 <label> Answer: </label>
 <input type="text" name="ans" class="form-control" style="height:200px;" value="<?php echo $pans?>"><br>

 <button class="btn btn-success" type="submit" name="done" > Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>
