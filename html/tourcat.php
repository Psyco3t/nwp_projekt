<?php
require_once '../php/functions.php';
session_start();
$getRow=null;
if(isset($_GET['row'])==true)
{
    $getRow=$_GET['row'];
}
$uid=$_SESSION['uid'];
if(isset($uid)==false)
{
    header("Location:../html/tourPage.php?row=$getRow&failure=4");
    exit();
}
$attractions=GetAttractions();
$selectedTours=fetchFromFavorites($uid);
$getRow=null;
if(isset($_GET['row'])==true)
{
    $getRow=$_GET['row'];
}
$_SESSION['row']=$getRow;
$getList=PDOexec("SELECT DISTINCT `listname` FROM tourlist WHERE user_id='$uid'")->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Favorites - Tour Dive</title>
    <meta name="description" content="Welcome to Tour Dive [INSERT FLUFF HERE]">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/tourDive.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body style="height: auto">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top clean-navbar" style="background: #ef7b45;">
        <div class="container"><a class="navbar-brand logo" href="#">Tour Dive</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Tours.php">Tours</a></li>
                    <?php
                    //session_start();
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
    <main class="page pricing-table-page">
        <section class="clean-block clean-pricing dark" style="background: #cdedf6;">
            <?php
            if(isset($_GET['error']) and $_GET['error']==1) {
                echo '<div class="alert alert-info text-primary alert-dismissible" role="alert" style="background: var(--bs-alert-border-color);padding: 20px 48px 16px 16px;"><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span><strong>Name is already taken.</strong><br /></span></div>';
            }
            ?>
            <div class="container">
                <div class="block-heading-fulcrum">
                    <h2 class="text-info">Catalogue Tours</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="container-md travelItem" style="">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                            <form method="post" action="../php/addToTourList.php?row=<?php echo $getRow?>">
                                <label for="tourList">TourLists</label>
                                <select style="margin-bottom: 15px" class="form-select" name="tourList">
                                    <option selected disabled>
                                        --Select--
                                    </option>
                                    <?php
                                    for($row=0;count($getList)>$row;$row++) {


                                    ?> <option value="<?php echo $getList[$row]['listname']?>"><?php echo $getList[$row]['listname']?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <input class="btn btn-primary-diveTours" type="submit" value="Select">
                                <input class="btn btn-primary-diveTours" type="submit" name="delete" value="Delete">
                            </form>
                            </div>
                            <div class="col-md-4">
                                <form method="post" action="../php/createTourlist.php">
                                    <label for="name">Create TourList</label>
                                        <input style="margin-bottom: 15px" type="text" class="form-control" name="name" required autocomplete="off">
                                    <input class="btn btn-primary-diveTours" type="submit" value="Add">
                                </form>
                            </div>
                        </div>
                        <div class="container-md " style="padding-bottom: 200px">
                            <div class="row align-items-center">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">
                                </div>
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
<!--<a class="lightbox" href="assets/img/scenery/image1.jpg"><img class="img-thumbnail img-fluid image" src="assets/img/scenery/image1.jpg"></a> -->