<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
        header('Location: admin_login.php');
    }
    
    include "../backend/register_user.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/page_css/customer_registration.css">

    <title>Customer Registration</title>
</head>
<body>

    <div id="full-page" class="row container-fluid">

        <!-- NavBar -->
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="manage_customer.php">Customer List</a>
            <a id="thispage" href="customer_registration.php">New Customer Entry</a>
            <a href="update_delete_customer_data.php">Update / Delete </a>
        </div>
            
        <div class="col-1">
            <button id="menuBtn" type="button" class="btn btn-outline-dark" onclick="openNav()">Menu</button>
        </div>  
            
        <div id="form" class="col-11">
            <div id="header">
                <h1>Customer Registration</h1>
            </div>
            <form action="customer_registration.php" method="POST">
                <div class="form-row">
                    <div class="col-6">
                        <label>Username</label>
                        <input type="text" name="data_username" class="form-control" placeholder="Username">
                    </div>
                    
                    <div class="col-6">
                        <label>Password</label>
                        <input type="password" name="data_password" class="form-control" placeholder="Password">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-6">
                        <label>First Name</label>
                        <input type="text" name="data_firstName" class="form-control" placeholder="First Name">
                    </div>
                    
                    <div class="col-6">
                        <label>Last Name</label>
                        <input type="text" name="data_lastName" class="form-control" placeholder="Last Name">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-6">
                        <label>Email</label>
                        <input type="email" name="data_email" class="form-control" placeholder="arabi@gmail.com">
                    </div>
                    
                    <div class="col-6">
                        <label>Contact Number</label>
                        <input type="text" name="data_contactNumber" class="form-control" placeholder="019*******">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label>National ID</label>
                        <input type="text" name="data_NID" class="form-control" placeholder="NID">
                    </div>
                    
                    <div class="col-6">
                        <label>Join Date</label>
                        <input type="date" name="data_joinDate" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label>Package</label>
                        <select class="form-control" name="data_package">
                            <?php
                                include "../backend/dbConnection.php";

                                $result = mysqli_query($link,"SELECT * FROM `package_information`");
                                
                                while ($row = mysqli_fetch_array($result)){
                                    echo "<option value='$row[package_name]'>$row[package_name]</option>";
                                }
                                
                            ?>                          
                        </select>
                    </div>
                    
                    <div class="col-6">
                        <label>IP Address</label>
                        <input type="text" name="data_ipAddress" class="form-control" placeholder="10.0.0.0">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label>Area</label>
                        <select class="form-control" name="data_area">
                            <option>Mirpur</option>
                            <option>Dhanmondi</option>
                            <option>Banani</option>
                            <option>Gulshan</option>
                            <option>Mohammadpur</option>
                        </select>
                    </div>
                    
                    <div class="col-6">
                        <label>Address</label>
                        <textarea name="data_address" placeholder="Address" class="form-control"></textarea>
                    </div>
                    <button type="submit" id="regBtn" name="submitBtn" class="btn btn-primary btn-block">Register Customer</button>
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