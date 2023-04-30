<?php


   require('../Admin/assets/db_config.php');
if($_POST['idloai']){
$id=$_POST['idloai'];
if($id==0){
	echo "<option>Chọn tên thuốc</option>";
}else{

   $sql = "SELECT * FROM thuoc where idloai = '$id'"; 
   $result = $mysqli->query($sql);
   echo '<option value=""> Chọn tên thuốc</option>'; 
   while($row = $result->fetch_assoc()){
	   echo '
      <option value="'.$row['id'].'">'.$row['tenthuoc'].'</option>
                       
      '
      ;
   }
   
}
}
if(!empty($_POST['id'])){ 
    date_default_timezone_set('Asia/ho_chi_minh');
    $today = date('Y-m-d');
   $tenthuoc = $_POST['id'];
    $sql = "SELECT * FROM thuoc where id = '$tenthuoc'"; 
    $result = $mysqli->query($sql);
    if($result->num_rows > 0){ 
      
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['id'].' ">'.$row['gia'].'</option>
            ';        
        } 
    }else{ 
        echo '<option value="">Chưa có giá</option>'; 
    } 
 } 
elseif(!empty($_POST['idgia'])){ 
   date_default_timezone_set('Asia/ho_chi_minh');
   $today = date('Y-m-d');
  $ten = $_POST['idgia'];
  $query = "SELECT * FROM thuoc where id = '$ten' limit 1"; 
   $result1 = $mysqli->query($query); 
   
  // Generate HTML of city options list 
  if($result1->num_rows > 0){ 
      
      while($row = $result1->fetch_assoc()){  
          echo '<option value="'.$row['id'].' ">'.$row['lieuluong'].'</option>
          ';        
      } 
  }else{ 
      echo '<option value="">Chưa có liều lượng</option>'; 
  } 
} 
elseif(!empty($_POST['iddonvi'])){ 
    date_default_timezone_set('Asia/ho_chi_minh');
    $today = date('Y-m-d');
   $tendv = $_POST['iddonvi'];
   $query = "SELECT * FROM thuoc where id = '$tendv' limit 1"; 
    $result1 = $mysqli->query($query); 
    
   // Generate HTML of city options list 
   if($result1->num_rows > 0){ 
       
       while($row = $result1->fetch_assoc()){  
           echo '<option value="'.$row['id'].' ">'.$row['donvitinh'].'</option>
           ';        
       } 
   }else{ 
       echo '<option value="">Chưa xác định đơn vị</option>'; 
   } 
 } 
?>