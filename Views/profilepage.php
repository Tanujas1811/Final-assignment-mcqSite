<?php

include_once '../Classes/user.php';
$db=new Database();
$user = new User();
$id=$_GET['id'];
 $q = "select * from userprofile where user_id=$id; ";
 $result = $db->query($q);
 $rows=$db->fetch_all($result);




 $statusMsg = '';

// File upload path
$targetDir = "../Images/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT into userprofile_pic (profile_pic) VALUES ('".$fileName."')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = '';
}

// Display status message
echo $statusMsg;
$query = $db->query("SELECT profile_pic FROM userprofile");







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

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>
<body>

 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" > User Profile </h1>
 <br>

 <a href="dashboard.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Go Back</a>


<br/>
<?php // Get images from the database
$query = $db->query("SELECT profile_pic FROM userprofile");

if($db->num_rows($query) > 0){
    while($row = pg_fetch_assoc($query)){
        $imageURL = '../Images/'.$row["file_name"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>

<img src="../Images/p1.jpg" style=" display: block; height: 200px; width: 25%; margin: 0px auto; border-radius: 50%;">
<div class="row">
<form method="POST" action="" enctype="multipart/form-data">
      <input type="file" name="file" value=""/>
     
      <div>
      <input type="submit" name="submit" value="Upload">
        </div>
  </form>
  </div>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <?php foreach ($rows as $row=>$r) {
       $name=$r['username'];
       $gender=$r['gender'];
       $pno=$r['phone_no'];
       $email=$r['email'];
 ?>
 <tr>
 <th> Username </th> <td> <?php echo $r['username'];  ?> </td></tr><tr>
 <th> Gender </th> <td> <?php echo $r['gender'];  ?> </td></tr><tr>
 <th> Phone no </th> <td> <?php echo $r['phone_no'];  ?> </td></tr><tr>
 <th> Email </th> <td> <?php echo $r['email'];  ?> </td></tr><tr>
 <th> Userid</th> <td> <?php echo $r['user_id'];  ?> </td></tr>
 

 <?php }?>
<tr>
    
 <td> <button class="btn-primary btn"> <a href="../Operations/profileupdate.php?id=<?php echo $id?>&name=<?php echo $name ?>&gen=<?php echo $gender?>&pno=<?php echo $pno?>&email=<?php echo $email?>"  class="text-white"> Update </a> </button> </td>

 </tr>


 
 </table>  

 </div>
 </div>

 <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 
 </script>

</body>
</html>
