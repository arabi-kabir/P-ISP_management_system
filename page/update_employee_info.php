<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
        header('Location: admin_login.php');
    }
    
    include "../backend/dbConnection.php";

    $_SESSION['data_change_id'] = $_GET['id'];
    
    $result = mysqli_query($link,"SELECT * FROM employee_table WHERE employee_id='".$_SESSION['data_change_id']."'");
   
    $res= mysqli_fetch_array($result);

    $moderatorAccess = $res['employee_moderator_access'];

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

    <title>Update Employee Data</title>
</head>
<body>

    <div id="full-page" class="row container-fluid">

        <!-- NavBar -->
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="employeeList.php">Employee List</a>
            <a href="add_new_employee.php">New Employee Entry</a>
            <a id="thispage" href="update_delete_employee.php">Update / Delete Info</a>
            <a href="employee_salary.php">Employee Salary</a>
        </div>

       <div class="col-1">
            <button id="menuBtn" type="button" class="btn btn-outline-dark" onclick="openNav()">Menu</button>
       </div>     
        

        <div id="form" class="col-11">
            <div id="header">
                <h1>Update Employee Data</h1>
            </div>
            <form action="../backend/update_employee_data.php" method="POST">
                <div class="form-row">
                    <div class="col-6">
                        <label>Name</label>
                        <input type="text" name="emp_name" class="form-control" placeholder="Name" value="<?php echo $res['employee_name']?>" >
                    </div>
                    
                    <div class="col-6">
                        <label>Email</label>
                        <input type="email" name="emp_email" class="form-control" placeholder="Email" value="<?php echo $res['employee_email']?>" >
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-6">
                        <label>Username</label>
                        <input type="text" name="emp_username" class="form-control" placeholder="Username" value="<?php echo $res['employee_username']?>" >
                    </div>
                    
                    <div class="col-6">
                        <label>Password</label>
                        <input type="password" name="emp_password" class="form-control" placeholder="Password" value="<?php echo $res['employee_password']?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-6">
                        <label>National ID</label>
                        <input type="text" name="emp_nid" class="form-control" placeholder="National ID" value="<?php echo $res['employee_nid']?>">
                    </div>

                    <div class="col-6">
                        <label>Contact Number</label>
                        <input type="text" name="emp_number" class="form-control" placeholder="019*******" value="<?php echo $res['employee_contact_number']?>">
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="col-6">
                        <label>Salary</label>
                        <input type="number" name="emp_salary" class="form-control" placeholder="Salary" value="<?php echo $res['employee_salary']?>">
                    </div>
                    
                    <div class="col-6">
                        <label>Moderator Access</label>
                        <select class="form-control" name="emp_moderatorAccess">
                            <?php
                                
                                if($moderatorAccess == 'Yes')
                                {
                                    echo "<option value='Yes' selected >Yes</option>";
                                    echo "<option value='No' >No</option>";
                                }

                                if($moderatorAccess == 'No')
                                {
                                    echo "<option value='Yes' >Yes</option>";
                                    echo "<option value='No' selected >No</option>";
                                }
                                                              
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">                 
                    <div class="col-6">
                        <label>Address</label>
                        <input type="text" name="emp_address" class="form-control" placeholder="Address" value="<?php echo $res['employee_address']?>">
                    </div>

                    
                </div>
                <div class="form-row">                                
                    <button type="submit" id="add_emp_btn" name="submitBtn" class="btn btn-primary btn-block">Update Employee Data</button>
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