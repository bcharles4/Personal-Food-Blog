<?php
// Start the session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="icon" href="./images/ADlogo.png" type="image/png">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="./css/css_index.css">
    <link rel="stylesheet" href="./css/about.css">
    <script src="./javascript/script.js" defer></script>

</head>

<body>
    <div class="logo">
        <br>
        <?php
        echo '<center><ul><span style="color: black; background-color: white; padding: 10px; 
        border-radius: 5px; font-size: 18px;">Welcome, ' . $_SESSION["user_name"] . '!</span></ul></center>';
        ?>
        <center><img src="./images/BT2.png" alt="WanderLog"> </center>
    </div>

    </div>
    <div class="navbar">
        <span class="menu-btn material-symbols-outlined">menu</span>
        <nav>
            <ul class="links">

                <span class="close-btn material-symbols-outlined">close</span>
                <li> <a href="index2.php">Home</a></li>
                <li> <a href="ToursAndTravel.php">Tours and Travels</a></li>
                <li> <a href="post.php">Journal</a></li>
                <li> <a href="about.php">About</a></li>
                <?php
                echo '<li><a href="logout.php">Logout</a></li>';
                ?>



            </ul>
        </nav>



    </div>

    <!-- Popup Form -->

    <div class="blur-bg-overlay"></div>
    <div class="form-popup" id="popup">
        <span class="close-btn material-symbols-outlined">close</span>
        <div class="form-box login">
            <div class="form-details">
                <h2>Welcome Back</h2>
                <p>Please log in using your personal information to stay with us.</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form action="login.php" method="post">
                    <div class="input-field">
                        <input type="text" name="emailaddress" required>
                        <label>Email</label>
                    </div>

                    <div class="input-field">
                        <input type="password" name="pw" required>
                        <label>Password</label>
                    </div>

                    <a href="#" class="forgot-pass">Forgot password?</a>

                    <button type="submit">Log In</button>
                </form>
                <div class="bottom-link">
                    Don't have an account?
                    <a href="#" id="signup-link">Signup</a>
                </div>
            </div>
        </div>

        <div class="form-box signup">
            <div class="form-details">
                <h2>Create an account</h2>
                <p>To become a part of our community, please sign up using your personal information.</p>
            </div>
            <div class="form-content">
                <h2>SIGN UP</h2>
                <form action="reg.php" method="post">
                    <div class="input-field">
                        <input type="text" name="name" required>
                        <label>Name</label>
                    </div>

                    <div class="input-field">
                        <input type="email" name="emailaddress" required>
                        <label>Email</label>
                    </div>

                    <div class="input-field">
                        <input type="password" name="pw" required>
                        <label>Create password</label>
                    </div>

                    <div class="input-field">
                        <input type="password" name="cpw" required>
                        <label>Confirm password</label>
                    </div>

                    <div class="policy-text">
                        <input type="checkbox" id="policy" required>
                        <label for="policy">
                            I agree to the
                            <a href="#">Terms and Conditions</a>
                        </label>
                    </div>

                    <a href="#" class="forgot-pass">Forgot password?</a>

                    <button type="submit">Sign up</button>


                    <!-- Optional: Display errors or notifications -->
                    <div id="error-message"></div>

                    <script>
                        // Optional: You can handle additional validation here using JavaScript

                        // Example: Display error message using JavaScript
                        function submitForm() {
                            var policyCheckbox = document.getElementById("policy");

                            if (!policyCheckbox.checked) {
                                document.getElementById("error-message").innerText = "Please agree to the Terms and Conditions.";
                                return false; // Prevent form submission
                            }

                            // Additional validation logic can be added as needed

                            // If all validation passes, the form will be submitted
                            return true;
                        }
                    </script>
                </form>
                <div class="bottom-link">
                    Already have an account?
                    <a href="" id="login-link">Login</a>
                </div>
            </div>
        </div>

    </div>

    <header>
        <h1>About Adventurista</h1>
    </header>

    <section class="about-us">
        <div class="abu-container">
            <h2>Welcome to Adventurista</h2>
            <p>Your go-to platform for exploring the beauty of travel destinations. Our mission is to provide a seamless
                and memorable travel experience for adventurers in Batangas Province.</p>
            <p>At Adventurista, we believe in the power of exploration and the joy of discovery. Whether you are a
                seasoned traveler or embarking on your first journey, we are here to make your travel dreams a reality.
            </p>
            <p>Join our community of travel enthusiasts, share your experiences in our journals, and embark on exciting
                tours and travels with Adventurista. Immerse yourself in the diverse cultures, stunning landscapes, and
                hidden gems that our planet has to offer.</p>
            <p>Our dedicated team is passionate about curating unique and enriching travel experiences. We strive to
                connect like-minded individuals who share a love for adventure in Batangas Province and a curiosity to
                explore the unknown.</p>
            <p>Discover the world with Adventurista, where every journey is an adventure!</p>
        </div>
    </section>

    <!-- Footer -->

    <footer class="footer">
        <div class="footer__addr">
            <h1 class="footer__logo"> <img src="./images/BT2.png"></h1>

            <h2>Contact</h2>

            <address>
                Rosary Heights II, Cotabato City, Philippines<br>

                <a class="footer__btn" href="mailto:2120585@ub.edu.ph">Email Us</a>
            </address>
        </div>

        <ul class="footer__nav">
            <li class="nav__item">
                <h2 class="nav__title">Rewards</h2>

                <ul class="nav__ul">
                    <li>
                        <a href="#">Join Now</a>
                    </li>

                    <li>
                        <a href="#">Learn More</a>
                    </li>

                    <li>
                        <a href="#">Manage Account</a>
                    </li>
                </ul>
            </li>

            <li class="nav__item">
                <h2 class="nav__title">News & Info</h2>

                <ul class="nav__ul">
                    <li>
                        <a href="#">Press Releases</a>
                    </li>

                    <li>
                        <a href="#">About Our Products</a>
                    </li>

                    <li>
                        <a href="#">Product Support</a>
                    </li>

                    <li>
                        <a href="#">Product Manuals</a>
                    </li>

                    <li>
                        <a href="#">Product Registration</a>
                    </li>

                    <li>
                        <a href="#">Newsletter Sign Up</a>
                    </li>
                </ul>
            </li>

            <li class="nav__item">
                <h2 class="nav__title">Support</h2>

                <ul class="nav__ul">
                    <li>
                        <a href="#">FAQ</a>
                    </li>

                    <li>
                        <a href="#">Help Desk</a>
                    </li>

                    <li>
                        <a href="#">Forums</a>
                    </li>
                </ul>
            </li>
        </ul>


    </footer>









    <div></div>
    <div></div>
</body>

</html>