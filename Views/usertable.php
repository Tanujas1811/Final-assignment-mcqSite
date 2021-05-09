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
 <h1 class="text-warning text-center" > Display Table Data </h1>
 <br>

 <a href="dashboard.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Go Back</a>

<br/><br/>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th> Id </th>
 <th> Username </th>
 <th> Password </th>
 <th> Email </th>
 <th> Status </th>
 <th> Role </th>
 <th> Created At </th>
 <th> Updated At </th>
 <th> Delete </th>
 <th> Update </th>

 </tr >

 <?php

include_once '../Classes/user.php';
$db=new Database();
$user = new User();
 $q = "select * from users; ";
 $result = $db->query($q);
 $rows=$db->fetch_all($result);

 foreach ($rows as $row=>$r) {
 ?>
 <tr class="text-center">
 <td> <?php echo $r['id'];  ?> </td>
 <td> <?php echo $r['username'];  ?> </td>
 <td> <?php echo $r['pass'];  ?> </td>
 <td> <?php echo $r['email'];  ?> </td>
 <td> <?php echo $r['status'];  ?> </td>
 <td> <?php echo $r['user_role'];  ?> </td>
 <td> <?php echo $r['created_at'];  ?> </td>
 <td> <?php echo $r['updated_at'];  ?> </td>
 <td> <button class="btn-danger btn"> <a href="../Operations/delete.php?id=<?php echo $r['id']; ?>" class="text-white"> Delete </a>  </button> </td>
 <td> <button class="btn-primary btn"> <a href="../Operations/updateuser.php?id=<?php echo $r['id']; ?>&role=<?php echo $r['user_role'];?>&status=<?php echo $r['status']; ?>" class="text-white"> Update </a> </button> </td>

 </tr>

 <?php 
 }
  ?>
 
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
