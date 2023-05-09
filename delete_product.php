<?php
if (isset($_POST["deleteProduct"])) {
    $id = $_GET["id"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webprojectdb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT Hinh FROM sanpham WHERE MaSP = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    unlink(implode(" ",$row));

    // sql to delete a record
    $sql = "DELETE FROM sanpham WHERE MaSP = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: admin_product.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
