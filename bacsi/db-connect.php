<?php
class loginbs
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
			$sql="select id, username, password from bacsi where username='$user' and password='$pass' limit 1";
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
			$sql="select id from bacsi where id='$id' and password='$pass' and username='$user' limit 1";
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
}