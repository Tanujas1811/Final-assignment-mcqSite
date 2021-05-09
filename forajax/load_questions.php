<?php 
session_start();
include_once '../Classes/user.php';

$user = new User(); 
$db=new Database();
$question_no="";
$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$ans="";
$queno=$_GET["questionno"];
if(isset($_SESSION["answer"][$queno]))
{
    $ans=$_SESSION["answer"][$queno];
}






$q5= "select question from questions where topic='$_SESSION[exam_category]'; ";
$result5= $db->query($q5);

$count=$db->num_rows($result5)+1-$queno;
$row=$db->fetch_all($result5);
if($count==0)
{
    echo "over";
}
else{
    
   
        echo $question_no=$queno;
        $question=$row[$question_no-1]['question'];
        $sq="select question_id from questions where question='$question'";
        $result6= $db->query($sq);
        $idrow=$db->fetch_row($result6);
        $sq2="select option_title from options where question_id='$idrow[0]';";
        $result7= $db->query($sq2);
        $idrow2=$db->fetch_all($result7);
        $opt1=$idrow2[0]['option_title'];
        $opt2=$idrow2[1]['option_title'];
        $opt3=$idrow2[2]['option_title'];
        $opt4=$idrow2[3]['option_title'];
       
    ?>


<br/>
<table >
    <tr>
        <td style="font-weight:bold; font-size:18px; padding-left:60px" colspan="2">
            <?php echo "(".$question_no .")". $question;?>
        </td>
    </tr>
</table>
<table style="margin-left:10px">
    <tr>
        <td style="font-weight:bold; font-size:18px; padding-left:60px" colspan="2">
            <input type="radio" name="r1" id="r1" value="<?php echo $opt1 ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
           <?php if($ans==$opt1)
               echo "checked";
           ?>
           
           ><?php echo $opt1 ?>
        </td>

        
    </tr><br/>
    <tr>
        <td style="font-weight:bold; font-size:18px; padding-left:60px" colspan="2">
            <input type="radio" name="r1" id="r1" value="<?php echo $opt2 ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
         
            <?php if($ans==$opt2)
               echo "checked";
           ?>
         
         ><?php echo $opt2 ?>
        </td>

        
    </tr><br/>
    <tr>
        <td style="font-weight:bold; font-size:18px; padding-left:60px" colspan="2">
            <input type="radio" name="r1" id="r1" value="<?php echo $opt3 ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
          
            <?php if($ans==$opt3)
               echo "checked";
           ?>
          
           ><?php echo $opt3 ?>
        </td>

        
    </tr><br/>

    <tr>
        <td style="font-weight:bold; font-size:18px; padding-left:60px" colspan="2">
            <input type="radio" name="r1" id="r1" value="<?php echo $opt4 ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
          
            <?php if($ans==$opt4)
               echo "checked";
           ?>
          
           ><?php echo $opt4 ?>
        </td>

        
    </tr><br/>

</table>
<?php }?>
