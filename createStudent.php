<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "middleexamm";

//Create connection
$connection = new mysqli($servername, $username, $password, $database);

$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $lastname = $_POST["lastname"];
    $firstmidname = $_POST["firstmidname"];
    //$enrollmentdate = $_POST["enrollmentdate"];

    do {
        if (empty($lastname) || empty($firstmidname)) {
            $errorMessage = "All the fields are required";
            break;
        }

        $currentTime = date("\"Y-m-d\"");
        echo $currentTime;
        //add new student to database
        $sql = "INSERT INTO student (lastname, firstmidname, enrollmentdate)" . "VALUES ('$lastname', '$firstmidname', $currentTime )";

        $result = $connection->query($sql);

        if(!$result){
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }  

        $successMessage = "Student added correctly";
        
        header("location: /22ITEB050_TranManMan/index.php");

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
        <h2>New Student</h2>

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
                <label class="col-sm-3 col-form-label" for="">Lastname</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="lastname" value="">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="">First mid name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="firstmidname" value="">
                </div>
            </div>
            <!-- <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="">Enrollmentdate</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="enrollmentdate" value="">
                </div>
            </div> -->

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