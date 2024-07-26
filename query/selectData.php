<?php 
$exmneId = $_SESSION['examineeSession']['exmne_id'];

// Select Data sa nilogin nga examinee
$selExmneeData = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
$exmneSection =  $selExmneeData['exmne_section'];


        
// Select and tanang exam depende sa section nga ni login 
$selExam = $conn->query("SELECT * FROM exam_tbl WHERE sec_id='$exmneSection' ORDER BY ex_id DESC ");


//

 ?>