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


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <title>Lịch trình của tôi</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet"  type="text/css" href="../Admin/assets/css/style.css">
    <link rel="stylesheet"  type="text/css" href="./assets/fullcalendar/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css" integrity="sha512-yDUXOUWwbHH4ggxueDnC5vJv4tmfySpVdIcN1LksGZi8W8EVZv4uKGrQc0pVf66zS7LDhFJM7Zdeow1sw1/8Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="./assets/fullcalendar/main.js"></script>

    
</head>

<body>
<div class="main-wrapper">
<div class="header">
        <div class="header-left" style="width:300px">
            <a href="index.php" class="logo">
                <img src="../Admin/assets/img/logo.png" width="35" height="35" alt=""> <span>Phòng Khám Đa Khoa ĐP</span>
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
                    <a class="dropdown-item" href="../Admin/logout.php">Đăng xuất</a>
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
                            <a href="#"><i class="fa fa-file-invoice"></i><span>Kê đơn thuốc</span> <span class="menu-arrow"></span></a>
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
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Lịch trình</h4>
                    </div>
                    <div class="col-sm-8 text-right ">
			<a href="add-schedule.php" id="create_new" class="btn btn-flat btn-primary"><span class="fa fa-plus"></span>  Thêm lịch trình</a>
                    </div>
                </div>
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
							  $lichtrinh = $mysqli->query("select * from  lichtrinh where lichtrinh.idbs='$iduser' and lichtrinh.ngaykham>='$today'  order by lichtrinh.ngaykham desc");
								?>
   				 <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >                    
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">Số lịch trình :(<?php echo $lichtrinh->num_rows; ?>)</p>
                    </td>
                </tr>                
               
                            </table>
                        </center>
                    </td>                   
                </tr>
                 <?php
                $sqlmain1= "select lichtrinh.id,lichtrinh.ngaykham, TIME(lichtrinh.gioketthuc) AS gioketthuc, TIME(lichtrinh.giobatdau) AS  giobatdau, lichtrinh.soluong from lichtrinh inner join bacsi on lichtrinh.idbs=bacsi.id where bacsi.id='$iduser' and lichtrinh.ngaykham>='$today'  order by lichtrinh.ngaykham asc ";
                $sqlmain= "select lichtrinh.id,lichtrinh.ngaykham,  gioketthuc, giobatdau, lichtrinh.soluong from lichtrinh inner join bacsi on lichtrinh.idbs=bacsi.id where bacsi.id='$iduser' and lichtrinh.ngaykham>='$today'  order by lichtrinh.ngaykham asc ";
                    if($_POST){
                        //print_r($_POST);
                        $sqlpt1="";
                        if(!empty($_POST["ngaykham"])){
                            $ngaykham=$_POST["ngaykham"];
                            $sqlmain.=" and ngaykham.ngaykham='$ngaykham' ";
                        }
                    }
                ?>
                
                    <?php 
			$schedule_arr =array();
			
			$schedule_qry = $mysqli->query($sqlmain);
			while($row = $schedule_qry->fetch_assoc()){
				$schedule_arr[] = $row;
                
			}
            $sched = json_encode($schedule_arr);    
			?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
			<div  id="calendar" ></div>
                    </div>
            <!-- <div class="col-md-3">
            <div class="callout border-0">
						<h5><b>Thêm lịch trình</b></h5>
						<hr>
            </div> -->
		</div>
       
        <script>
	var scheds = $.parseJSON('<?php echo $sched?>')
	var events = []
	$(document).ready(function(){
		$('#create_new').click(function(){
			uni_modal("<i class='fa fa-plus'></i> Thêm lịch trình", "add-schedule.php")
		})
		if(Object.keys(scheds).length > 0){
			Object.keys(scheds).map(k=>{
               
				var data = scheds[k]
				var event_item = {
					id			   : data.id,					
					// date:data.ngaykham,
                   start :data.giobatdau,
                    end: data.gioketthuc,
					backgroundColor: '#3788d8',
					borderColor    : '#3788d8',
					allDay         : data.is_whole == 1,
					className      :'cursor-pointer'
				}
				events.push(event_item)
                console.log(events)
			})
		}
		var date = new Date()
    	var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
		var Calendar = FullCalendar.Calendar;
		var calendar = new Calendar(document.querySelector('#calendar'), {
		headerToolbar: {
			left  : 'prev,next today',
			center: 'title',
			right : 'dayGridMonth,timeGridWeek,timeGridDay'
		},
		themeSystem: 'bootstrap',
		
		events: events,
		editable  : false,
		droppable : false, 
		drop      : false,
		eventClick:function(info){
			var id= info.event.id
			uni_modal("<i class='fa fa-calendar-day'></i> Scheduled Task Details", "schedules/view_schedule.php?id=" + id)
		}
		});

		calendar.render();
	})
</script>
</div>
				<div class="row" >
                <div class="col-md-12">
                 <tr>
                    <td colspan="4" style="padding-top:0px;width: 100%;" >
                        
                        <table class="filter-container" border="0" >
                            <tr>Chi tiết lịch trình</tr>
                        <tr>
                           <td width="10%">
                           </td> 
                        <td width="5%" style="text-align: left;">
                        Từ
                        </td>
                        <td width="30%">
                        <form action="" method="post" name="filter">                           
                            <input type="date" name="ngaybatdau" id="date" class="input-text filter-container-items form-control" style="margin: 0;width: 95%;">
                        </td>   
                         <td width="5%" style="text-align: center;">
                       đến
                        </td>
                        <td width="30%">
                                                  
                            <input type="date" name="ngayketthuc" id="date" class="input-text filter-container-items form-control" style="margin: 0;width: 95%;">
                        </td>                     
                    <td width="12%">
                        <input type="submit"  name="filtersubmit" value="Lọc" class=" btn-primary btn button-icon "  style="padding: 15px; margin :0;width:100%">
                        </form>
                    </td>
                    </tr>
                    </div>
                    
                   <div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								<thead> 
                                                 
                            <tr>
                            <th>STT</th> 
                                <th>Mã lịch trình</th> 
                                <th>Ngày làm việc</th>                                
                                <th>Thời gian làm việc</th> 
                                <th>Số lượng khám</th>                               
                                <th>Lựa chọn</th>                                    
                            </tr>
                        </thead>
                        <tbody>
                         <?php
                         $dem=1;
                                $result= $mysqli->query($sqlmain1);
								
                                if($result->num_rows==0){
                                    echo '<tr> 
                                    <td colspan="4">
                                    <br><br><br><br>
                                   <center>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Không có lịch</p>
                                  </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';                                    
                                }
                                else{
									
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
									 
                                    $scheduleid=$row["id"];									
                                 	$soluong=$row["soluong"];
                                    $giobatdau=$row["giobatdau"];
									$gioketthuc=$row["gioketthuc"];
									$ngaykham=$row["ngaykham"];
									$filter = "AND DATE(ngaykham) BETWEEN '$ngaybatdau' AND '$ngayketthuc'";
                                    echo '<tr>
                                    <td> &nbsp;'.
                                    substr($dem,0,5)
                                    .'</td>
                                        <td> &nbsp;'.substr($scheduleid,0,30).'</td>                                       
                                        <td> &nbsp;'.substr($ngaykham,0,30).'</td> 
                                        <td>'.substr($giobatdau,0,5).' - '.substr($gioketthuc,0,5).'</td>
										 <td> &nbsp;'.substr($soluong,0,30).'</td>   
                                        <td>
                                            <div>                                       
                                            <a href="?action=Xem&id='.$scheduleid.'" class="non-style-link"><button  class="btn-primary btn button-icon btn-view"  style="padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Xem</font></button></a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="?action=Hủy&id='.$scheduleid.'" class="non-style-link"><button  class="btn-primary btn button-icon btn-delete"  style="padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Hủy</font></button></a>
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
    <?php    
    if($_GET){
        $id=$_GET["id"];
        $action=$_GET["action"];
        if($action=='Hủy'){
            
            echo '
            <div id="popup1" class="overlay" style="z-index:111">

                    <div class="popup">
                    <center>                      
                        <a class="close" href="schedule.php">&times;</a>
                        <div class="content">
                            Mã lịch trình:'.$id.'                      
                        </div>
                        <div class="content">
                            Bạn muốn hủy lịch trình?                           
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="schedule.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;Đóng&nbsp;&nbsp;</font></button></a>
                        <a href="delete-schedule.php?id='.$id.'" class="non-style-link"><button  class="btn-danger btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Hủy&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        
                        </div>
                    </center>
            </div>
            </div>
            '; 
        }elseif($action=='Xem'){
           
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
                                 <tr>   <th> STT</th>
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
    </div>                       
</body>
 <div class="sidebar-overlay" data-reff=""></div>
    <script src="../Admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="../Admin/assets/js/popper.min.js"></script>
    <script src="../Admin/assets/js/bootstrap.min.js"></script>
    <script src="../Admin/assets/js/jquery.slimscroll.js"></script>
    <script src="../Admin/assets/js/Chart.bundle.js"></script>
    <script src="../Admin/assets/js/chart.js"></script>
    <script src="../Admin/assets/js/app.js"></script>
</html>







  
 