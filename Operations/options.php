<?php
session_start();
include_once '../Classes/user.php';
$user = new User(); 
$db=new Database();
//$id = $_SESSION['id'];
//if (!$user->get_session()){
    //echo 'hi';
//header("location:login.php");
//}

//if (isset($_GET['q'])){
 //$user->user_logout();
 //header("location:login.php");
 //}
 $id = $_GET['id'];
 $qid=$_GET['qid'];
 $quest="select question from questions where question_id=$qid;";
 $ret=$db->query($quest);
 $res=$db->fetch_row($ret);
  $q2="select q_type from questions where question_id=$qid;";
  $ret2=$db->query($q2);
  $res2=$db->fetch_row($ret2);
 $q = "select * from options where question_id=$qid; ";
 $result = $db->query($q);
 $rows=$db->fetch_all($result);
 $q3="select * from text where question_id=$qid;";
 $result2 = $db->query($q3);
 $rows2=$db->fetch_all($result2);

 $check=$user->isAdmin($id); 
 print_r($res);
//$rows=$posts->fetchAllPosts();


?>






<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <title>Choices</title>

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
    background-color: #20B2AA;
  }
  
  .jumbotron{
    background-color: #FFDAB9;
  }
  
      </style>
     
</head>
<body>
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
                      <li ><a href="dashboard.php">Home</a></li>
                      <li><a href="#">About</a></li>
                      <li><a href="#">Contact</a></li>

                  </ul>

                  <ul class="nav navbar-nav navbar-right" style="margin-right:15px; margin-top:8px;">
                
                            
                  <div class="dropdown">
                  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <li class="active"><<?php $user->get_username($id); ?></li>
                  </button>
                 
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                  <?php if($check){ ?>
                  <a class="dropdown-item" href="usertable.php" style="margin-left:10px;">USER-TABLE</a>
                   <br/>
                   
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
           
            <div class="container" style="margin-top:80px; margin-left:150px;">
            <h1 style="text-align: center"><b><?php echo $res[0]?></b></h1>
            <br/>

                    <div class="row">
                    <?php if($res2[0]!='open text'){?>
                    <a href="addoption.php?id=<?php echo $id; ?>&qid=<?php echo $qid; ?>&qtype=<?php echo $res2[0]; ?>" class="btn btn-primary" style="margin-left:150px;">Add Option</a>
                    <?php }?>
                    <a href="../Views/question.php?id=<?php echo $id; ?>" class="btn btn-primary" style="margin-left:150px;">Go back</a><br/><br/>
                                <div class="col-md-12 col-sm-8">

                                        <?php 
                                        if($res2[0]!='open text')
                                        {
                                        foreach ($rows as $row=>$r) {?>
                          
                                        <div class="well" style="height:60px width:100%;">
                                      
                                                <h3><?php echo $r['option_title']."\n" ?></h3>
                                                <div class="col-md-12 bg-light text-right">
                                                <button class="btn-info btn " style="margin-top :-100px"> <a href="updateoption.php?id=<?php echo $id; ?>&oid=<?php echo $r['option_id']; ?>&qid=<?php echo $qid;?>&otitle=<?php echo $r['option_title']?>" class="text-white"> Edit </a>  </button>
                                                <button class="btn-danger btn " style="margin-top :-100px"> <a href="deloption.php?id=<?php echo $id; ?>&oid=<?php echo $r['option_id']; ?>&qid=<?php echo $qid; ?>" class="text-white"> Delete </a>  </button>
                                                
 
                                        </div>
                                        
                                          </div>
                                              
                                
                                <?php  }?>
                              

                                <h2>Right Answer</h2>
                                <?php foreach ($rows as $row=>$r) {?>
                                    
                         
                                    <?php if($r['is_answer']==1){?>
                                      <div class="well" style="height:50px width:100%; background-color:#90EE90;">
                                  <h3><?php echo $r['option_title']."\n" ?></h3>
                                  
                                  <div class="col-md-12 bg-light text-right">
                                  </div>
                          
                          </div>
                                <?php } ?>
                                  

                         
                                
                  
                  <?php  } }
                    else{
                      foreach($rows2 as $row=>$r) {?> 

<div class="well" style="height:60px width:100%;">
                                      
                                      <h3><?php echo $r['answer']."\n" ?></h3>
                                      <div class="col-md-12 bg-light text-right"><br/><br/><br/><br/>
                                      <button class="btn-info btn " style="margin-top :-100px"> <a href="edittext.php?id=<?php echo $id; ?>&tid=<?php echo $r['text_id']; ?>&qid=<?php echo $qid;?>&ans=<?php echo $r['answer'] ?>" class="text-white"> Edit </a>  </button>
                                      <button class="btn-danger btn " style="margin-top :-100px"> <a href="deloption.php?id=<?php echo $id; ?>&tid=<?php echo $r['text_id']; ?>&qid=<?php echo $qid; ?>" class="text-white"> Delete </a>  </button>
                                      

                              </div>
                              <?php }}?>

                        
                        </div>
                    </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>