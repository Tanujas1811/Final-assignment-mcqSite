<?php
include '../Classes/database.php';
$db=new Database();
$id=$_GET['id'];
if(isset( $_FILES['csv'] )) :
  $csv_file = $_FILES['csv']['tmp_name'];
  if(is_file( $csv_file)) :
    if(($handle = fopen($csv_file,"r")) !== FALSE) :
       while (($csv_data = fgetcsv($handle, 1000, ",")) !== FALSE)  {
       $num = count($csv_data);
        for ($c=0; $c < $num; $c++):
          $colum[$c] = $csv_data[$c]; 
        endfor;         
        $inserted=$db->query("INSERT INTO questions (user_id,q_type,topic,question,duration)
         VALUES($id,'$colum[0]','$colum[1]','$colum[2]',$colum[3])");
       }
       $msg = "Data uploaded successfully.";
       fclose($handle);
    else :
      $msg = "unable to read the format try again";
    endif;
  else :
    $msg = "CSV format File not found";
  endif;
else :
    $msg = "Please try again.";
endif;
//$_SESSION['msg']=$msg;
$_SESSION['inserted']=$inserted;
//header("location:question.php");
echo "'<h4 class='text-success'>'$msg'</h4>'";
?>