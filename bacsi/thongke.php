<?php 
session_start();
if(isset($_SESSION['id']) &&isset($_SESSION['user'])&&isset($_SESSION['pass'])&&isset($_SESSION['phanquyen']))
{
	include("../Admin/assets/login_tmd.php");
	include('db-connect.php');
	$q= new login();
	$bs= new loginbs();
	$bs->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['phanquyen']);
	}
else
{
	header('location:../Admin/login.php');
	}
include("../Admin/assets/db_config.php");
$iduser=$_SESSION['id'];
$ten=$bs->luachon("SELECT bacsi.tenbs from bacsi where id='$iduser' limit 1");
$idbs=$bs->luachon("SELECT id from bacsi where id='$iduser' limit 1");
$ckbs=$bs->luachon("SELECT chuyenkhoa.tenck from bacsi inner join chuyenkhoa on bacsi.idck=chuyenkhoa.id where bacsi.id='$iduser' limit 1");
// $idpkb=$bs->luachon("SELECT id from phieukhambenh where id limit 1");


$layid =0;
if(isset($_REQUEST['id']))
{	
	$layid =$_REQUEST['id'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     
 <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
		.overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    transition: opacity 500ms;
    opacity: 1;
  }
  .overlay:target {
    visibility: visible;
    opacity: 1;
    
  }
  
  .popup {
    margin: 70px auto;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    width: 50%;
    position: relative;
    transition: all 5s ease-in-out;
  }
  
  .popup h2 {
    margin-top: 0;
    color: #333;
  }
  .popup .close {
    position: absolute;
    top: 20px;
    right: 30px;
    transition: all 200ms;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
  }
  .popup .close:hover {
    color: var(--primarycolorhover);
  }
  .popup .content {
    max-height: 30%;
    overflow: auto;
  }
  
  @media screen and (max-width: 700px){
    .box{
      width: 70%;
    }
    .popup{
      width: 70%;
    }

  }
  label{
    font-size: 15px;
 }
 input{
    font-size: 20px;
 }
 .selectt {
           
            display: none;
         
        }
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <title>Thống kê</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet"  type="text/css" href="../Admin/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css" integrity="sha512-yDUXOUWwbHH4ggxueDnC5vJv4tmfySpVdIcN1LksGZi8W8EVZv4uKGrQc0pVf66zS7LDhFJM7Zdeow1sw1/8Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    
<div class="main-wrapper">
<div class="header">
        <div class="header-left" style="width:300px">
            <a href="index.php" class="logo">
                <img src="../Admin/assets/img/logo.png" width="35" height="35" alt=""> <span>Phòng khám Đa Khoa ĐP</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="../Admin/assets/img/user.jpg" width="24" alt="Admin">
                        <span class="status online"></span>
                    </span>
                    <span><?php echo $ten; ?></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                </div>
            </li>
        </ul>        
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard"></i> <span>Trang chủ</span></a>
                    </li>
                    <li class="submenu">
                            <a href="#" id="menu_patien"><i class="fa fa-calendar-week"></i><span> Lịch hẹn khám</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="appointment.php">Lịch khám</a></li>
                               <li><a href="hisappointment.php">Lịch sử khám</a></li>
                            </ul>
                        </li> 
                        <li class="submenu">
                            <a href="#" id="menu_patient"><i class="fa fa-receipt"></i><span> Phiếu khám bệnh</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="phieukhambenh.php">Phiếu khám bệnh</a></li>
                               <li><a href="phieuxetnghiem.php">Phiếu xét nghiệm</a></li>
                               <li><a href="phieusieuam.php">Phiếu siêu âm</a></li>

                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="medicine.php"><i class="fa fa-file-invoice"></i><span>Kê đơn thuốc</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <!-- <li><a href="medicine.php">Kê đơn thuốc</a></li> -->
                               <li><a href="timkiemthuoc.php">Hóa đơn thuốc</a></li>
                            </ul>
                        </li>  
                  
                       <li >
                        <a href="schedule.php"><i class="fa fa-calendar"></i><span> Lịch trình của tôi </span></a>
                    </li>
                    <li class="submenu">
                            <a href="patients.php" id="menu_patient"><i class="fa fa-users"></i> <span> Thông tin bệnh nhân</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="patients.php">Bệnh nhân</a></li>
                               <li><a href="benhan.php">Bệnh án</a></li>
                            </ul>
                        </li>
                     
                    <li>
                        <a href="doctor.php?ten=<?php echo $ten ?>"><i class="fa fa-user-md"></i><span>Thông tin cá nhân</span></a>
                    </li> 
                    <li><?php
                        echo '<a href="thongke.php?idbs='.$idbs.'"><i class="fa-solid fa-chart-simple"></i> <span>Thống kê</span></a>';
                    ?>
                        </li>   
                </ul>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
         <div class="content">
         <div class="row">
                 <div class="col-md-12">                       
                        <tr >
                            <td width="25%">
                            </td>
                            <td width="15%">
                                <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                                Ngày hôm nay :
                                </p>
                                <p class="heading-sub12" style="padding: 0;margin: 0;text-align: right;">
                                    <?php 
                                date_default_timezone_set('Asia/ho_chi_minh');       
                                $today = date('Y-m-d');
                                echo $today;
                                $lichkham = $mysqli->query("select  * from  lichkham where trangthai='Đã khám' AND idbs=$idbs ;");
                                $lichkham1= $mysqli->query("select  * from lichkham where trangthai='Chưa khám' and idbs=$idbs ;");
                                $phieukhambenh= $mysqli->query("select  * from phieukhambenh where idbs=$idbs ;");
                                $phieuxetnghiem= $mysqli->query("select  * from phieuxetnghiem where idbs=$idbs ;");
                                $phieusieuam= $mysqli->query("select  * from phieusieuam where idbs=$idbs ;");
                                $donthuoc= $mysqli->query("select  * from donthuoc where idbs=$idbs ;");
                                $lichtrinh= $mysqli->query("select  * from lichtrinh where idbs=$idbs AND ngaykham >='$today' ;");




            
                        ?>
                        </p>
                    </td>
                </tr>
                
                 </div>
         </div>
         <div class="row">
                    <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">Thống kê</p>
           </div>
            <div class="row">
                    
                    <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa-solid fa-stethoscope"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php    echo  $lichkham->num_rows  ?></h3>
                                <span class="widget-title2">Đã khám<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa-solid fa-stethoscope"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3> <?php    echo $lichkham1->num_rows  ?></h3>
                                <span class="widget-title1">Chưa khám<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa-solid fa-file-invoice"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3> <?php    echo $donthuoc->num_rows  ?></h3>
                                <span class="widget-title4">Đơn thuốc<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-file"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3> <?php    echo $phieukhambenh->num_rows  ?></h3>
                                <span class="widget-title3">Phiếu khám<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa-solid fa-vials"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3> <?php    echo $phieuxetnghiem->num_rows  ?></h3>
                                <span class="widget-title3">Xét nghiệm<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa-solid fa-file-pen"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3> <?php    echo $phieusieuam->num_rows  ?></h3>
                                <span class="widget-title3">Siêu âm<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa-solid fa-calendar"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3> <?php    echo $lichtrinh->num_rows  ?></h3>
                                <span class="widget-title3">Lịch trình<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                   
                    </div>
                    <div class="row">
                        <div class="col col-sm-8">Tổng bệnh nhân khám bệnh </div>
                        <div class="col col-sm-4">
                            <input type="text" id="daterange_textbox" class="form-control" readonly />
                        </div>
                    </div>
          
                    <div class="row">
                        <div class="col-md-12">
                    
                        <div class="chart-container pie-chart">
                            <canvas id="bar_chart" height="40"> </canvas>
                        </div>
                        <table class="table table-striped table-bordered" id="thongke">
                            <thead>
                                <tr>
                                    <th>Số lịch hẹn</th>
                                    
                                    <th>Tổng số bệnh nhân khám trong ngày</th>
                                    <th>Ngày khám</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
               
                    </div>
               
            </div>
				
           

        </div>

</div>
</div>




<div class="sidebar-overlay" data-reff=""></div>
    <script src="../Admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="../Admin/assets/js/popper.min.js"></script>
    <script src="../Admin/assets/js/bootstrap.min.js"></script>
    <script src="../Admin/assets/js/jquery.slimscroll.js"></script>
    <script src="../Admin/assets/js/Chart.bundle.js"></script>
    <script src="../Admin/assets/js/chart.js"></script>
    <script src="../Admin/assets/js/app.js"></script>

      
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
        <link href="library/dataTables.bootstrap5.min.css" rel="stylesheet" />
        <link href="library/daterangepicker.css" rel="stylesheet" />
        <script src="library/jquery.min.js"></script>
        <script src="library/bootstrap-5/bootstrap.bundle.min.js"></script>
        <script src="library/moment.min.js"></script>
        <script src="library/daterangepicker.min.js"></script>
        <script src="library/Chart.bundle.min.js"></script>
        <script src="library/jquery.dataTables.min.js"></script>
        <script src="library/dataTables.bootstrap5.min.js"></script>
      


<script>

$(document).ready(function(){

    fetch_data();

    var sale_chart;

    function fetch_data(start_date = '', end_date = '',idbs='')
    {
        var dataTable = $('#thongke').dataTable({
            
            "processing" : true,
            "serverSide" : true,
            "order" : [],
            ajax : {
                url:"action_thongke.php",
                type:"POST",
                data:{action:'fetch',idbs:idbs, start_date:start_date, end_date:end_date}
            },
            "drawCallback" : function(settings)
            
            {
                var sales_date = [];
                var sale = [];

                for(var count = 0; count < settings.aoData.length; count++)
                {
                    sales_date.push(settings.aoData[count]._aData[2]);
                    sale.push(parseFloat(settings.aoData[count]._aData[1]));
                }

                var chart_data = {
                    labels:sales_date,
                    datasets:[
                        {
                            label : 'Tổng bệnh nhân trong ngày',
                            backgroundColor : 'rgb(124, 224, 114)',
                            color : '#fff',
                            data:sale
                        }
                    ]   
                };

                var group_chart3 = $('#bar_chart');

                if(sale_chart)
                {
                    sale_chart.destroy();
                }

                sale_chart = new Chart(group_chart3, {
                    type:'bar',
                    data:chart_data
                });
            }
        });
    }

    $('#daterange_textbox').daterangepicker({
        ranges:{
            'Ngày hôm nay' : [moment(), moment()],
            'Ngày hôm qua' : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Trong 1 tuần' : [moment().subtract(6, 'days'), moment()],
            'Trong 30 ngày' : [moment().subtract(29, 'days'), moment()],
            'Tháng này' : [moment().startOf('month'), moment().endOf('month')],
            'Tháng vừa qua' : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        format : 'YYYY-MM-DD'
    }, function(start, end){

        $('#thongke').DataTable().destroy();

        fetch_data(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));

    });

});

</script>

</html>
        