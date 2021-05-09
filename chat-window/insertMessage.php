<?php
    session_start();
    include '../Classes/database.php';
    $db=new Database();
    $fromuser=$_POST["fromuser"];
    $touser=$_POST["touser"];
    $message=$_POST["message"];
    $output="";
    $sql="INSERT INTO messages (fromuser,touser,message) values('$fromuser','$touser','$message')";
    $ret=$db->query($sql);
    
    
?>