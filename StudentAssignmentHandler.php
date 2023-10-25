<?php
    require_once("./object/student_assignment.php");
?>
<?php

    $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
    $assignment1_id = isset($_POST['assignment1_id']) ? $_POST['assignment1_id'] : '';
    $assignment2_id = isset($_POST['assignment2_id']) ? $_POST['assignment2_id'] : '';

    $studAss = array(
        "student_id" => $student_id,
        "assignment1_id" => $assignment1_id,
        "assignment2_id" => $assignment2_id,
    );
    $b = new StudentAssignment();
    $ret = $b->insertStudentAssignment($studAss);
    if($ret) {
        header('Location: entry.php');
    }
    echo $ret;
?>      