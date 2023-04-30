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


</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <title>Lịch hẹn khám</title>
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

                                $sqlmain= $mysqli->query("select lichkham.phidichvu,lichkham.trangthai, lichkham.id,bacsi.tenbs,benhnhan.tenbn,lichkham.idbn, lichtrinh.ngaykham,lichkham.giokham,lichkham.lichngaykham from lichkham inner join lichtrinh on lichtrinh.id=lichkham.idlt inner join benhnhan on benhnhan.id=lichkham.idbn inner join bacsi on lichtrinh.idbs=bacsi.id  where lichtrinh.ngaykham>='$today' AND lichkham.trangthai='Chưa khám' AND lichkham.trangthaithanhtoan='Đã thanh toán' order by lichtrinh.ngaykham asc ");
                        ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                    <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">Tổng lịch khám( <?php echo $sqlmain->num_rows; ?> )</p>
                    </td>                   
                </tr>
                <div class="row">
                    <div class="col-sm-4 col-3">
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-phieukhambenh.php"  class="btn btn-primary text-center "><span style="font-size: 20px;">+ </span>Tạo phiếu khám bệnh</a>
                    </div>
                </div>
                <tr>
                    <td colspan="4" style="padding-top:0px;width: 100%;" >
                        <center>
                        <table class="filter-container" border="0" >
                        <tr>
                           <td width="10%">
                           </td> 
                        <td width="5%" style="text-align: center;" >
                        Ngày:
                        </td>
                        <td width="30%">
                        <form action="" method="post">
                            <input class="form-control" type="date" name="ngaykham" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;">
                        </td>                       
                    <td width="12%">
                        <input type="submit"  name="filter" value=" Lọc" class=" btn-primary-soft btn button-icon btn-filter text-light"  style="background-color:#009FEB; margin :0;width:100%">                     
                    </td>
                    </form>
                    </tr>
                            </table>
                        </center>
                    </td>                    
                </tr>
                <br>
                <?php
               // $sqlmain="select * from lichkham";
               $sqlmain= "select lichkham.phidichvu,lichkham.trangthai, lichkham.id,bacsi.tenbs,benhnhan.tenbn,lichkham.idbn, lichtrinh.ngaykham,lichkham.giokham,lichkham.lichngaykham from lichkham inner join lichtrinh on lichtrinh.id=lichkham.idlt inner join benhnhan on benhnhan.id=lichkham.idbn inner join bacsi on lichtrinh.idbs=bacsi.id  where lichtrinh.ngaykham>='$today' AND lichkham.trangthai='Chưa khám' AND lichkham.trangthaithanhtoan='Đã thanh toán' order by lichtrinh.ngaykham asc ";

                // $sqlmain= "select lichkham.phidichvu,lichkham.trangthai, lichkham.id,bacsi.tenbs,benhnhan.tenbn,lichkham.idbn, lichtrinh.ngaykham,lichkham.giokham,lichkham.lichngaykham from lichkham inner join lichtrinh on lichtrinh.id=lichkham.idlt inner join benhnhan on benhnhan.id=lichkham.idbn inner join bacsi on lichtrinh.idbs=bacsi.id  where lichtrinh.ngaykham>='$today' AND lichkham.trangthai='Chưa khám' AND lichkham.trangthaithanhtoan='Đã thanh toán' order by lichtrinh.ngaykham asc ";
                    if($_POST){
                        //print_r($_POST);
                        if(!empty($_POST["ngaykham"])){
                            $sheduledate=$_POST["ngaykham"];
                            $sqlmain.=" and lichtrinh.ngaykham='$ngaykham' ";
                        };
                        //echo $sqlmain;
                    }
                ?>
                 
                <div class="col-md-12">
						<div class="table-responsive">
                                <table class="table table-border table-striped custom-table mb-0">
                                    <thead>
                            <tr>
                                    <th>Mã lịch hẹn</th>
                                    <th>Tên bệnh nhân</th>                               
                                    <th>Ngày khám</th>
                                    <th>Thời gian khám </th>
                                    <th>Ngày đặt khám</th>
                                                                
                                    <th class="text-center">Lựa chọn</tr>
                            </thead>
                            <tbody>
                                <?php
                                    $result= $mysqli->query($sqlmain);
                                    if($result->num_rows==0){
                                        echo '<tr>
                                        <td colspan="7">
                                        <br><br><br><br>
                                        <center>
                                        <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">không tìm thấy</p>
                                    </center>
                                        <br><br><br><br>
                                        </td>
                                        </tr>';    
                                    }
                                    else{
                                    for ( $x=0; $x<$result->num_rows;$x++){
                                        $row=$result->fetch_assoc();
                                        $appoid=$row["id"];
                                        $scheduleid=$row["idlt"];
                                        $idbn=$row["idbn"];
                                        $docname=$row["tenbs"];
                                        $scheduledate=$row["ngaykham"];
                                        $scheduletime=$row["giokham"];
                                        $pname=$row["tenbn"];
                                        $trangthai=$row["trangthai"];
                                        $phidichvu=$row["phidichvu"];
                                        $appodate=$row["lichngaykham"];
                                        echo '<tr>
                                            <td>'.$appoid.'</td>
                                            <td> '.substr($pname,0,35).'</td>
                                            <td>'.substr($scheduledate,0,10).'</td>
                                            <td>'.substr($scheduletime,0,5).'</td>
                                            <td>'.$appodate.'</td>
                                           
                                            
                                            <td>
                                            <div style="display:flex;justify-content: center;">
                                            <button class="btn btn-success "><a class="text-light" href="khambenh.php?id='.$appoid.'&idbn='.$idbn.'" > Khám bệnh </a></button>
                                        &nbsp;&nbsp;&nbsp;
                                        <button class="btn btn-danger "><a class="text-light" href="?action=Xemchitiet&id='.$appoid.'&idbn='.$idbn.'" > Xem chi tiết </a></button>
                                        &nbsp;&nbsp;&nbsp;
                                        </div>
                                            </td>
                                        </tr>';                                    
                                    }
                                }
                                    
                                     
                                ?>
 
                                </tbody>
    
                            </table>
                            </div>
                            </center>
                       </td> 
                    </tr>
                           
                            
                            
                </table>
            </div>
      
    <?php 
    if($_GET){
        
        $id=$_GET["id"];
        $action=$_GET["action"];
            $sqlmain= "select *,benhnhan.email, benhnhan.sdt,lichkham.trangthai,lichkham.trangthaithanhtoan, lichkham.phidichvu,lichkham.trangthai, lichkham.id,bacsi.tenbs,benhnhan.tenbn,lichkham.idbn, lichtrinh.ngaykham,lichkham.giokham,lichkham.lichngaykham from lichkham inner join lichtrinh on lichtrinh.id=lichkham.idlt inner join benhnhan on benhnhan.id=lichkham.idbn inner join bacsi on lichtrinh.idbs=bacsi.id where lichkham.id= '$id'";
            
            $result= $mysqli->query($sqlmain);
            $row=$result->fetch_assoc();
            $name=$row["tenbn"];
            $idbn=$row["idbn"];
            $email=$row["email"];
            $ngaykham=$row["lichngaykham"];
            $tele=$row["sdt"];
            $address=$row["diachi"];
            $giokham=$row["giokham"];
            $ngaykhaml=$row["ngaykham"];
            $trangthai=$row["trangthai"];
            $trangthaithanhtoan=$row["trangthaithanhtoan"];
            $phidichvu=$row["phidichvu"];
            
            echo '
            <div id="popup1" class="overlay">
            <div class="popup">
                
                        <a class="close" href="appointment.php">&times;</a>
                        <div class="content">
                        <h3> Xem chi tiết (Mã lịch khám : '.$id.')</h3>
                        </div>
                       
                        <div style="display: flex;justify-content: center;">
                        <div class="col-lg-12">
                        <div class="card mb-4">
                          <div class="card-body">
                          
                            <div class="row">
                              <div class="col-sm-5">
                                <p class="mb-0">Tên bệnh nhân</p>
                              </div>
                              <div class="col-sm-5">
                                <p class="text-muted mb-0">'.$name.' - Mã : '.$idbn.'</p>
                              </div>
                            </div>
                            <hr>   
                                           
                            <div class="row">
                              <div class="col-sm-5">
                                <p class="mb-0">Số điện thoại</p>
                              </div>
                              <div class="col-sm-5">
                                <p class="text-muted mb-0">0'.$tele.'</p>
                              </div>
                            </div>
                            <hr> 
                            <div class="row">
                            <div class="col-sm-5">
                              <p class="mb-0">Ngày bệnh nhân đặt khám</p>
                            </div>
                            <div class="col-sm-5">
                              <p class="text-muted mb-0">'.$ngaykham.'</p>
                            </div>
                          </div>
                          <hr> 
                          <div class="row">
                          <div class="col-sm-5">
                            <p class="mb-0">Ngày hẹn khám</p>
                          </div>
                          <div class="col-sm-5">
                            <p class="text-muted mb-0">'.$ngaykham.', '.substr($giokham,0,5).'</p>
                          </div>
                        </div>
                        <hr> 
                        <div class="row">
                        <div class="col-sm-5">
                          <p class="mb-0">Phí khám</p>
                        </div>
                        <div class="col-sm-5">
                          <p class="text-muted mb-0">'.$phidichvu.' VND -'.$trangthaithanhtoan.'</p>
                        </div>
                      </div>
                      <hr> 
                      <div class="row">
                      <div class="col-sm-5">
                        <p class="mb-0">Tình trạng</p>
                      </div>
                      <div class="col-sm-5">
                        <p class="text-danger mb-0">'.$trangthai.'</p>
                      </div>
                     
                    </div>
                    <hr> 
                    
                   
                     
                     
                        
                        </div>
                    
                    <br><br>
                    
            </div>
            </div>
         
            ';
            }
     
           
    ;

?>
 
    <script src="../Admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="../Admin/assets/js/popper.min.js"></script>
    <script src="../Admin/assets/js/bootstrap.min.js"></script>
    <script src="../Admin/assets/js/jquery.slimscroll.js"></script>
    <script src="../Admin/assets/js/Chart.bundle.js"></script>
    <script src="../Admin/assets/js/chart.js"></script>
    <script src="../Admin/assets/js/app.js"></script>
</body>
</html>
