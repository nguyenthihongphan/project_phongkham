<?php 
session_start();
if(isset($_SESSION['id']) &&isset($_SESSION['user'])&&isset($_SESSION['pass']))
{
	include("login_tmd.php");
	
	$q= new login();
	$q->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass']);
	}
else
{
	header('location:index1.php');
	}
$email=$_SESSION['username'];
$id=$_SESSION['id'];

include("../Admin/assets/db_config.php");
date_default_timezone_set('Asia/ho_chi_minh');
        
$today = date('Y-m-d');


    $userrow = $mysqli->query("select * from benhnhan where id='$id'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["id"];
    $username=$userfetch["tenbn"];


    if($_POST){
        if(isset($_POST["booknow"])){
			
            $id=$_POST["id"];
            $date=$_POST["ngaykham"];
            $idlt=$_POST["idlt"];
			$tenbs=$_POST["tenbs"];
			$soluongkham=$_POST["soluongkham"];
            
            $sql2="insert into lichkham(idbn,soluongkham,tenbs,idlt,lichngaykham) values ('$userid','$soluongkham','$tenbs','$idlt','$date')";
            $result= $mysqli->query($sql2);
            //echo $apponom;
            header("location: appointment.php?action=booking-added&id=".$idlt."&titleget=none");

        }
    }
 ?>
 