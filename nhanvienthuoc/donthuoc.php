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


	$employeerow = $mysqli->query("select  * from  thuoc ");
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Hóa đơn thuốc</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
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
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
                            <span class="status online"></span>
                        </span>
                        <span><?php echo $ten ?></span>
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
                        <a href="donthuoc.php"><i class="fa-solid fa-receipt"></i><span> Đơn thuốc</span></a>
                    </li>
                   
                    <li class="submenu">
                        <a href="#"><i class="fa-solid fa-capsules"></i> <span> Thuốc</span> <span class="menu-arrow"></span></a>
                          <ul style="display: none;">
                       	 	<li><a href="danhmucthuoc.php">Danh mục thuốc</a></li>
                            <li><a href="medicine.php">Thuốc</a></li>
                            <li><a href="add-medicine.php">Thêm thuốc</a></li>
                            <li><a href="edit-medicine.php">Cập nhật thuốc</a></li>
                        </ul>
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
                        <a href="profile.php"><i class="fa fa-user"></i><span> Thông tin cá nhân</span></a>
                    </li>
                     <li>
                        <a href="thongke.php"><i class="fa fa-database"></i><span> Thống kê </span></a>
                    </li>
                    <li>
                        <a href="lichsuthanhtoan.php"><i class="fa fa-money"></i><span> Thanh toán</span></a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    
        <div class="page-wrapper">
            <div class="content">
                
                <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Ngày hôm nay :
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;text-align: right">
                            <?php 
                            $dem=1;
                        $today = date('Y-m-d');
                        echo $today;
                        ?>
                        </p>
                    </td>               
              
            </div>
           <div class="row">
                    <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">Đơn thuốc</p>
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
                 $sqlmain =" select hoadonthuoc.trangthaithanhtoan,hoadonthuoc.iddt , hoadonthuoc.id, hoadonthuoc.idbn, hoadonthuoc.ngaylap, benhnhan.tenbn from hoadonthuoc inner join benhnhan on hoadonthuoc.idbn= benhnhan.id where benhnhan.tenbn like %$timkiem% AND hoadonthuoc.trangthaithanhtoan='Chưa thanh toán' order by id asc ";
        }
        else
		{
            $sqlmain =" select hoadonthuoc.trangthaithanhtoan,hoadonthuoc.iddt, hoadonthuoc.id, hoadonthuoc.idbn, hoadonthuoc.ngaylap, benhnhan.tenbn from hoadonthuoc inner join benhnhan on hoadonthuoc.idbn= benhnhan.id AND hoadonthuoc.trangthaithanhtoan='Chưa thanh toán' order by id asc ";

        }
                ?>
        
                <div class="row">
              
                   <section class="content col-lg-12 col-md-4 col-sm-6 col-xs-12">

      <!-- Default box -->
      <div class="card card-outline card-primary rounded-0 shadow">
        <div class="card-header">
          <h3 class="card-title"></h3>

       <div class="card-body ">
            
             <form method="post">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
             
                            <input type="text" class="form-control floating"  name="timkiem" placeholder="Mã bệnh nhân hoặc tên bệnh nhân" value ="<?php if(isset($_POST["timkiem"])){echo $_POST ["timkiem"];} ?>" >
                        </div>
            <div class="col-lg-2 col-md-2 col-sm-5 col-xs-5">
              <button   name=""  class="btn btn-primary " >Tìm kiếm</button>
            
              </div>
            </div>
            <br>
            <div class="col-md-12">
						<div class="table-responsive">
                                <table class="table table-border table-striped  custom-table mb-0">
                                    <thead>
                            <tr>
                                    <th>STT</th>
                                    <th>Mã hóa đơn</th>
                                    <th>Tên bệnh nhân</th>
                                    <th>Ngày kê đơn</th>
                                    <th>Trạng thái thanh toán </th>                                                             
                                    <th class="text-center">Lựa chọn</tr>
                            </thead>
                            <tbody>
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
                                        $iddt=$row["id"];
                                        $iddtt=$row["iddt"];
                                        $idbn=$row["idbn"];
                                        $tenbn=$row["tenbn"];
                                        $ngaylap=$row["ngaylap"];
                                        $trangthai=$row["trangthaithanhtoan"];
                                       
                                        echo '<tr>
                                        <td>'.$dem.'</td>
                                            <td>'.$iddt.'</td>
                                            <td> '.substr($tenbn,0,30).'</td>
                                            <td>'.substr($ngaylap,0,20).'</td>
                                            <td>'.substr($trangthai,0,20).'</td>
                                            <td>
                                            <div style="display:flex;justify-content: center;">
                                            <button class="btn btn-success "><a class="text-light" href="thanhtoan.php?action=thanhtoan&iddt='.$iddtt.'&idbn='.$idbn.'" > Thanh toán  </a></button>
                                        &nbsp;&nbsp;&nbsp;
                                       
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
                       </td> 
                    </tr>
                           
                            
                            
                </table>
        </div>
</div>

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