<?php

include_once '../Classes/user.php';
$db=new Database();
$user = new User();
$qid=$_GET['qid'];
$id = $_GET['id'];
$tid=$_GET['tid'];
//$check=$user->isAdmin($id);
//if($check){
echo $q = " DELETE FROM text WHERE text_id = $tid ;";
 $result = $db->query($q);
header("location:options.php?id=$id&qid=$qid");
//}
?>