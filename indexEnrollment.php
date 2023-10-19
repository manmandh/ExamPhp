<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <form action="" method="post">
            <input type="text" class="p-2 border-success ml-5" name="find" placeholder="enter courseid">
            <button class="btn btn-primary">Find</button>
        </form>
        <h2>Enrollment table</h2>
        <a class="btn btn-primary" href="/22ITEB050_TranManMan/createStudent.php" role="button">New enrollment</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>enrollmentid</th>
                    <th>courseid</th>
                    <th>studentid</th>
                    <th>grade</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "middleexamm";

                //Create connection
                $connection = new mysqli($servername, $username, $password, $database);
                //Check connection
                if ($connection->connect_error) {
                    die("Connect failed: " . $connection->connect_error);
                }

                $find = isset($_POST['find']) ? $_POST['find'] : '';

                //read all row from database table
                $sql = "SELECT * FROM enrollment where courseid like '%$find%'";
                $result = $connection->query($sql);


                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                //read data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[enrollmentid]</td>
                    <td>$row[courseid]</td>
                    <td>$row[studentid]</td>
                    <td>$row[grade]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/22ITEB050_TranManMan/editEnrollment.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/22ITEB050_TranManMan/deleteEnrollment.php?id=$row[id]'>Delete</a>
                    </td>
                  </tr>
                    ";
                }
                ?>


            </tbody>
        </table>
    </div>

</body>

</html>