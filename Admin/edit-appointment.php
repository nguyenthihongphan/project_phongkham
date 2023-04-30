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
include('assets/qllt.php');
$p = new qllt();
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
    <title>Quản lý lịch hẹn</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">    
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.0/jquery.timepicker.min.css" integrity="sha512-WlaNl0+Upj44uL9cq9cgIWSobsjEOD1H7GK1Ny1gmwl43sO0QAUxVpvX2x+5iQz/C60J3+bM7V07aC/CNWt/Yw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                </div><br>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Tạo lịch khám</h4>
                    </div>
                </div>
                <div class="row">
                 <form enctype="multipart/form-data" method="post" >
                    <div class="col-lg-8 offset-lg-2">                      
                            <div class="row">
                            <div class="col-md-6">
                <div class="form-group">
                <label>Chọn bệnh nhân</label>
                <select name="tenbn" class="form-control" style="width:350px">
                <option value="<?php  echo $p->luachon("select lichkham.id from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id where lichkham.id='$layid' limit 1");?>"><?php  echo $q->luachon("select benhnhan.tenbn from lichkham inner join benhnhan on lichkham.idbn=benhnhan.id where lichkham.id='$layid' limit 1");?></option>

                <?php
                        require('./assets/db_config.php');
                        $sql = "SELECT * FROM benhnhan"; 
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['tenbn']."</option>";
                        }
                    ?>
                </select>
            </div>
</div>
                                <div class="col-md-6">
                                 <div class="form-group">
                <label for="title">Chuyên khoa:</label>
                <select name="chuyenkhoa" class="form-control chuyenkhoa">
                <option value="<?php  echo $p->luachon("select lichkham.id from lichkham inner join chuyenkhoa on lichkham.idck=chuyenkhoa.id where lichkham.id='$layid' limit 1");?>"><?php  echo $q->luachon("select chuyenkhoa.tenck from lichkham inner join chuyenkhoa on lichkham.idck=chuyenkhoa.id where lichkham.id='$layid' limit 1");?></option>
                    <option value="">--- Chọn chuyên khoa ---</option>
                    <?php
                        require('./assets/db_config.php');
                        $sql = "SELECT * FROM chuyenkhoa"; 
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['tenck']."</option>";
                        }
                    ?>
                </select>
            </div>
</div>
<div class="col-sm-6">
            <div class="form-group">
                <label for="title">Bác sĩ:</label>
                <select name="bacsi" class="form-control" style="width:350px">
                <option value="<?php  echo $p->luachon("select lichkham.id from lichkham inner join bacsi on lichkham.idbs=bacsi.id where lichkham.id='$layid' limit 1");?>"><?php  echo $q->luachon("select bacsi.tenbs from lichkham inner join bacsi on lichkham.idbs=bacsi.id where lichkham.id='$layid' limit 1");?></option>
                <option>Chọn bác sĩ</option>
                </select>
            </div>             
            </div>
            <div class="col-sm-6">
             <div class="form-group">
             <label for="title">Lịch trình của bác sĩ:</label>
                <select name="idlt"  class="form-control" style="width:350px">
                <option>Lịch trình khám của bác sĩ</option>
                </select>
            </div>
            </div>
          
            <div class="col-sm-6">
                <div class="form-group">
                <label>Chọn giờ khám cụ thể </label>
                <input class="form-control" type="text" class="giokham" id="time" name="giokham" />
              
            </div>
            </div>
           
            <div class="col-sm-6">
                <div class="form-group">
                <label>Phí dịch vụ (VNĐ)</label>
                <input class="form-control" readonly value="150000" type="text" id="phidichvu" name="phidichvu" />
              
            </div>
            </div>
              
            <div class="col-sm-6">
                <div class="form-group">
               
                <input class="form-control" hidden value="Chưa khám" placeholder="trangthai" type="text" id="trangthai" name="trangthai" />
              
            </div>
            </div>
            </div>
            
            <div class="m-t-20 text-center">                              
                <input type="submit"  class="btn btn-primary submit-btn" data-dismiss="modal" id="sua" name="sua" value="Sửa lịch khám"/>
            </div>
            <?php
	switch ($_POST['sua'])
	{		
		case'Sửa lịch khám':
	{	
        $idsua= $_REQUEST['id'];
		$tenck= $_REQUEST['chuyenkhoa'];
		$tenbs=$_REQUEST['bacsi'];
        $tenbn=$_REQUEST['tenbn'];	
		$ngaykham =$_REQUEST['ngaykham'];
        $giokham =$_REQUEST['giokham'];
		$giobatdau =$_REQUEST['giobatdau'];
		$gioketthuc =$_REQUEST['gioketthuc'];	
        $trangthai =$_REQUEST['trangthai'];
        $phidichvu=$_REQUEST['phidichvu'];
        $idlt=$_REQUEST['idlt'];
		if($idsua>0)		  
		  			{
				
				 if($p->themxoasua("update lichkham set idck='$tenck', idbs='$tenbs', lichngaykham='$today', giokham='$giokham', trangthai='$trangthai',phidichvu='$phidichvu' where id='$idsua' limit 1 ")==1)

				{	
					echo '<script language="javascript">alert("Cập nhật thành công!"); window.location="appointments.php";</script>';
					}
				else
				{
					echo'<span class="text-danger"> Cập nhật không thành công</span>';
				}
		}		
				
			else			
		{echo '<span class="text-danger">Vui lòng nhập đầy đủ thông tin</span>';
			}
	break;	
	}
}
?>
</form>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
    <!--  -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
      integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
    $(document).ready(function(){
    $('#time').timepicker({
        timeFormat: 'H:mm p',
        interval: 60,
        minTime: '8',
        maxTime: '16:00pm',
        defaultTime: '08',
        startTime: '08:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
        });
    });

</script>


                </div>
          
    
          </div>
      </div>
      <script type="text/javascript">
         $(document).ready(function(){

	
    $("select[name='chuyenkhoa']").on('change', function(){
        var idck = $(this).val();
        var post_id= 'id='+ idck
    
        if(idck){
            $.ajax({
                type:'POST',
                url:'getAjax_lk.php',
                data:post_id,
                success:function(html){
                    $("select[name='bacsi']").html(html);
                    $("select[name='idlt']").html('<option value="">Chọn ngày khám</option>'); 
                }
            }); 
        }else{
            $("select[name='bacsi']").html('<option value="">Chọn chuyên khoa</option>');
            $("select[name='idlt']").html('<option value="">Chọn ngày khám</option>'); 
        }
    });
    
    $("select[name='bacsi']").on('change', function(){
        var idbs = $(this).val();
        if(idbs){
            $.ajax({
                type:'POST',
                url:'getAjax_lk.php',
                data:'idbs='+idbs,
                success:function(html){
                    $("select[name='idlt']").html(html);
                }
            }); 
        }else{
            $("select[name='idlt']").html('<option value="">Chọn bác sĩ</option>'); 
        }
    });
});
       </script>
  </body>
  
  
  <!-- appointments23:20-->
  </html>