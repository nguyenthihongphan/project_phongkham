<?php
// Include the database config file 
   require('../nhanvien/assets/db_config.php');
   date_default_timezone_set('Asia/ho_chi_minh');
   $today = date('Y-m-d');

if(!empty($_POST['idbs'])){ 
	$GetStateID = $_POST['idbs'];
	
    // Fetch city data based on the specific state id
    $query = "SELECT lichtrinh.id, lichtrinh.ngaykham, TIME(lichtrinh.gioketthuc) AS gioketthuc,TIME(lichtrinh.giobatdau) AS giobatdau FROM lichtrinh WHERE idbs = '$GetStateID' AND lichtrinh.ngaykham>='$today' ORDER BY lichtrinh.ngaykham ASC"; 
    $result = $mysqli->query($query); 
     
    // Generate HTML of city options list 
    if($result->num_rows > 0){ 
        echo '<option value=""> Chọn lịch khám</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['id'].' ">'.$row['ngaykham'].' Từ '.substr($row['giobatdau'],0,5).' - '.substr($row['gioketthuc'],0,5).'</option>'; 
        } 
    }else{ 
        echo '<option value="">Ngày khám đang cập nhật</option>'; 
    } 

}
?>