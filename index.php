<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Tour Dive</title>
    <meta name="description" content="Welcome to Tour Dive the place where you can look for places to check out">
    <link rel="stylesheet" href="html/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="html/assets/css/Montserrat.css">
    <link rel="stylesheet" href="html/assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="html/assets/css/tourDive.css">
    <link rel="stylesheet" href="html/assets/css/vanilla-zoom.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top clean-navbar" style="background: #ef7b45;">
        <div class="container"><a class="navbar-brand logo" href="index.php">Tour Dive</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="html/Tours.php">Tours</a></li>
                    <!--<li class="nav-item"><a class="nav-link" href="html/gallery.php">Gallery</a></li>-->
                    <?php
                    session_start();
                    if(isset($_SESSION['loggedIN']) and $_SESSION['loggedIN']==true and isset($_SESSION['isAgency']) and $_SESSION['isAgency']==true)
                    {
                        echo '<li class="nav-item"><a class="nav-link nav-link" href="html/agencyAdmin.php">Admin</a></li>';
                        echo '<li class="nav-item"><a class="nav-link nav-link" href="php/logout.php">LogOut</a></li>';
                    }
                    elseif (isset($_SESSION['loggedIN']) and $_SESSION['loggedIN']==true)
                    {
                        echo '<li class="nav-item"><a class="nav-link" href="html/about-us.php">Tour Cart</a></li>';
                        echo '<li class="nav-item"><a class="nav-link nav-link" href="html/favorites.php">Favorites</a></li>';
                        echo '<li class="nav-item"><a class="nav-link nav-link" href="php/logout.php">LogOut</a></li>';
                    }
                    else
                    {
                        echo '<li class="nav-item"><a class="nav-link nav-link" href="html/login.php">Login</a></li>';
                    }
                    ?>
                    <li class="nav-item"><a class="nav-link" href="html/faq.php">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="html/contact-us.php">Contact Us</a></li>
                    <?php
                    if(isset($_SESSION['admin']) and $_SESSION['admin']==true)
                    {
                        echo '<li class="nav-item"><a class="nav-link nav-link" href="html/admin.php">Admin</a></li>';
                    }
                    ?>
                </ul>
                <ul class="navbar-nav"></ul>
            </div>
        </div>
    </nav>
    <main class="page landing-page">
        <section class="clean-block clean-hero" style="background-image: url(&quot;assets/img/tech/image4.jpg&quot;);color: rgba(94,177,191,0.79);">
            <div class="text">
                <h2>Welcome to Tour Dive</h2>
                <p>Here you can browse locations offered by our partners to check out or tour them click on the button below to learn more.</p><form action="html/faq.php"><button class="btn btn-outline-light btn-lg" type="submit">Learn More</button></form>
            </div>
        </section>
        <section class="clean-block clean-info dark" style="background: #cdedf6;">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Info</h2>
                    <p>Here you can explore locations within cities or places out in the wilderness</p>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6"><img class="img-thumbnail" src="html/assets/img/scenery/image5.jpg"></div>
                    <div class="col-md-6">
                        <h3>Discover</h3>
                        <div class="getting-started-info">
                            <p>Beautiful sights and historical monuments.</p>
                        </div><form action="html/registration.php"><button class="btn btn-outline-primary btn-lg btn-tourDive-primary" type="button">Join Now</button></form>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block features" style="background: #cdedf6;">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Features</h2>
                    <p>Our site comes with great features that can help foster a community of similar minded people who like going out</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-5 feature-box"><i class="icon-star icon"></i>
                        <h4>Favorite</h4>
                        <p>You can favorite locations you want to visit in the future.</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-pencil icon"></i>
                        <h4>Create</h4>
                        <p>You can create locations or add them to existing ones as long as you are an agency rank user.</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-screen-smartphone icon"></i>
                        <h4>App</h4>
                        <p>Download our app on the google play store to browse locations while not near your PC.</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-refresh icon"></i>
                        <h4>All Browser Compatibility</h4>
                        <p>Our site is available on all browsers and devices.</p>
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
    <script src="html/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="html/assets/js/vanilla-zoom.js"></script>
    <script src="html/assets/js/theme.js"></script>
</body>

</html>