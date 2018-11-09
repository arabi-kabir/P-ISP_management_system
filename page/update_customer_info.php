<?php

    session_start();

    include "../backend/dbConnection.php";

    $_SESSION['data_change_id'] = $_GET['id'];
    
    $result1 = mysqli_query($link,"SELECT * FROM customer_area_table WHERE customer_id='".$_SESSION['data_change_id']."'");
    $result2 = mysqli_query($link,"SELECT * FROM customer_contact_table WHERE customer_id='".$_SESSION['data_change_id']."'");
    $result3 = mysqli_query($link,"SELECT * FROM customer_login_table WHERE customer_id='".$_SESSION['data_change_id']."'");
    $result4 = mysqli_query($link,"SELECT * FROM customer_package_info_table WHERE customer_id='".$_SESSION['data_change_id']."'");

    $res1= mysqli_fetch_array($result1);
    $res2= mysqli_fetch_array($result2);
    $res3= mysqli_fetch_array($result3);
    $res4= mysqli_fetch_array($result4);

    $myPackage = $res4['customer_curr_package'];
    $myArea = $res1['customer_area'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/page_css/update_customer_info.css">

    <title>Update Customer Information</title>
</head>
<body>

    <div id="full-page" class="container-fluid row">

        <!-- NavBar -->
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="manage_customer.php">Customer List</a>
            <a href="customer_registration.php">New Customer Entry</a>
            <a id="thispage" href="update_delete_customer_data.php">Update / Delete </a>
        </div>
            
        <div class="col-1">
            <button id="menuBtn" type="button" class="btn btn-outline-success" onclick="openNav()">Menu</button>
        </div>  
   
        <div id="form" class="col-11">
            <div id="header">
                <h1>Update Customer Information</h1>
            </div>
            <form action="../backend/customer_info_update_action.php" method="POST">
                <div class="form-row">
                    <div class="col-6">
                        <label>Username</label>
                        <input type="text" name="data_username" class="form-control" placeholder="Username" value="<?php echo $res3['customer_username']?>">
                    </div>
                    
                    <div class="col-6">
                        <label>Password</label>
                        <input type="password" name="data_password" class="form-control" placeholder="Password" value="<?php echo $res3['customer_password']?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-6">
                        <label>First Name</label>
                        <input type="text" name="data_firstName" class="form-control" placeholder="First Name" value="<?php echo $res2['customer_first_name']?>">
                    </div>
                    
                    <div class="col-6">
                        <label>Last Name</label>
                        <input type="text" name="data_lastName" class="form-control" placeholder="Last Name" value="<?php echo $res2['customer_last_name']?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-6">
                        <label>Email</label>
                        <input type="email" name="data_email" class="form-control" placeholder="arabi@gmail.com" value="<?php echo $res2['customer_email']?>">
                    </div>
                    
                    <div class="col-6">
                        <label>Contact Number</label>
                        <input type="text" name="data_contactNumber" class="form-control" placeholder="019*******" value="<?php echo $res2['customer_contact_number']?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label>National ID</label>
                        <input type="text" name="data_NID" class="form-control" placeholder="NID" value="<?php echo $res2['customer_NID']?>">
                    </div>
                    
                    <div class="col-6">
                        <label>Join Date</label>
                        <input type="date" name="data_joinDate" class="form-control" value="<?php echo date('Y-m-d', $res4['customer_joindate'] ); ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label>Package</label>
                        <select class="form-control" name="data_package" value=>
                            <?php
                                include "../backend/dbConnection.php";

                                $result = mysqli_query($link,"SELECT * FROM `package_information`");
                                
                                while ($row = mysqli_fetch_array($result)){
                                    if($row['package_name'] == $myPackage)
                                    {
                                        echo "<option value='$row[package_name]' selected >$row[package_name]</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='$row[package_name]' >$row[package_name]</option>";
                                    }
                                }
                                
                            ?> 
                        </select>
                    </div>
                    
                    <div class="col-6">
                        <label>IP Address</label>
                        <input type="text" name="data_ipAddress" class="form-control" placeholder="10.0.0.0" value="<?php echo $res4['customer_ip_address']?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label>Area</label>
                        <select class="form-control" name="data_area">
                            <option <?php if($myArea=="Mirpur") echo "selected" ?> >Mirpur</option>
                            <option <?php if($myArea=="Dhanmondi") echo "selected" ?> >Dhanmondi</option>
                            <option <?php if($myArea=="Banani") echo "selected" ?> >Banani</option>
                            <option <?php if($myArea=="Gulshan") echo "selected" ?> >Gulshan</option>
                            <option <?php if($myArea=="Mohammadpur") echo "selected" ?> >Mohammadpur</option>
                        </select>
                    </div>
                    
                    <div class="col-6">
                        <label>Address</label>
                        <textarea name="data_address" placeholder="Address" class="form-control"><?php echo $res1['customer_address']?></textarea>
                    </div>
                    <button type="submit" id="updateBtn" name="submitBtn" class="btn btn-primary btn-block">Update Customer Information</button>
                </div>             
            </form>
        </div>
    
    </div>
    
    <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/navBar.js"></script>
</body>
</html>