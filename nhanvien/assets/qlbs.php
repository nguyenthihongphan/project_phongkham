<?php
include('../Admin/upload.php');
class qlbs extends upfiles
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
		public function loadchitietbs($sql)
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
					$tenbs =$row['tenbs'];
					$username =$row['username'];
					$ngaysinh=$row['ngaysinh'];
					$gioitinh=$row['gioitinh'];
					$email=$row['email'];
					$sdt=$row['sdt']; 
					$diachi=$row['diachi'];
					$chucvu=$row['chucvu'];
					$linhvuc=$row['linhvuc'];
					$chuyenkhoa = $row['tenck'];
					
				
			echo '
			  <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="../Admin/assets/img/'.$anh.'" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">'.$chucvu.'  '.$tenbs.'</h5>
			<p class="text-muted mb-1">Mã bác sĩ: '.$id.' </p>
            <p class="text-muted mb-1">Chuyên khoa: '.$chuyenkhoa.' </p>
            <p class="text-muted mb-4">Lĩnh vực: '.$linhvuc.' </p>
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
	 ';					
				}
				}
			else
			{
				echo' không có bác sĩ...';
				
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
                                <a class="avatar" href="profilebs.php?id='.$id.'"><img alt="" src="../Admin/assets/img/'.$anh.'"></a>
                            </div>
                           
                            <h4 class="doctor-name text-ellipsis"><a href="profilebs.php?id='.$id.'">'.$tenbs.'</a></h4>
                            <div class="doc-prof">'.$tenck.'</div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> '.$email.'
                            </div></div>
						</div>
						';	
																							 					}
			
				}
		
			else
			{
				echo' Không có bác sĩ';
				
				}
		}
		
		public function loadchuyenkhoa($sql)
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
					$tenck=$row['tenck'];
						echo '<div id = chuyenkhoa ><a href="index.php?id='.$id.'">'.$tenck.'</a></div>';
					echo '<br>';
					}
				}
			else
			{
				echo' không có dữ liệu';
				
				}
			}
		public function loadcombo_chuyenkhoa($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			if($i>0)
			{	echo' <select name="chuyenkhoa" class="form-control" id="chuyenkhoa">
       				 ';
				while($row=mysql_fetch_array($ketqua))
				{
					$id=$row['id'];
					$tenck=$row['tenck'];
					echo' <label ><option  value="'.$id.'">'.$tenck.'</option></label>';
					}
				echo '</select>';
				}
			}
	}
	

?>