<?php

include_once '../Classes/user.php';
$db=new Database();
$user = new User();

$id = $_GET['id'];
//$check=$user->isAdmin($id);
//if($check){
echo $q = " DELETE FROM users WHERE id = $id ;";
 $result = $db->query($q);
header('location:../Views/usertable.php');
//}
?>