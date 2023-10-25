<?php

    require_once("./object/student_assignment.php");
    require_once("./object/student.php");
    require_once("./object/assignment.php");

    if(isset($_GET['id'])) {
        $b = new StudentAssignment();
        $id = $_GET['id'];
        $ass = $b->getStudentAssignmentById($id);
    }

    if(isset($_POST['submit'])) {
        $b = new StudentAssignment();
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $assignment1_id = isset($_POST['assignment1_id']) ? $_POST['assignment1_id'] : '';
        $assignment2_id = isset($_POST['assignment2_id']) ? $_POST['assignment2_id'] : '';
        
        $stud = array(
            "id" => $id,
            "assignment1_id" => $assignment1_id,
            "assignment2_id" => $assignment2_id,
        );
        $ret = $b->updateStudentAssignment($stud);
        echo $ret;
        header('location: entry.php');
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
    <div class="card" style="width: 50%; margin-top: 5%; margin-left: 25%">
    <div class="card-body">
    <form action="updateStudentAssignment.php?id=<?php echo $_GET['id'] ?>" method="POST">
        <h5 class="card-title">Edit Student Assignment</h5>

        <input type="text" hidden name="id" class="form-control" value="<?php echo $ass[0]['id']; ?>">
        
            <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Student</span>
                    <input type="text" name="lname" disabled value="<?php echo $ass[0]['fname'] . ' ' . $ass[0]['lname']; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                 <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Assignment 1</span>
                    <!-- <input type="text" name="lname"value="<?php echo $stud[0]['lname']; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> -->
                    <Select name='assignment1_id' class="form-select">
                    <?php
                     $Assignments = new Assignment();
                     $assRec = $Assignments->getAllAssignments();
                        foreach($assRec as $a) {
                            

                            ?>
                            <option value="<?php echo $a['id']; ?>" <?php echo $ass[0]['assignment_1'] == $a['assignment_name'] ? 'selected' : '' ?>><?php echo $a['assignment_name']; ?></option>
                            <?php
                        }
                     ?>
                </Select>
                 </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Assignment 2</span>
                    <!-- <input type="text" name="lname"value="<?php echo $stud[0]['lname']; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> -->
                    <Select name='assignment2_id' class="form-select">
                    <?php
                     $Assignments = new Assignment();
                     $assRec = $Assignments->getAllAssignments();
                        foreach($assRec as $a) {
                            ?>
                        <option value="<?php echo $a['id']; ?>" <?php echo $ass[0]['assignment_2'] == $a['assignment_name'] ? 'selected' : '' ?>><?php echo $a['assignment_name']; ?></option>

                            <?php
                        }
                     ?>
                </Select>
                </div>
                 
        <div class="mt-3 text-end">
        <a href="entry.php" class="btn btn-secondary">Cancel</a>
        <button class="btn btn-success" value="submit" type="submit" name="submit">Update</button>
        </div>
    </form>
  </div>
    </div>
</body>
</html>