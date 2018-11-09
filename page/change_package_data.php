<?php

    session_start();

    include "../backend/dbConnection.php";

    $_SESSION['data_change_id'] = $_GET['id'];
    
    $result = mysqli_query($link,"SELECT * FROM package_information WHERE package_id='".$_SESSION['data_change_id']."'");
    $res= mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/page_css/update_package.css">

    <title>Update Package Information</title>
</head>
<body>

    <div id="full-page">

        <a class="btn btn-success" id="backbtn" href="package_information.php"> <- Back to Package Information</a>
        
        <h1>Update Package Information</h1>
        <section>        
            <div id="add-new-package" class="container">             
                <form id="new-package-form" method="POST" action="../backend/change_package.php">
                    <div class="form-group">
                        <label >Package Name</label>
                        <input type="text" name="package_name" class="form-control"  placeholder="Enter Package Name" value="<?php echo $res['package_name']?>">
                    </div>
                    <div class="form-group">
                        <label>Package Price</label>
                        <input type="text" name="package_price" class="form-control" placeholder="Enter Package Price" value="<?php echo $res['package_price']?>">
                    </div>
                    <div class="form-group" id="btn-space">
                        <label >Package Speed</label>
                        <input type="text" name="package_speed" class="form-control"  placeholder="Enter Package Speed" value="<?php echo $res['package_speed']?>">
                    </div>
                    <!-- Hidden id send -->
                    <input type="hidden" name="package_id" value="<?php echo $res['package_id']?>">

                    <button type="submit" name="submitBtn" class="btn btn-primary">Update Package</button>
                </form>
            </div>
        </section>
        
    
    </div>
    
    <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/navBar.js"></script>
</body>
</html>