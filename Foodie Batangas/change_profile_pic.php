<?php
require_once ("config.php");

// Start the session
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
    if ($check === false) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo json_encode(["success" => false, "message" => "Sorry, your file was not uploaded."]);
    } else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
            $user_id = $_SESSION["user_id"];
            $query = "UPDATE foodie_users SET profile_pic = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "si", $target_file, $user_id);
            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['profile_pic'] = $target_file;
                // Redirect to post.php after successful upload
                header("Location: post.php");
                exit();
            } else {
                echo json_encode(["success" => false, "message" => "Sorry, there was an error updating your profile picture in the database."]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Sorry, there was an error uploading your file."]);
        }
    }
}
?>