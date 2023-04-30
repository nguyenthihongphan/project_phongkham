<?php 
session_start();
if(isset($_SESSION['id']) &&isset($_SESSION['user'])&&isset($_SESSION['pass'])&&isset($_SESSION['phanquyen']))
{
	include("./assets/login_tmd.php");
	$q= new login();
	$q->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['phanquyen']);
	}
else
{
	header('location:login.php');
	}
include("assets/db_config.php");
$iduser=$_SESSION['id'];
$ten=$q->luachon("SELECT tennv FROM nhanvien where id='$iduser' limit 1 ");
include('./assets/qlbn.php');
$p = new qlbn();
$layid =0;
if(isset($_REQUEST['id']))
{	
	$layid =$_REQUEST['id'];
	}
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Hồ sơ bệnh án</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css" integrity="sha512-yDUXOUWwbHH4ggxueDnC5vJv4tmfySpVdIcN1LksGZi8W8EVZv4uKGrQc0pVf66zS7LDhFJM7Zdeow1sw1/8Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 

</head>

<body>
<div class="main-wrapper">
<div class="header">
        <div class="header-left" style="width:300px">
            <a href="index.php" class="logo">
                <img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Phòng Khám Đa Khoa ĐP</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar-menu"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
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
                    <li>
                        <a href="doctors.php"><i class="fa fa-user-md"></i> <span>Bác sĩ</span></a>
                    </li>
                    <li>
                        <a href="patients.php"><i class="fa fa-users"></i> <span>Bệnh nhân</span></a>
                    </li>
                    <li class="submenu">
                       <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Lịch hẹn khám</span><span class="menu-arrow"></span></a>
                         <ul style="display: none;">
                       		
                            <li><a href="cho_kham.php">Chờ khám</a></li>
                            <li><a href="cho_thanh_toan.php">Chờ thanh toán</a></li>
                            <li><a href="ls_kham.php">Lịch sử khám</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="schedule.php"><i class="fa fa-calendar-check"></i> <span>Lịch trình </span></a>
                    </li>
                    <li>
                        <a href="hosobenhan.php"><i class="fa fa-file"></i> <span>Hồ sơ bệnh án </span></a>
                    </li>
					
                    <li class="submenu">
                        <a href="#"><i class="fa fa-commenting-o"></i> <span> Bài viết</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="blog.php">Bài viết</a></li>
                            <li><a href="add-blog.php">Thêm bài viết</a></li>
                            <li><a href="edit-blog.php">Sửa bài viết</a></li>
                            <li><a href="myblog.php">Bài viết của tôi</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="profilenv.php"><i class="fa fa-user"></i> <span> Thông tin cá nhân </span></a>
                    </li>
                    <li >
                        <a href="thongke.php"><i class="fa-solid fa-chart-simple"></i> <span> Thống kê </span></a>
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
                                ?>
                                </p>
                            </td>       
                        </tr>
                 </div>
                </div>
                 <div class=" col-md-12 row">
                    <div class="col-md-3 ">
                       
                        <input class="form-control" type="text" placeholder="Ngày khám" name="ngaykham" id="ngaykham" >
                        
                    </div>
                <div class="col-md-3">
                <button type="submit"  name="filter"  class="btn btn-primary btn-primary-soft" >Lọc</button>

                </div>
                <div class="col-md-4 ">
                       
                       <input class="form-control" type="text" placeholder="Tên bệnh nhân" name="timkiem" id="tenbn" >
                       
                   </div>
                   <div class="col-md-2">
                <button type="submit"  name="filter"  class="btn btn-primary btn-primary-soft" >Tìm kiếm</button>

                </div>
                 </div>
                              
                </tr>
                <br>
                <?php
               // $sqlmain="select * from lichkham";
               if(ISSET($_POST['filter'])){
                $ngaykhamm=$_POST['ngaykham'];
                $sqlmain= "select *, benhan.id from benhan inner join benhnhan on benhan.idbn=benhnhan.id inner join bacsi on benhan.idbs=bacsi.id where  benhan.ngaykham='$ngaykhamm' order by benhan.id desc ";
               }            
            //    if(ISSET($_POST['filter'])){
            //     $timkiem=$_POST['timkiem'];
            //     $sqlmain= "select *,benhnhan.tenbn, benhan.id from benhan inner join benhnhan on benhan.idbn=benhnhan.id inner join bacsi on benhan.idbs=bacsi.id where benhan.idbs='$idbs' AND 1 AND benhnhan.tenbn like '$timkiem' order by benhan.id desc ";
            //    }
               else{
                $sqlmain= "select *, benhan.id from benhan inner join benhnhan on benhan.idbn=benhnhan.id inner join bacsi on benhan.idbs=bacsi.id  order by benhan.id asc ";

               }
                ?>
                <div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								<thead>
                        <tr>
                        <th >
                                    STT
                                </th>
                         <th >
                                    Mã bệnh án
                                </th>
                                <th >
                                    Tên bệnh nhân
                                </th>
                                <th>
                                    
                                   Tên bệnh án
                                    
                                </th>
                                <th>                                   
                                   Ngày khám                                   
                                </th>
                                   <th>                                  
                                  Lựa chọn
                                  </th>
                                    <th></th>
                                </tr>
                        </thead>
                       </tbody>
                        
                            <?php

                            $dem=1;
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
                                    $idba=$row["id"];
                                    $tenbn=$row["tenbn"];
                              		$idbn=$row["idbn"];
                                    $chuandoan=$row["chuandoan"];
                                    $kqdieutri=$row["kqdieutri"];
                                    $ngaykham=$row["ngaykham"];
                                    $tenba=$row["tenba"];
                                    
                                   
                                    echo '
									
									<tr>
                                    <td>
                                        '.$dem.'
                                        
                                        </td>
                                     
                                        <td > &nbsp;
                                        
                                        '.$idba.'
                                        </td >
										
                                        <td>
                                        '.$tenbn.'
                                        
                                        </td>
                                     
                                        <td>
                                            '.$tenba.'
                                        </td>
                                        
										<td>
                                            '.$ngaykham.'
                                        </td>
                                        <td>
                                        <button class="btn btn-success"><a class="text-light" href="./chitietbenhan.php?action=Xemchitiet&idbn='.$idbn.'&idba='.$idba.'" >Chi tiết hồ sơ</a></button>
                                        <button class="btn btn-success"><a class="text-light" href="./inchitiethosobenhan.php?action=inchitiethosobenhan&idbn='.$idbn.'&idba='.$idba.'" >Tải bệnh án</a></button>
                                        </td>
                                        <td>
                                        
                                            <div class="dropdown dropdown-action">
                                                <a href="#"   class="  action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div  class=" dropdown-menu dropdown-menu-right">
									            <a class="dropdown-item"  href="delete-benhan.php?id='.$idba.'"><i class="fa fa-times m-r-5"></i> Xóa</a>
                                              
                                                </div>
                                            </div>
                                        </td>
                                    </tr>';
                                    $dem++;
                                }
								
                            }
                                
                           ?>
                           </tbody>
                        </table>
                        </div>
                        </center>
                  
        </div>
    </div>
    <!-- <?php
    
    if($_GET){
        $id=$_GET["idba"];
        $action=$_GET["action"];
        if($action=='Xemchitiet'){
            $sqlmain= "select * from benhan where id= '$id'";
            $result= $mysqli->query($sqlmain);
            $row=$result->fetch_assoc();
            $tenba=$row["tenba"];
            $tenbn=$row["tenbn"];
            $idbn=$row["idbn"];
            $chuandoan=$row["chuandoan"];
            $kqdieutri=$row["kqdieutri"];
            $ngaykham=$row["ngaykham"];
            // $tenba=$row["tenba"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    <br><br>
                        <h2>Session Placed.</h2>
                        <a class="close" href="benhan.php">&times;</a>
                        <div class="content">
                        '.substr($tenba,0,40).' was scheduled.<br><br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        
                        <a href="schedule.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>
                        <br><br><br><br>
                        </div>
                    </center>
            </div>
            </div>
            ';
        }elseif($action=='drop'){
            $nameget=$_GET["idbn"];
            $session=$_GET["idck"];
            $apponum=$_GET["soluongkham"];
            echo '
            <div id="popup1" class="overlay  " style="justify-content: center; background-color:white;text-align:center">
                    <div class="popup text-center border-light" style="text-align:center"
					  >
                    <center>
                        
                        <a class="close" href="appointment.php">&times;</a>
                        <div class="content">
                            Bạn muốn xóa<br><br>
                            Tên bệnh nhân: &nbsp;<b>'.substr($pname,0,40).'</b><br>
                            Mã lịch hẹn &nbsp; : <b>'.substr($appoid,0,40).'</b><br><br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete-appointment.php?id='.$id.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Có&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="appointment.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;Không&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            '; 
      
    }
}

    ?>
    </div> -->
    <div class="sidebar-overlay" data-reff=""></div>
    <!-- <script src="../Admin/assets/js/jquery-3.2.1.min.js"></script> -->
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="../Admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="../Admin/assets/js/popper.min.js"></script>
    <script src="../Admin/assets/js/bootstrap.min.js"></script>
    <script src="../Admin/assets/js/jquery.slimscroll.js"></script>
    <script src="../Admin/assets/js/Chart.bundle.js"></script>
    <script src="../Admin/assets/js/chart.js"></script>
    <script src="../Admin/assets/js/app.js"></script>
    <script src=
"https://code.jquery.com/jquery-1.12.4.min.js">
    </script>
<!-- datetime picker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/css/bootstrap-datetimepicker.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js"></script>
<script type="">
    $(document).ready(function(){
            $("#ngaykham").datepicker({
          numberOfMonths: 1,
          showButtonPanel: true,
          dateFormat: 'yy-mm-dd',
          
        });
    });

</script>
</body>
</html>