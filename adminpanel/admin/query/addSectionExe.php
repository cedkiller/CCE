<?php
include("../../../conn.php");

$section_name = strtoupper(trim($_POST['section_name']));

$selSection = $conn->prepare("SELECT * FROM section_tbl WHERE sec_name = :section_name");
$selSection->bindParam(':section_name', $section_name);
$selSection->execute();

if($selSection->rowCount() > 0) {
    $res = array("res" => "exist", "section_name" => $section_name);
} else {
    $insSection = $conn->prepare("INSERT INTO section_tbl (sec_name) VALUES (:section_name)");
    $insSection->bindParam(':section_name', $section_name);
    if($insSection->execute()) {
        $res = array("res" => "success", "section_name" => $section_name);
    } else {
        $res = array("res" => "failed", "section_name" => $section_name);
    }
}

echo json_encode($res);
?>
