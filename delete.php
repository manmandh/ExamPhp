<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "middleexamm";

    //Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM student WHERE id = $id";

    $connection->query($sql);
}

header("location: /22ITEB050_TranManMan/index.php");
exit;
?>