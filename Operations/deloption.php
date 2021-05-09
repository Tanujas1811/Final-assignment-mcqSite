<?php

include_once '../Classes/user.php';
$db=new Database();
$user = new User();
$qid=$_GET['qid'];
$id = $_GET['id'];
$oid=$_GET['oid'];
//$check=$user->isAdmin($id);
//if($check){
echo $q = " DELETE FROM options WHERE option_id = $oid ;";
 $result = $db->query($q);
header("location:options.php?id=$id&qid=$qid");
//}
?>