<?php
if(isset($_GET['token'])) {
    require_once '../php/config.php';
    require_once '../php/db_config.php';
    session_start();
    //$token = $_SESSION['token'];
    $token=$_GET['token'];
    //$userID = $_SESSION['lastInsert'];
    try {
        $pdo = new PDO($dsn, 'root', '');
        $sql="SELECT * FROM users WHERE activationToken='$token'";
        $inject=$pdo->prepare($sql);

        $inject->execute();

        $result=$inject->fetchAll();
        if(isset($result))
        {
            $sql="UPDATE users
            SET active='1'
            WHERE activationToken='$token'";
            $stmnt=$pdo->prepare($sql);
            $stmnt->execute();
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Tour Dive</title>
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
                    <li class="nav-item"><a class="nav-link" href="Tours.php">Tourlist</a></li>
                    <!--<li class="nav-item"><a class="nav-link" href="../html/gallery.php">Gallery</a></li>-->
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
    <main class="page login-page">
        <section class="clean-block clean-form dark" style="background: #5eb1bfca;">
            <?php
            if(isset($_GET['success']) and $_GET['success']==2) {
                echo '<div class="alert alert-info text-primary alert-dismissible" role="alert" style="background: var(--bs-alert-border-color);padding: 20px 48px 16px 16px;"><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span><strong>Your Password has been reset.</strong><br /></span></div>';
            }
            ?>
            <?php
            if(isset($_GET['success']) and $_GET['success']==1) {
                echo '<div class="alert alert-info text-primary alert-dismissible" role="alert" style="background: var(--bs-alert-border-color);padding: 20px 48px 16px 16px;"><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span><strong>Check your inbox for the reset token.</strong><br /></span></div>';

            }
            ?>
            <?php
            if(isset($_GET['error']) and $_GET['error']==1) {
            echo '<div class="alert alert-warning text-primary alert-dismissible" role="alert" style="background: var(--bs-alert-border-color);padding: 20px 48px 16px 16px;"><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span><strong>Wrong password or email entered.</strong><br /></span></div>';

            }
            ?>
            <?php
            if(isset($_GET['error']) and $_GET['error']==2) {
                echo '<div class="alert alert-warning text-primary alert-dismissible" role="alert" style="background: var(--bs-alert-border-color);padding: 20px 48px 16px 16px;"><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span><strong>Your account has been deactivated for more info contact us through email.</strong><br /></span></div>';

            }
            ?>
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-primary">Log In</h2>
                    <p>Here you can login with your credentials.</p>
                </div>
                <form style="background: rgba(255,255,255,0.76);" action="../php/UAC/login.php" method="post">
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input required class="form-control item" type="email" id="email" name="email"></div>
                    <div class="mb-3"><label class="form-label" for="password">Password</label><input required class="form-control" type="password" id="password" name="password"></div>
                    <div class="mb-3" style="margin-top: -8px;margin-bottom: 0px;">
                        <div class="form-check" style="padding-right: 0px;margin-right: 259px;"><input class="form-check-input" type="checkbox" id="checkbox"><label class="form-check-label" for="checkbox">Remember me</label></div>
                    </div>
                    <div style="margin-bottom: 11px;padding-top: 0px;margin-top: -1px;overflow: visible;margin-left: 0px;display: inline-block;"><a href="password_reset.php" style="display: inline-block;">I forgot my password</a><a href="registration.php" style="padding-left: 0px;margin-left: 171px;display: inline-block;">Sign up</a></div><button class="btn btn-primary btn-tourDive-loginbtn" type="submit">Login</button>
                    <a href="agencyLogin.php" class="btn btn-tourDive-loginbtn">AgencyLogin</a>
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