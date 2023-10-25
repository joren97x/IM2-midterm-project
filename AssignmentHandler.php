<?php
    require_once("./object/assignment.php");
?>
<?php

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $b = new Assignment();
    $ret = $b->insertAssignment($name);
    if($ret) {
        header('Location: entry.php');
    }
    echo $ret;
?>      