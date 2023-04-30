<?php
class login
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
			$pass=md5($pass);
			$link=$this->connect();
			$sql="select id, username, password from benhnhan where username='$user' and password='$pass' limit 1";
			$ketqua=mysql_query($sql,$link);
			$i=mysql_num_rows($ketqua);
			if($i==1)
			{
					while($row=mysql_fetch_array($ketqua))
					{
						$id=$row['id'];
						$username=$row['username'];
						$password=$row['password'];
						
						session_start();
						$_SESSION['id']=$id;
						$_SESSION['user']=$username;
						$_SESSION['pass']=$password;
						
						return 1;
						}
				}
			else
			{
				return 0;
				}
			}
		public function confirmlogin($id,$user,$pass)
		{
			$link=$this->connect();
			$sql="select id from benhnhan where id='$id' and password='$pass' limit 1";
			$ketqua=mysql_query($sql,$link);
			$i=mysql_num_rows($ketqua);
			if($i!=1)
			{
					header("location:index1.php");
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
	public function tintuc($sql)
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
					
					$tentintuc=$row['tentintuc'];
					$anh=$row['anh'];
					$tieude=$row['tieude'];
					$noidung=$row['noidung'];
					$ngaydang=$row['ngaydang'];
					
					
					;

				 echo '
				  <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="../Admin/assets/img/'.$anh.'" alt="">
                        </div>
                        <div class="department_content">
                            <h3><a href="#">'.$tentintuc.'</a></h3>
                            <p>'.$tieude.'</p>
                          
							<a href="./blog.html" class="learn_more">đọc thêm</a>
                        </div>
                    </div>
                   </div>
               ';
					}
					}
			else
			{
				echo' Không có tin tức';
			}
		}
		public function timkiemthuoc($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			if($i>0)
					{
						echo' <thead>
                    <tr class="bg-gradient-primary ">
                      <th class="p-1 text-center">STT</th>
                      <th class="p-1 text-center">Ngày kê đơn</th>
                      
                      <th class="p-1 text-center">Tên bệnh nhân</th>
                      
                      <th class="p-1 text-center">Mã bệnh nhân</th>
					  <th class="p-1 text-center">Tên bệnh án</th>
					  <th class="p-1 text-center">Kết quả điều trị</th>
                      
                      <th class="p-1 text-center">Thuốc</th>
                      
					   <th class="p-1 text-center">Lựa chọn</th>
                    </tr>
                  </thead>'	;
			  			$dem=1;	
				while($row=mysql_fetch_array($ketqua))
				{
					$id=$row['id'];
					$tenbn=$row["tenbn"];
					$idbn=$row["idbn"];
					$tenthuoc=$row["tenthuoc"];
					$loaithuoc=$row["loaithuoc"];
					$slthuoc=$row["slthuoc"];
					$tenba=$row["tenba"];
					$kqdieutri=$row["kqdieutri"];
					$scheduletime=$row["ngay"];	
							
				echo' 
				 <tbody >
                     <tr>
					 <td id="idbn">'.$dem.'</td>
			<td id="idbn">'.$scheduletime.'</td>
			<td id="tenbn">'.$tenbn.'</td>
			<td id="ngay">BN-0'.$idbn.'</td>
			<td id="loaithuoc">'.$tenba.'</td>
			<td id="slthuoc">'.$kqdieutri.'</td>
			<td id="tenthuoc">'.$tenthuoc.'</td>
			
			<td>
                                        <div >
                                        
                                        <a href="chitiethoadon.php?id='.$id.'" class="non-style-link"><button  class="btn-primary btn button-icon btn-view"  style="padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Xem Chi tiết</font></button></a>
                                       &nbsp;&nbsp;&nbsp;
                                       <a href="?action=Hủy&id='.$id.'&name='.$tenbn.'" class="non-style-link"><button  class="btn-primary btn button-icon btn-delete"  style="padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Hủy</font></button></a>
                                        </div>
                                        </td>
		  </tr>
                  </tbody>';	
				  $dem++;
				}
				}
		
			else
			{
				echo' Bạn chưa có bệnh án';
				
				}
		}
		public function printhd($sql)
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
					$tenbn=$row["tenbn"];
					$tenhd=$row["tenhd"];
					$idbn=$row["idbn"];
					$tenthuoc=$row["tenthuoc"];
					$loaithuoc=$row["loaithuoc"];
					$slthuoc=$row["slthuoc"];
					$scheduletime=$row["ngay"];
					$diachi=$row["diachi"];
					$sdt=$row["sdt"];
					$email=$row["email"];	
					$kqdieutri=$row["kqdieutri"];
					$tenba=$row["tenba"];			
				echo' 
				<div class="row">
                    <div class=" col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row custom-invoice">
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <img src="../Admin/assets/img/logo-dark.png" class="inv-logo" width="100px" alt="">
                                        <ul class="list-unstyled">
                                            <li>PHÒNG KHÁM GIA ĐÌNH</li>
                                            <li>Gò Vấp,HCM</li>
                                            <li>SĐT:055557777</li>
                                            <li>GST No:120</li>
                                        </ul>
                                    </div>
									 
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <div class="invoice-details">
                                            <h3 class="text-uppercase">Mã hóa đơn :HD-0'.$id.'</h3>
                                            <ul class="list-unstyled">
                                                <li>Ngày khám: <span> '.$scheduletime.'</span></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
								<div class="clearfix">&nbsp;</div>
									  <div class="clearfix">&nbsp;</div>
									   <div class="clearfix">&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 m-b-20">
										
											<h5>Họ và tên bệnh nhân:</h5>
											<ul class="list-unstyled">
												<li>
													<h5><strong>'.$tenbn.'</strong></h5>
												</li>
												<li>Mã bệnh nhân: BN-'.$idbn.'</li>
												<li>Địa chỉ: '.$diachi.'</li>
												<li>Số điện thoại: '.$sdt.'</li>
												<li>Email: '.$email.'</li>
											</ul>
										
                                    </div>
                                    <div class="col-sm-6 col-lg-6 m-b-20">
										<div class="invoices-view">
											<span class="text-muted">Chi tiết bệnh án: '.$tenba.'</span>
											<ul class="list-unstyled invoice-payment-details">
												<li>
													Kết quả xét nghiệm:<b> '.$kqdieutri.'</b>
												</li>
												
											</ul>
										</div>
                                    </div>
                                </div>
								 <div class="clearfix">&nbsp;</div>
									   <div class="clearfix">&nbsp;</div>
                                <div class="table-responsive">
								<h4 class="col-sm-3 col-lg-6 m-b-20">Đơn thuốc: '.$tenhd.' </h4>
									
									 
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                
                                                <th>Tên thuốc</th>
                                             
                                                <th>Loại thuốc</th>
                                                <th>Số lượng</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                
                                                <td>'.$tenthuoc.'</td>
                                                <td>'.$loaithuoc.'</td>
                                                <td>'.$slthuoc.'</td>
                                              
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <div class="row invoice-payment">
                                        <div class="col-sm-7">
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="m-b-20">
                                                <h6>Số tiền</h6>
                                                <div class="table-responsive no-border">
                                                    <table class="table mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th>Phí khám:</th>
                                                                <td class="text-right">300.000 đồng</td>
                                                            </tr>
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';	
				}
				}
		
			else
			{
				echo' Không có hóa đơn';
				
				}
		}
			public function doctors($sql)
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
					$tenbs=$row['tenbs'];
					$username=$row['username'];
					$gioitinh=$row['gioitinh'];
					$ngaysinh=$row['ngaysinh'];
					$sdt=$row['sdt'];
					$email=$row['email'];
					$tenck=$row['tenck'];
					$diachi=$row['diachi'];
					$chucvu=$row['chucvu'];
					$linhvuc=$row['linhvuc'];
					
					
					
				echo' <div class="col-md-4 col-sm-4  col-lg-3" >
				 <div class="profile-widget" >
                            <div class="doctor-img">
                                <a class="avatar" href="profile.php?id='.$id.'"><img alt="" src="../Admin/assets/img/'.$anh.'"></a>
                            </div>
                           
                            <h4 class="doctor-name text-ellipsis"><a href="profile.php?id='.$id.'">'.$tenbs.'</a></h4>
                            <div class="doc-prof">'.$tenck.'</div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> '.$email.'
                            </div>
                        </div> 
						</div>';	
																							 					}
			
				}
		
			else
			{
				echo' Không có bác sĩ';
				
				}
		}
}
		?>
