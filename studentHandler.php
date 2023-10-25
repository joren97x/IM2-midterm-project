<?php
    require_once("./object/student.php");
?>
<?php

    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    
    $stud = array(
        "fname" => $fname,
        "lname" => $lname,
        "gender" => $gender,
    );

    $b = new Student();
    $ret = $b->saveStudent($stud);
    if($ret) {
        header('Location: entry.php');
    }
    echo $ret;
?>      