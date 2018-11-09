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
    <link rel="stylesheet" type="text/css" href="../css/page_css/complain_box.css">

    <title>Complain Box</title>
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
                        <li class="nav-item">
                            <a class="nav-link" href="manage_customer.php">Manage Customer <span class="sr-only">(current)</span></a>
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
                        <li class="nav-item">
                            <a class="nav-link" href="package_information.php">Package Information</a>
                        </li>
                        <li class="nav-item active" id="Customer-complain">
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
            <h1 id="heading">Customer Complain List</h1>
            <div id="customer-complain-list">

                <div id="search-type">
                    <form action="complain_box.php" method="GET" class="input-group">
                        <select class="custom-select" name="type">
                            <option value="all">All</option>
                            <option value="solved">Solved</option>
                            <option value="unsolved">Unsolved</option>
                        </select>
                        <div class="input-group-append">
                            <input class="btn btn-outline-secondary" name="searchBtn" type="submit" value="Search">
                        </div>
                    </form>
                </div>

                <table class="table table-bordered table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col" class="table-header">Customer ID</th>
                        <th scope="col" class="table-header">Customer Complain Number</th>
                        <th scope="col" class="table-header">Customer Complain Details</th>
                        <th scope="col" class="table-header">Complain Status</th>
                        <th scope="col" class="table-header">Change Complain Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "../backend/dbConnection.php";

                            if (isset($_GET['searchBtn']))
                            {
                                if( $_GET['type'] == 'solved' )
                                {
                                    $sql = "SELECT * FROM customer_complain_table where customer_complain_status='solved' ";
                                }
                                if( $_GET['type'] == 'unsolved' )
                                {
                                    $sql = "SELECT * FROM customer_complain_table where customer_complain_status='unsolved' ";
                                }
                                if( $_GET['type'] == 'all' )
                                {
                                    $sql = "SELECT * FROM customer_complain_table";
                                }                       
                            }
                            else
                            {
                                $sql = "SELECT * FROM customer_complain_table";
                            }

                            $result = mysqli_query($link, $sql);
                         
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while( $row = mysqli_fetch_assoc($result) ) {
                                    echo "
                                        <tr>
                                            <td class='thisbtn'> ".$row['customer_id']." </td>
                                            <td class='thisbtn'> ".$row['customer_complain_number']." </td>
                                            <td class='thisbtn'> ".$row['customer_complain_info']." </td>
                                            <td class='thisbtn'> ".$row['customer_complain_status']." </td>
                                            <td class='thisbtn'> <a class='btn btn-primary' href=\"../backend/change_complain_status.php?id=$row[customer_complain_number]\" onClick=\"return confirm('Are you sure you want to Change Status?')\" >Change Status</a> </td>                                      
                                        </tr> 
                                        ";                                                                                                                                                                                                                 
                                }
                            } else {
                                echo "
                                    <tr>
                                        <td>0 Results</td>
                                    </tr>
                                    ";
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