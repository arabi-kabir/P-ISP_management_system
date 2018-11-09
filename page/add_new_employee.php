<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
        header('Location: admin_login.php');
    }
    
    include "../backend/add_employee.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/page_css/add_new_employee.css">

    <title>Add New Employee</title>
</head>
<body>

    <div id="full-page" class="row container-fluid">

        <!-- NavBar -->
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="employeeList.php">Employee List</a>
            <a id="thispage" href="add_new_employee.php">New Employee Entry</a>
            <a href="update_delete_employee.php">Update / Delete Info</a>
        </div>

       <div class="col-1">
            <button id="menuBtn" type="button" class="btn btn-outline-dark" onclick="openNav()">Menu</button>
       </div>     
        

        <div id="form" class="col-11">
            <div id="header">
                <h1>Add New Employee</h1>
            </div>
            <form action="add_new_employee.php" method="POST">
                <div class="form-row">
                    <div class="col-6">
                        <label>Name</label>
                        <input type="text" name="emp_name" class="form-control" placeholder="Name">
                    </div>
                    
                    <div class="col-6">
                        <label>Email</label>
                        <input type="email" name="emp_email" class="form-control" placeholder="Email">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-6">
                        <label>Username</label>
                        <input type="text" name="emp_username" class="form-control" placeholder="Username">
                    </div>
                    
                    <div class="col-6">
                        <label>Password</label>
                        <input type="password" name="emp_password" class="form-control" placeholder="Password">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-6">
                        <label>National ID</label>
                        <input type="text" name="emp_nid" class="form-control" placeholder="National ID">
                    </div>
                    
                    <div class="col-6">
                        <label>Join Date</label>
                        <input type="date" name="emp_joindate" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label>Salary</label>
                        <input type="number" name="emp_salary" class="form-control" placeholder="Salary">
                    </div>
                    
                    <div class="col-6">
                        <label>Moderator Access</label>
                        <select class="form-control" name="emp_moderatorAccess">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">                 
                    <div class="col-6">
                        <label>Address</label>
                        <input type="text" name="emp_address" class="form-control" placeholder="Address">
                    </div>

                    <div class="col-6">
                        <label>Contact Number</label>
                        <input type="text" name="emp_number" class="form-control" placeholder="019*******">
                    </div>
                </div>
                <div class="form-row">                                
                    <button type="submit" id="add_emp_btn" name="submitBtn" class="btn btn-primary btn-block">Add New Employee</button>
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