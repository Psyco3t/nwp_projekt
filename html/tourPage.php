<?php
require_once '../php/functions.php';
session_start();
$attractions=getActiveAttractions();
$row=$_GET['row'];

$latitude=$attractions[$row]['latitude'];
$longitude=$attractions[$row]['longitude'];
$comments=false;

$comment=getComments($attractions[$row]['attraction_id']);
$column=getCommentsColumn($attractions[$row]['attraction_id']);
$users=getUsers();

if(isset($_SESSION['loggedIN']))
{
    $comments=true;
}
else
{
    $comments=false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pricing - Tour Dive</title>
    <meta name="description" content="Welcome to Tour Dive [INSERT FLUFF HERE]">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/tourDive.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <script type="module" src="../html/assets/js/map.js"></script>

<body>
<nav class="navbar navbar-light navbar-expand-lg fixed-top clean-navbar" style="background: #ef7b45;">
    <div class="container"><a class="navbar-brand logo" href="#">Tour Dive</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="Tours.php">Tours</a></li>
                <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
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
        if(isset($_GET['failure']) and $_GET['failure']==2) {
            echo '<div class="alert alert-info text-primary alert-dismissible" role="alert" style="background: var(--bs-alert-border-color);padding: 20px 48px 16px 16px;"><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span><strong>You are not logged in.</strong><br /></span></div>';
        }
        ?>
        <?php
        if(isset($_GET['success']) and $_GET['success']==1) {
            echo '<div class="alert alert-info text-primary alert-dismissible" role="alert" style="background: var(--bs-alert-border-color);padding: 20px 48px 16px 16px;"><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span><strong>Attraction has been added.</strong><br /></span></div>';
        }
        ?>
        <?php
        if(isset($_GET['success']) and $_GET['success']==2) {
            echo '<div class="alert alert-info text-primary alert-dismissible" role="alert" style="background: var(--bs-alert-border-color);padding: 20px 48px 16px 16px;"><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span><strong>Attraction has been added to favorites.</strong><br /></span></div>';
        }
        ?>
        <?php
        if(isset($_GET['failure']) and $_GET['failure']==3) {
            echo '<div class="alert alert-info text-primary alert-dismissible" role="alert" style="background: var(--bs-alert-border-color);padding: 20px 48px 16px 16px;"><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span><strong>Attraction already been added to your favorites.</strong><br /></span></div>';
        }
        ?>
        <?php
        if(isset($_GET['failure']) and $_GET['failure']==1) {
            echo '<div class="alert alert-info text-primary alert-dismissible" role="alert" style="background: var(--bs-alert-border-color);padding: 20px 48px 16px 16px;"><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span><strong>Attraction already been added to your tour cart.</strong><br /></span></div>';
        }
        ?>
        <div class="container">
            <div class="block-heading-fulcrum">
                <h2 class="text-info">Tours</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
            </div>
            <div class="row justify-content-center">
                <div class="container-md travelItem">
                    <div class="col-md align-items-start">
                        <div class="col-md">
                            <div class="locationName">
                                <h4><?php echo $attractions[$row]['name']?></h4>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <?php echo '<img id="tourImage" src="../uploads/'.$attractions[$row]['image'].'" alt="test">'; ?>
                            </div>
                            <div class=col-md-4>
                                <p>Description: <?php echo $attractions[$row]['details']?></p>
                            </div>
                            <div class=col-md-2>
                                <p>Location: <?php echo $attractions[$row]['address']?></p>
                                <div id="map">
                                <iframe style="height:100%;width:100%;border:0;" src="https://www.google.com/maps/embed/v1/place?q=+<?php echo $latitude;?>, <?php echo $longitude;?>&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                                    <p>address</p>
                                </div>
                            </div>
                            <div class=col-md-4>
                                <form method="post" action="../php/addToTourList.php?row=<?php echo $row?>">
                                <button class="btn btn-primary-diveTours d-block w-100" type="submit">Add to TourList</button>
                                </form>
                            </div>
                            <div class=col-md-2>
                                <form method="post" action="../php/addFavorite.php?row=<?php echo $row?>">
                                    <button class="btn btn-primary-diveTours d-block w-100" type="submit">Add to Favorites</button>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <div class="locationPrice align-items-center">
                                    <h4>Price: $20</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <p>Gallery</p>
                            <div class="row align-items-start">
                                <div class="col-md-2">
                                    <img id="tourImage" src="../uploads/default.jpg" alt="test">
                                </div>
                                <div class="col-md-2">
                                    <img id="tourImage" src="../uploads/default.jpg" alt="test">
                                </div>
                                <div class="col-md-2">
                                    <img id="tourImage" src="../uploads/default.jpg" alt="test">
                                </div>
                                <div class="col-md-2">
                                    <img id="tourImage" src="../uploads/default.jpg" alt="test">
                                </div>
                            </div>
                            <div class="col-md">
                                <h4>Comments:</h4>
                                <?php
                                if($comments==true)
                                {

                                echo '<div class="row align-items-start">';


                                    echo '<div class="postcomment"><form method="post" action="../php/postcomment.php?row='.$row.'">';
                                    echo   '<textarea style="margin-bottom: 15px" class="form-control" name="comment" rows="4" placeholder="Write your comment here"></textarea>';
                                    echo'<button type="submit" class="btn btn-primary-diveTours">Post</button></form></div>';
                                }
                                else
                                {
                                    echo '<div class="row align-items-start">';

                                    echo '<div class="comment">';
                                    echo '<p>To post a comment you must be signed in</p>';
                                    echo'</div>';
                                }
                                    ?>
                                <?php
                                for ($item=0;$column>$item;$item++)
                                    {
                                        //use array search each time a comment is made
                                        $user_id=array_search($comment[$item]['user_id'], $comment[$item]);
                                        $username=getUser($comment[$item]['user_id']);
                                        //var_dump($username);
                                        echo '<div class="comment"><div class=""><p style="text-align: left;color: #2288f9;font-size: 23px;margin: 15px;border-radius: 10px;">User '.$username[0]['first_name'].' '.$username[0]['last_name'].' says...</p></div><p>'.$comment[$item]['text'].'</p></div>';
                                    }
                                ?>
                                </div>
                            </div>
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