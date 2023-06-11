<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us - Tour Dive</title>
    <meta name="description" content="Welcome to Tour Dive [INSERT FLUFF HERE]">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/tourDive.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top clean-navbar" style="background: #ef7b45;">
        <div class="container"><a class="navbar-brand logo" href="#">Tour Dive</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Tours.php">Tours</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                    <?php
                    session_start();
                    if(isset($_SESSION['loggedIN']) and $_SESSION['loggedIN']==true and isset($_SESSION['isAgency']) and $_SESSION['isAgency']==true)
                    {
                        echo '<li class="nav-item"><a class="nav-link nav-link" href="agencyAdmin.php">Admin</a></li>';
                        echo '<li class="nav-item"><a class="nav-link nav-link" href="../php/logout.php">LogOut</a></li>';
                    }
                    elseif (isset($_SESSION['loggedIN']) and $_SESSION['loggedIN']==true)
                    {
                        echo '<li class="nav-item"><a class="nav-link" href="about-us.php">Tour Cart</a></li>';
                        echo '<li class="nav-item"><a class="nav-link nav-link" href="favorites.php">Favorites</a></li>';
                        echo '<li class="nav-item"><a class="nav-link nav-link" href="../php/logout.php">LogOut</a></li>';
                    }
                    else
                    {
                        echo '<li class="nav-item"><a class="nav-link nav-link" href="login.php">Login</a></li>';
                    }
                    ?>
                    <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                    <?php
                    if(isset($_SESSION['admin']) and $_SESSION['admin']==true)
                    {
                        echo '<li class="nav-item"><a class="nav-link nav-link" href="admin.php">Admin</a></li>';
                    }
                    ?>
                </ul>
                <ul class="navbar-nav"></ul>
            </div>
        </div>
    </nav>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <?php
            if(isset($_GET['success']) and $_GET['success']==1) {
                echo '<div class="alert alert-info text-primary alert-dismissible" role="alert" style="background: var(--bs-alert-border-color);padding: 20px 48px 16px 16px;"><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span><strong>Thank you for contacting us!</strong><br /></span></div>';
            }
            ?>
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Contact Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
                <form method="post" action="../php/contactUs.php">
                    <div class="mb-3"><label class="form-label" for="name">Name</label><input class="form-control" type="text" id="name" name="name"></div>
                    <div class="mb-3"><label class="form-label" for="subject">Subject</label><input class="form-control" type="text" id="subject" name="subject"></div>
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control" type="email" id="email" name="email"></div>
                    <div class="mb-3"><label class="form-label" for="message">Message</label><textarea class="form-control" id="message" name="message"></textarea></div>
                    <div class="mb-3"><button class="btn btn-primary" type="submit">Send</button></div>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2023 Fulcrum</p>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>