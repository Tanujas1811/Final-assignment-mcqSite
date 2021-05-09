<?php
    session_start();
    include '../Classes/database.php';
   $name=$_GET['name'];
   $id=$_GET['id'];
    $db=new Database();

?>
<!DOCTYPE html>
<html>
<head>
    <title>My Chatbox</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

 

      <!-- Bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
      <!--<link href="bootstrap/css/bootstrap.css" rel="stylesheet">-->

</head>
<body>
<div class="modal-body">
    <div class="container-fluid">
    <div class="row">
                    <div class="col-md-4">
                            <p>Hi <?php echo $name;?></p>
                            <input type="text" id="fromuser" value="<?php echo $id?>" hidden/>
                            <p> Send message to :</p>
                            <ul>
                                    <?php
                                            $users= "SELECT * FROM users;";
                                            $result = $db->query($users);
                                            $user=$db->fetch_all($result);
                                            foreach($user as $row=>$r)
                                            {?>
                                            
                                                <li><a href="?touser=<?php echo $r['id']?>&name=<?php echo $r["username"]?>"><?php echo $r["username"] ?></a>
                                                </li>
                                            <?php }
                                            
                                    ?>
                            </ul>
                            <a href="start.php?id=<?php echo $id?>"><--BACK</a>
                    </div>
                    <div>
                             <div class="modal-dialog">
                             <div class="modal-content">
                             <div class="modal-header">
                           
                                    <h4><?php 
                                    
                                            if(isset($_GET["touser"])){

                                                $usern= "SELECT * FROM users where id='".$_GET["touser"]."';";
                                                $result2 = $db->query($usern);
                                                $user2=$db->fetch_row($result2);
                                                ?>
                                                <input type="text" value="<?php echo $_GET["touser"] ?>" id="touser" hidden/>
                                               

                                           <?php 
                                           echo $user2[1];}
                                           else{
                                            $usern= "SELECT * FROM users where id='".$_GET["touser"]."';";
                                            $result2 = $db->query($usern);
                                            $user2=pg_fetch_assoc($result2);
                                            $_SESSION["touser"]=$user2['id'];

                                               
                                               ?>

                                            <input type="text" value="<?php echo $_SESSION["touser"] ?>" id="touser" hidden/>

                                          <?php
                                                 echo $user2['username']; }
                                           
                                           ?>


                                     </h4>
                    
                            </div>
                            <div class="modal-body" id="msgbody" style="height:400px; overflow-y:scroll; overflow-x:hidden;">
                                            <?php 
                                            if(isset($_GET["touser"])){
                                                    $chats= "SELECT * FROM messages where (fromuser=$id AND touser='".$_GET["touser"]."') OR (fromuser='".$_GET["touser"]."' AND touser=$id) ;";
                                                     $res = $db->query($chats);
                                                   
                                            }
                                               
                                               else{
                                                $chats= "SELECT * FROM messages where (fromuser=$id AND touser='".$_SESSION["touser"]."') OR (fromuser='".$_SESSION["touser"]."' AND touser=$id) ;";
                                                $res = $db->query($chats);
                                               


                                               }
                                               while($chat=pg_fetch_assoc($res))
                                               {
                                                   if($chat["fromuser"]==$id)
                                                   {
                                                       echo "<div style='text-align:right;'>
                                                            <p style='background-color:lightblue; word-wrap:break-word; display:inline-block;
                                                            padding:5px; border-radius:10px;max-width:70%;'>".$chat["message"]."</p></div>";
                                                   }
                                                   else{
                                                    echo "<div style='text-align:left;'>
                                                    <p style='background-color:yellow; word-wrap:break-word; display:inline-block;
                                                    padding:5px; border-radius:10px;max-width:70%;'>".$chat["message"]."</p></div>";
                                                   }
                                               }
                                               
                                               
                                               
                                               
                                               ?>

                                               <div class="modal-footer" style="margin-top:250px;">
                                                        <textarea id="message" class="form-control" style="height:70px;">

                                                        </textarea>
                                                        <button id="send" class="btn btn-primary" style="height:70%">send</button>

                                               </div>
                                            
                                    <br/><br/> 
                             </div>
                
                
                            </div>
                            </div>
                    </div>
           
    </div>
           
    </div>
    </div>

</body>
<script type="text/javascript">
    $(document).ready(function(){
        $("#send").on("click",function(){
                $.ajax({
                        url:"insertMessage.php",
                        method:"POST",
                        data:{
                            fromuser:$("#fromuser").val(),
                            touser:$("#touser").val(),
                            message:$("#message").val()
                        },
                        dataType:"text",
                        success:function(data)
                        {
                            $("#message").val("");
                        }

                });
        });
        setInterval(function(){
                $.ajax({
                        url:"realTimeChat.php",
                        method:"POST",
                        data:{
                            fromuser:$("#fromuser").val(),
                            touser:$("#touser").val()
                        },
                        dataType:"text",
                        success:function(data)
                        {
                            $("#msgbody").html(data);
                        }
                });
        },700);
    });

</script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  
</html>
