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
    <link rel="stylesheet" type="text/css" href="../css/page_css/customer_payments.css">

    <title>Customer Payments Information</title>
</head>
<body>
    <div id="full-page">

        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a id="thispage" href="customer_payments.php">Payments Info</a>     
        </div>
    
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
                        <li class="nav-item" >
                            <a class="nav-link" href="manage_customer.php">Manage Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="employeeList.php">Manage Employee</a>
                        </li>
                        <li class="nav-item active" id="Manage-payments">
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

        <section class="container-fluid">

            <div class="row" id="header-sec">
                <div class="col-1" >
                    <button id="menuBtn" type="button" class="btn btn-dark" onclick="openNav()">Menu</button>
                </div>
                <div class="col-11" id="page-header">
                    <h1>Customer Payments Information</h1>
                </div>
            </div>

            <form action="payment_config.php">
                <?php
                    include "../backend/dbConnection.php";

                    $now = new \DateTime('now');
                    $month = $now->format('m');
                    $year = $now->format('Y');
                
                    $sql = "SELECT * FROM set_due_all_table";
                    $result = mysqli_query($link, $sql); 

                    $counter = false;
                    if (mysqli_num_rows($result) > 0) {

                        
                        while( $row = mysqli_fetch_assoc($result) ) {
                            if($row['year'] == $year AND $row['month'] == $month)
                            {                              
                                $counter = true;
                            }
                        }
                    }

                    if($counter == false)
                    {
                        echo "
                            <button id='emg_btn' type='submit' class='btn btn-primary'>Setup Database For This Month</button>
                        "; 
                    }


                ?>
                
            </form>

            <div class="container-fluid" id="paymentsList">
                <div id="filter">
                    <form action="customer_payments.php" method="GET">
                        <div class="row">
                            <div class="form-check" id="checkbox">
                                <input type="checkbox" class="form-check-input" id="applyFilterCheckbox" onclick="applyFilter()">
                                <label class="form-check-label">Apply Filter</label>
                            </div>

                            <div class="form-group col-2">
                                <label>Payment Status</label>
                                <select disabled class="form-control" name="_payment_type" id="area_box1">
                                    <option>Paid</option>
                                    <option>Due</option>
                                </select>
                            </div>

                            <div class="form-group col-2">
                                <label>Select Year</label>                           
                                <select disabled class="form-control" name="_year" id="area_box2">
                                    <option value="noValue">Select Year</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                            </div>
                            <div class="form-group col-2">
                                <label >Select Month</label>                           
                                <select disabled class="form-control" name="_month" id="area_box3">
                                    <option value="noValue">Select Month</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>                       
                            </div>

                            <div class="form-group col-2">
                                <button disabled type="submit" class="btn btn-primary" name="filtered_search_btn" id="filtered_search_btn">Search</button>
                            </div>
                        </div>                                               
                    </form>
                    
                    <form action="customer_payments.php" method="GET">
                        <label>Search Specific Customer</label>
                        <div class="row container-fluid form-group">                           
                            <input type="text" name="src_text" class="form-control col-8" placeholder="Enter Customer ID">
                            <button type="submit" class="btn btn-primary col-1" id="serachBtn" name="serachBtn_">Search</button>
                        </div> 
                    </form>


                </div>
                <table class="table table-sm table-bordered table-hover table-dark">
                    <thead>
                        <tr>
                            <th scope="col" class="table-header">Customer ID</th>
                            <th scope="col" class="table-header">Pay Year</th>
                            <th scope="col" class="table-header">Pay Month</th>
                            <th scope="col" class="table-header">Payment Status</th>
                            <th scope="col" class="table-header">Update Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "../backend/dbConnection.php";

                            // Get current month
                            $now = new \DateTime('now');
                            $month = $now->format('m');
                            $year = $now->format('Y');

                                                 
                            if (isset($_GET['filtered_search_btn']))
                            {
                                //$area = $_GET['_area'];
                                $status = $_GET['_payment_type'];
                                $pay_year = $_GET['_year'];
                                $pay_month = $_GET['_month'];

                                

                                if($pay_year == 'noValue' OR $pay_month == 'noValue')
                                {
                                    $message = "Select Year and Month Correctly.";
                                    echo "<script type='text/javascript'>alert('$message');</script>";
                                    $sql = "SELECT * FROM customer_payments WHERE payment_status='Due' ";
                                }
                                else
                                {
                                    $sql = "SELECT * FROM customer_payments WHERE pay_month='$pay_month' AND pay_year='$pay_year' AND payment_status='$status' ";
                                    //echo $sql;
                                }
                            }
                            else
                            {
                                 // sql for all due
                                 $sql = "SELECT * FROM customer_payments WHERE payment_status='Due' ";
                            }

                            if (isset($_GET['serachBtn_']))
                            {
                                $sql = "SELECT * FROM customer_payments WHERE customer_id LIKE '%".$_GET['src_text']."%' ";

                                if($_GET['src_text']== "" AND $_GET['serachBtn_']== "")
                                {
                                    $sql = "SELECT * FROM customer_payments WHERE payment_status='Due' ";
                                    //echo $sql;
                                }
                            }

                            

                                                                                                                            
                            $result = mysqli_query($link, $sql);                  
                                    
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while( $row = mysqli_fetch_assoc($result) ) {
                                    if($row['payment_status'] == 'Due')
                                    echo "
                                        <tr>
                                            <td class='thisbtn'> ".$row['customer_id']." </td>
                                            <td class='thisbtn'> ".$row['pay_year']." </td>
                                            <td class='thisbtn'> ".$row['pay_month']." </td>
                                            <td class='thisbtn'> ".$row['payment_status']." </td>
                                            <td class='thisbtn'> <a class='btn btn-danger btn-sm' href=\"../backend/update_customer_payment_data.php?id=$row[customer_id]&year=$row[pay_year]&month=$row[pay_month]\" onClick=\"return confirm('Are you sure This customer Paid?')\" >Update Payment</a> </td>  
                                        </tr> 
                                        "; 

                                    if($row['payment_status'] == 'Paid')
                                    echo "
                                        <tr>
                                            <td class='thisbtn'> ".$row['customer_id']." </td>
                                            <td class='thisbtn'> ".$row['pay_year']." </td>
                                            <td class='thisbtn'> ".$row['pay_month']." </td>
                                            <td class='thisbtn'> ".$row['payment_status']." </td>
                                            <td class='thisbtn'> Already Paid </td>  
                                        </tr> 
                                        ";                                                                                                                                                                                                                
                                }
                            } else {
                                echo "
                                <tr>
                                    <td> 0 results </td>
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

    <script>

    function applyFilter()
    {
        if (document.getElementById('applyFilterCheckbox').checked) 
        {         
            document.getElementById("area_box1").disabled = false;
            document.getElementById("area_box2").disabled = false;
            document.getElementById("area_box3").disabled = false;
            document.getElementById("filtered_search_btn").disabled = false;
            document.getElementById("area_box5").disabled = false;
        } 
        else {
            document.getElementById("area_box1").disabled = true;
            document.getElementById("area_box2").disabled = true;
            document.getElementById("area_box3").disabled = true;
            document.getElementById("filtered_search_btn").disabled = true;
            document.getElementById("area_box5").disabled = true;
        }
    }

    </script>
</body>
</html>