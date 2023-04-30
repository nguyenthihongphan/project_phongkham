<?php
include('upload.php');
 
class qlthuoc extends upfiles
{
		private function connect()
	{
		$con=mysql_connect("localhost","pkgd","123456");
		if(!$con)
		{
			echo'Không kết nối cơ sở dữ liệu';
			exit();
			}
		else
		{
			mysql_select_db("phongkham");
			mysql_query("SET NAMES UTF8");
			return $con; 
			}
		}
public function mylogin($user,$pass)
		{
			$pass=($pass);
			$link=$this->connect();
			$sql="select id, username, password, phanquyen from taikhoan where username='$user' and password='$pass' limit 1";
			$ketqua=mysql_query($sql,$link);
			$i=mysql_num_rows($ketqua);
			if($i==1)
			{
					while($row=mysql_fetch_array($ketqua))
					{
						$id=$row['id'];
						$username=$row['username'];
						$password=$row['password'];
						$phanquyen=$row['phanquyen'];
						session_start();
						$_SESSION['id']=$id;
						$_SESSION['user']=$username;
						$_SESSION['pass']=$password;
						$_SESSION['phanquyen']=$phanquyen;
						return 1;
						}
				}
			else
			{
				return 0;
				}
			}
		public function confirmlogin($id,$user,$pass,$phanquyen)
		{
			$link=$this->connect();
			$sql="select id from taikhoan where id='$id' and password='$pass' and phanquyen='$phanquyen' limit 1";
			$ketqua=mysql_query($sql,$link);
			$i=mysql_num_rows($ketqua);
			if($i!=1)
			{
					header("location:index.php");
							}
			}
			public function luachon($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			$kq='';
			if($i>0)
			{
				while($row=mysql_fetch_array($ketqua))
				{
					$id=$row[0];
					$kq=$id;
					}
				}
				return $kq;
			}
	
	public function loadchitietthuoc($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
	
			if($i>0)
			{
				
				while($row=mysql_fetch_array($ketqua))
				{
					$id=$row['id'];
					$tenthuoc=$row['tenthuoc']; 
					$loaithuoc =$row['idloai'];
					$hoatchat=$row['hoatchat'];
					$congdung=$row['congdung'];
					$donvitinh=$row['donvitinh'];
					$ngaysx=$row['ngaysx'];
					$handung=$row['handung'];
					$thuonghieu=$row['thuonghieu'];
					$nhasx=$row['nhasx'];
					$noisx=$row['noisx'];
					$lieuluong=$row['lieuluong'];
					$doituongsd=$row['doituongsd'];
					$sodangky=$row['sodangky'];
					$gia=$row['gia'];
					
			 echo '
            <div id="popup1" class="overlay">
                    <div class="popup" style="width: 70%;">
                    <center>
                        <h2></h2>
                        <a class="close" href="medicine.php">&times;</a>
                        <div class="content">
                            
                            
                        </div>
                        <div class="abc scroll" style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Xem</p><br><br>
                                </td>
                            
                                <td class="label-td" colspan="2">
                                    '.$id.'<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Tên thuốc: </label>
                                </td>
                       
                       
                                <td class="label-td" colspan="2">
                                '.$tenthuoc.'<br><br>
                                </td>
                       </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">loại thuốc: </label>
                                </td>
                          
                                <td class="label-td" colspan="2">
                                '.$loaithuoc.'<br><br>
                                </td>
                            </tr>
							<tr>
							<td class="label-td" colspan="2">
								<label for="nic" class="form-label">Liều lượng: </label>
							</td>
					  
							<td class="label-td" colspan="2">
							'.$lieuluong.'<br><br>
							</td>
						</tr>
							 <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">loại thuốc: </label>
                                </td>
                          
                                <td class="label-td" colspan="2">
                                '.$hoatchat.'<br><br>
                                </td>
                            </tr>\ <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">loại thuốc: </label>
                                </td>
                          
                                <td class="label-td" colspan="2">
                                '.$congdung.'<br><br>
                                </td>
                            </tr>
							 <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">loại thuốc: </label>
                                </td>
                          
                                <td class="label-td" colspan="2">
                                '.$donvitinh.'<br><br>
                                </td>
                            </tr>
							 <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">loại thuốc: </label>
                                </td>
                          
                                <td class="label-td" colspan="2">
                                '.$ngaysx.'<br><br>
                                </td>
                            </tr>
							 <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">loại thuốc: </label>
                                </td>
                          
                                <td class="label-td" colspan="2">
                                '.$handung.'<br><br>
                                </td>
                            </tr>
							 <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">loại thuốc: </label>
                                </td>
                          
                                <td class="label-td" colspan="2">
                                '.$thuonghieu.'<br><br>
                                </td>
                            </tr>
							 <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">loại thuốc: </label>
                                </td>
                          
                                <td class="label-td" colspan="2">
                                '.$nhasx.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Xuất xứ: </label>
                                </td>
                          
                                <td class="label-td" colspan="2">
                                '.$noisx.'<br><br>
                                </td>
                          </tr>
						  <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Đơn vị tính: </label>
                                </td>
                           
                                <td class="label-td" colspan="2">
                                '.$doituongsd.'<br><br>
                                </td>
                            </tr>
							 <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">loại thuốc: </label>
                                </td>
                          
                                <td class="label-td" colspan="2">
                                '.$sodangky.'<br><br>
                                </td>
                            </tr>
							 <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">loại thuốc: </label>
                                </td>
                          
                                <td class="label-td" colspan="2">
                                '.$gia.'<br><br>
                                </td>
                            </tr>
							</table>
							</div>
							</div>
							<div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="edit-employee.php?id='.$id.'"><i class="fa fa-pencil m-r-5"></i> Chỉnh sửa</a>
                                    <a class="dropdown-item" href="delete-employeer.php?id='.$id.'" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
                                </div>
                            </div>

                          '
						
						;
					
				}
				}
			else
			{
				echo' không có thuốc nào...';
				

				}
		}
	
	
			
	public function themxoasua($sql)
	{
		$link=$this->connect();
		if(mysql_query($sql,$link))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function medicine($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			if($i>0)
					{	echo' <table class="table table-striped custom-table">
					   <thead>
                                    <tr><th>STT</th>
                                        <th style="min-width:100px;">Tên thuốc</th>										
										<th style="min-width:50px;">Giá</th>
										<th style="min-width:80px;">Liều dùng</th>
                                        <th style="min-width:100px;">Hoạt chất</th>
                                        <th style="min-width:150px;">Công dụng</th>
                                        <th style="min-width:130px;">Ngày sản xuất</th>
                                        <th style="min-width:100px;">Hạn dùng</th>
										<th style="min-width:80px;">Nơi sản xuất</th>
										<th style="min-width:50px;">Đơn vị tính</th>
										<th style="min-width:50px;">Số lượng</th>
                                        <th class="text-right">Hoạt động</th>
                                    </tr>
                                </thead>';
			  			$dem=1;
				while($row=mysql_fetch_array($ketqua))
				{
					$id=$row['id'];
					$tenthuoc=$row['tenthuoc']; 
					$lieuluong=$row['lieuluong']; 
					$loaithuoc =$row['idloai'];
					$hoatchat=$row['hoatchat'];
					$congdung=$row['congdung'];
					$donvitinh=$row['donvitinh'];
					$ngaysx=$row['ngaysx'];
					$handung=$row['handung'];
					$thuonghieu=$row['thuonghieu'];
					$nhasx=$row['nhasx'];
					$noisx=$row['noisx'];
					$doituongsd=$row['doituongsd'];
					$sodangky=$row['sodangky'];
					$gia=$row['gia'];
					$sl=$row['sl'];
					
				echo'  <tbody>
                                    <tr>
									<td>'.$dem.'</td>
                                        
										<a href="chitietthuoc.php?id='.$id.'">
                                        <td><a href="edit-medicine.php?id='.$id.'">'.$tenthuoc.'</a></td>
                                        <td><a href="edit-medicine.php?id='.$id.'">'.$gia.'</a></td>
                                        <td><a href="edit-medicine.php?id='.$id.'">'.$lieuluong.'</a></td>
                                        <td><a href="edit-medicine.php?id='.$id.'">'.$hoatchat.'</a></td>
                                        <td><a href="edit-medicine.php?id='.$id.'">'.$congdung.'</a></td>
                                        <td><a href="edit-medicine.php?id='.$id.'">'.$ngaysx.'</a></td>
									 	<td><a href="edit-medicine.php?id='.$id.'">'.$handung.'</a></td>
										<td><a href="edit-medicine.php.php?id='.$id.'">'.$noisx.'</a></td>
										<td><a href="edit-medicine.php?id='.$id.'">'.$donvitinh.'</a></td>
										<td><a href="edit-medicine.php?id='.$id.'">'.$sl.'</a></td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                 <a class="dropdown-item" href="?action=Xem&id='.$id.'" class="non-style-link"><i class="fa fa-pencil m-r-5"></i><font class="tn-in-text">Xem chi tiết</font></a>
                                    <a class="dropdown-item" href="edit-medicine.php?id='.$id.'"><i class="fa fa-pencil m-r-5"></i> Chỉnh sửa</a>
                                    <a class="dropdown-item" href="?action=Hủy&id='.$id.'" ><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                </tbody>';	
						  $dem++;																		 					}
				echo'</table>';
				}
		
			else
			{
				echo' Không có thuốc';
				
				}
		}
		public function loaddanhmuc($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			if($i>0)
			{
				while($row=mysql_fetch_array($ketqua))
				{
					$id=$row['id'];
					$tenloaithuoc=$row['tenloaithuoc'];
					echo '<a href="danhmucthuoc.php?id='.$id.'">'.$tenloaithuoc.'</a>';
					echo '<br>';
					}
				}
			else
			{
				echo' không có dữ liệu';
				
				}
			}
		
	
}
	

?>