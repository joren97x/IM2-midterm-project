<?php

    require_once("./object/assignment.php");

    if(isset($_GET['id'])) {
        $b = new Assignment();
        $id = $_GET['id'];
        $ass = $b->getAssignmentById($id);
    }

    if(isset($_POST['submit'])) {
        $b = new Assignment();
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        
        $stud = array(
            "id" => $id,
            "name" => $name,
        );
        $ret = $b->updateAssignment($stud);
        echo $ret;
        header('location: entry.php');
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
    <div class="card" style="width: 50%; margin-top: 5%; margin-left: 25%">
    <div class="card-body">
    <form action="updateAssignment.php?id=<?php echo $_GET['id'] ?>" method="POST">
        <h5 class="card-title">Edit Assignment</h5>
        <input type="text" hidden name="id" class="form-control" value="<?php echo $ass[0]['id']; ?>">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Assignment name</span>
            <input type="text" class="form-control" name="name" value="<?php echo $ass[0]['assignment_name']; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="text-end">
            <a href="entry.php" class="btn btn-secondary">Cancel</a>
            <button class="btn btn-success" value="submit" type="submit" name="submit">Update</button>
        </div>
    </form>
  </div>
    </div>
</body>
</html>