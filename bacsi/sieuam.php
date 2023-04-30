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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <title>Siêu âm</title>
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
                        ?>
                        </p>
                    </td>
                </tr>
                 
                <tr>
                 
                        <h2 class="page-title text-danger" style="text-align:center">Siêu âm</h2></center>
                </tr>
                 </div>
         </div>
              <br><br>
          <div class="row"> <br>
 <form enctype="multipart/form-data" method="post" >
                    <div class="col-lg-8 offset-lg-2">
                       <?php
                        if($_GET){
        
                            $id=$_GET["id"];
                            $idpkb=$_GET["idpkb"];
                            $idlk=$_GET["idlk"];
                            $action=$_GET["action"];
                            if($action=='sieuam'){
                            ?>    
                            <div class="row">          
            <div class="col-sm-6">
             <div class="form-group">
                                <label>Mã phiếu khám bệnh</label>
                                <input class="form-control"  readonly type="text" id="idpkb"value="<?php  echo $q->luachon("select idpkb from phieukhambenh where idpkb='$idpkb' limit 1");?>"name="idpkb" />
                            </div>
</div>
 <div class="col-sm-6">
             <div class="form-group">
                                <label>Tên bệnh nhân</label>
                                <input class="form-control" readonly type="text" id="tenbn"value="<?php  echo $q->luachon("select benhnhan.tenbn from benhnhan inner join phieukhambenh on benhnhan.id=phieukhambenh.idbn where phieukhambenh.idpkb='$idpkb' limit 1");?>"name="tenbn" />
                            </div>
</div>
<div class="col-sm-6">
             <div class="form-group">
                                <label>Mã bệnh nhân</label>
                                <input class="form-control" readonly type="text" id="idbn"value="<?php  echo $q->luachon("select idbn from phieukhambenh where idpkb='$idpkb' limit 1");?>"name="idbn" />
                            </div>
</div>
 <div class="col-sm-6">
             <div class="form-group">
                                <label >Chẩn đoán</label>
                                <input class="form-control" type="text" id="chandoan"value="<?php  echo $q->luachon("select chuandoan from phieukhambenh where idpkb='$idpkb' limit 1");?>" name="chandoan" />
                            </div>

</div>
<div class="col-sm-6">
             <div class="form-group">
                                <label>Loại siêu âm</label>
                                <select name="loaisa" class="form-control">
                                    <option value="">Chọn loại siêu âm</option>
                                    <option name="loaisa"value="Siêu âm tim">Siêu âm tim</option>
                                    <option name="loaisa"value="Siêu âm Doppler">Siêu âm Doppler</option>
                                    <option name="loaisa"value="Siêu âm trị liệu">Siêu âm trị liệu</option>
                                    <option name="loaisa"value="Siêu âm ổ bụng">Siêu âm ổ bụng</option>
                                    <option name="loaisa"value="Siêu âm đầu dò">Siêu âm đầu dò</option>
                                    <option name="loaisa"value="Siêu âm tử cung phần phụ">Siêu âm tử cung phần phụ</option>
                                    <option name="loaisa"value="Siêu âm 3D">Siêu âm 3D</option>
                                    <option name="loaisa"value="Siêu âm 4D">Siêu âm 4D</option>
                                </select>


                            </div>

</div>
<div class="col-sm-12">
             <div class="form-group">
                                <label>Mô tả tổn thương</label>
                                <textarea class="form-control rounded-0" id="mota" rows="4" name="mota"></textarea>
                            </div>

</div>
<div class="col-sm-12">
             <div class="form-group">
                                <label >Kết quả siêu âm</label>
                                <input class="form-control" type="text" id="kqsa" name="kqsa" />
                            </div>

</div>
<div class="m-t-20 text-center">
                    <input type="submit"  class="btn btn-primary submit-btn" data-dismiss="modal" id="them" name="them" value="Hoàn thành phiếu siêu âm"/>
                           </div>
                            </div>
                            </div>
   <?php

	switch ($_POST['them'])
	{
		case'Hoàn thành phiếu siêu âm':
	{	
		
		$idbn=$_REQUEST['idbn'];
		$mota =$_REQUEST['mota'];
		$ketluan =$_REQUEST['kqsa'];
		$loaisa =$_REQUEST['loaisa'];
		$chandoan =$_REQUEST['chandoan'];
		$idpkb =$_REQUEST['idpkb'];
		if($ketluan!='' && $idbn!='')
		{		
				 if(($q->themxoasua("INSERT INTO phieusieuam(idbn,idbs,idpkb,loaisa,kqsa,mota,chandoan,ngaysa) VALUES ('$idbn','$idbs','$idpkb','$loaisa','$ketluan','$mota','$chandoan','$today')")==1))
{	
    $layidpk=$bs->luachon("SELECT idpkb from phieukhambenh where idpkb order by idpkb asc");
					echo '<script >alert("Tạo phiếu siêu âm thành công!"); window.location="kedonthuoc.php?action=kedonthuoc&&idpkb='.$layidpk.'&&id='.$idbs.'&&idbn='.$idbn.'";</script>';
					
					}
	
				else
				{
					echo' Tiến hành siêu âm không thành công vui lòng xem lại';
				}
			}
			else
			
		{echo 'Vui lòng nhập đầy đủ';
			}
		

	break;
	
	}

}
switch ($_POST['hoanthanhbenhan'])
	{
		case'Hoàn thành bệnh án':
	{	
		
        
        $idbn=$_REQUEST['idbn'];
        $idsua=$_REQUEST['idpkb'];
        $idpkb=$_REQUEST['idpkb'];
		$loaixn =$_REQUEST['loaixn'];
		$ketquaxn =$_REQUEST['ketquaxn'];
		
		
		if($idbn!='' && $loaixn!='')
		{		
            if(($q->themxoasua("INSERT INTO phieuxetnghiem(idbn,idbs,idpkb,ketquaxn,loaixn) VALUES ('$idbn','$idbs','$idpkb','$ketquaxn','$loaixn')")==1)&& $q->themxoasua("UPDATE phieukhambenh set xetnghiem='Xét nghiệm' where idpkb='$idsua' limit 1"))
				 
                {	
					
                    echo '<script >alert("Tạo phiếu xét nghiệm thành công!"); window.location="benhan.php";</script>';
					
					}
	
				else
				{
					echo' Tạo không thành công';
				}
			}
			else
			
		{echo 'Vui lòng nhập đầy đủ';
			}
		

	break;
	
	}
} 
?>
<?php
                            }
                        }
?>

                    </div>
                </div>
                    </form>
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
    <script src=
"https://code.jquery.com/jquery-1.12.4.min.js">
    </script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('input[type="radio"]').click(function() {
                    var inputValue = $(this).attr("id");
                    var targetBox = $("." + inputValue);
                    $(".selectt").not(targetBox).hide();
                    $(targetBox).show();
                });
            });
        </script> 
        </div>
        </body>
        </html>