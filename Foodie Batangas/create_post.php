<?php
require_once ("config.php");
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: index.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $content = $_POST["content"];

    // Insert the new post into the database
    $query = "INSERT INTO foodie_posts (user_id, content) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "is", $user_id, $content);
    mysqli_stmt_execute($stmt);

    header("Location: post.php");
    exit();
}

mysqli_close($conn);
?>