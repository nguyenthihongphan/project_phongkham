

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

$iduser=$_SESSION['id'];
$layid = $_SESSION['username'];
$ten=$q->luachon("select tenbn from benhnhan where id='$iduser' limit 1");
$idbn=$q->luachon("select id from benhnhan where id='$iduser' limit 1");
include("../Admin/assets/db_config.php");
date_default_timezone_set('Asia/ho_chi_minh');
        
$today = date('Y-m-d');
 $userrow = $mysqli->query("select * from benhnhan where username='$layid'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["id"];
    $username=$userfetch["tenbn"];


    //echo $userid;
    //echo $username;


  
    ?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lịch đã khám</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/admin.css">
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>
<body>
 <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-md-3 ">
                            <div class="social_media_links">
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-5 col-md-5">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-envelope"></i> phannguyen2246@gmail.com</a></li>
                                    <li><a href="#"> <i class="fa fa-phone"></i>0374389835</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <div class="inner-form">
                                <div class="input-field">
                                  <input class="form-control" id="choices-text-preset-values" type="text" placeholder="Tim kiem..." />
                                  <a><i class="ti-search btn-search"></i></a>             
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-1 col-lg-2">
                            <div class="logo">
                                <a href="index.php">
                                      <img src="../Admin/assets/img/logo-dark.png" alt="" width="50px">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-5">
                            <div class="main-menu  d-none d-lg-block">                            
                                <ul class="nav">                                   
                            <li class="nav-item"><a class="active" href="index1.php">Trang chủ</a></li>
                                                        <li class=" dropdown has-arrow link-item">
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown">Lịch hẹn khám </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item link-item" style="padding-left:5px" href="booking.php">Đặt lịch</a>
                                    <a class="dropdown-item" style="padding-left:5px" href="benhan.php?id=<?php echo $idbn ?>">Bệnh án của tôi</a>
                                    <a class="dropdown-submenu dropdown-toggle  dropdown-item has-arrow link-item dropdown" style="cursor:pointer;padding-left:5px;" data-toggle="dropdown" >Lịch hẹn của tôi<i class="fa fa-arrow"></i> </a>
                                    <ul class="dropdown-menu " style="margin-left:20px">
                        
                                    <li> <a href="dathanhtoan.php">Đã thanh toán</a></li>
                                    <li> <a href="chuathanhtoan.php">Chưa thanh toán</a></li>
                                    </ul>

                </div>
            </li>
                                        <li><a href="about.php">Giới thiệu</a></li>                                                               
                                         <li><a href="blog.php">Tin tức</a></li>
                                         <li><a href="price.php">Bảng giá</a></li>
                                        <li><a href="doctors.php">Đội ngũ bác sĩ</a></li>
                                        <li><a href="contact.php">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="../Admin/assets/img/user.jpg" width="24">
                        <span class="status online"></span>
                    </span>
                    <span><?php echo $ten; ?></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                    <a class="dropdown-item" href="profile.php?id=">Thông tin cá nhân</a>

                </div>
            </li>
        </ul>
        
    </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
<body>

                <div class="page-wrapper">
        
            <div class="content" >
                <div class="row " style="margin-right: 200px;">
                 <div class="col-md-12 " >             
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
                </div><br>
                <div class="row" style="margin-left: 100px;">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Lịch hẹn khám</h4>
                    </div>
                </div>
                <div class="row" style="margin-left: 100px;">
                    <div class="col-sm-2 col-3">
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
                        <input type="submit"  name="filter" value=" Tìm kiếm" class=" btn-primary-soft btn button-icon btn-filter text-light"  style="background-color:#009FEB; margin :0;width:100%">                     
                    </td>
                    </form>
                    </tr>
                            </table>
                </div>
               
               
            </div>
            <?php
                  if(ISSET($_POST['filter'])){
                   
                    $thanhtoan=$_POST['thanhtoan'];
                    $sqlmain= "select lichkham.id,chuyenkhoa.tenck,lichkham.trangthaithanhtoan, bacsi.tenbs,benhnhan.tenbn,lichtrinh.ngaykham,lichkham.lichngaykham,lichkham.giokham,lichkham.trangthai from lichtrinh inner join lichkham on lichtrinh.id=lichkham.idlt inner join benhnhan on benhnhan.id=lichkham.idbn inner join bacsi on lichtrinh.idbs=bacsi.id inner join chuyenkhoa on lichtrinh.idck= chuyenkhoa.id where AND trangthaithanhtoan='Chưa thanh toán' AND lichkham.idbn=$idbn order by lichtrinh.ngaykham asc";

                }
                  else{
                    $sqlmain= "select bacsi.tenbs,benhnhan.tenbn,lichtrinh.ngaykham,lichkham.lichngaykham,lichkham.giokham,lichkham.trangthai from lichtrinh inner join lichkham on lichtrinh.id=lichkham.idlt inner join benhnhan on benhnhan.id=lichkham.idbn inner join bacsi on lichtrinh.idbs=bacsi.id where lichtrinh.ngaykham>='$today' AND lichkham.idbn=$idbn order by lichtrinh.ngaykham asc";
                   
                  }
                    
					?>
                
                <?php
                 
                    $sqlmain= "select lichkham.id,chuyenkhoa.tenck,lichkham.trangthaithanhtoan, bacsi.tenbs,benhnhan.tenbn,lichtrinh.ngaykham,lichkham.lichngaykham,lichkham.giokham,lichkham.trangthai from lichtrinh inner join lichkham on lichtrinh.id=lichkham.idlt inner join benhnhan on benhnhan.id=lichkham.idbn inner join bacsi on lichtrinh.idbs=bacsi.id inner join chuyenkhoa on lichtrinh.idck= chuyenkhoa.id where lichkham.trangthaithanhtoan='Chưa thanh toán'AND lichkham.idbn=$idbn order by lichtrinh.ngaykham asc";
                   
                 
					?>
                <br><br>
				<div class="row center" style="text-align:center; margin: 0 100px 0 100px" >
                 <div class="col-md-12">
						<div class="table-responsive">
                        <table class="table table-border table-striped custom-table  mb-0">
								<thead>
					   <tr>
                        <th >
                                    STT
                                </th>
                              
                                <th >
                                    
                                  Bác sĩ phụ trách
                                    
                                </th>
                                <th >
                                    
                                  Chuyên khoa
                                    
                                </th>
                                
                                <th>
                                    Ngày khám
                                </th>
                                <th>
                                    Thời gian khám
                                </th>
                               
                                <th >
                                   Trạng thái thanh toán
                                </th>
                                <th >
                                    Hoạt động
                                 </th>
                                <th>
                                    
                                   Lựa chọn
                                </th>
                                </tr>
                        </thead>
                        <tbody>
                        
                            <?php

                                $dem=1;
                                $result= $mysqli->query($sqlmain);
                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="8">
                                    <br><br><br><br>
                                    <center>
                                   
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Không tìm thấy lịch khám !</p>
                                   
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $appoid=$row["id"];
                                    $docname=$row["tenbs"];
                                    $chuyenkhoa=$row["tenck"];
                                    $scheduleid=$row["idlt"];
                                    $scheduledate=$row["ngaykham"];
                                    $scheduletime=$row["giokham"];
                                    $trangthai=$row["trangthai"];
                                    $trangthaithanhtoan=$row["trangthaithanhtoan"];
                                    $appodate=$row["lichngaykham"];
									
                                    echo '<tr >
									 <td>'.                                       
                                        substr($dem,0,5)
                                        .'</td >
                                    
                                        <td>
                                        '.substr($docname,0,25).'
                                        </td>
                                        <td>
                                        '.substr($chuyenkhoa,12,30).'
                                        </td>
                                        
                                        <td>
                                            '.substr($scheduledate,0,20).' 
                                        </td>
                                        <td>'.substr($scheduletime,0,5).'</td>
                                        
                                        <td>
                                            '.$trangthaithanhtoan.'
                                        </td>
                                        <td class="text-left">
                                        <a style="color:#fff" href="./vnpay_php/index.php?thanhtoan=Xem&id='.$idbn.'̃&idlk='.$appoid.'"><button class="btn btn-success" > Thanh toán</a></button>
                                    </td>
                                    <td class="text-left">
                                        <a style="color:#fff" href="?action=Xemchitiet&id='.$idbn.'̃&idlk='.$appoid.'"><button class="btn btn-danger" > Xem chi tiết</a></button>
                                    </td>
<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon " data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="?action=huy&id='.$idbn.'&idlk='.$appoid.'" ><i class="fa fa-trash-o m-r-5"></i> Hủy</a>
												 </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                ';
                                    $dem++;
                                }
                            }
                                 
                            ?>
 
                            </tbody>

                        </table>
                        </div>
                        </center>
                   </td> 
                </tr>
        </div>
    </div>
</tr>
		
		</div>
                </div>

    </div>
    <!-- Global site tag (gtag.js) - Google Analytics -->
          <script type="text/javascript" async src="https://www.google-analytics.com/analytics.js"></script><script async src="https://www.googletagmanager.com/gtag/js?id=UA-111268069-2"></script>
          <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
      
            gtag('config', 'UA-111268069-2');
          </script>
    <?php    
    if($_GET){
        $id=$_GET["id"];
        $idlkham=$_GET["idlk"];
        $action=$_GET["action"];
        if($action=='Xemchitiet'){
            $sqlmain2= "select lichkham.id,chuyenkhoa.tenck,lichkham.trangthaithanhtoan, bacsi.tenbs,benhnhan.tenbn,lichtrinh.ngaykham,lichkham.lichngaykham,lichkham.giokham,lichkham.trangthai from lichtrinh inner join lichkham on lichtrinh.id=lichkham.idlt inner join benhnhan on benhnhan.id=lichkham.idbn inner join bacsi on lichtrinh.idbs=bacsi.id inner join chuyenkhoa on lichtrinh.idck= chuyenkhoa.id where lichkham.trangthaithanhtoan='Chưa thanh toán' and lichkham.id='$idlkham' AND lichkham.idbn='$id'limit 1";

            $result= $mysqli->query($sqlmain2);
            $row=$result->fetch_assoc();
            $docname=$row["tenbs"];
            $idlkham=$row["id"];            
            $chuyenkhoa=$row["tenck"];
            $scheduledate=$row["ngaykham"];
            $scheduletime=$row["giokham"];
            $trangthai=$row["trangthai"];
            $trangthaithanhtoan=$row["trangthaithanhtoan"];
            $appodate=$row["lichngaykham"];
            echo '
            <div id="popup1" class="overlay" style="z-index:111">
                    <div class="popup" style="width: 70%; ">
                    <center>
                        <h2></h2>
                        <a class="close" href="chuathanhtoan.php">&times;</a>
                        <div class="content">  
                        </div>
                        <div class="abc scroll" style="display: absolute;justify-content: center;">
                        <div class="col-lg-11">
                        <div>
                        <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Xem thông tin chi tiết</p><br><br>
                        
                        </div>
        <div class="card mb-4">
          <div class="card-body text-left">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mã lịch khám</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0">'.$idlkham.'</p>
              </div>
            </div>
            <hr>
            <div class="row">
            <div class="col-sm-3">
              <p class="mb-0 text-left">Ngày đặt khám</p>
            </div>
            <div class="col-sm-2">
              <p class="text-muted mb-0">'.$appodate.'</p>
            </div>
          </div>
          <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0 text-left">Bác sĩ phụ trách</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">'.$docname.' thuộc '.$chuyenkhoa.'</p>
              </div>
            </div>
            <hr>
           
            <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Ngày khám</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">'.$scheduledate.' , '.substr($scheduletime,0,5).' giờ</p>
            </div>
          </div>
          <hr>
          <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Trạng thái</p>
          </div>
          <div class="col-sm-9">
            <p class="text-danger mb-0">'.$trangthai.'</p>
          </div>
        </div>
        <hr>
        <div class="row">
        <div class="col-sm-3">
          <p class="mb-0 text-left">Trạng thái thanh toán</p>
        </div>
        <div class="col-sm-2">
          <p class=" text-success mb-0">'.$trangthaithanhtoan.'</p>
        </div>
      </div>
      <hr>
      <h4>Mong bạn đến đúng giờ theo lịch hẹn!</h4>
        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';  
    }
        if($action=='huy'){
            $sqlmain="select *, bacsi.tenbs from lichkham inner join bacsi on lichkham.idbs=bacsi.id where lichkham.id='$idlkham' AND lichkham.idbn='$id' ";
            
            $result= $mysqli->query($sqlmain);
            $row=$result->fetch_assoc();
            $name=$row["tenbs"];           

            echo '
            <div id="popup1" class="overlay" style="z-index:111">
                <div class="popup">
                
                        <a class="close" href="chuathanhtoan.php">&times;</a>
                        <div class="content">
                        <h3>Mã lịch khám: '.$idlkham.'</h3>
                        </div>
                       
                        <div style="display: flex;justify-content: center;">
                        <div class="col-lg-12">
                        <div class="card mb-4">
                          <div class="card-body row">
                          <div class="col-md-1" style="margin-top:10px">
						<img src="../Admin/assets/img/sent.png" alt="" width="40" height="40">
                        </div>
                        <div class="col-md-10"><br>
						<h4>Xác nhận xóa lịch hẹn với bác sĩ : '.$name.'</h4>
                        </div>
                        </div>
                        <div class="col-md-12 row">
                        <div class="col-md-8">
                        </div>
                        <div class="col-md- center">
						<div class="m-t-20"> <a href="chuathanhtoan.php" class="btn btn-white" data-dismiss="modal">Đóng</a>
                        <a href="delete-appointment.php?idlk='.$idlkham.'" class="non-style-link"><button type="submit" class="btn btn-danger">Xóa</button></a>
						</div>
					</div>
				</div>
			</div>
            </div>
            </div>
        </div>
    </div>
    
           ';
        }
       
        
}
    ?>
</body>
<br><br>
<hr>
   <!-- footer start -->
    <footer class="footer">
    
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Liên kết mạng xã hội
                                </h3>
                                <div class="socail_links">
                                    <ul>
                                        <li>
                                            <a href="https://www.facebook.com/profile.php?id=100086572583223">
                                                <i class="ti-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ti-twitter-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <br>
                                    <br>
                                </div>
    							 <div class="socail_links">
                                    <ul>
                                        <li>
                                            <p>Đặt lịch ngay </p>
                                
    										<img src="img/datkham.png" width="100px" height="100px"/>
                                        </li>
                                        <li>
                                      		&emsp;
                                            &emsp;
                                           
                                        </li>
                                        <li>
                                           <p align="center">Fanpage </p>
                                
    										<img src="img/pk.png" width="100px" height="100px"/>
                                        </li>
                                        
                                    </ul>
                                    <br>
                                    <br>
                                </div>
                        
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-6 col-lg-5">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                       Giờ làm việc
                                </h3>
                                <p> Đặt lịch: 7:00 - 16:00</p>
                                <p> Giờ làm việc: 7:00 – 23:00</p>
								<p> Hotline: 0374389835</p>
								<p> Đặt lịch khám : 0325 930 787</p>
								<br>
                                <h3 class="footer_title">
                                      Thông tin thêm
                                </h3>
                                <ul>
                                    <li><a href="#">Đặt lịch khám</a></li>
                                    <li><a href="#">Tin tức</a></li>
                                    <li><a href="#">Tuyển dụng</a></li>
                                    <li><a href="#">Quy định chính sách</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                  PHÒNG KHÁM ĐA KHOA ĐP
                                </h3>
                                <p>
                                    12 Nguyễn Văn Bảo phường 4 Gò Vấp <br>
                                    Hotline: 0374389835 <br>
                                    Email: phannguyen2246@gmail.com
                                </p>
                                <img  width="120px" height="50px"src="img/logo-da-thong-bao-bo-cong-thuong-mau-xanh.png"/>
                                <br>
                                <br>
                                    <div id="map" style="width:500px;height:300px;">
           <!-- Code chèn bản đồ ở đây -->
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.85763127015!2d106.68531071458948!3d10.822205292290436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528e5496d03cf%3A0xa5b8e7395ec636b9!2zMTIgTmd1eeG7hW4gVsSDbiBC4bqjbywgUGjGsOG7nW5nIDQsIEjhu5MgQ2jDrSBNaW5oLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1679146622359!5m2!1svi!2s" width="350" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
                                   

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right_text">
                <div class="container">
                    <div class="footer_border"></div>
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="copy_right text-center">
                              
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Bởi Huỳnh Thị Xuân Đào 19445321 <br>Nguyễn Thị Hồng Phấn 19438171  <i class="fa fa-heart-o" aria-hidden="true"></i>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        
        </footer>
<!-- footer end  -->
<!-- link that opens popup -->
    
    
       <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }

        });
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
    
</body>
</html>
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
    transition: all 0.5s ease-in-out;
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
