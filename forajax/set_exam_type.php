<?php 
session_start();
include_once '../Classes/user.php';
$db=new Database();
$exam_category=$_GET['exam_category'];
$_SESSION["exam_category"]=$exam_category;
echo $sql="select * from groups where topic='$exam_category';";

$result = $db->query($sql);

while($rows=$db->fetch_row($result)){
   $_SESSION['duration']=$rows[1];
        

}
$date=date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s",strtotime($date."+$_SESSION[duration] minutes"));
$_SESSION["exam_start"]="yes";


?>