<?php 

// Count All Section
$selSection = $conn->query("SELECT COUNT(sec_id) as totSection FROM section_tbl ")->fetch(PDO::FETCH_ASSOC);


// Count All Exam
$selExam = $conn->query("SELECT COUNT(ex_id) as totExam FROM exam_tbl ")->fetch(PDO::FETCH_ASSOC);

// Count All Exam
$selExaminee = $conn->query("SELECT COUNT(exmne_id) as totExaminee FROM examinee_tbl ")->fetch(PDO::FETCH_ASSOC);



 ?>