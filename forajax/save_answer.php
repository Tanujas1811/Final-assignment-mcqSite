<?php 
session_start();
include_once '../Classes/user.php';

$user = new User(); 
$db=new Database();

$questionno=$_GET["questionno"];
$value1=$_GET["value1"];
$_SESSION["answer"]["$questionno"]=$value1;

?>