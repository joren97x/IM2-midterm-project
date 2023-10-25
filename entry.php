<?php

use function PHPSTORM_META\type;

    require('./object/student.php');
    require('./object/assignment.php');
    require('./object/student_assignment.php');
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>joren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        td{
            padding: 5px;
        }
    </style>
</head>
<body>
    
<div class="container mt-2">

    
    
</div>

    <br>
    
  <div class="row">
    <div class="col-6">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr class="text-center">
                    <th colspan="3"><h5>Student Assignments</h5></th>
                    <th colspan="1">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add student assignment
                        </button>
                    </th>
                </tr>
                <tr class="text-center">
                    <th>Student</th>
                    <th>Assignment 1</th>
                    <th>Assignment 2</th>
                    <th>Actions</th>
                </tr>
                <tbody class="text-center">
                    <?php
                    $stud = new StudentAssignment();
                    $studAssRec = $stud->getAllStudentAssignments();
                    $cnt = count($studAssRec);
                    foreach($studAssRec as $studAss){
                        $buff = '';
                        $buff .= "<tr>";
                        $buff .= "<td>". $studAss['fname']. ' '. $studAss['lname']."</td>";
                        $buff .= "<td>". $studAss['assignment_1']."</td>";
                        $buff .= "<td>". $studAss['assignment_2']."</td>";
                        $action = "<a href='updateStudentAssignment.php?id=".$studAss['id']."'><button type='' class='btn me-2 btn-primary btn-sm'><i class='bi bi-pencil-square'></i></button></a>";
                        $action2 = "<a href='deleteStudentAssignment.php?id=".$studAss['id']."'><button type='' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i></button></a>";
                        $buff .= "<td>". $action .$action2 . "</td>";
                        $buff .= "</tr>";

                        echo $buff;
                    } 
                    ?>
                </tbody>
            </thead>
        </table>
    </div>
    <div class="col-6">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr class="text-center">
                    <th colspan="4"><h5>All Students</h5></th>
                    <th colspan="2">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                            Add student
                        </button>
                    </th>
                </tr>
                <tr class="text-center">
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last name</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
                <tbody class="text-center">
                    <?php
                    $stud = new Student();
                    $studrec = $stud->getAllStudent();
                    $cnt = count($studrec);
                    
                    foreach($studrec as $stud){
                        $buff = '';
                        $buff .= "<tr>";
                        $buff .= "<td>".$stud['studid'] ."</td>";
                        $buff .= "<td>".$stud['fname'] ."</td>";
                        $buff .= "<td>".$stud['lname'] ."</td>";
                        $buff .= "<td>".$stud['gender'] ."</td>";
                        $action = "<a href='updateStudent.php?id=".$stud['studid']."'><button type='' class='btn btn-primary me-2 btn-sm'><i class='bi bi-pencil-square'></i></button></a>";
                        $action2 = "<a href='deleteStudent.php?id=".$stud['studid']."'><button type='' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i></button></a>";
                        $buff .= "<td>". $action . $action2 . "</td>";
                        $buff .= "</tr>";

                        echo $buff;
                    } 
                    ?>
                </tbody>
            </thead>
        </table>
    </div>
    <div class="col-6 p-2">
        <table class="table table-striped table-hover table-bordered">
            <thead class="text-center">
                <tr>
                    <th colspan="2"><h5>All Assignments</h5></th>
                    <th colspan="2">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addSubjectModal">
                            Add assignment
                        </button>
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Assignments</th>
                    <th>Actions</th>
                </tr>
                <tbody class="text-center">
                    <?php
                    $stud = new Assignment();
                    $studrec = $stud->getAllAssignments();
                    $cnt = count($studrec);
                    
                    foreach($studrec as $stud){
                        $buff = '';
                        $buff .= "<tr>";
                        $buff .= "<td>".$stud['id'] ."</td>";
                        $buff .= "<td>".$stud['assignment_name'] ."</td>";
                        $action = "<a href='updateAssignment.php?id=".$stud['id']."'><button type='' class='btn me-2 btn-primary btn-sm'><i class='bi bi-pencil-square'></i></button></a>";
                        $action2 = "<a href='deleteAssignment.php?id=".$stud['id']."'><button type='' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i></button></a>";
                        $buff .= "<td>". $action .$action2. "</td>";
                        $buff .= "</tr>";

                        echo $buff;
                    } 
                    ?>
                </tbody>
            </thead>
        </table>
    </div>
    
  </div>  
  
   
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add student assignment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="./StudentAssignmentHandler.php" method="POST" class="p-2">
        
      <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Student</span>
            <Select name='student_id' class="form-select">
                    <?php
                     $ass = new Student();
                     $assRec = $ass->getAllStudent();
                        foreach($assRec as $a) {
                            ?>
                            <option value="<?php echo $a['studid']; ?>"><?php echo $a['fname'] . ' ' . $a['lname']; ?></option>
                            <?php
                        }
                     ?>
                </Select>
      </div>
                <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Assignment 1</span>
                <Select name='assignment1_id' class="form-select">
                <?php
                     $ass = new Assignment();
                     $assRec = $ass->getAllAssignments();
                        foreach($assRec as $a) {
                            ?>
                        <option value="<?php echo $a['id']; ?>"><?php echo $a['assignment_name']; ?></option>

                            <?php
                        }
                     ?>
                </Select>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Assignment 2</span>
             <Select name='assignment2_id' class="form-select">
                    <?php
                     $ass = new Assignment();
                     $assRec = $ass->getAllAssignments();
                        foreach($assRec as $a) {
                            ?>
                        <option value="<?php echo $a['id']; ?>"><?php echo $a['assignment_name']; ?></option>

                            <?php
                        }
                     ?>
                </Select>
        </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" value="Submit" class="btn btn-success">Add student assignment</button>
      </div>
    </form>
     
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New assignment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="./assignmentHandler.php" method="POST" class="p-2">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Assignment name</span>
            <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" value="Submit" class="btn btn-success">Add assignment</button>
      </div>
    </form>
     
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="./studentHandler.php" method="POST" class="p-2">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">First name</span>
            <input type="text" name="fname" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Last name</span>
            <input type="text" name="lname" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Gender</span>
            
            <Select name='gender' class="form-select">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </Select>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" value="Submit" class="btn btn-success">Add student</button>
      </div>
    </form>
     
    </div>
  </div>
</div>

</body>

</html>