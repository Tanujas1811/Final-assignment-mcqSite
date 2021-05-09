<?php
session_start();
include_once '../Classes/user.php';

$user = new User(); 
$db=new Database();
$id = $_SESSION['id'];
$q = "select * from groups; ";
$result = $db->query($q);
$rows=$db->fetch_all($result);
$check=$user->isAdmin($id); 



?>


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <title>Dashboard page</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

      <!-- Bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
      <!--<link href="bootstrap/css/bootstrap.css" rel="stylesheet">-->
      <style>
    .cus{
    margin:5px;
    min-height: 100px;
    background-color:#D8BFD8;
    text-align:center;
    font-size: large;
  }
  .cus1{
    margin:5px;
    min-height: 600px;
    background-color:#FFF0F5;
    text-align:center;
    font-size: large;
  }
  .thumbnail img{
    height: 250px;
    width:100%;
  }
  a:link {
    color: blue;
    background-color: transparent;
    text-decoration: none;
  }
  
  a:visited {
    color:#900C3F;
    background-color: transparent;
    text-decoration: none;
  }
  
  a:hover {
    color: blue;
    background-color: transparent;
    text-decoration: none;
  }
  
  a:active {
    color:#900C3F;
    background-color: transparent;
    text-decoration: none;
  }
  .well{
    background-color: #C1FFC1;
  }
  
  
      </style>
     
</head>
<body style="background-color:powderblue;">
    <div id="app">
       

        <main class="py-4">
            
						 <nav class="navbar navbar-default navbar-inverse bg-warning navbar-fixed-top">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-target="#main" data-toggle="collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>      </div>

                <div class="navbar-collapse collapse" id="main">
                  <ul class="nav navbar-nav ">
                      <li class="active"><a href="dashboard.php">Home</a></li>
                      <li><a href="#">About</a></li>
                      <li><a href="#">Contact</a></li>
                      <li><a href="selectexam.php">Take Quiz</a></li>
                  </ul>

                  <ul class="nav navbar-nav navbar-right" style="margin-right:15px; margin-top:8px;">

                  <div class="dropdown">
                  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <li class="active"><?php $user->get_username($id); ?></li>
                  </button>
                 
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                  <?php if($check){ ?>
                  <a class="dropdown-item" href="usertable.php?id=<?php echo $id?>" style="margin-left:10px;">USER-TABLE</a>
                   <br/>
                   <a class="dropdown-item" href="question.php?id=<?php echo $id?>" style="margin-left:10px;">SET-QUESTIONS</a><br/>
                   <?php
                   }?>
                  <a class="dropdown-item" href="profilepage.php?id=<?php echo $id?>" style="margin-left:10px;">PROFILE</a>
                   <br/>
                  <a class="dropdown-item" href="index2.php" style="margin-left:10px;">LOGOUT</a>
                  </div>
                  </div>
                     
                  </ul>
                  
                  
                </div>
                  
             </nav>

             <?php include_once '../Operations/message.php';?>
            <div class="container" style="margin-top:180px; margin-left:360px;">
                    <div class="row">
                        <div class="col-md-8 offset-md-4">
                        <a href="dashboard.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Go Back</a><br/><br/>
                            
                            <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="well">
                            <h4 style="text-align:center">Select Exam Category </h4>
                            </div>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <?php 
                           
                                foreach($rows as $row=>$r)
                                {
                                    ?>
                                      
                              <input type="button" class="btn btn-success format-control dropdown-item" value="<?php echo $r['topic'];?>" style="margin-top:10px; margin-left:20px; background-color:grey; color:white" onclick="set_exam_type(this.value);"><br/>
                              
                      
                         
                                    
                               <?php }?>
                               </div>

                               </div>
                            
                           <br/><br/>
                               
                        </div>
                        
                    </div>
            </div>
        </main>
    </div>
    <script type="text/javascript">
        function set_exam_type(groups)
        {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.open("GET","../forajax/set_exam_type.php?exam_category="+groups,true);
            xmlhttp.send(null);
           
            xmlhttp.onreadystatechange=function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                  
                    window.location="exampage.php?topic="+groups;
                }
            };
           
            
            
        }
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>


