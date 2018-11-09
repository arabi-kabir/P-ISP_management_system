<?php
    session_start();

    if(!isset($_SESSION["id"]))
    {
        header('Location: admin_login.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/page_css/employeeList.css">

    <title>Manage Employee</title>
</head>
<body>
    <div id="full-page">
        <section> 
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a id="logo" class="navbar-brand" href="#">DayLite Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item" id="dash-board">
                                <a class="nav-link" href="quick_look.php">Quick Look </a>
                            </li>
                            <li class="nav-item" >
                                <a class="nav-link" href="manage_customer.php">Manage Customer <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active" id="Manage-Customer">
                                <a class="nav-link" href="employeeList.php">Manage Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="customer_payments.php">Manage Payments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="finance.php">Finance</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="package_information.php">Package Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="complain_box.php">Complain Box</a>
                            </li>

                        </ul>
                        <form class="form-inline" action="../backend/logout_process.php">
                            <button id="logout-btn" class="btn btn-outline-success" type="submit">Logout</button>
                        </form>
                    </div>
                </nav>
            </section>

            <section>
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a id="thispage" href="employeeList.php">Employee List</a>
                    <a href="add_new_employee.php">New Employee Entry</a>
                    <a href="update_delete_employee.php">Update / Delete Info</a>
                </div>
                
                <button id="menuBtn" type="button" class="btn btn-dark" onclick="openNav()">Menu</button>
            </section>

            <section class="container-fluid">
                <div id="searchBox">                 
                    <form action="employeeList.php" method="GET" class="row">
                        <div class="col-11">
                            <input type="text" name="search_text" placeholder="Search . . . (Enter Name or Email or Moderator Access)"> 
                        </div>
                        <div class="col-1" id="searchBtn">
                            <input type="submit" name="searchBtn" class="btn btn-dark btn-lg" value="Search"> 
                        </div>                   
                    </form>
                </div>

                <br><br>

                <div id="all-customer-list">
                    <table class="table table-sm table-bordered table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col" class="table-header">Employee ID</th>
                                <th scope="col" class="table-header">Employee Name</th>
                                <th scope="col" class="table-header">Email</th>
                                <th scope="col" class="table-header">Username</th>
                                <th scope="col" class="table-header">Join Date</th>
                                <th scope="col" class="table-header">Moderator access</th>
                                <th scope="col" class="table-header">Address</th>
                                <th scope="col" class="table-header">Contact Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../backend/dbConnection.php";

                                if (isset($_GET['searchBtn']))
                                {
                                    $sql = "SELECT * FROM employee_table WHERE employee_name LIKE '%".$_GET['search_text']."%' OR employee_email LIKE '%".$_GET['search_text']."%' OR employee_moderator_access LIKE '%".$_GET['search_text']."%' ";
                                }
                                else
                                {
                                    $sql = "SELECT * FROM employee_table";
                                }

                                $result = mysqli_query($link, $sql);

                                
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result) ) {
                                        echo "
                                            <tr>
                                                <td class='thisbtn'> ".$row['employee_id']." </td>
                                                <td class='thisbtn'> ".$row['employee_name']." </td>
                                                <td class='thisbtn'> ".$row['employee_email']." </td>
                                                <td class='thisbtn'> ".$row['employee_username']." </td>
                                                <td class='thisbtn'> ".$row['employee_join_date']." </td>
                                                <td class='thisbtn'> ".$row['employee_moderator_access']." </td>
                                                <td class='thisbtn'> ".$row['employee_address']." </td>
                                                <td class='thisbtn'> ".$row['employee_contact_number']." </td>
                                            </tr> 
                                            ";                                                                                                                                                                                                                 
                                    }
                                } else {
                                    echo "<tr>
                                            <td rowspan='6'>0 results</td>                                          
                                          </tr>";
                                }
                            ?>
                            
                        </tbody>
                    </table>
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