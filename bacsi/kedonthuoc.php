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
$ckbs=$bs->luachon("SELECT chuyenkhoa.tenck from bacsi inner join chuyenkhoa on bacsi.idck=chuyenkhoa.id where bacsi.id='$iduser' limit 1");
// $idpkb=$bs->luachon("SELECT id from phieukhambenh where id limit 1");


$layid =0;
if(isset($_REQUEST['id']))
{	
	$layid =$_REQUEST['id'];
	}
?>
<?php
   
  date_default_timezone_set('Asia/ho_chi_minh');       
  $today = date('Y-m-d');
  echo $today;
  echo $ckbs;
  

$message = '';
if(isset($_POST['submit'])) {

  $idbn = $_POST['idbn'];
  $sothuoc = $_POST['count'];
  $idthuocs =$_POST['idthuocs'];
  $tenthuoc =$_POST['tenthuocs'];
  $tong =$_POST['tong'];
  $idloai=$_POST['idloais'];
  $thanhtiens =$_POST['thanhtiens'];
  echo $sothuoc;
  echo $tong;
  // $thanhtien =$_POST['thanhtien'];

  // $idbn =$_POST['idbn'];
  $gia =$_POST['gias'];

  $quantities = $_POST['slthuocs'];
  // $iddonthuoc = $_POST['ids'];
  try {

    // $mysqli->be();
     $donthuoc = "INSERT INTO donthuoc(idbn,idbs,ngaylap) 
    VALUES('$idbn','$layid', '$today');";
    $kedon = $mysqli->query($donthuoc);
    $iddt= $bs->luachon("SELECT donthuoc.id from donthuoc where id order by id desc limit 1");
    // $iddtt= $mysqli->query($iddt);
    // $kedon->exec();

//now to store data in medication history
    $size = sizeof($quantities);
    // $sizef = sizeof($idthuocs);
    
    $cursoluong = 0;
    $curthuoc =1;
    
    // $gia = 0;
    for($i = 0; $i < $size ; $i++) {
    // $iddt="select id from donthuoc where id  limit 1";
      
     
      $cursoluong = $quantities[$i];
      
      $curthuoc = $idthuocs[$i];
      // $curthuoc =$curthuoc1[$i];

      // $curgia = $gia[$i];
      $curthanhtien = $thanhtiens[$i];
      $curtongtien = $tongtien[$i];
      
      $idba= $bs->luachon("SELECT benhan.id from benhan inner join benhnhan on benhan.idbn=benhnhan.id where benhan.idbn='$idbn' AND benhan.idbs='$idbs' order by benhan.id desc limit 1");
      $chitietdonthuoc = "INSERT INTO chitietdonthuoc(
      idbn,iddt,slthuoc,idthuoc,gia)
      VALUES('$idbn','$iddt','$cursoluong','$curthuoc', '$curthanhtien');";
      $stmtchitiet = $mysqli->query($chitietdonthuoc);
      
      // $stmtchitiet->exec(); 
       }
      $countt= $bs->luachon("SELECT count(*) from chitietdonthuoc where iddt='$iddt'");
      $total= $bs->luachon("SELECT SUM(gia) from chitietdonthuoc where iddt='$iddt'");
      if($cursoluong ==''|| $curthuoc==''|| $curthanhtien==''){
        echo '<script>alert("Vui long nhap thuoc can ke"); window.location="";</script>';					
     
      }else{
       $hoadonthuoc ="INSERT INTO hoadonthuoc(tenhd,ngaylap,idbn,idba,iddt,sothuoc,tongtien,trangthaithanhtoan)VALUES('$ckbs','$today','$idbn','$idba','$iddt','$countt','$total','Chưa thanh toán');";
       $stmtchitie = $mysqli->query($hoadonthuoc);
    $mysqli->commit();
	
    $message = 'Đơn thuốc đã được lưu trữ.';
    $message1 = 'ke don thuoc thanh cong.';
      }
  }catch(PDOException $ex) {
    $con->rollback();

    echo $ex->getTraceAsString();
    echo $ex->getMessage();
    exit;
  }
  echo '<script>alert("'.$message1.'"); window.location="timkiemthuoc.php?message='.$message.'";</script>';
  // header ("location:timkiemthuoc.php?message=$message");
  exit;
}
// $patients = getPatients($con);
// $medicines = getMedicines($con);

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
    <title>Kê đơn thuốc</title>
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
                 
                        <h2 class="page-title text-danger" >Kê đơn thuốc</h2>
                </tr>
                 </div>
         </div>
              <br><br>
          <div class="row"> <br>
 <form enctype="multipart/form-data" method="post" >
                    <div class="col-lg-12 ">
                    <?php
                        if($_GET){
        
                            $id=$_GET["id"];
                            $idpkb=$_GET["idpkb"];
                            $idlk=$_GET["idlk"];
                            $action=$_GET["action"];
                            if($action=='kedonthuoc'){
                            ?>    
                            <div class="row">          
 <div class="col-sm-3">
             <div class="form-group">
                                <label>Tên bệnh nhân</label>
                                <input class="form-control" readonly type="text" id="tenbn"value="<?php  echo $q->luachon("select benhnhan.tenbn from benhnhan inner join phieukhambenh on benhnhan.id=phieukhambenh.idbn where phieukhambenh.idpkb='$idpkb' limit 1");?>"name="tenbn" />
                            </div>
</div>
<div class="col-sm-3">
             <div class="form-group">
                                <label>Mã bệnh nhân</label>
                                <input class="form-control" readonly type="text" name="idbn" id="idbn"value="<?php  echo $q->luachon("select idbn from phieukhambenh where idpkb='$idpkb' limit 1");?>" />
                            </div>
</div>
<div class="col-sm-3">
             <div class="form-group">
                                <label>Ngày khám</label>
                                <input class="form-control" readonly type="text" id="idbn"value="<?php  echo $q->luachon("select ngaykham from phieukhambenh where idpkb='$idpkb' limit 1");?>" />
                            </div>
</div>
<div class="col-sm-4">
             <div class="form-group">
                                <label>Kết quả xét nghiệm</label>
                                <input class="form-control" readonly type="text" id="idbn"value="<?php  echo $q->luachon("select ketluandieutri from phieukhambenh where idpkb='$idpkb' limit 1");?>"/>
                            </div>
</div>
 <div class="col-sm-3">
             <div class="form-group">
                                <label >Chẩn đoán</label>
                                <input class="form-control" readonly type="text" id="chandoan"value="<?php  echo $q->luachon("select chuandoan from phieukhambenh where idpkb='$idpkb' limit 1");?>" name="chandoan" />
                            </div>

</div>
<div class="col-sm-3">
             <div class="form-group">
                                <label >Hình thức</label>
                                <input class="form-control" readonly type="text" id="chandoan"value="<?php  echo $q->luachon("select xetnghiem from phieukhambenh where idpkb='$idpkb' limit 1");?>" name="chandoan" />
                            </div>

</div>
                            </div>
<div>
    <hr>
    
    <div class="col-lg-12 ">
    <center><label for="" class="text-uppercase text-center"> <h3>Hóa đơn thuốc <?php echo (substr($ckbs,8,15)) ?></h3></label>
    </center><br>
    <label for=""> <h4>Kê đơn thuốc</h4></label>
    </div>
<div class="col-lg-12 row">

    <div class="col-sm-2">
             <div class="form-group">
                                <label >Loại thuốc</label>
                                <select name="tenloaithuoc" id="idloaithuoc"  selected="selected" class="form-control form-control-sm rounded-0">
                    <option value="">--- Loại thuốc ---</option>
                    <?php
                        $sql = "SELECT * FROM loaithuoc"; 
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['tenloaithuoc']."</option>";
                        }
                    ?>
                </select>
                                 </div>

</div>
<div class="col-sm-3">
<div class="form-group">
                <label for="title">Tên thuốc</label>
                <select name="tenthuoc" id ="tenthuoc"class="form-control">
                <option>Chọn tên thuốc</option>           
                </select>
            </div>    

</div>
<div class="col-sm-2">
<div class="form-group">
             <label for="title">Giá thuốc(VNĐ)</label>
                <select name="gia" id="gia" class="form-control">
                <option>Giá</option>
                </select>
            </div>    
</div>
<div class="col-sm-2">
<div class="form-group">
             <label for="title">Liều lượng</label>
                <select name="lieuluong" id="lieuluong" class="form-control">
                <option>Liều lượng</option>
                </select>
            </div>    
</div>
<div class="col-sm-2">
<div class="form-group">
             <label for="title">Đơn vị</label>
                <select name="donvi" id="donvi" class="form-control">
                <option>Đơn vị</option>
                </select>
            </div>    
</div>
<div class="col-sm-1">
<div class="form-group">
                <label for="title">Số lượng</label>
                <input id="slthuoc" class="form-control form-control-sm rounded-0" />
            </div>    

                    </div>
                   
    <div class="col-md-11">&nbsp;</div>
    <div class="col-md-1">
      <button id="add_to_list"  type="button" style="margin: right;" class="  btn btn-primary btn-sm btn-flat btn-block">
        <span>Lưu</span>
      </button>
    </div>
</div> <br>
<div><span>Số thuốc: <a id="count"  name="count"></a></div>
<div class="clearfix">&nbsp;</div>
  <div class="row table-responsive">
    <table id="medication_list" class="table table-striped table-bordered">
      <colgroup>
        <col width="10%">
        <col width="30%">
        <col width="20%">
        <col width="10%">
        <col width="10%">
        <col width="10%">
      </colgroup>
      <thead class="bg-primary">
        <tr>
          <th>Số</th>
          <th>Tên thuốc</th>
         
          <th>Loại thuốc</th>
          <th>Giá(VNĐ)</th>
          <th>Liều lượng</th>
          <th>Đơn vị</th>
          <th>Số lượng</th>
          <th>Thành tiền</th>

          <th>Hoạt động</th>

        </tr>
      </thead>

      <tbody id="current_medicines_list">

      </tbody>
    </table>
    <br>
    <hr>
    <div class="col-md-12">
    <div class="text-right" > 
      <p class="text-right">Tổng tiền(VND):</p> 
    <button  class="btn btn-success" style="width:200px"><a class="" name="tong" style="font-size:20px; font-weight:bold;color:#fff" id="tong"></a></button>
      
    </div>     
    </div>
  </div>
</div>
<div class="clearfix">&nbsp;</div>
  <div class="row">
    <div class="col-md-10">&nbsp;</div>
    <div class="col-md-2">
     
      <button type="submit" id="submit" name="submit" 
      class="btn btn-primary btn-sm btn-flat btn-block">Kê đơn</button>
  
<!--<input type="submit" id="luu" name="them" 
      class="btn btn-primary btn-sm btn-flat btn-block" value="Chọn lưu"/>-->
    </div>
  </div>
</form>
</div>
</div>
<!-- /.card-footer-->
</div>
</div>

<?php
                            }
                        }
?>
</body>
</html>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- jQuery -->
<script src="assets/js/jquery.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/js/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->


<script src="assets/js/jquery_confirm/jquery-confirm.js"></script>

<script src="assets/js/common_javascript_functions.js"></script>

  <script type="text/javascript">
$(document).ready(function()
{
$("select[name='tenloaithuoc']").change(function()
{
var idloaithuoc=$(this).val();
var post_id = 'idloai='+ idloaithuoc;
if(idloaithuoc){
$.ajax
({
        type: "POST",
        url: "ajax_thuoc.php",
        data: post_id,
        cache: false,
        success: function(html)
        {
        $("select[name='tenthuoc']").html(html);
        $("select[name='gia']").html('<option value="">Giá</option>'); 
        
        } 
        });
      }else{
        $("select[name='tenthuoc']").html('<option value="">Chọn tenthuoc</option>');
        $("select[name='gia']").html('<option value="">Giá</option>');
      }
    });
    $("select[name='tenthuoc']").change(function(){
        var tenthuoc = $(this).val();
        if(tenthuoc){
            $.ajax({
                type:'POST',
                url:'ajax_thuoc.php',
                data:'id='+ tenthuoc,
                success:function(html){
                    $("select[name='gia']").html(html);

        $("select[name='lieuluong']").html('<option value="">Liều lượng</option>');
         

                }
            }); 
        }
        
        else{
            $("select[name='gia']").html('<option value="">Giá</option>'); 
        $("select[name='lieuluong']").html('<option value="">Liều lượng</option>');
        $("select[name='donvi']").html('<option value="">donvi</option>');

        }
    });
    $("select[name='tenthuoc']").change(function(){
        var gia = $(this).val();
        if(gia){
            $.ajax({
                type:'POST',
                url:'ajax_thuoc.php',
                data:'idgia='+ gia,
                success:function(html){
                    $("select[name='lieuluong']").html(html);
                    

                }
            }); 
        }else{
          $("select[name='lieuluong']").html('<option value="">Liều lượng</option>'); 
        }
    });

    $("select[name='tenthuoc']").change(function(){
        var donvi = $(this).val();
        if(donvi){
            $.ajax({
                type:'POST',
                url:'ajax_thuoc.php',
                data:'iddonvi='+ donvi,
                success:function(html){
                    $("select[name='donvi']").html(html);

                }
            }); 
        }else{
          $("select[name='donvi']").html('<option value="">Đơn vị</option>'); 
        }
    });

var serial = 1;
  showMenuSelected("#mi_new_prescription");
 var message = '<?php echo $message;?>';

  if(message !== '') {
    showCustomMessage(message);
  }
  var thuoc=[];
  $("#add_to_list").click(function() {
      var idthuoc = $("#tenthuoc").val();
      var tenthuoc = $("#tenthuoc option:selected").text();
      var gia = $("#gia option:selected").text();
var iddonthuoc = $("#idloaithuoc").val();
var idloaithuoc =  $("#idloaithuoc option:selected").text();
     
      var slthuoc = $("#slthuoc").val().trim();
      var thanhtien = slthuoc*gia;
      var oldData = $("#current_medicines_list").html();
    
      thuoc.push({idthuoc:idthuoc,iddonthuoc:iddonthuoc,serial:serial, tenthuoc: tenthuoc, gia: gia, lieuluong: lieuluong,donvi:donvi, slthuoc: slthuoc, thanhtien: thanhtien });
    displaycart();
    
  })

  function displaycart(){
    var idthuoc = $("#tenthuoc").val();
      var tenthuoc = $("#tenthuoc option:selected").text();
      var gia = $("#gia option:selected").text();
      var lieuluong = $("#lieuluong option:selected").text();
      var donvi = $("#donvi option:selected").text();




     

      
var idloai = $("#idloaithuoc").val();
var idloaithuoc =  $("#idloaithuoc option:selected").text();
     
      var slthuoc = $("#slthuoc").val().trim();
      var thanhtien = slthuoc*gia;
      var oldData = $("#current_medicines_list").html();
      if(idthuoc !== '' && slthuoc !== '') {
        let tongtien =0, j=0;
        if(thuoc.length>0){
    document.getElementById("count").innerHTML=thuoc.length;
    document.getElementById("current_medicines_list").innerHTML = thuoc.map((items)=>
        {
        var {slthuoc, tenthuoc, gia,idloaithuoc} = items;
    tongtien = tongtien+(gia *slthuoc);
        });
      }
        var inputs = '';
        inputst = inputs + '<input  readonly type ="hidden"  name="idthuocs[]" value="'+idthuoc+'" />';
        inputs = inputs + '<input  type ="hidden" name="idloais[]" value="'+idloai+'" />';
        inputss = inputs + '<input type ="hidden" name="slthuocs[]" value="'+slthuoc+'" />';
        inputsg = inputs + '<input  type ="hidden" name="thanhtiens[]" value="'+gia*slthuoc+'" />';
        inputtt = inputs + '<input   type ="hidden" name="tongtiens[]" value="'+tongtien+'" />';
        inputtt = inputs + '<input type ="hidden"   name="gias[]" value="'+gia+'" />';


        
        var div ='<div>';
        var tr = '<tr>';
        tr = tr + '<td class="px-2 py-1 align-middle">'+serial+'</td>';
        tr = tr + '<td class="px-1 py-1 align-middle">'+tenthuoc+inputst+'</td>';

        tr = tr + '<td class="px-2 py-1 align-middle">'+idloaithuoc+'</td>';
        tr = tr + '<td class="px-2 py-1 align-middle">'+gia +'</td>';
        tr = tr + '<td class="px-2 py-1 align-middle">'+lieuluong +'</td>';
        tr = tr + '<td class="px-2 py-1 align-middle">'+donvi +'</td>';
       
        tr = tr + '<td class="px-2 py-1 align-middle">'+slthuoc + inputss +'</td>';
        tr = tr + '<td class="px-2 py-1 align-middle">'+thanhtien+ inputsg +'</td>';
        // tr = tr + '<td class="px-2 py-1 align-middle">'+tongtien + inputtt +'</td>';



        
        tr = tr + '<td class="px-2 py-1 align-middle text-center"><button type="button" class="btn btn-outline-danger btn-sm rounded-0" onclick="deleteCurrentRow(this)"><i class="fa fa-times"></i></button></td>';
        
        tr = tr + '</tr>';
        oldData = oldData + tr;
        
      // oldData.appendChild(tr);
      serial++;
      
      // var tongtien = $("#tong").val();
      // var tongtien = tongtie+tongtie;




      
    

// tongtien += thanhtien;


        
        
        

        $("#current_medicines_list").html(oldData);
        $("#tong").html(tongtien);

        $("#tenthuoc").val('');
        
        $("#slthuoc").val('');
      }
     
    else {
        showCustomMessage('Please fill all fields.');
      }
    }
     
    });
   




  

  function deleteCurrentRow(obj) {

    var rowIndex = obj.parentNode.parentNode.rowIndex;
    
    document.getElementById("medication_list").deleteRow(rowIndex);
    document.getElementById("tong").splice(rowIndex,1);

     displaycart();

  }
//   function deleteCurrentRow(o){
//     thuoc.splice(a, 1);
//     displaycart();
// }
  


</script>
        </div>
        </body>
        </html>