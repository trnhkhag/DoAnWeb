<?php
if (isset($_POST["addProduct"])) {
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

  $sql = sprintf("INSERT INTO sanpham (TenSP, Gia, Hinh, LuongTon, TrangThai, Hang, MoTa, MaLoai) VALUES ('%s', %f, '%s', %d, '%s', '%s', '%s', %d)", $productName, $productPrice, $target_file, $productStock, $productStatus, $productBrand, $productDesc, $productCategory);

  if (!file_exists($target_file)) {
    $check = getimagesize($_FILES["pimage"]["tmp_name"]);
    if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }

    if ($_FILES["pimage"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } else {
      if (move_uploaded_file($_FILES["pimage"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["pimage"]["name"])) . " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: admin_product.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
