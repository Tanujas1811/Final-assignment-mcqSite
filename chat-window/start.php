<?php
    session_start();
    include '../Classes/database.php';
     $db=new Database();
        $id=$_GET['id'];

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

      <!-- Bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
      <!--<link href="bootstrap/css/bootstrap.css" rel="stylesheet">-->

</head>
<body>
    <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-header">
                    <h4> Please Select Your Account </h4>
                    
                </div>
                <div class="modal-body">
                <ol>
             
                
                        <?php
                            $users= "SELECT * FROM users where id=$id;";
                            $result = $db->query($users);
                            $user=$db->fetch_all($result);
                            foreach($user as $row=>$r)
                            {?>
                            
                                <li><a href="chatbox.php?id=<?php echo $r['id']?>&name=<?php echo $r["username"]?>"><?php echo $r["username"] ?></a>
                                </li>
                            <?php }
                            ?>
                                          
                
                </ol>
              
               <br/><br/> 
                </div>
                <a href="../Views/dashboard.php?id=<?php echo $id?>"><--BACK</a> 
                
                
            </div>
    </div>

</body>
</html>
