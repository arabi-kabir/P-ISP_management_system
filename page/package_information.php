<?php
    session_start();

    if(!isset($_SESSION["id"]))
    {
        header('Location: admin_login.php');
    }

    include "../backend/add_package.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/page_css/package_information.css">

    <title>Package Information</title>
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
                        <li class="nav-item">
                            <a class="nav-link" href="quick_look.php">Quick Look <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage_customer.php">Manage Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="employeeList.php">Manage Employee</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="customer_payments.php">Manage Payments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="finance.php">Finance</a>
                        </li>
                        <li class="nav-item active" id="Manage-Customer">
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

        <section class="container-fluid">
            <h1 id="heading">Customer Package List</h1>
            <div id="customer-complain-list">

                <table class="table table-striped table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col" class="table-header">Package Name</th>
                        <th scope="col" class="table-header">Package Price</th>
                        <th scope="col" class="table-header">Package Speed</th>
                        <th scope="col" id class="table-header">Update Package</th>
                        <th scope="col" id class="table-header">Delete Package</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "../backend/dbConnection.php";
                            $sql = "SELECT * FROM package_information";
                            $result = mysqli_query($link, $sql);
                         
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while( $row = mysqli_fetch_assoc($result) ) {
                                    echo "
                                        <tr>
                                            <td class='thisbtn'> ".$row['package_name']." </td>
                                            <td class='thisbtn'> ".$row['package_price']." </td>
                                            <td class='thisbtn'> ".$row['package_speed']." </td>
                                            <td class='thisbtn'> <a class='btn btn-primary' href=\"change_package_data.php?id=$row[package_id]\" onClick=\"return confirm('Are you sure you want to Change Package?')\" >Edit Package Details</a> </td>  
                                            <td class='thisbtn'> <a class='btn btn-primary' href=\"../backend/delete_package_data.php?id=$row[package_id]\" onClick=\"return confirm('Are you sure you want to Delete Package?')\" >Delete Package</a> </td>                                        
                                        </tr> 
                                        ";                                                                                                                                                                                                                 
                                }
                            } else {
                                echo "0 results";
                            }
                        ?>                     
                    </tbody>
                </table>
            </div>
        </section>

        <section>
            <div id="add-new-package" class="container">
                <h1 id="heading">Add New Package</h1>
                <form id="new-package-form" method="POST" action="package_information.php">
                    <div class="form-group">
                        <label >Package Name</label>
                        <input type="text" name="package_name" class="form-control"  placeholder="Enter Package Name">
                    </div>
                    <div class="form-group">
                        <label>Package Price</label>
                        <input type="number" name="package_price" class="form-control" placeholder="Enter Package Price">
                    </div>
                    <div class="form-group" id="btn-space">
                        <label >Package Speed</label>
                        <input type="text" name="package_speed" class="form-control"  placeholder="Enter Package Speed">
                    </div>
                    <button type="submit" name="submitBtn" class="btn btn-primary">Add New Package</button>
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