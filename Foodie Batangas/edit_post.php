<?php
require_once ("config.php");
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: index.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["post_id"])) {
    $post_id = $_GET["post_id"];
    $query = "SELECT * FROM foodie_posts WHERE id = ? AND user_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ii", $post_id, $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $post = mysqli_fetch_assoc($result);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["post_id"])) {
    $post_id = $_POST["post_id"];
    $content = $_POST["content"];

    $query = "UPDATE foodie_posts SET content = ? WHERE id = ? AND user_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sii", $content, $post_id, $_SESSION["user_id"]);
    mysqli_stmt_execute($stmt);

    header("Location: post.php");
    exit();
} else {
    header("Location: post.php");
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/css_journal.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <script src="./javascript/script.js" defer></script>
    <script src="./css/journal.js" defer></script>
    <link rel="icon" href="./images/ADlogo.png" type="image/png">
    <title>Journal</title>
    <style>
        .edit-form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .edit-form {
            width: 50%;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .edit-form textarea {
            width: 100%;
            height: 200px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
            font-size: 16px;
        }

        .edit-form button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .edit-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- Profile -->
    <div class="header">
        <div class="logo">
            <center><img src="./images/BT2.png" alt="adventurista"></center>
        </div>

        <!-- Sidebar -->
        <div id="toggle-btn">&#9776;</div>
        <div id="sidebar">
            <div class="profile-pic-div">
                <?php
                // Display the profile picture
                if (isset($_SESSION['profile_pic']) && !empty($_SESSION['profile_pic'])) {
                    echo '<img src="' . htmlspecialchars($_SESSION['profile_pic']) . '" alt="Profile Picture">';
                } else {
                    echo '<img src="uploads/Profile.jpg" alt="Default Profile Picture">';
                }
                ?>
                <input type="file" id="file">
                <label for="file" id="uploadBtn">Profile Picture</label>
            </div><br><br><br><br><br><br><br><br><br>
            <form action="change_profile_pic.php" method="post" enctype="multipart/form-data">
                <input type="file" class="form-control" name="profile_pic">
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
            <?php
            echo '<center><ul><span class="welcome-message">' . htmlspecialchars($_SESSION["user_name"]) . '</span></ul></center>';
            ?>
            <a href="post.php">My Post</a>
            <a href="Journal.php">My Gallery</a>
            <span id="close-btn" onclick="closeSidebar()">&#10006; Close</span>
        </div>
        <!-- Navbar -->
        <center>
            <div class="navbar">
                <span class="menu-btn material-symbols-outlined">menu</span>
                <nav>
                    <ul class="links">
                        <span class="close-btn material-symbols-outlined">close</span>
                        <li><a href="index2.php">Home</a></li>
                        <li><a href="ToursAndTravel.php">Tours and Travels</a></li>
                        <li><a href="post.php">Journal</a></li>
                        <li><a href="about.php">About</a></li>
                        <?php
                        echo '<li><a href="logout.php">Logout</a></li>';
                        ?>
                    </ul>
                </nav>
            </div>
        </center>
    </div>

    <div class="edit-form-container">
        <form class="edit-form" method="POST" action="edit_post.php">
            <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($post['id']); ?>">
            <textarea name="content"><?php echo htmlspecialchars($post['content']); ?></textarea>
            <button type="submit">Save</button>
        </form>
    </div>
</body>

</html>