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
include('./assets/qllt.php');
$p = new qllt();
$layid =0;
if(isset($_REQUEST['id']))
{	
	$layid =$_REQUEST['id'];
	}
?>
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
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Lịch trình bác sĩ</title>
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
                                    $dem=1;
                                date_default_timezone_set('Asia/ho_chi_minh');
                                $today = date('Y-m-d');
                                echo $today;
                                ?>
                                </p>
                            </td>       
                        </tr>
                 </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Lịch trình</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-schedule.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Thêm lịch trình</a>
                    </div>
                </div>
                </tr>
               
                <tr>
                    <td colspan="4" style="padding-top:0px;width: 100%;" >
                        <center>
                        <table class="filter-container" border="0" >
                        <tr>
                           <td width="10%">

                           </td> 
                        <td width="10%" style="text-align: center;">
                       Thời gian:
                        </td>
                        <td width="30%">
                        <form action="" method="post">
                            
                            <input class="form-control" type="text" name="ngaykham_search" id="ngaykham" class="input-text filter-container-items" style="margin: 0;width: 95%;">

                        </td>
                        <td width="10%" style="text-align: center;">
                        Chuyên khoa:
                        </td>
                        <td width="30%">
                         
                <select name="bchuyenkhoa" class="form-control">
                    <option value="">Chọn chuyên khoa</option>


                    <?php
                        require('./assets/db_config.php');
                        $sql = "select  * from  chuyenkhoa order by tenck asc"; 
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['tenck']."</option>";
                        }
                    ?>

                </select>
                    </td>
                    <td width="12%">
                        <button type="submit"  name="filter"  class="btn btn-success btn-primary-soft" >Tìm kiếm</button>
                        </form>
                    </td>
                   <?php
                  if(ISSET($_POST['filter'])){
                    if(isset($_POST['bchuyenkhoa']) && empty($_POST['ngaykham_search'])){
                        $bchuyenkhoa=$_POST['bchuyenkhoa'];
                        $sqlmain= "select lichtrinh.soluong,lichtrinh.id,chuyenkhoa.tenck,bacsi.tenbs,lichtrinh.ngaykham,TIME(lichtrinh.gioketthuc) AS gioketthuc, TIME(lichtrinh.giobatdau) AS  giobatdau from lichtrinh inner join chuyenkhoa on lichtrinh.idck=chuyenkhoa.id inner join bacsi on lichtrinh.idbs=bacsi.id where lichtrinh.ngaykham >='$today' AND lichtrinh.idck='$bchuyenkhoa' order by lichtrinh.ngaykham ASC";
                    }
                    else{  
                        $ngaykham_search=$_POST['ngaykham_search'];                
                        $sqlmain= "select lichtrinh.soluong,lichtrinh.id,chuyenkhoa.tenck,bacsi.tenbs,lichtrinh.ngaykham,TIME(lichtrinh.gioketthuc) AS gioketthuc, TIME(lichtrinh.giobatdau) AS  giobatdau from lichtrinh inner join chuyenkhoa on lichtrinh.idck=chuyenkhoa.id inner join bacsi on lichtrinh.idbs=bacsi.id where lichtrinh.ngaykham='$ngaykham_search'";
                  }
                }
                  else{
                    $sqlmain= "select lichtrinh.soluong,lichtrinh.id,chuyenkhoa.tenck,bacsi.tenbs,lichtrinh.ngaykham,TIME(lichtrinh.gioketthuc) AS gioketthuc, TIME(lichtrinh.giobatdau) AS  giobatdau from lichtrinh inner join chuyenkhoa on lichtrinh.idck=chuyenkhoa.id inner join bacsi on lichtrinh.idbs=bacsi.id where lichtrinh.ngaykham >='$today'  order by lichtrinh.ngaykham ASC";

                  }
                    
					?>
                        </tr>
                        </table>
                        </div>
				<div class="row">
                 <div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								<thead>
									<tr>
                                        <th>Số thứ tự</th>
                                        <th>Mã lịch trình</th>
										<th>Tên bác sĩ</th>
                                        <th>Tên chuyên khoa</th>
										<th>Ngày khám</th>
										<th>Thời gian trong ngày</th>
										<th>Số lượng khám</th>																				

										<th class="text-right">Lựa chọn</th>
									</tr>
								</thead>
                 <?php                   
                              
                                $result= $mysqli->query($sqlmain);
                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="7">
                                    <br><br><br><br>
                                    <center>                                 
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Không tìm thấy!</p>                                  
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';                            
                                }
			            else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $idlt=$row["id"];
                                    $idck=$row["tenck"];
                                    $tenbs=$row["tenbs"];
                                    $ngaykham=$row["ngaykham"];
                                    $giobatdau=$row["giobatdau"];
									$gioketthuc=$row["gioketthuc"]; 
									$soluong=$row["soluong"];                                   

                                    echo '<tbody>
									<tr>  
                                    <td> &nbsp;'.
                                    substr($dem,0,5)
                                    .'</td>
									  <td> &nbsp;'.
                                        substr($idlt,0,5)
                                        .'</td>
                                     
                                        <td>
                                        '.substr($tenbs,0,35).'
                                        </td>
                                        <td>
                                        '.substr($idck,8,30).'
                                        </td>
                                        <td style="text-align:center;">
                                            '.substr($ngaykham,0,10).'
                                        </td>
										 <td style="text-align:center;">
                                          '.substr($giobatdau,0,5).' - '.substr($gioketthuc,0,5).'
                                        </td>  
                                        <td>
                                        '.substr($soluong,0,5).'
                                        </td>                                     	
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="?action=Xem&idlt='.$idlt.'"><i class="fa fa-eye m-r-5"></i> Xem chi tiết</a>
													 </div>
                                            </div>
                                        </td>
                                    </tr>                                    
                                </tbody>';
                                $dem++;                                   
                                }
                            }                                 
                            ?>
                            </tbody>
                        </table>
					</div>
            </div>
        </div>		
    </div>
    <?php    
    if($_GET){
        $id=$_GET["idlt"];
        $action=$_GET["action"];
        if($action=='Xem'){
            $sqlmain= "select lichtrinh.id,bacsi.tenbs,lichtrinh.soluong,lichtrinh.ngaykham, TIME(lichtrinh.gioketthuc) AS gioketthuc, TIME(lichtrinh.giobatdau) AS giobatdau from lichtrinh inner join bacsi on lichtrinh.idbs=bacsi.id  where  lichtrinh.id='$id'";
            $result= $mysqli->query($sqlmain);
            $row=$result->fetch_assoc();
            $docname=$row["tenbs"];
            $scheduleid=$row["id"];            
            $scheduledate=$row["ngaykham"];
            $giobatdau=$row["giobatdau"];        
            $gioketthuc=$row["gioketthuc"];
			$soluong=$row['soluong'];
            $sqlmain12= "select * from lichkham inner join benhnhan on benhnhan.id=lichkham.idbn inner join lichtrinh on lichtrinh.id=lichkham.idlt where lichtrinh.id='$id';";
            $result12= $mysqli->query($sqlmain12);
            echo '
            <div id="popup1" class="overlay" style="z-index:111">
                    <div class="popup" style="width: 70%; ">
                    <center>
                        <h2></h2>
                        <a class="close" href="schedule.php">&times;</a>
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
                <p class="mb-0">Mã lịch trình</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0">'.$scheduleid.'</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0 text-left">Bác sĩ theo dõi</p>
              </div>
              <div class="col-sm-2">
                <p class="text-muted mb-0">'.$docname.'</p>
              </div>
            </div>
            <hr>
            <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Ngày khám</p>
            </div>
            <div class="col-sm-2">
              <p class="text-muted mb-0">'.$scheduledate.'</p>
            </div>
          </div>
          <hr>
          <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Lịch trình khám trong ngày</p>
          </div>
          <div class="col-sm-7">
            <p class="text-muted mb-0">Từ '.$giobatdau.' đến '.$gioketthuc.'</p>
          </div>
        </div>
        <hr>
		<div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Số lượng khám trong ngày</p>
          </div>
          <div class="col-sm-3">
           <label for="spec" class="form-label">('.$result12->num_rows."/".$soluong.')</label>
          </div>
        </div>
        
                               
                        <table width="100%" class="sub-table scrolldown add-doc-form-container" >
                           
                            <tr>
                            <td colspan="4">
                                <center>
                                  <div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">								
                                 <thead>
                                 <div> <h4>Thông tin lịch hẹn khám bệnh nhân</h4></div><br>
                                 <tr>   <th>STT</th>
                                        <th> Mã bệnh nhân</th>
                                         <th>Tên bệnh nhân</th>
                                         <th>Số điện thoại</th>
                                         <th >Thời gian khám</th>  
                                         <th >Mã lịch hẹn</th>   
                                                                                                                        
                                                 
                                 </thead>
                                 <tbody>
                                 </div>
                                 </div>
                               </div>
                                 '; 
                                 $demm=1;
                                         $result= $mysqli->query($sqlmain12);                
                                         if($result->num_rows==0){
                                             echo '<tr>
                                             <td colspan="7">
                                             <br><br><br><br>
                                             <center>                                             
                                             <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Không có bệnh nhân nào</p>                                           
                                             </center>
                                             <br><br><br><br>
                                             </td>
                                             </tr>';                                            
                                         }
                                         else{
                                         for ( $x=0; $x<$result->num_rows;$x++){
                                             $row=$result->fetch_assoc();
                                             $malich=$row["id"];
                                             $pid=$row["idbn"];
                                             $pgio=$row["giokham"];
                                             $pname=$row["tenbn"];
                                             $ptel=$row["sdt"];
                                             
                                             echo '<tr style="text-align:left;">
                                             <td>
                                                '.substr($demm,0,15).'
                                                </td>
                                                <td>
                                                '.substr($pid,0,15).'
                                                </td>
                                                 <td>'.
                                                 
                                                 substr($pname,0,35)
                                                 .'</td >
                                                 <td>
                                                 0'.substr($ptel,0,25).'
                                                 </td>
                                                 <td>
                                                 '.substr($pgio,0,5).'                                                 
                                                 </td>
                                                 <td>
                                                 '.$malich.'                                                 
                                                 </td>
                                                 
                                             </tr>'; 
                                             $demm++; 
                                         }
                                     }
                                    echo '</tbody>               
                                 </table>
                                 </div>
                                 </center>
                            </td> 
                         </tr>
                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>';  
    }
}
    ?>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
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