<div class="app-main__outer">
    <div class="app-main__inner">
        <style>
            .filter-button {
                padding: 10px;
                cursor: pointer;
                transition: all 0.3s ease 0s;
            }
            .filter-button:hover {
                opacity: 0.5;
                z-index: 2;
                transform: scale(1.1);
                border-radius: 10px;
                margin: 0px 10px;
            }
        </style>
        <?php 
            @$exam_id = $_GET['exam_id'];

            if ($exam_id != "") {
                $selEx = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$exam_id'")->fetch(PDO::FETCH_ASSOC);
                $exam_section = $selEx['sec_id'];
                $selExmne = $conn->query("SELECT * FROM examinee_tbl et WHERE exmne_section='$exam_section'");
        ?>
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div>
                                <b class="text-primary">RANKING BY EXAM</b><br>
                                Exam Name : <?php echo htmlspecialchars($selEx['ex_title']); ?><br><br>
                                <button class="filter-button border" style="color:black;background-color: yellow;" onclick="filterRows('Excellence')">Excellence</button>
                                <button class="filter-button border" style="color:white;background-color: green;" onclick="filterRows('Very Good')">Very Good</button>
                                <button class="filter-button border" style="color:white;background-color: blue;" onclick="filterRows('Good')">Good</button>
                                <button class="filter-button border" style="color:white;background-color: red;" onclick="filterRows('Failed')">Failed</button>
                                <button class="filter-button border" style="color:black;background-color: #E9ECEE;" onclick="filterRows('Not Answering')">Not Answering</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                    <thead>
                        <tr>
                            <th width="25%">Examinee Fullname</th>
                            <th>Score / Over</th>
                            <th>Percentage</th>
                            <th>Action</th> <!-- New action header -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { 
                                $exmneId = $selExmneRow['exmne_id'];

                                // Prepare and execute the first SQL statement
                                $selScoreStmt = $conn->prepare("
                                    SELECT * 
                                    FROM exam_question_tbl eqt 
                                    INNER JOIN exam_answers ea 
                                    ON eqt.eqt_id = ea.quest_id 
                                    AND eqt.exam_answer = ea.exans_answer  
                                    WHERE ea.axmne_id = :exmneId 
                                    AND ea.exam_id = :examId 
                                    AND ea.exans_status = 'new' 
                                    ORDER BY ea.exans_id DESC
                                ");
                                $selScoreStmt->bindParam(':exmneId', $exmneId);
                                $selScoreStmt->bindParam(':examId', $exam_id);
                                $selScoreStmt->execute();
                                $selScore = $selScoreStmt->rowCount();

                                // Prepare and execute the second SQL statement
                                $selAttemptStmt = $conn->prepare("
                                    SELECT * 
                                    FROM exam_attempt 
                                    WHERE exmne_id = :exmneId 
                                    AND exam_id = :examId
                                ");
                                $selAttemptStmt->bindParam(':exmneId', $exmneId);
                                $selAttemptStmt->bindParam(':examId', $exam_id);
                                $selAttemptStmt->execute();

                                // Prepare and execute the third SQL statement
                                $stmt = $conn->prepare("
                                    SELECT COUNT(exam_id) as total_questions 
                                    FROM exam_question_tbl 
                                    WHERE exam_id = :examId
                                ");
                                $stmt->bindParam(':examId', $exam_id);
                                $stmt->execute();
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                $over = $result["total_questions"];

                                // Calculate the score and percentage only if $over is not zero
                                if ($over > 0) {
                                    $score = $selScore;
                                    $ans = ($score / $over) * 100;
                                } else {
                                    $score = 0;
                                    $ans = 0;
                                }

                                // Determine the category based on the score
                                $category = 'Failed';
                                if ($selAttemptStmt->rowCount() == 0) {
                                    $category = 'Not Answering';
                                } else if ($ans >= 90) {
                                    $category = 'Excellence';
                                } else if ($ans >= 80) {
                                    $category = 'Very Good';
                                } else if ($ans >= 75) {
                                    $category = 'Good';
                                }
                        ?>
                            <tr data-category="<?php echo htmlspecialchars($category); ?>" style="<?php 
                                if ($category == 'Not Answering') {
                                    echo "background-color: #E9ECEE; color: black;";
                                } else if ($category == 'Excellence') {
                                    echo "background-color: yellow;";
                                } else if ($category == 'Very Good') {
                                    echo "background-color: green; color: white;";
                                } else if ($category == 'Good') {
                                    echo "background-color: blue; color: white;";
                                } else {
                                    echo "background-color: red; color: white;";
                                }
                            ?>">
                                <td><?php echo htmlspecialchars($selExmneRow['exmne_fullname']); ?></td>
                                <td>
                                    <?php 
                                        if ($selAttemptStmt->rowCount() == 0) {
                                            echo "Not answered yet";
                                        } else {
                                            echo htmlspecialchars($selScore) . " / " . htmlspecialchars($over);
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if ($selAttemptStmt->rowCount() == 0) {
                                            echo "Not answered yet";
                                        } else {
                                            echo htmlspecialchars(number_format($ans, 2)) . '%';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="./pages/result.php?examId=<?php echo urlencode($exam_id); ?>&exmneId=<?php echo urlencode($exmneId); ?>" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                        <?php 
                            } 
                        ?>         
                    </tbody>
                </table>

                </div>
        <?php
            } else { 
        ?>
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div><b>RANKING BY EXAM</b></div>
                        </div>
                    </div>
                </div> 

                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">Exam List</div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                                <thead>
                                    <tr>
                                        <th class="text-left pl-4">Exam Title</th>
                                        <th class="text-left">Section</th>
                                        <th class="text-left">Description</th>
                                        <th class="text-center" width="8%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $selExam = $conn->query("SELECT * FROM exam_tbl ORDER BY ex_id DESC");
                                        if ($selExam->rowCount() > 0) {
                                            while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { 
                                    ?>
                                                <tr>
                                                    <td class="pl-4"><?php echo htmlspecialchars($selExamRow['ex_title']); ?></td>
                                                    <td>
                                                        <?php 
                                                            $sectionId = $selExamRow['sec_id']; 
                                                            $selSection = $conn->query("SELECT * FROM section_tbl WHERE sec_id='$sectionId'");
                                                            while ($selSectionRow = $selSection->fetch(PDO::FETCH_ASSOC)) {
                                                                echo htmlspecialchars($selSectionRow['sec_name']);
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo htmlspecialchars($selExamRow['ex_description']); ?></td>
                                                    <td class="text-center">
                                                        <a href="?page=ranking-exam&exam_id=<?php echo htmlspecialchars($selExamRow['ex_id']); ?>" class="btn btn-success btn-sm">View</a>
                                                    </td>
                                                </tr>
                                    <?php 
                                            }
                                        } else { 
                                    ?>
                                            <tr>
                                                <td colspan="5">
                                                    <h3 class="p-3">No Exam Found</h3>
                                                </td>
                                            </tr>
                                    <?php 
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>   
        <?php 
            } 
        ?>      
    </div>
</div>

<script>
function filterRows(category) {
    var rows = document.querySelectorAll('#tableList tbody tr');
    rows.forEach(function(row) {
        if (row.getAttribute('data-category') === category || category === 'All') {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
</script>
