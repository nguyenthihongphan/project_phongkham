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
include('../Admin/assets/db_config.php');
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
    <title>Thống kê</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <link href="library/daterangepicker.css" rel="stylesheet" />
      <link href="library/dataTables.bootstrap5.min.css" rel="stylesheet" />


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
                        $patientrow = $mysqli->query("select  * from  benhnhan;");
								
                        $doctorrow = $mysqli->query("select  * from  bacsi ;");
                        $tongdonthuoc = $mysqli->query("select  * from  hoadonthuoc where trangthaithanhtoan='Đã thanh toán' ;");
                        $tongdonthuoc1 = $mysqli->query("select  * from  hoadonthuoc where trangthaithanhtoan='Chưa thanh toán' ;");
                        $tongdonthuoc2 = $mysqli->query("select  * from  hoadonthuoc ;");


                        ?>
                        </p>
                    </td>               
              
            
            <div class="row">
                    <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">Thống kê</p>
           </div>
            <div class="row">
                    
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa-solid fa-receipt" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?php    echo  $tongdonthuoc->num_rows  ?></h3>
                                <span class="widget-title2">Hóa đơn đã thanh toán<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg5"><i class="fa-solid fa-receipt"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3> <?php    echo $tongdonthuoc1->num_rows  ?></h3>
                                <span class="widget-title5">Hóa đơn chưa thanh toán<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa-solid fa-file-invoice"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3> <?php    echo $tongdonthuoc2->num_rows  ?></h3>
                                <span class="widget-title3">Tổng hóa đơn<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa-solid fa-file-invoice-dollar"></i></span>
                            <div class="dash-widget-info text-right">
        
                                <h3><?php  
                        $total = $mysqli->query("select SUM(tongtien) from  hoadonthuoc ");
                        while($row = mysqli_fetch_array($total)){
                            echo  $row['SUM(tongtien)']." VND";
                           
                        }?>
                        </h3>
                                <span class="widget-title3">Tổng tiền hóa đơn thuốc<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col col-sm-8">Tầm nhìn tổng thể thanh toán hóa đơn thuốc</div>
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
                                    <th>Số hóa đơn</th>
                                    
                                    <th>Tổng tiền trong ngày</th>
                                    <th>Ngày lập</th>
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
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
      
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

    function fetch_data(start_date = '', end_date = '')
    {
        var dataTable = $('#thongke').dataTable({
            
            "processing" : true,
            "serverSide" : true,
            "order" : [],
            ajax : {
                url:"action_thongke.php",
                type:"POST",
                data:{action:'fetch', start_date:start_date, end_date:end_date}
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
                            label : 'Tổng tiền trong ngày',
                            backgroundColor : 'rgb(255, 205, 86)',
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