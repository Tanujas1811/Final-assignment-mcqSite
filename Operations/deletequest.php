<?php

include_once '../Classes/user.php';
$db=new Database();

$qid = $_GET['qid'];
$id = $_GET['id'];
//$check=$user->isAdmin($id);
//if($check){
$q = " DELETE FROM questions WHERE question_id = $qid ;";
 $result = $db->query($q);
header("location:../Views/question.php?id=$id");
//}
?>