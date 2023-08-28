<?php
require_once '../../../../php/functions.php';
session_start();
$attractions=GetAttractions();
$uid=$_SESSION['uid'];
//$selectedTours=fetchFromList($uid);
$getList=PDOexec("SELECT DISTINCT `listname` FROM tourlist WHERE user_id='$uid'")->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tour Cart - Tour Dive</title>
    <meta name="description" content="Welcome to Tour Dive [INSERT FLUFF HERE]">
    <link rel="stylesheet" href="../../../../html/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../html/assets/css/Montserrat.css">
    <link rel="stylesheet" href="../../../../html/assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="../../../../html/assets/css/tourDive.css">
    <link rel="stylesheet" href="../../../../html/assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="../../../../style/style.css">
</head>

<body style="height: auto">
    <main class="page pricing-table-page">
        <?php
        if(isset($_GET['error']) and $_GET['error']==1) {
            echo '<div class="alert alert-info text-primary alert-dismissible" role="alert" style="background: var(--bs-alert-border-color);padding: 20px 48px 16px 16px;"><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button><span><strong>Something went wrong oops.</strong><br /></span></div>';
        }
        ?>
        <section class="clean-block clean-pricing dark" style="background: #cdedf6;">
            <div class="container">
                <div class="block-heading-fulcrum">
                    <h2 class="text-info">Tours on your List</h2>
                </div>
                <div class="container-md " style="padding-bottom: 200px">
                    <div class="row align-items-center">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <form method="post" action="../API/getTourList.php">
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
                            </form>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php if(isset($_GET['select']))
                    {
                        $listname=$_SESSION['listname'];
                    $selectedTours=fetchFromList($uid,$listname);
                    for($row=0;$row<count($selectedTours);$row++)
                    {
                    ?>
                    <div class="container-md travelItem" style="">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <img class="AutoSize-image" src="../../../../uploads/<?php echo $selectedTours[$row]['image']; ?>"  alt="test">
                            </div>
                            <div class="col-md-4">
                                <div class="locationName">
                                    <h4><?php echo $selectedTours[$row]['name']?></h4>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p>Description:</p>
                                <p><?php echo $selectedTours[$row]['details']?></p>
                            </div>
                            <div class="col-md-4">
                                <p>Location:</p>
                                <p><?php echo $selectedTours[$row]['address']?></p>
                            </div>
                            <div class="col-md-4">
                                <form method="post" action="../API/removeFromList.php?row=<?php echo $row?>&aId=<?php echo $selectedTours[$row]['attraction_id']?>">
                                    <button type="submit" name="remove" class="btn btn-primary-diveTours">Remove</button>
                                </form>
                            </div>
                        </div>
                        <?php
                        }
                        }
                         ?>
                    </div>
                </div>
            </div>

        </section>
    </main>
    <script src="../../../../html/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="../../../../html/assets/js/vanilla-zoom.js"></script>
    <script src="../../../../html/assets/js/theme.js"></script>
</body>

</html>
<!--<a class="lightbox" href="assets/img/scenery/image1.jpg"><img class="img-thumbnail img-fluid image" src="assets/img/scenery/image1.jpg"></a> -->