<?php
class thanhtoanphi
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
public function chitietphi($sql)
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
					$tenbn=$row['tenbn']; 
					$email =$row['tenbs'];
					$sdt =$row['sdt'];
					$phidichvu=$row['phidichvu'];
					$diachi=$row['diachi'];
					$trangthai=$row['trangthai'];
					$trangthaithanhtoan=$row['trangthaithanhtoan'];
                    echo '
                    <div class="form-group">
                        <label for="order_id">Mã đơn hàng</label>
                        <input class="form-control" id="order_id" name="order_id" type="text"  value="'.$id.'"/>
                    </div>
                    <div class="form-group">
                        <label for="amount">Phí dịch vụ</label>
                        <input class="form-control" id="amount"
                               name="amount" type="number" value="'.$phidichvu.'"/>
                    </div>
                    <div class="form-group">
                    <label >Họ và tên</label>
                    <input class="form-control" id="txt_billing_fullname"
                           name="txt_billing_fullname" type="text" value="'.$tenbn.'"/>             
                </div>
                <div class="form-group">
                    <label >Email</label>
                    <input class="form-control" id="txt_billing_email"
                           name="txt_billing_email" type="text" value="'.$email.'"/>   
                </div>
                <div class="form-group">
                    <label >Số điện thoại</label>
                    <input class="form-control" id="txt_billing_mobile"
                           name="txt_billing_mobile" type="text"value="0'.$sdt.'"/>   
                </div>
                <div class="form-group">
                    <label >Địa chỉ</label>
                    <input class="form-control" id="txt_billing_addr1"
                           name="txt_billing_addr1" type="text" value="'.$diachi.'"/>   
                </div>
                <div class="form-group">
                    <label >trang thái thanh toán</label>
                    <input class="form-control" id="txt_billing"
                           name="txt_trangthai" type="text" value="'.$trangthaithanhtoan.'"/>   
                </div>

                ';					
            }
            }
        else
        {
            echo' không có bác sĩ...';
            
            }

                }
            }
        
    