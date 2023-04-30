                                 
<?php
session_start();

	include("./assets/login_tmd.php");
	$q= new login();

$iduser=$_SESSION['id'];
$ten=$q->luachon("SELECT tennv FROM nhanvien where id='$iduser' limit 1 ");

$mysqli = new PDO("mysql:host=localhost;dbname=phongkham", "pkgd", "123456");

if(isset($_POST["action"]))
{
    if($_POST["action"] == 'fetch')
	{
		
		$order_column = array('id', 'idbn','ngaykham');

		$main_query = "select count(lichkham.id) as id,count(lichkham.idbn) as idbn, lichtrinh.ngaykham from lichkham inner join lichtrinh on lichkham.idlt=lichtrinh.id 

		";

		$search_query = 'WHERE lichtrinh.ngaykham >= "'.date('Y-m-d').'" AND ';

		if(isset($_POST["start_date"], $_POST["end_date"]) && $_POST["start_date"] != '' && $_POST["end_date"] != '')
		{
			$search_query .= 'lichtrinh.ngaykham >= "'.$_POST["start_date"].'" AND lichtrinh.ngaykham <= "'.$_POST["end_date"].'" AND ';
		}

		if(isset($_POST["search"]["value"]))
		{
			$search_query .= '(lichkham.id LIKE "%'.$_POST["search"]["value"].'%" OR lichkham.idbn LIKE "%'.$_POST["search"]["value"].'%" OR lichtrinh.ngaykham LIKE "%'.$_POST["search"]["value"].'%")';
		}



		$group_by_query = " GROUP BY lichtrinh.ngaykham ";

		$order_by_query = "";

		if(isset($_POST["order"]))
		{
			$order_by_query = 'ORDER BY '.$order_column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$order_by_query = 'ORDER BY lichtrinh.ngaykham DESC ';
		}

		$limit_query = '';

		if($_POST["length"] != -1)
		{
			$limit_query = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$statement = $mysqli->prepare($main_query . $search_query . $group_by_query . $order_by_query);

		$statement->execute();

		$filtered_rows = $statement->rowCount();

		$statement = $mysqli->prepare($main_query . $group_by_query);

		$statement->execute();

		$total_rows = $statement->rowCount();

		$result = $mysqli->query($main_query . $search_query . $group_by_query . $order_by_query . $limit_query, PDO::FETCH_ASSOC);

		$data = array();

		foreach($result as $row)
		{
			$sub_array = array();

			$sub_array[] = $row['id'];
			$sub_array[] = $row['idbn'];
			$sub_array[] = $row['ngaykham'];

			$data[] = $sub_array;
		}

		$output = array(
			"draw"			=>	intval($_POST["draw"]),
			"recordsTotal"	=>	$total_rows,
			"recordsFiltered" => $filtered_rows,
			"data"			=>	$data
		);

		echo json_encode($output);
	}

}

?>