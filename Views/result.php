
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


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
    background-color: #F8C5C5;
  }
 
  
  
      </style>



<?php
 session_start();
 $date=date("Y-m-d H:i:s");
 $_SESSION["end_time"]=date("Y-m-d H:i:s",strtotime($date."+$_SESSION[duration] minutes"));

 include_once '../Classes/user.php';

$user = new User(); 
$db=new Database();


 ?>
 <body style="background-color:powderblue;">
    <div class="row" style="">

        <div class="col-lg-6 offset-lg-3">
              <?php  $correct=0;
                $wrong=0;
                if(isset($_SESSION["answer"]))
                {
                    $sq="select question_id from questions where topic='$_SESSION[exam_category]'";
                    $result6= $db->query($sq);
                    $idrow=$db->fetch_all($result6);
               

                    for($i=0;$i<sizeof($_SESSION["answer"]);$i++)
                    {
                        $temp=$idrow[$i]["question_id"];

                        $sq3="select option_title from options where question_id=$temp and is_answer=1;";
                        $result8= $db->query($sq3);
                         $idrow3=$db->fetch_row($result8);
                        $answer=$idrow3[0];
                        $answer;
                        if(isset($_SESSION["answer"][$i+1]))
                        {
                            if($answer==$_SESSION["answer"][$i+1])
                            {
                                $correct=$correct+1;
                            }
                            else{
                                $wrong=$wrong+1;
                            }
                        }
                        else{
                            $wrong=$wrong+1;
                        }
                           
                    }
                }
         




                $count=0;
                $sq="select question_id from questions where topic='$_SESSION[exam_category]'";
                $result6= $db->query($sq);
                $count=$db->num_rows($result6);
                $wrong=$count-$correct;
           

               ?>
        </div>
    </div>
    <div class="container" style="margin-top:180px; margin-left:260px;margin-right:360px; text-align:center">
    <div class="block" style="margin-right:100px; background-color:#9ACD32">
                            <h4 style="text-align:center">Your Answers Have Been Submitted Successfully </h4><br/>
                    </div><br/><br/>
                    <div class="row">
                   
                    <div class="col-md-8 offset-md-4">
                    

                        <div class="well" style="margin-right:270px;">
                            <h2 style="text-align:center">Total Questions: <?php echo $count?></h2><br/>
                        </div><br/>
                        <div class="well" style="margin-right:270px;">
                            <h1 style="text-align:center">Correct Answer:  <?php echo $correct?></h1><br/>
                        </div><br/>
                        <div class="well" style="margin-right:270px;">
                            <h1 style="text-align:center">Wrong Answer:  <?php echo $wrong?></h1><br/>
                        </div><br/>
                        
                    </div>
                    
    </div><br/><br/>
            <a href="selectexam.php" class="btn btn-primary" style="margin-left:450px;">Go back</a><br/><br/>

        </body>
<?php 
 $_SESSION["exam_start"];
if(isset($_SESSION["exam_start"]))
{
    $date=date("Y-m-d");
    

    $q9="insert into exam_results(user_id,total_question,correct_answer,wrong_answer,exam_time,topic) values($_SESSION[id],$count,$correct,$wrong,'$date','$_SESSION[exam_category]')";
    $result9= $db->query($q9);
    
}
if(isset($_SESSION["exam_start"]))
{
    unset($_SESSION["exam_start"]);
}
if(isset($_SESSION["answer"]))
{
unset($_SESSION["answer"]);
}
?>

