<?php 
 include("../../../conn.php");

 extract($_POST);

 $selSection = $conn->query("SELECT * FROM exam_tbl WHERE ex_title='$examTitle' ");

 if($sectionSelected == "0")
 {
 	$res = array("res" => "noSelectedSection");
 }
 else if($timeLimit == "0")
 {
 	$res = array("res" => "noSelectedTime");
 }
 else if($selSection->rowCount() > 0)
 {
	$res = array("res" => "exist", "examTitle" => $examTitle);
 }
 else
 {
    
	$insExam = $conn->query("INSERT INTO exam_tbl(sec_id,ex_title,ex_time_limit,ex_description) VALUES('$sectionSelected','$examTitle','$timeLimit','$examDesc') ");
	if($insExam)
	{
		$res = array("res" => "success", "examTitle" => $examTitle);
	}
	else
	{
		$res = array("res" => "failed", "examTitle" => $examTitle);
	}


 }




 echo json_encode($res);
 ?>