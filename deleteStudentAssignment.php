<?php

    require_once("./object/student_assignment.php");

    if(isset($_POST['submit'])) {
        $b = new StudentAssignment();
        $id = $_GET['id'];
        $ret = $b->deleteStudentAssignment($id);
        header('location: entry.php');
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
    <div class="card" style="width: 50%; margin-top: 5%; margin-left: 25%">
    <div class="card-body">
    <form action="deleteStudentAssignment.php?id=<?php echo $_GET['id'] ?>" method="POST">
        <h5 class="card-title">Delete Student Assignment?</h5>
        <?php 
        
        $studAss = new StudentAssignment();
        $sa = $studAss->getStudentAssignmentById($_GET['id']);
    ?>
        <p class="card-text">Are you sure you want to delete <strong><?php echo $sa[0]['fname'] . ' ' . $sa[0]['lname']; ?></strong> with assignments <strong> <?php echo $sa[0]['assignment_1']; ?> </strong> and <strong> <?php echo $sa[0]['assignment_2']; ?></strong>? </p>
        <div class="text-end">
        <a href="entry.php" class="btn btn-secondary">Cancel</a>
        <button class="btn btn-danger" value="submit" type="submit" name="submit">Fordagoo</button>
        </div>
    </form>
  </div>
    </div>
</body>
</html>