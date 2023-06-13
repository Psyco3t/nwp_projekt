<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FAQ - Tour Dive</title>
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
                    <!--<li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>-->
                    <?php
                    session_start();
                    if(isset($_SESSION['loggedIN']) and $_SESSION['loggedIN']==true and isset($_SESSION['isAgency']) and $_SESSION['isAgency']==true)
                    {
                        echo '<li class="nav-item"><a class="nav-link nav-link" href="agencyAdmin.php">Admin</a></li>';
                        echo '<li class="nav-item"><a class="nav-link nav-link" href="../php/logout.php">LogOut</a></li>';
                    }
                    elseif (isset($_SESSION['loggedIN']) and $_SESSION['loggedIN']==true)
                    {
                        echo '<li class="nav-item"><a class="nav-link" href="about-us.php">Tourlist</a></li>';
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
    <main class="page faq-page">
        <section class="clean-block clean-faq dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">FAQ</h2>
                    <p>Here we go through a few of your questions and try to answer them to the best of our ability</p>
                </div>
                <div class="block-content">
                    <div class="faq-item">
                        <h4 class="question"><b>Q: How do i leave a comment on a location or create a location?</b></h4>
                        <div class="answer">
                            <p>The only way you can leave a comment on a location is by being signed in if you are an agency rank user you cannot comment on your own location.</p>
                            <p>You have to be an agency rank user to add a location to the roster please contact our admin team about it <a href="contact-us.php">here</a>.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h4 class="question">Q: I forgot my password</h4>
                        <div class="answer">
                            <p>You can reset your password if you still have access to your email address <a href="login.php">here</a></p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h4 class="question">Q: I require help with managing my location.</h4>
                        <div class="answer">
                            <p>You can get in touch with our admin team at our <a href="contact-us.php">contact us page</a>.</p>
                        </div>
                    </div>
                </div>
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