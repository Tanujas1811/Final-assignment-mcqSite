<?php

 include '../Classes/database.php';
 $db=new Database();
 $id = $_GET['id'];
 $ptitle=$_GET['otitle'];
 $oid=$_GET['oid'];
 $qid=$_GET['qid'];

 if(isset($_POST['done'])){
  $otitle = $_POST['otitle'];
 
 
 $q = " update options set option_title='$otitle' where option_id=$oid ;";

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

 <label> Option Title: </label>
 <input type="text" name="otitle" class="form-control" value="<?php echo $ptitle?>"><br>

 <button class="btn btn-success" type="submit" name="done" > Submit </button><br>

 </div>
 </form>
 </div>
</body>
</html>
