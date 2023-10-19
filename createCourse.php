<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "middleexamm";

//Create connection
$connection = new mysqli($servername, $username, $password, $database);
$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $tittle = $_POST["tittle"];
    $credits = $_POST["credits"];


    do {
        if (empty($tittle) || empty($credits)) {
            $errorMessage = "All the fields are required";
            break;
        }

        $currentTime = date("\"Y-m-d\"");
        echo $currentTime;
        //add new course to database
        $sql = "INSERT INTO course (tittle, credits)" . "VALUES ('$tittle', '$credits')";

        $result = $connection->query($sql);

        if(!$result){
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }  

        $successMessage = "Course added correctly";
        
        header("location: /22ITEB050_TranManMan/indexCourse.php");

        exit;
    } while (false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Course</h2>

        <?php
        if(!empty($errorMessage)){
            echo "
                <div class ='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }
        ?>
        <form method="post" action="">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="">Tittle</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tittle" value="">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="">Credits</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="credits" value="">
                </div>
            </div>
                <br>

                <?php
                    if(!empty($successMessage)){
                    echo "
                        <div class = 'row mb-3'>
                            <div class = 'offet-sm-3 col-sm-6'>
                                <div class ='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                ?>

                <br>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>