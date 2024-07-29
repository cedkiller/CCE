<?php 
 include("../../../conn.php");


extract($_POST);

$delSection = $conn->query("DELETE  FROM section_tbl WHERE sec_id='$id'  ");
if($delSection)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}



	echo json_encode($res);
 ?>