<?php 
session_start();
include_once '../Classes/user.php';

$user = new User(); 
$db=new Database();
$total_que=0;
$q4= "select * from questions where topic='$_SESSION[exam_category]'; ";
$result4= $db->query($q4);
$total_que=$db->num_rows($result4);
echo $total_que;

?>