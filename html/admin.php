<?php
$directory='../';
require_once '../php/functions.php';
require_once $directory.'vendor/autoload.php';
session_start();
if(!isset($_SESSION['admin']))
{
    header('Location:../index.php');
}

if(array_key_exists('viewLogin', $_POST))
{
    header("Location:../html/admin.php?Logins");
}
if(array_key_exists('ViewUsers', $_POST))
{
    header("Location:../html/admin.php?Users");
}
if(array_key_exists('ViewAgencies', $_POST))
{
    header("Location:../html/admin.php?AgencyView");
}
if(array_key_exists('ManageAgencies', $_POST))
{
    header("Location:../html/admin.php?ManageAgency");
}
if(array_key_exists('add', $_POST))
{
    header("Location:../html/admin.php?AddAgency");
}
if(array_key_exists('add', $_POST))
{
    header("Location:../html/admin.php?AddAgency");
}
if(array_key_exists('addAgency', $_POST))
{
    header("Location:../php/UAC/agencyAdd.php");
}
if(array_key_exists('ViewLocations', $_POST))
{
    header("Location:../html/admin.php?ViewLocation");
}
if(array_key_exists('ViewAttractions', $_POST))
{
    header("Location:../html/admin.php?ViewAttraction");
}
if(array_key_exists('addCity', $_POST))
{
    header("Location:../html/admin.php?addCity");
}
if(array_key_exists('addAttraction', $_POST))
{
    header("Location:../html/admin.php?addAttraction");
}
if(array_key_exists('editAttraction', $_POST))
{
    header("Location:../html/admin.php?editAttraction");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tour Dive Admin</title>
    <meta name="description" content="Welcome to Tour Dive [INSERT FLUFF HERE]">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Brand-icons.css">
    <link rel="stylesheet" href="assets/css/tourDive.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
</head>
<style>
    table{
        table-layout: inherit;
    }
    th{
        text-align: center;
    }

</style>

<body style="background-color: lightgrey">
    <div style="display: inline-flex;flex: auto;width: 100%;">
        <div style="width: fit-content;max-width: 20%;overflow-y: visible;display: inline-block;position: absolute;top: 74px;">
            <div class="accordion" role="tablist" id="accordion-1" style="margin-right: 1px;font-size: 16px;overflow: visible;display: inline-block;position: relative;">
                <div class="accordion-item" style="font-size: 16px;">
                    <h2 class="accordion-header" role="tab" style="font-size: 32px;"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-1" aria-expanded="false" aria-controls="accordion-1 .item-1" style="font-size: 13px;">User Account Control</button></h2>
                    <div class="accordion-collapse collapse item-1" role="tabpanel" data-bs-parent="#accordion-1">
                        <div class="accordion-body">
                            <form method="post">
                            <div><button class="btn btn-primary text-start btn-adminPage" type="submit" name="viewLogin">View Login Log</button></div>
                            <div><button class="btn btn-primary text-start btn-adminPage" type="submit" name="ViewUsers">View users</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-2" aria-expanded="false" aria-controls="accordion-1 .item-2" style="font-size: 13px;">Add/Remove Agencies</button></h2>
                    <div class="accordion-collapse collapse item-2" role="tabpanel" data-bs-parent="#accordion-1">
                        <div class="accordion-body">
                            <form method="post">
                            <div><button class="btn btn-primary text-start btn-adminPage" type="submit" name="ViewAgencies">View Agencies</button></div>
                            <div><button class="btn btn-primary text-start btn-adminPage" type="submit" name="ManageAgencies">Manage agencies</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-3" aria-expanded="true" aria-controls="accordion-1 .item-3">Manage Locations</button></h2>
                    <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-1">
                        <div class="accordion-body">
                            <form>
                            <div><button class="btn btn-primary text-start btn-adminPage" name="ViewLocations" type="submit">View Locations</button></div>
                            <div><button class="btn btn-primary text-start btn-adminPage" name="ViewAttractions" type="submit">View Attractions</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="width: 100%;position: relative;display: inline-block;">
            <nav class="navbar navbar-dark navbar-expand-md bg-dark py-3" style="padding-left: 0px;margin-left: 0px;">
                <div class="container"><a class="navbar-brand d-flex align-items-center" href="http://localhost/nwp_Projekt/"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                                <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                                <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                            </svg></span><span>Tour Dive</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-5">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link active" href="admin.php?Contacts">Contact Page</a></li>
                            <li class="nav-item"><a class="nav-link" href="admin.php?generateQRCode">Generate QR code</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div style="overflow-y: hidden" class="table table-responsive">
    <div style="position: relative; width: fit-content; top:10px ;left: 215px; ">
        <?php
        $logins=getLogins();
        if(isset($_GET['Logins']))
        {?>
            <table style="width:auto" class="table">
                <thead class="table-dark">
                <tr>
                <th>User ID</th>
                <th>browser</th>
                <th>IP address</th>
                <th>Last Login Date</th>
                <th>Device</th>
                    <th></th>
                </tr>
                </thead>
    <?php
    for($row=0;count($logins)>$row;$row++)
    {
        echo '<tr>';
        foreach ($logins[$row] as $key=>$item)
        {

            echo '<td>'.$item.'</td>';
        }
        ?>
        <form method="post" action="../php/rowDelete.php?row=<?php echo $row?>"> <td> <input class="btn btn-secondary" type="submit" name="deleteBtn" value="delete"> </td> </form>
        <?php
        echo '</tr>';
        }

        echo '</table>';
        }?>
                <?php
                $logins=getUsers();
                if(isset($_GET['Users']))
                {?>
                <table style="width: fit-content" class="table">
                    <thead class="table-dark">
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>LastName</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Active</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php
                    for($row=0;count($logins)>$row;$row++)
                    {
                        echo '<form method="post" action="../php/UAC/updateRow.php?row='.$row.'">';
                        echo '<tr>';
                        echo '<td class="" style="min-width: 50px; max-width: 180px ;width: auto;">'.'<div>'.'<input class="form-control" type="text" name="'.$row.'id_user" value="'.$logins[$row]['id_user'].'"></div></td>';
                        echo '<td style="min-width: 50px; max-width: 180px ;width: auto;">'.'<div>'.'<input class="form-control" type="text" name="'.$row.'first_name" value="'.$logins[$row]['first_name'].'"></div></td>';
                        echo '<td style="min-width: 50px; max-width: 180px ;width: auto;">'.'<div>'.'<input class="form-control" type="text" name="'.$row.'last_name" value="'.$logins[$row]['last_name'].'"></div></td>';
                        echo '<td>'.'<input class="form-control" type="text" name="'.$row.'email" value='.$logins[$row]['email'].'></td>';
                        echo '<td>'.'<select class="form-control" name="'.$row.'permissions" ><option selected value="'.$logins[$row]['permissions'].'">'.$logins[$row]['permissions'].'</option> <option value="admin">admin</option> <option value="registered">registered</option> <option value="agency">agency</option> </select></td>';
                        echo '<td style="min-width: 50px; max-width: 180px ;width: auto;">'.'<input class="form-control" type="text" name="'.$row.'active" value="'.$logins[$row]['active'].'"></td>';
                        echo '<td> <input class="btn btn-secondary" type="submit" name="edit" value="Edit"> </td> </form>' ?>
                        <?php
                        echo '</tr>';
                    }
                    }?>

                    <?php
                    $logins=getAgencies();
                    if(isset($_GET['AgencyView']))
                    {?>
                    <table style="width:auto" class="table">
                        <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Agency Name</th>
                            <th>HeadQuarters</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <?php
                        for($row=0;count($logins)>$row;$row++)
                        {
                            echo '<tr>';
                            foreach ($logins[$row] as $key=>$item)
                            {

                                echo '<td>'.$item.'</td>';
                            }
                            ?>
                            <form method="post" action="../php/UAC/agencyList.php?row=<?php echo $row?>"> <td> <input class="btn btn-secondary" type="submit" name="deleteBtn" value="delete"> </td> </form>
                            <?php
                            echo '</tr>';
                        }

                        echo '</table>';
                        }?>

                        <?php
                        $logins=getAgenciesAll();
                        $cities=getAllCities();
                        if(isset($_GET['ManageAgency']))
                        {?>
                        <table style="width: fit-content" class="table">
                            <thead class="table-dark">
                            <tr>
                                <th>Agency_id</th>
                                <th>Name</th>
                                <th>HeadQuarters</th>
                                <th>Status</th>
                                <th>logo</th>
                                <th></th>
                                <th><form method="post"><input class="btn btn-primary" name="add" type="submit" value="Add"></form></th>
                            </tr>
                            </thead>
                            <?php
                            for($row=0;count($logins)>$row;$row++)
                            {
                                echo '<form method="post" action="../php/UAC/manageAgencies.php?row='.$row.'">';
                                echo '<tr>';
                                echo '<td class="" style="min-width: 50px; max-width: 180px ;width: auto;">'.'<div>'.'<input class="form-control" type="text" name="'.$row.'agency_id" value="'.$logins[$row]['agency_id'].'"></div></td>';
                                echo '<td style="min-width: 50px; max-width: 180px ;width: auto;">'.'<div>'.'<input class="form-control" type="text" name="'.$row.'name" value="'.$logins[$row]['name'].'"></div></td>';
                                echo '<td>'.'<select class="form-select" name="'.$row.'cities" ><option selected value="'.$logins [$row]['city_name'].'">'.$logins[$row]['city_name'].'</option>.'; foreach ($cities as $city=>$item){ echo '<option value="'.$item['city_name'].'">'.$item['city_name'].'</option>';}echo '.</select></td>';
                                echo '<td>'.'<select class="form-select" name="'.$row.'status" ><option selected value="'.$logins[$row]['status'].'">'.$logins[$row]['status'].'</option> <option value="enabled">enabled</option> <option value="disabled">disabled</option> </select></td>';
                                echo '<td>'.'<input class="form-control" type="file" name="'.$row.'logo" value="'.$logins[$row]['logo'].'"></td>';
                                echo '<td> <input class="btn btn-secondary" type="submit" name="edit" value="Edit"> </td> </form>' ?>
                                <?php
                                echo '</tr>';
                            }

                            }?>
                            <?php
                            $logins=getAgenciesAll();
                            $cities=getAllCities();
                            if(isset($_GET['AddAgency']))
                            {?>
                            <table style="width: fit-content" class="table">
                                <thead class="table-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>HeadQuarters</th>
                                    <th>Status</th>
                                    <th>logo</th>
                                    <th>Password</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <form method="post" action="../php/UAC/agencyAdd.php">
                                    <tr>
                                    <td class="" style="min-width: 50px; max-width: 180px ;width: auto;"><input class="form-control" type="text" name="name"></td>
                                    <?php
                                    echo '<td class="" style="min-width: 50px; max-width: 180px ;width: auto;"><select class="form-select" type="text" name="city">.'; foreach ($cities as $city=>$item){ echo '<option value="'.$item['city_name'].'">'.$item['city_name'].'</option>';} echo'</select></td>'; ?>
                                    <td class="" style="min-width: 50px; max-width: 180px ;width: auto;"><select class="form-select" type="text" name="status"><option value="enabled">enabled</option><option value="disabled">disabled</option></select></td>
                                    <td class="" style="min-width: 50px; max-width: 180px ;width: auto;"><input class="form-control" type="file" name="logo"></td>
                                    <td class="" style="min-width: 50px; max-width: 180px ;width: auto;"><input class="form-control" type="text" name="password"></td>
                                    <td><input class="btn btn-primary" type="submit" name="addAgency" value="Add"> </td>
                                </tr>
                                </form>
                                <?php }?>
                            <?php
                            $logins=getAllCities();
                            if(isset($_GET['ViewLocations']))
                                {?>
                                <table style="width:auto" class="table">
                                    <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>City Name</th>
                                        <th></th>
                                        <th><form><input class="btn btn-primary" type="submit" name="addCity" value="Add"></form></th>
                                    </tr>
                                    </thead>
                                    <?php
                                    for($row=0;count($logins)>$row;$row++)
                                    {
                                        echo '<tr>';
                                        foreach ($logins[$row] as $key=>$item)
                                        {

                                            echo '<td>'.$item.'</td>';
                                        }
                                        ?>
                                        <form method="post" action="../php/UAC/deleteLocation.php?row=<?php echo $row?>"> <td> <input class="btn btn-secondary" type="submit" name="deleteBtn" value="delete"> </td> </form>
                                        <?php
                                        echo '</tr>';
                                    }

                                    echo '</table>';
                                    }?>
                            <?php
                            if(isset($_GET['addCity']))
                                    {?>
                                    <table style="width: fit-content" class="table">
                                        <thead class="table-dark">
                                        <tr>
                                            <th>City Name</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <form method="post" action="../php/UAC/cityAdd.php">
                                            <tr>
                                                <td class="" style="min-width: 50px; max-width: 180px ;width: auto;"><input class="form-control" type="text" name="cityName"></td>
                                                <td><input class="btn btn-primary" type="submit" name="addCity" value="Add"> </td>
                                            </tr>
                                        </form>
                                        <?php }?>
                            <?php
                            $logins=ViewAttractions();
                            if(isset($_GET['ViewAttractions']))
                                        {?>
                                        <table style="width:auto" class="table">
                                            <thead class="table-dark">
                                            <tr>
                                                <th>Attraction ID</th>
                                                <th>City ID</th>
                                                <th>Name</th>
                                                <th>Details</th>
                                                <th>Address</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Active</th>
                                                <th>Agency_id</th>
                                                <th><form><input class="btn btn-primary" type="submit" name="editAttraction" value="Edit"></form></th>
                                                <th><form><input class="btn btn-primary" type="submit" name="addAttraction" value="Add"></form></th>
                                            </tr>
                                            </thead>
                                            <?php
                                            for($row=0;count($logins)>$row;$row++)
                                            {
                                                echo '<tr>';
                                                foreach ($logins[$row] as $key=>$item)
                                                {

                                                    echo '<td>'.$item.'</td>';
                                                }
                                                ?>
                                                <form method="post" action="../php/UAC/deleteAttraction.php?row=<?php echo $row?>"> <td> <input class="btn btn-secondary" type="submit" name="deleteBtn" value="delete"> </td> </form>
                                                <?php
                                                echo '</tr>';
                                            }

                                            echo '</table>';
                                            }?>

                                            <?php
                                            $cities=getAllCities();
                                            $agencies=getAgencies();
                                            if(isset($_GET['addAttraction']))
                                            { ?>
                                            <table style="width: fit-content" class="table">
                                                <thead class="table-dark">
                                                <tr>
                                                    <th>City ID</th>
                                                    <th>Name</th>
                                                    <th>Details</th>
                                                    <th>Image</th>
                                                    <th>Address</th>
                                                    <th>Latitude</th>
                                                    <th>Longitude</th>
                                                    <th>Active</th>
                                                    <th>Agency ID</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <form method="post" action="../php/UAC/addAttract.php" enctype="multipart/form-data">
                                                    <tr>
                                                        <?php
                                                        echo '<td class="" style="min-width: 50px; max-width: 150px ;width: auto;"><select class="form-select" type="text" name="city_id">.'; foreach ($cities as $city=>$item){ echo '<option value="'.$item['city_id'].'">'.$item['city_name'].'</option>';} echo'</select></td>'; ?>
                                                        <td class="" style="min-width: 50px; max-width: 150px ;width: auto;"><input class="form-control" type="text" name="Name"></td>
                                                        <td class="" style="min-width: 50px; max-width: 150px ;width: auto;"><input class="form-control" type="text" name="Details"></td>
                                                        <td class="" style="min-width: 50px; max-width: 140px ;width: auto;"><input class="form-control" type="file" name="Image"></td>
                                                        <td class="" style="min-width: 50px; max-width: 150px ;width: auto;"><input class="form-control" type="text" name="Address"></td>
                                                        <td class="" style="min-width: 50px; max-width: 150px ;width: auto;"><input class="form-control" type="text" name="Latitude"></td>
                                                        <td class="" style="min-width: 50px; max-width: 150px ;width: auto;"><input class="form-control" type="text" name="Longitude"></td>
                                                        <td class="" style="min-width: 50px; max-width: 150px ;width: auto;"><select class="form-select" type="text" name="Active"><option value="enable">Enabled</option><option value="disable">Disabled</option></select></td>
                                                        <?php
                                                        echo '<td class="" style="min-width: 50px; max-width: 150px ;width: auto;"><select class="form-select" type="text" name="agency_id">.'; foreach ($agencies as $agency=>$item){ echo '<option value="'.$item['agency_id'].'">'.$item['name'].'</option>';} echo'</select></td>'; ?>
                                                        <td><input class="btn btn-primary" type="submit" name="addAttract" value="Add"></td>
                                                    </tr>
                                                </form>
                                                <?php }?>
                                                <?php
                                                $logins=ViewAttractions();
                                                $cities=getAgencies();
                                                $getCity=getAllCities();
                                                $images=GetImages();
                                                if(isset($_GET['editAttraction']))
                                                {?>
                                                <table style="width: fit-content; max-width: 1920px; white-space: nowrap" class="table table-responsive-sm">
                                                    <thead class="table-dark">
                                                    <tr>
                                                        <th>AttractionID</th>
                                                        <th>CITY ID</th>
                                                        <th>Name</th>
                                                        <th>Details</th>
                                                        <th>Image</th>
                                                        <th>Address</th>
                                                        <th>Latitude</th>
                                                        <th>Longitude</th>
                                                        <th>Active</th>
                                                        <th>Agency id</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <?php
                                                    for($row=0;count($logins)>$row;$row++)
                                                    {
                                                        echo '<form method="post" action="../php/UAC/editAttraction.php?row='.$row.'" enctype="multipart/form-data">';
                                                        echo '<tr>';
                                                        echo '<td style="min-width: 50px; max-width: 150px ;width: auto;">'.'<div>'.'<input class="form-control" type="text" name="'.$row.'attraction_id" value="'.$logins[$row]['attraction_id'].'"></div></td>';
                                                        echo '<td style="min-width: 50px; max-width: 150px ;width: auto;">'.'<div>'.'<select class="form-select" name="'.$row.'city_id"><option selected value="'.$logins[$row]['city_id'].'">'.returnCity($logins[$row]['city_id']).'</option>.'; foreach ($getCity as $city=>$item){ echo '<option value="'.$item['city_id'].'">'.$item['city_name'].'</option>';}echo '.</select></div></td>';
                                                        echo '<td style="min-width: 50px; max-width: 150px ;width: auto;">'.'<div>'.'<input class="form-control" type="text" name="'.$row.'name" value="'.$logins[$row]['name'].'"></div></td>';
                                                        echo '<td style="min-width: 50px; max-width: 150px ;width: auto;">'.'<div>'.'<input class="form-control" type="textarea" name="'.$row.'details" value="'.$logins[$row]['details'].'"></div></td>';
                                                        echo '<td style="min-width: 50px; max-width: 150px ;width: auto;">'.'<div>'.'<input class="form-control" type="file" name="'.$row.'image" value=""></div></td>';
                                                        echo '<td style="min-width: 50px; max-width: 150px ;width: auto;">'.'<div>'.'<input class="form-control" type="text" name="'.$row.'address" value="'.$logins[$row]['address'].'"></div></td>';
                                                        echo '<td style="min-width: 50px; max-width: 150px ;width: auto;">'.'<div>'.'<input class="form-control" type="text" name="'.$row.'latitude" value="'.$logins[$row]['latitude'].'"></div></td>';
                                                        echo '<td style="min-width: 50px; max-width: 150px ;width: auto;">'.'<div>'.'<input class="form-control" type="text" name="'.$row.'longitude" value="'.$logins[$row]['longitude'].'"></div></td>';
                                                        echo '<td style="min-width: 50px; max-width: 150px ;width: auto;">'.'<select class="form-select" name="'.$row.'active" ><option selected value="'.$logins[$row]['active'].'">'.$logins[$row]['active'].'</option> <option value="enabled">enabled</option> <option value="disabled">disabled</option> </select></td>';
                                                        echo '<td style="min-width: 50px; max-width: 150px ;width: auto;">'.'<select class="form-select" name="'.$row.'agency_id" ><option selected value="'.$logins [$row]['agency_id'].'">'.$cities[$row]['name'].'</option>.'; foreach ($cities as $city=>$item){ echo '<option value="'.$item['agency_id'].'">'.$item['name'].'</option>';}echo '.</select></td>';
                                                        echo '<td> <input class="btn-primary" type="submit" name="edit" value="Edit"> </td> </form>' ?>
                                                        <?php
                                                        echo '</tr>';
                                                    }

                                                    }?>
                                                    <?php
                                                    if (isset($_GET['Contacts']))
                                                    {?>
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Subject</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Message</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $contacts=getContacts();
                                                        for($row=0;count($contacts)>$row;$row++)
                                                        {
                                                        echo '<tr>';
                                                            foreach ($contacts[$row] as $key=>$item)
                                                            {

                                                                echo '<td>'.$item.'</td>';
                                                            }?>
                                                        <form method="post" action="../php/UAC/deleteContact.php?row=<?php echo $row?>"> <td> <input class="btn btn-secondary" type="submit" name="deleteBtn" value="delete"> </td> </form>
                                                        <?php echo '</tr>';
                                                        }
                                                    }?>

                                                        <?php
                                                        if (isset($_GET['generateQRCode']))
                                                        {?>
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">URI</th>
                                                                    <th scope="col">Name</th>
                                                                    <!--<th scope="col">Subject</th>
                                                                    <th scope="col">Email</th>
                                                                    <th scope="col">Message</th>-->
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <form method="post" action="../php/UAC/generateQrCode.php" autocomplete="off">
                                                                    <td style="width: auto;"><div> <input class="form-control" type="text" name="name" placeholder="Enter Name here"></div></td>
                                                                    <td style="width: auto;"><div> <input class="form-control" type="text" name="uri" placeholder="enter URI here"></div></td>
                                                                    <td>  <input class="btn btn-secondary" type="submit" name="Generate" value="Generate"> </td>
                                                                    </form>
                                                                </tr>

                                                                    <?php
                                                                    $codes=getQrCodes();
                                                                    for($row=0;count($codes)>$row;$row++)
                                                                    {
                                                                        echo '<tr>';

                                                                        echo '<td>'.$codes[$row]['file_name'].'</td>';
                                                                        echo '<td><img src="../qrCodes/'.$codes[$row]['file_name'].'.png" alt="qrCode"></td>';
                                                                        ?>
                                                                        <form method="post" action="../php/UAC/deleteQrCode.php?row=<?php echo $row?>"> <td> <input class="btn btn-secondary" type="submit" name="deleteBtn" value="delete"> </td> </form>
                                                                        <?php echo '</tr>';
                                                                    }
                                                                    ?>
                                                        </tbody>
                                                    </table>
                                                    <?php }
                                                    ?>

     </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>