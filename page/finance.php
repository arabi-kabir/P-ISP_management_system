<?php
    session_start();
    
    if(!isset($_SESSION["id"]))
    {
        header('Location: admin_login.php');
    }
    
    include "../backend/add_new_expense.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/page_css/finance.css">

    <title>Finance Details</title>
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
                            <a class="nav-link" href="quick_look.php">Quick Look</a>
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
                        <li class="nav-item active" id="finance-tab">
                            <a class="nav-link" href="finance.php">Finance <span class="sr-only">(current)</span> </a>
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
            <div id="page-header">
                <h1>Finance Details</h1>
            </div>

            <div class="container-fluid row">
                <div class="col-8">
                <?php
                    // Show Month
                    // Get current month
                    $now = new \DateTime('now');
                    $month = $now->format('m');
                    $year = $now->format('Y');
                    
                    if($month=="01") $month_name = "January";
                    if($month=="02") $month_name = "February";
                    if($month=="03") $month_name = "March";
                    if($month=="04") $month_name = "April";
                    if($month=="05") $month_name = "May";
                    if($month=="06") $month_name = "June";
                    if($month=="07") $month_name = "July";
                    if($month=="08") $month_name = "August";
                    if($month=="09") $month_name = "September ";
                    if($month=="10") $month_name = "October";
                    if($month=="11") $month_name = "November";
                    if($month=="12") $month_name = "December";

                    echo "
                        <div id='monthname'>
                            <h2> MONTH - ".$month_name." </h2>
                        </div>               
                    ";
                ?>
                    <div id="expense-list">
                        <div id="searchBox">                 
                        <form action="finance.php" method="GET" class="row">
                            <div class="col-10">
                                <input type="text" name="search_text" placeholder="Search.. (Paid Status / Expense Type)"> 
                            </div>
                            <div class="col-1" id="searchBtn">
                                <input type="submit" name="searchBtn" class="btn btn-dark btn-lg" value="Search"> 
                            </div>                   
                        </form>
                    </div>

                        <table class="table table-bordered table-hover">                                    
                            <thead>
                                <tr>
                                <th scope="col" class="table-header">Expense Name</th>
                                <th scope="col" class="table-header">Expense Type</th>
                                <th scope="col" class="table-header">Date</th>
                                <th scope="col" id class="table-header">Amount</th>
                                <th scope="col" id class="table-header">Paid Status</th>
                                <th scope="col" id class="table-header">Additional Info.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "../backend/dbConnection.php";

                                    // Get current month
                                    $now = new \DateTime('now');
                                    $month = $now->format('m');
                                    $year = $now->format('Y');

                                    if (isset($_GET['searchBtn']))
                                    {
                                        if ($_GET['search_text'] == "")
                                        {
                                            $sql = "SELECT * FROM expense_table WHERE expense_month='$month' AND expense_year='$year' ";
                                        }
                                        else
                                        {
                                            $sql = "SELECT * FROM expense_table WHERE expense_month='$month' AND expense_year='$year' AND expense_paid_or_not LIKE '%".$_GET['search_text']."%' OR expense_type LIKE '%".$_GET['search_text']."%' ";
                                        }                                   
                                    }                                  
                                    else
                                    {
                                        //$sql = "SELECT SUM(expense_amount) FROM expense_table WHERE expense_month='$month' AND expense_year='$year' ";

                                        $sql = "SELECT * FROM expense_table WHERE expense_month='$month' AND expense_year='$year' ";
                                    }


                                    
                                    $result = mysqli_query($link, $sql);                  
                                    
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while( $row = mysqli_fetch_assoc($result) ) {
                                            echo "
                                                <tr>
                                                    <td class='thisbtn'> ".$row['expense_name']." </td>
                                                    <td class='thisbtn'> ".$row['expense_type']." </td>
                                                    <td class='thisbtn'> ".$row['expense_date']." </td>
                                                    <td class='thisbtn'> ".$row['expense_amount']." </td>
                                                    <td class='thisbtn'> ".$row['expense_paid_or_not']." </td>
                                                    <td class='thisbtn'> ".$row['expense_additional_info']." </td>
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
                </div>

                <div class="col-4" id="forBorder">
                    <div id="add_new_exp">
                        <h2>New Expenditure</h2>
                    </div>

                    <form id="newExpenseForm" action="finance.php" method="POST">
                        <div class="form-group row">
                            <label class="col-4">Expense Name</label>                           
                            <input type="text" name="exp_name" class="form-control col-8" placeholder="Enter Expense Name">                           
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Expense Type</label>                           
                            <select class="form-control col-8" name="exp_type">
                                <option value="Food">Food</option>
                                <option value="Buy Item">Buy Item</option>
                                <option value="Component">Component</option>
                                <option value="Bill">Bill</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Expense Amount</label>                           
                            <input type="text" name="exp_amount" class="form-control col-8" placeholder="Enter Expense Amount">                           
                        </div>
                        <div>
                            <small class="form-text text-muted">If you are inserting data of previous year or month then only check The Check Box.</small>
                        </div>
                        <div class="form-check row" id="chkBox">
                            <label class="form-check-label col-4">Past Data</label>
                            <input type="checkbox" class="form-check-input col-8" name="past_data" value="ischeked"> 
                        </div>
                        <div class="form-group row">
                            <label class="col-4">Expense Year</label>                           
                            <select class="form-control col-8" name="exp_year">
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
                        <div class="form-group row">
                            <label class="col-4">Expense Date</label>                           
                            <select class="form-control col-8" name="exp_month">
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
                        <div class="form-group row">
                            <label class="col-4">Expense Description</label>                           
                            <textarea name="exp_disc" class="form-control col-8" rows="3" placeholder="Description"></textarea>                           
                        </div>

                        <div class="form-group row">
                            <label class="col-4">Paid / Due</label>                           
                            <select class="form-control col-8" name="exp_paid">
                                <option value="Yes">Paid</option>
                                <option value="No">Due</option>
                            </select>                       
                        </div>

                        <div class="form-group row">
                            <div class="col-4"></div>                          
                            <button type="submit" name="submitBtn" class="btn btn-primary col-8">Add Expense</button>
                        </div>                      
                    </form>

                </div>
            </div>
        </section>

        <hr/>

        <section id="viewExpense">

            <div id="page-header">
                <h1>View Expenditure</h1>
            </div>

            <div class="container-fluid row">          
                <div class="col-4">
                    <form id="newExpenseForm" action="finance.php" method="GET">

                        <div class="form-group row">
                            <label class="col-4">Expense Year</label>                           
                            <select class="form-control col-8" name="exp_year">
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

                        <div class="form-group row">
                            <label class="col-4">Expense Date</label>                           
                            <select class="form-control col-8" name="exp_month">
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

                        <div class="form-group row">
                            <label class="col-4">Expense Type</label>                           
                            <select class="form-control col-8" name="exp_type">
                                <option value="All">All</option>
                                <option value="Food">Food</option>
                                <option value="Buy Item">Buy Item</option>
                                <option value="Component">Component</option>
                                <option value="Bill">Bill</option>
                                <option>Others</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-4">

                            </div>
                            <div class="col-8" id="viewData">
                                <button type="submit" name="viewData" class="btn btn-dark">View Expense</button> 
                            </div> 
                        </div>

                        
                        
                    </form>
                </div>

                <div class="col-8" id="viewSearchData">
                    <?php


                    ?>

                    <table class="table table-bordered table-hover">                                    
                        <thead>
                            <tr>
                            <th scope="col" class="table-header">Expense Name</th>
                            <th scope="col" class="table-header">Expense Type</th>
                            <th scope="col" class="table-header">Date</th>
                            <th scope="col" id class="table-header">Amount</th>
                            <th scope="col" id class="table-header">Paid Status</th>
                            <th scope="col" id class="table-header">Additional Info.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../backend/dbConnection.php";

                                // Get current month
                                $now = new \DateTime('now');
                                $month = $now->format('m');
                                $year = $now->format('Y');

                                

                                if (isset($_GET['viewData']))
                                {
                                    // Get Fiter settings
                                    $exp_type = $_GET['exp_type'];
                                    $exp_year = $_GET['exp_year'];
                                    $exp_month = $_GET['exp_month'];


                                    if ($_GET['exp_year'] == "noValue" OR $_GET['exp_month'] == "noValue")
                                    {
                                        $error = "Select Year and Month Correctly. Idiot !";
                                        echo '<script type="text/javascript">alert("' . $error . '")</script>';

                                        $sql = "SELECT * FROM expense_table WHERE expense_month='$month' AND expense_year='211'";
                                    }
                                    else
                                    {
                                        if( $_GET['exp_type']  == "All" )
                                        {
                                            $sql = "SELECT * FROM expense_table WHERE expense_month='$exp_month' AND expense_year='$exp_year' ";
                                        }
                                        else
                                        {
                                            $sql = "SELECT * FROM expense_table WHERE expense_month='$exp_month' AND expense_year='$exp_year' AND expense_type='$exp_type' ";
                                        }
                                        
                                    }                                   
                                }                                  
                                else
                                {
                                    $sql = "SELECT * FROM expense_table WHERE expense_month='$month' AND expense_year='211'  ";
                                }

                                //echo $sql . "<br>";

                                
                                $result = mysqli_query($link, $sql);                  
                                
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while( $row = mysqli_fetch_assoc($result) ) {
                                        echo "
                                            <tr>
                                                <td class='thisbtn'> ".$row['expense_name']." </td>
                                                <td class='thisbtn'> ".$row['expense_type']." </td>
                                                <td class='thisbtn'> ".$row['expense_date']." </td>
                                                <td class='thisbtn'> ".$row['expense_amount']." </td>
                                                <td class='thisbtn'> ".$row['expense_paid_or_not']." </td>
                                                <td class='thisbtn'> ".$row['expense_additional_info']." </td>
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
            </div>

        </section>

        <hr/>


    </div>

    <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/navBar.js"></script>
</body>
</html>