                                 
<?php
session_start();

	include("./assets/login_tmd.php");
	$q= new login();

$iduser=$_SESSION['id'];
$ten=$q->luachon("SELECT bacsi.tenbs from bacsi where id='$iduser' limit 1");
$idbs=$q->luachon("SELECT bacsi.id from bacsi where id='$iduser' limit 1");

$mysqli = new PDO("mysql:host=localhost;dbname=phongkham", "pkgd", "123456");

if(isset($_POST["action"]))
{
    if($_POST["action"] == 'fetch')
	{
		
		$order_column = array('id', 'idbn','lichngaykham');

		$main_query = "select count(id) as id,count(idbn) as idbn, lichngaykham from lichkham 

		";

		$search_query = 'WHERE idbs='.$idbs.' AND lichngaykham <= "'.date('Y-m-d').'" AND ';

		if(isset($_POST["start_date"], $_POST["end_date"]) && $_POST["start_date"] != '' && $_POST["end_date"] != '')
		{
			$search_query .= 'lichngaykham >= "'.$_POST["start_date"].'" AND lichngaykham <= "'.$_POST["end_date"].'" AND ';
		}

		if(isset($_POST["search"]["value"]))
		{
			$search_query .= '(id LIKE "%'.$_POST["search"]["value"].'%" OR idbn LIKE "%'.$_POST["search"]["value"].'%" OR lichngaykham LIKE "%'.$_POST["search"]["value"].'%")';
		}



		$group_by_query = " GROUP BY lichngaykham ";

		$order_by_query = "";

		if(isset($_POST["order"]))
		{
			$order_by_query = 'ORDER BY '.$order_column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$order_by_query = 'ORDER BY lichngaykham DESC ';
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
			$sub_array[] = $row['lichngaykham'];

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