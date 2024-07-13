<?php
require_once ("config.php");
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: index.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["post_id"])) {
    $post_id = $_POST["post_id"];
    $query = "DELETE FROM foodie_posts WHERE id = ? AND user_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ii", $post_id, $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);

    header("Location: post.php");
    exit();
}

mysqli_close($conn);
?>