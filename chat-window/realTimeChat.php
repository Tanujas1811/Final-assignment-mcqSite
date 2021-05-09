<?php
    session_start();
    include '../Classes/database.php';
    $db=new Database();
    $fromuser=$_POST["fromuser"];
    $touser=$_POST["touser"];
    $output="";
    $sql2="SELECT * FROM messages where (fromuser='".$fromuser."' AND touser='".$touser."') OR (fromuser='".$touser."' AND touser='".$fromuser."')";
    $chats=$db->query($sql2);
    while($chat=pg_fetch_assoc($chats))
    {
        if($chat["fromuser"]==$fromuser)
        {
            $output.= "<div style='text-align:right;'>
                 <p style='background-color:lightblue; word-wrap:break-word; display:inline-block;
                 padding:5px; border-radius:10px;max-width:70%;'>".$chat["message"]."</p></div>";
        }
        else{
         $output.= "<div style='text-align:left;'>
         <p style='background-color:yellow; word-wrap:break-word; display:inline-block;
         padding:5px; border-radius:10px;max-width:70%;'>".$chat["message"]."</p></div>";
        }
    }
    echo $output;
    
?>