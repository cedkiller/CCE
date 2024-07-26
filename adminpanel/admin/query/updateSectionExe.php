<?php
 include("../../../conn.php");
 extract($_POST);


$newSectionName = strtoupper($newSectionName);
$updSection = $conn->query("UPDATE section_tbl SET sec_name='$newSectionName' WHERE sec_id='$section_id' ");
if($updSection)
{
	   $res = array("res" => "success", "newSectionName" => $newSectionName);
}
else
{
	   $res = array("res" => "failed");
}



 echo json_encode($res);	
?>