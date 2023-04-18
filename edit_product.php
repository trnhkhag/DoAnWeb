<?php
if (isset($_POST["addProduct"])) {
    $p = $_GET["p"];
    $productName = $_POST["pname"];
    $productPrice = $_POST["pprice"];
    $productStock = $_POST["pstock"];
    $productStatus = $_POST["pstatus"];
    $productBrand = $_POST["pbrand"];
    $productDesc = $_POST["pdesc"];
    $productCategory = $_POST["pcategory"];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["pimage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Connect Database
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

    if ($_FILES["pimage"]["name"] == "") {
        $sql = sprintf("UPDATE sanpham SET TenSP = '%s', Gia = %f, LuongTon = %d, TrangThai = '%s', Hang = '%s', Mota = '%s', MaLoai = %d WHERE MaSP = $p", $productName, $productPrice, $productStock, $productStatus, $productBrand, $productDesc, $productCategory);    
    }
    else {
        $sql = sprintf("UPDATE sanpham SET TenSP = '%s', Hinh = '%s', Gia = %f, LuongTon = %d, TrangThai = '%s', Hang = '%s', Mota = '%s', MaLoai = %d WHERE MaSP = $p", $productName, $target_file, $productPrice, $productStock, $productStatus, $productBrand, $productDesc, $productCategory);
    }
    
    $sqlHinh = "SELECT Hinh FROM sanpham WHERE MaSP = $p";
    $result = $conn->query($sqlHinh);
    $row = mysqli_fetch_assoc($result);

    if ($conn->query($sql) === TRUE) {
        echo "The record has been edited successfully";
        header("Location: admin_product.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    if ($_FILES["pimage"]["name"] != "") {
        unlink(implode(" ", $row));

        // Upload product image
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["pimage"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["pimage"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["pimage"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["pimage"]["name"])) . " has been uploaded.";
                header("Location: admin_product.php");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
