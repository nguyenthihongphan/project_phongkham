<?php


   require('./assets/db_config.php');
if($_POST['id']){
$id=$_POST['id'];
if($id==0){
	echo "<option>Chọn bác sĩ</option>";
}else{

   $sql = "SELECT * FROM bacsi where idck = '$id'"; 
   $result = $mysqli->query($sql);
   while($row = $result->fetch_assoc()){
	   echo '<option value="'.$row['id'].'">'.$row['tenbs'].'</option>';	 
   }
}
}
?>
