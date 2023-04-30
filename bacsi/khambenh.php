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
$layid =0;
if(isset($_REQUEST['id']))
{	
	$layid =$_REQUEST['id'];
	}
   
$iduser=$_SESSION['id'];
$ten=$bs->luachon("SELECT bacsi.tenbs from bacsi where id='$iduser' limit 1");
$idbs=$bs->luachon("SELECT id from bacsi where id='$iduser' limit 1");
$idck=$bs->luachon("SELECT chuyenkhoa.tenck from chuyenkhoa inner join bacsi on chuyenkhoa.id=bacsi.idck where bacsi.id='$iduser' limit 1");


// $idpkb=$bs->luachon("SELECT idpkb from phieukhambenh ");


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
    <title>Khám bệnh</title>
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
    <body>
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
                <td colspan="4" style="padding-top:10px;width: 100%; text-align:center" >
                    <h3 class="heading-main12" style=" text-align:center;color:rgb(49, 49, 49)">Phiếu khám bệnh</h3>
                    </td> 
                </tr> <br><br>
                </div>
          <div class="row"> <br>
 <form enctype="multipart/form-data" method="post" >
                    <div class="col-lg-8 offset-lg-2">
                       
                            <div class="row">          
            <div class="col-sm-6">
             <div class="form-group">
                                <label>Tên bệnh nhân</label>
                                <input class="form-control"  readonly type="text" id="tenbn"value="<?php  echo $q->luachon("select benhnhan.tenbn from benhnhan inner join lichkham on benhnhan.id=lichkham.idbn where lichkham.id='$layid' limit 1");?>"name="tenbn" />
                            </div>
</div>
 <div class="col-sm-6">
             <div class="form-group">
                                <label>Mã bệnh nhân</label>
                                <input class="form-control" readonly type="text" id="idbn"value="<?php  echo $q->luachon("select idbn from lichkham where id='$layid' limit 1");?>"name="tenbn" />
                            </div>
</div>
<div class="col-sm-6">
             <div class="form-group">
                                <label>Lý do khám bệnh</label>
                                <input class="form-control"  type="text" id="lydo"name="lydo" />
                            </div>
</div>
 <div class="col-sm-6">
             <div class="form-group">
                                <label >Chẩn đoán</label>
                                <input class="form-control" type="text" id="chandoan" name="chandoan" />
                            </div>

</div>

 <div class="col-sm-6">
             <div class="form-group">
                                <label>Kết luận điều trị</label>
                                <input class="form-control" type="text" id="ketluandieutri" name="ketluandieutri" />
                            </div>

</div>  
<div class="col-sm-6" hidden>
                                        <div class="form-group">
                                                            <label>Tên bệnh án</label>
                                                            <input class="form-control" value=" Bệnh án <?php echo substr($idck,8,30) ?>" type="text" id="tenba" name="tenba" />
                                                        </div>

                            </div>  

<div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Xét nghiệm:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" id="khongxetnghiem" name="xetnghiem" value="Không xét nghiệm"/>Không cần xét nghiệm
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" id="xetnghiem" name="xetnghiem" value="Xét nghiệm, siêu âm"/>Xét ngiệm
											</label>
										</div>
                                        <div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" id="sieuam" name="xetnghiem" value="Siêu âm"/>Siêu âm
											</label>
										</div>
									</div>
                                </div>
                                <div class="col-sm-6">
             <div class="form-group">
                               
                                <input class="form-control" hidden type="text" id="ngaykham" name="ngaykham" />
                            </div>

</div>
</div>
<div class="khongxetnghiem selectt">
    <div class="m-t-20 text-center">
        <input type="submit"  class="btn btn-primary submit-btn" data-dismiss="modal" id="them" name="them" value="Tạo phiếu khám bệnh"/>
    </div>
</div>
<div class="xetnghiem selectt">
    <div class="m-t-20 text-center">
        <input type="submit"  class="btn btn-primary submit-btn" data-dismiss="modal" id="xetnghiemm" name="xetnghiemm" value="Xét nghiệm"/>
    </div>
</div>
<div class="sieuam selectt">
    <div class="m-t-20 text-center">
        <input type="submit"  class="btn btn-primary submit-btn" data-dismiss="modal" id="sieuam" name="sieuam" value="Siêu âm"/>
    </div>
</div>
</div>
   <?php

	switch ($_POST['them'])
	{
		case'Tạo phiếu khám bệnh':
	{	
		
		$idbn=$_REQUEST['idbn'];
        $idsua=$_REQUEST['id'];
        $lydo=$_REQUEST['lydo'];   
        $tenba=$_REQUEST['tenba'];
		$chandoan =$_REQUEST['chandoan'];
		$xetnghiem =$_REQUEST['xetnghiem'];
		$ketluandieutri =$_REQUEST['ketluandieutri'];
		
		
		if($idbn!='' && $chandoan!='')
		{		
				 if(($q->themxoasua("INSERT INTO phieukhambenh(idbn,idbs,chuandoan,ketluandieutri,xetnghiem,ngaykham,lydo) VALUES ('$idbn','$idbs','$chandoan','$ketluandieutri','$xetnghiem','$today','$lydo')")==1)&& $q->themxoasua("UPDATE lichkham set trangthai='Đã khám' where id='$idsua' limit 1")&& $q->themxoasua("UPDATE lichkham set trangthai='Đã khám' where id='$idsua' limit 1")&&$q->themxoasua("INSERT INTO benhan(idbn,idbs,chuandoan,kqdieutri,tenba,ngaykham,lydo) VALUES ('$idbn','$idbs','$chandoan','$ketluandieutri','$tenba','$today','$lydo')")==1)
                {	
    $layidpk=$bs->luachon("SELECT idpkb from phieukhambenh where idpkb order by idpkb asc");
                $q->themxoasua("UPDATE benhan set idpkb='$layidpk' where id order by id desc limit 1 ")==1;
                echo '<script >alert("Tạo phiếu xét nghiệm thành công! tiến hành kê đơn thuốc"); window.location="kedonthuoc.php?action=kedonthuoc&&idpkb='.$layidpk.'&&id='.$idbs.'&&idbn='.$idbn.'";</script>';					
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

switch ($_POST['xetnghiemm'])
{
    case'Xét nghiệm':
{	
    
    $idbn=$_REQUEST['idbn'];
    $idsua=$_REQUEST['id'];
    $chandoan =$_REQUEST['chandoan'];
    $lydo=$_REQUEST['lydo'];
    $tenba=$_REQUEST['tenba'];
    $xetnghiem =$_REQUEST['xetnghiem'];
    $ketluandieutri =$_REQUEST['ketluandieutri'];
    
    
    if($idbn!='' && $chandoan!='')
    {		
             if(($q->themxoasua("INSERT INTO phieukhambenh(idbn,idbs,chuandoan,ketluandieutri,xetnghiem,ngaykham,lydo) VALUES ('$idbn','$idbs','$chandoan','$ketluandieutri','$xetnghiem','$today','$lydo')")==1)&& $q->themxoasua("UPDATE lichkham set trangthai='Đã khám' where id='$idsua' limit 1")&& $q->themxoasua("UPDATE lichkham set trangthai='Đã khám' where id='$idsua' limit 1")&&$q->themxoasua("INSERT INTO benhan(idbn,idbs,chuandoan,kqdieutri,tenba,ngaykham,lydo) VALUES ('$idbn','$idbs','$chandoan','$ketluandieutri','$tenba','$today','$lydo')")==1)
{	            
    $layidpk=$bs->luachon("SELECT idpkb from phieukhambenh where idpkb order by idpkb asc");
    $q->themxoasua("UPDATE benhan set idpkb='$layidpk' where id order by id desc limit 1 ")==1;
                // $q->themxoasua("UPDATE benhan set idpkb='$layidpk' ")

                echo '<script >alert("Tiến hành xét nghiệm!"); window.location="xetnghiem.php?action=Xetnghiem&&idpkb='.$layidpk.'&&id='.$idbs.'&&idlk='.$layid.'";</script>';
                
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

switch ($_POST['sieuam'])
	{
		case'Siêu âm':
	{	
		
		$idbn=$_REQUEST['idbn'];
        $idsua=$_REQUEST['id'];
        $lydo=$_REQUEST['lydo'];
        $tenba=$_REQUEST['tenba'];
		$chandoan =$_REQUEST['chandoan'];
		$xetnghiem =$_REQUEST['xetnghiem'];
		$ketluandieutri =$_REQUEST['ketluandieutri'];
		
		
		if($idbn!='' && $chandoan!='')
		{		
				 if(($q->themxoasua("INSERT INTO phieukhambenh(idbn,idbs,chuandoan,ketluandieutri,xetnghiem,ngaykham,lydo) VALUES ('$idbn','$idbs','$chandoan','$ketluandieutri','$xetnghiem','$today','$lydo')")==1)&& $q->themxoasua("UPDATE lichkham set trangthai='Đã khám' where id='$idsua' limit 1")&& $q->themxoasua("UPDATE lichkham set trangthai='Đã khám' where id='$idsua' limit 1")&&$q->themxoasua("INSERT INTO benhan(idbn,idbs,chuandoan,kqdieutri,tenba,ngaykham,lydo) VALUES ('$idbn','$idbs','$chandoan','$ketluandieutri','$tenba','$today','$lydo')")==1)
                {	
                    $layidpk=$bs->luachon("SELECT idpkb from phieukhambenh where idpkb order by idpkb asc");
                    $q->themxoasua("UPDATE benhan set idpkb='$layidpk' where id order by id desc limit 1 ")==1;
					
                    echo '<script >alert("Tiến hành siêu âm!"); window.location="sieuam.php?action=sieuam&&idpkb='.$layidpk.'&&id='.$idbs.'&&idlk='.$layid.'";</script>';
					
					}
	
				else
				{
					echo' Tạo không thành công';
				}
			}
			else
			
		{
            echo 'Vui lòng nhập đầy đủ';
			}
		

	break;
	
	}
} 
?>

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