<?php
require_once '../../../../php/functions.php';
//session_start();
$attractions=GetAttractions();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Tour Dive</title>
    <meta name="description" content="Welcome to Tour Dive the place where you can look for places to check out">
    <link rel="stylesheet" href="../../../../html/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../html/assets/css/Montserrat.css">
    <link rel="stylesheet" href="../../../../html/assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="../../../../html/assets/css/tourDive.css">
    <link rel="stylesheet" href="../../../../html/assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="../../../../style/style.css">

<body>
    <main class="page pricing-table-page">
        <section class="clean-block clean-pricing dark" style="background: #cdedf6;">
            <div class="container">
                <div class="block-heading-fulcrum">
                    <h2 class="text-info">Tours</h2>
                    <p>Here you can check and browse all available tours.</p>
                </div>
                <div class="row justify-content-center">
                    <?php for($row=0;$row<count($attractions);$row++)
                    {
                        ?>
                    <div class="container-md travelItem">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <img class="AutoSize-image" src="../../../../uploads/<?php echo $attractions[$row]['image']; ?>"  alt="test">
                            </div>
                            <div class="col-md-4">
                                <div class="locationName">
                                    <h4><?php echo $attractions[$row]['name']?></h4>
                                </div>
                                <p>Description:</p>
                                <p><?php echo $attractions[$row]['details']?></p>
                                <p>Location:</p>
                                <p><?php echo $attractions[$row]['address']?></p>
                            </div>
                            <div class="col-md-4">
                                <?php echo '<form method="post" action="tourPage.php?row='.$row.'">'?>
                                    <button class="btn btn-primary-diveTours d-block w-100" type="submit">Check it out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    }?>
                </div>
            </div>
        </section>
    </main>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>