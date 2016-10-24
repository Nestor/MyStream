<?php session_start(); require("../../core/init.php");
  if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1) {
    $fetchRank = $conn->prepare("SELECT * FROM `user` WHERE `email`=:email");
    $fetchRank->bindParam(":email", $_COOKIE['username']); // Yes that cookie ['username'] does contain the email
    $fetchRank->execute();
    while ($fr = $fetchRank->fetch(PDO::FETCH_ASSOC)) {
      if (password_verify($_SESSION['password'], $fr['password'])) {


$type = $_POST['type'];


/*

CATEGORY

*/


if ($type == "category") {

$destination = "../images/";
$upload_file = $destination . basename($_FILES["img"]["name"]);
$upload_check = 1;
$file_type = pathinfo($upload_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) {
        echo "Image validation passed -> " . $check["mime"] . ".";
        $upload_check = 1;
    } else {
        echo "Image validation failed -> Not a real image.";
        $upload_check = 0;
    }
}

if (file_exists($upload_file)) {
    echo "The file you have tried to upload already exists.";
    $upload_check = 0;
}

if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
&& $file_type != "gif" ) {
    echo "Sorry, the only filetypes allowed are, jpg, png, jpeg or gif.";
    $upload_check = 0;
}

if ($upload_check == 0) {
    echo " Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $upload_file)) {
        echo "". basename( $_FILES["img"]["name"]). " has been uploaded with no errors.";
    } else {
        echo "There was an error uploading your file.";
    }
}

// Without this, then if the upload fails then the script will continue, this prevents it from continuing if there is a faliure, so there is not database overlap.
if ($upload_check == 1) {
	$file_name = IMAGE_DIR . "/" . basename( $_FILES["img"]["name"]);
    $name =  $_POST['name'];

    $insert_values = $conn->prepare("INSERT INTO `category` (name, thumb) VALUES (:name, :thumb)");
    $insert_values->bindParam(":name", $name);
    $insert_values->bindParam(":thumb", $file_name);
    $insert_values->execute();
    echo("<br>Your new category has been created!");
}

}


/* 

SERIES

*/


if ($type == "series") {

$destination = "../images/";
$upload_file = $destination . basename($_FILES["img"]["name"]);
$upload_check = 1;
$file_type = pathinfo($upload_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) {
        echo "Image validation passed -> " . $check["mime"] . ".";
        $upload_check = 1;
    } else {
        echo "Image validation failed -> Not a real image.";
        $upload_check = 0;
    }
}

if (file_exists($upload_file)) {
    echo "The file you have tried to upload already exists.";
    $upload_check = 0;
}

if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
&& $file_type != "gif" ) {
    echo "Sorry, the only filetypes allowed are, jpg, png, jpeg or gif.";
    $upload_check = 0;
}

if ($upload_check == 0) {
    echo " Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $upload_file)) {
        echo "". basename( $_FILES["img"]["name"]). " has been uploaded with no errors.";
    } else {
        echo "There was an error uploading your file.";
    }
}

// Without this, then if the upload fails then the script will continue, this prevents it from continuing if there is a faliure, so there is not database overlap.
if ($upload_check == 1) {
    $file_name = IMAGE_DIR . "/" . basename( $_FILES["img"]["name"]);
    $name =  $_POST['name'];
    $desc = $_POST['desc'];
    $category = $_POST['category'];

    $insert_values = $conn->prepare("INSERT INTO `series` (name, description, category, thumb) VALUES (:name, :description, :category, :thumb)");
    $insert_values->bindParam(":name", $name);
    $insert_values->bindParam(":thumb", $file_name);
    $insert_values->bindParam(":description", $desc);
    $insert_values->bindParam(":category", $category);
    $insert_values->execute();
    echo("<br>Your new series has been created!");
}

}


/* 

SHOW

*/


if ($type == "show") {

$destination = "../images/";
$upload_file = $destination . basename($_FILES["img"]["name"]);
$upload_check = 1;
$file_type = pathinfo($upload_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) {
        echo "Image validation passed -> " . $check["mime"] . ".";
        $upload_check = 1;
    } else {
        echo "Image validation failed -> Not a real image.";
        $upload_check = 0;
    }
}

if (file_exists($upload_file)) {
    echo "The file you have tried to upload already exists.";
    $upload_check = 0;
}

if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
&& $file_type != "gif" ) {
    echo "Sorry, the only filetypes allowed are, jpg, png, jpeg or gif.";
    $upload_check = 0;
}

if ($upload_check == 0) {
    echo " Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $upload_file)) {
        echo "". basename( $_FILES["img"]["name"]). " has been uploaded with no errors.";
    } else {
        echo "There was an error uploading your file.";
    }
}

// Without this, then if the upload fails then the script will continue, this prevents it from continuing if there is a faliure, so there is not database overlap.
if ($upload_check == 1) {
    $file_name = IMAGE_DIR . "/" . basename( $_FILES["img"]["name"]);
    $name =  $_POST['name'];

    $insert_values = $conn->prepare("INSERT INTO `show` (title, description, series, thumb_url, file_link) VALUES (:name, :description, :series, :thumb, :link)");
    $insert_values->bindParam(":name", $name);
    $insert_values->bindParam(":thumb", $file_name);
    $insert_values->bindParam(":description", $desc);
    $insert_values->bindParam(":series", $series);
    $insert_values->bindParam(":link", $link);
    $insert_values->execute();
    echo("<br>Your new show has been created!");
}

}

/*

DELETE (dont delete - thats just the title)

*/

if ($type == "del_category") {

    $name =  $_POST['name'];

    $del = $conn->prepare("DELETE FROM `category` WHERE `name`=:name");
    $del->bindParam(":name", $name);
    $del->execute();
    echo("Deleted the category " . $name);

}

if ($type == "del_series") {

    $name =  $_POST['name'];

    $del = $conn->prepare("DELETE FROM `series` WHERE `name`=:name");
    $del->bindParam(":name", $name);
    $del->execute();
    echo("Deleted the series " . $name);

}

if ($type == "del_show") {

    $name =  $_POST['name'];

    $del = $conn->prepare("DELETE FROM `show` WHERE `title`=:name");
    $del->bindParam(":name", $name);
    $del->execute();
    echo("Deleted the show " . $name);


}





} } }


?>