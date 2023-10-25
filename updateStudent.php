<?php

    require_once("./object/student.php");

    if(isset($_GET['id'])) {
        $b = new Student();
        $id = $_GET['id'];
        $stud = $b->getStudentById($id);
    }

    if(isset($_POST['submit'])) {
        $b = new Student();
        $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
        $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        
        $stud = array(
            "id" => $id,
            "fname" => $fname,
            "lname" => $lname,
            "gender" => $gender,
        );
        $ret = $b->updateStudent($stud);
        echo $ret;
        header('location: entry.php');
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
    <div class="card" style="width: 50%; margin-top: 5%; margin-left: 25%">
        <div class="card-body">
            <form action="updateStudent.php?id=<?php echo $_GET['id'] ?>" method="POST">
            
                <h5 class="card-title">Edit Student</h5>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">First name</span>
                    <input type="text" class="form-control" name="fname" value="<?php echo $stud[0]['fname']; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Last name</span>
                    <input type="text" name="lname"value="<?php echo $stud[0]['lname']; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Gender</span>
                    <select class="form-select" name="gender" aria-label="Default select example">
                        <option value="Male" <?php echo $stud[0]['gender'] == "Male" ? "selected" : ""; ?>>Male</option>
                        <option value="Female" <?php echo $stud[0]['gender'] == "Female" ? "selected" : ""; ?>>Female</option>
                    </select>
                </div>
                <input type="text" hidden name="id" class="form-control" value="<?php echo $stud[0]['studid']; ?>">
                <div class="text-end">
                    <a href="entry.php" class="btn btn-secondary">Cancel</a>
                    <button class="btn btn-success" value="submit" type="submit" name="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>