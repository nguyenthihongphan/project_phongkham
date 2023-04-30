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
	header('location: login.php');
	}
include("assets/db_config.php");
include('db-connect.php');
$iduser=$_SESSION['id'];
$ten=$q->luachon("select username from taikhoan where id='$iduser' limit 1");
$tenbs=$q->luachon("select tenbs from bacsi  where id <= 5");
$sdt=$q->luachon("select sdt from bacsi  where id <= 5");

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
  label{
    font-size: 15px;
 }
 input{
    font-size: 20px;
 }
 </style>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Hồ sơ bệnh án</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css" integrity="sha512-yDUXOUWwbHH4ggxueDnC5vJv4tmfySpVdIcN1LksGZi8W8EVZv4uKGrQc0pVf66zS7LDhFJM7Zdeow1sw1/8Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
</head>

<body>
<div class="main-wrapper">
<div class="header">
        <div class="header-left" style="width:300px">
            <a href="index.php" class="logo" >
                <img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Phòng Khám Đa Khoa ĐP</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
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
                    <li >
                        <a href="employees.php"><i class="fa-solid fa-clipboard-user"></i> <span> Nhân viên </span></a>
                    </li>
                    <li>
                        <a href="patients.php"><i class="fa fa-users"></i> <span>Bệnh nhân</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-calendar"></i> <span> Lịch khám</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="appointments.php">Lịch hẹn khám</a></li>
                            <li><a href="hisappointment.php">Lịch đã khám</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="schedule.php"><i class="fa fa-calendar-check-o"></i> <span>Lịch trình bác sĩ</span></a>
                    </li>
                    <li>
                        <a href="hosobenhan.php"><i class="fa fa-file"></i> <span>Hồ sơ bệnh án</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-commenting-o"></i> <span> Bài viết</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="blog.php">Bài viết</a></li>
                            <li><a href="duyet_blog.php">Duyệt bài đăng</a></li>
                            <li><a href="add-blog.php">Thêm bài viết</a></li>
                            <li><a href="edit-blog.php">Sửa bài viết</a></li>
                        </ul>
                    </li>
                    <li >
                        <a href="thongke.php"><i class="fa-solid fa-chart-simple"></i><span> Thống kê </span></a>
                    </li>
                    
                    
                    <li >
                        <a href="reset.php"><i class="fa fa-lock"></i><span> Reset mật khẩu</span></a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
            <div class="content">
               <tr>
                <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Ngày hôm nay :
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;text-align: right">
                            <?php 
                        $today = date('Y-m-d');
                        echo $today;
$sqlmain1= $mysqli->query ("select *, benhan.id from benhan inner join benhnhan on benhan.idbn=benhnhan.id inner join bacsi on benhan.idbs=bacsi.id  order by benhan.id asc ");


                        ?>
                        </p>
                    </td>               
                </tr> 
                <div class="row">
                
    	
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Bệnh án(<?php echo $sqlmain1->num_rows?>)</h4>
                </div>
                
            </div>
            <div class="row filter-row">
            
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                    <form method="post">
                        <label class="focus-label" >Tên bệnh nhân</label>
                        <input type="text" class="form-control floating"  name="timkiem" placeholder="Nhập thông tin tìm kiếm" value ="<?php if(isset($_POST["timkiem"])){echo $_POST ["timkiem"];} ?>" >
                    </div>
                </div>
                
             
                <div class="col-sm-6 col-md-3">
                    
                     <button  class="btn btn-success btn-block" name="">Tìm kiếm</button> 
                     </form>
                                        
                     </div>
                     
            </div>
            <?php 
    $timkiem='';
    if(isset($_POST['timkiem']))
    {
        $timkiem=$_POST['timkiem'];

    }
    $layid=$_REQUEST['id'];
    if($layid>0)
    {
        $sqlmain="select *, benhan.id from benhan inner join benhnhan on benhan.idbn=benhnhan.id inner join bacsi on benhan.idbs=bacsi.id ";
    }
    else{
$sqlmain= "select *, benhan.id from benhan inner join benhnhan on benhan.idbn=benhnhan.id inner join bacsi on benhan.idbs=bacsi.id where benhnhan.tenbn like '%$timkiem%'  order by benhan.id asc ";

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
                                        <button class="btn btn-success"><a class="text-light" href="chitietbenhan.php?action=Xemchitiet&idbn='.$idbn.'&idba='.$idba.'" >Chi tiết hồ sơ</a></button>
                                        </td>
                                        <td>
                                        
                                            <div class="dropdown dropdown-action">
                                                <a href="#"   class="  action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div  class=" dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" name="delete" href="?action=delete&id='.$idba.'"><i class="fa fa-times m-r-5"></i> Xóa</a>
                                    
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
    </div>
    </div>
    <?php 
    if($_GET){
        
        $id=$_GET["id"];
        $action=$_GET["action"];
        
        $sqlmain="select *, benhan.id from benhan inner join benhnhan on benhan.idbn=benhnhan.id inner join bacsi on benhan.idbs=bacsi.id where benhan.id=$id ";
            
            $result= $mysqli->query($sqlmain);
            $row=$result->fetch_assoc();
            $name=$row["tenbn"];           
            echo '
            <div id="popup1" class="overlay" style="z-index:111">
                <div class="popup">
                
                        <a class="close" href="hosobenhan.php">&times;</a>
                        <div class="content">
                        <h3>Mã bệnh án: '.$id.'</h3>
                        </div>
                       
                        <div style="display: flex;justify-content: center;">
                        <div class="col-lg-12">
                        <div class="card mb-4">
                          <div class="card-body row">
                          <div class="col-md-1" style="margin-top:10px">
						<img src="assets/img/sent.png" alt="" width="40" height="40">
                        </div>
                        <div class="col-md-10"><br>
						<h4>Xác nhận xóa bệnh nhân : '.$name.'</h4>
                        </div>
                        </div>
                        <div class="col-md-12 row">
                        <div class="col-md-8">
                        </div>
                        <div class="col-md- center">
						<div class="m-t-20"> <a href="hosobenhan.php" class="btn btn-white" data-dismiss="modal">Đóng</a>
                        <a href="delete-benhan.php?idba='.$id.'" class="non-style-link"><button type="submit" class="btn btn-danger">Xóa</button></a>
						</div>
					</div>
				</div>
			</div>
           ';
    }
            ?>

    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
    
</body>


</html>