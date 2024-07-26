<?php
    include("../../../conn.php");

    $examId = isset($_GET['examId']) ? $_GET['examId'] : null;
    $exmneId = isset($_GET['exmneId']) ? $_GET['exmneId'] : null;

    if (!$examId || !$exmneId) {
        echo "<div class='alert alert-danger' role='alert'>Invalid request.</div>";
        exit;
    }

    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId'")->fetch(PDO::FETCH_ASSOC);

    // Fetch examinee details and exam results
    $selQuest = $conn->query("
        SELECT * 
        FROM exam_question_tbl eqt 
        INNER JOIN exam_answers ea 
        ON eqt.eqt_id = ea.quest_id 
        WHERE eqt.exam_id='$examId' 
        AND ea.axmne_id='$exmneId' 
        AND ea.exans_status='new'
    ");
?>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title text-primary"><?php echo htmlspecialchars($selExam['ex_title']); ?></h2>
                    <p class="card-text"><?php echo htmlspecialchars($selExam['ex_description']); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Your Answers</h5>
                    <table class="table table-bordered table-striped">
                        <?php 
                            $i = 1;
                            while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>
                                    <td>
                                        <strong><?php echo $i++; ?>.) <?php echo htmlspecialchars($selQuestRow['exam_question']); ?></strong>
                                        <div class="mt-2">
                                            Answer: 
                                            <?php 
                                                if ($selQuestRow['exam_answer'] != $selQuestRow['exans_answer']) { ?>
                                                    <span class="text-dark"><?php echo htmlspecialchars($selQuestRow['exans_answer']); ?></span>
                                                <?php } else { ?>
                                                    <span class="text-dark"><?php echo htmlspecialchars($selQuestRow['exans_answer']); ?></span>
                                                <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm mb-4 bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title">Score</h5>
                    <div class="display-4">
                        <?php 
                            // Calculate the score
                            $selScoreStmt = $conn->prepare("
                                SELECT * 
                                FROM exam_question_tbl eqt 
                                INNER JOIN exam_answers ea 
                                ON eqt.eqt_id = ea.quest_id 
                                AND eqt.exam_answer = ea.exans_answer 
                                WHERE ea.axmne_id = :exmneId 
                                AND ea.exam_id = :examId 
                                AND ea.exans_status = 'new'
                            ");
                            $selScoreStmt->bindParam(':exmneId', $exmneId);
                            $selScoreStmt->bindParam(':examId', $examId);
                            $selScoreStmt->execute();
                            $selScore = $selScoreStmt->rowCount();

                            $sql = "SELECT COUNT(exam_id) as total_questions FROM exam_question_tbl WHERE exam_id = :examId";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':examId', $examId);
                            $stmt->execute();
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            $over = $result["total_questions"];
                        ?>
                        <span class="display-4"><?php echo htmlspecialchars($selScore); ?></span> / <?php echo htmlspecialchars($over); ?>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-4 bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Percentage</h5>
                    <div class="display-4">
                        <?php 
                            $score = $selScore;
                            $ans = $score / $over * 100;
                            echo number_format($ans, 2) . '%';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS for additional styling -->
<style>
    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
    }
    .card-text {
        font-size: 1.1rem;
    }
    .display-4 {
        font-size: 2.5rem;
        font-weight: 700;
    }
    .table td {
        vertical-align: middle;
    }
    .text-danger {
        color: #28a745  !important;
    }
    .text-success {
        color: #28a745 !important;
    }
    .bg-dark {
        background-color: #28a745  !important;
    }
    .bg-success {
        background-color: #28a745 !important;
    }
    .shadow-sm {
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075) !important;
    }
</style>
