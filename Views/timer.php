<?php

        session_start();
        include_once '../Classes/user.php';

$user = new User(); 
$db=new Database();
$sql="select * from groups where group_id=1;";
$result = $db->query($sql);

while($rows=$db->fetch_row($result))
{
   $duration=$rows[1];
}

$_SESSION["duration"]=$duration;
 $_SESSION["start_time"]=date("Y-m-d H:i:s");
 $end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes',strtotime($_SESSION["start_time"])));

$_SESSION["end_time"]=$end_time;
?>
<script type="text/javascript">
window.location="god.php";
</script>




