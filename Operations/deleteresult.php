<?php

include_once '../Classes/user.php';
$db=new Database();

$rid = $_GET['rid'];
$id = $_GET['id'];
//$check=$user->isAdmin($id);
//if($check){
echo $q = " DELETE FROM exam_results WHERE id = $rid ;";
 $result = $db->query($q);
header("location:../Views/viewresults.php?id=$id");
//}
?>