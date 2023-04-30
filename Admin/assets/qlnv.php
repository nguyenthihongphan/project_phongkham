<?php
include('upload.php');
 
class qlnv extends upfiles
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
	public function loadchitietnv($sql)
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
					$anh=$row['anh']; 
					$tennv =$row['tennv'];
					$username =$row['username'];
					$ngaysinh=$row['ngaysinh'];
					$gioitinh=$row['gioitinh'];
					$email=$row['email'];
					$sdt=$row['sdt']; 
					$diachi=$row['diachi'];
					$chucvu=$row['chucvu'];
			echo '
			  <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="assets/img/'.$anh.'" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">'.$chucvu.'  '.$tennv.'</h5>
			<p class="text-muted mb-1">Mã nhân viên: '.$id.' </p>
			<p class="text-muted mb-1">username: '.$username.' </p>
            <p class="text-muted mb-4">Email: '.$email.' </p>
           
          </div>
        </div>
       
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Ngày sinh</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">'.$ngaysinh.'</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">'.$email.'</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Số điện thoại</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">0'.$sdt.'</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Giới tính</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">'.$gioitinh.'</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Địa chỉ</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">'.$diachi.'</p>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
	 <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="edit-employee.php?id='.$id.'"><i class="fa fa-pencil m-r-5"></i> Chỉnh sửa</a>
                                    <a class="dropdown-item" href="?action=delete&idnv='.$id.'"><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
                                </div>
                            </div>
    ';
						
						;
					
				}
				}
			else
			{
				echo' không có nhân viên...';
				
				}
		}

	public function employees($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			if($i>0)
					{	echo' <table class="table table-striped custom-table">
					   <thead>
                                    <tr><th>STT</th>
									<th>Ảnh</th>
                                        <th style="min-width:200px;">Họ tên</th>
                                        <th>Giới tính</th>
                                        <th style="min-width:150px;">Ngày sinh</th>
                                        <th style="min-width:130px;">Số điện thoại</th>
                                        <th style="min-width:100px;">Email</th>
                                        <th style="min-width:130px;">Chức vụ</th>
									
                                        <th class="text-right">Hoạt động</th>
                                    </tr>
                                </thead>';
			  			$dem=1;
				while($row=mysql_fetch_array($ketqua))
				{
					$id=$row['id'];
					$anh=$row['anh'];
					$tennv=$row['tennv'];
					$gioitinh=$row['gioitinh'];
					$ngaysinh=$row['ngaysinh'];
					$username=$row['username'];
					$pass=$row['password'];
					$sdt=$row['sdt'];
					$email=$row['email'];
					$chucvu=$row['chucvu'];
					$phanquyen=$row['phanquyen'];
					
				echo'  <tbody>
                                    <tr>
									<td>'.$dem.'</td>
                                        <td>
										<a href="profilenv.php?id='.$id.'">
										<img width="28" height="28" src="assets/img/'.$anh.'" class="rounded-circle" alt=""> </a>
										</td>
                                        <td><a href="profilenv.php?id='.$id.'">'.$tennv.'</a></td>
                                        <td><a href="profilenv.php?id='.$id.'">'.$gioitinh.'</a></td>
                                        <td><a href="profilenv.php?id='.$id.'">'.$ngaysinh.'</a></td>
                                        <td><a href="profilenv.php?id='.$id.'">0'.$sdt.'</a></td>
									 	<td><a href="profilenv.php?id='.$id.'">'.$email.'</a></td>
										<td><a href="profilenv.php?id='.$id.'">'.$chucvu.'</a></td>
										
                                        
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="edit-employee.php?id='.$id.'"><i class="fa fa-pencil m-r-5"></i> Sửa</a>
                                                    <a class="dropdown-item" href="?idnv='.$id.'"> <data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
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
				echo' Không có nhân viên';
				
				}
		}
			
	}
	

?>