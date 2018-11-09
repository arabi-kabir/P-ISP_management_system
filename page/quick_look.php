<?php
    session_start();

    include "../backend/dbConnection.php";

    if(!isset($_SESSION["id"]))
    {
        header('Location: admin_login.php');
    }

    // getting value from db
    // Area
    $sql = "SELECT * FROM customer_area_table WHERE customer_area='Mirpur' ";
    if ($result = $link->query($sql)) {
        $mirpur = $result->num_rows;
        $result->close();
    }
    $sql = "SELECT * FROM customer_area_table WHERE customer_area='Dhanmondi' ";
    if ($result = $link->query($sql)) {
        $dhanmondi = $result->num_rows;
        $result->close();
    }
    $sql = "SELECT * FROM customer_area_table WHERE customer_area='Gulshan' ";
    if ($result = $link->query($sql)) {
        $gulshan = $result->num_rows;
        $result->close();
    }
    $sql = "SELECT * FROM customer_area_table WHERE customer_area='Banani' ";
    if ($result = $link->query($sql)) {
        $banani = $result->num_rows;
        $result->close();
    }
    $sql = "SELECT * FROM customer_area_table WHERE customer_area='Mohammadpur' ";
    if ($result = $link->query($sql)) {
        $mohammadpur = $result->num_rows;
        $result->close();
    }

    // package
    $sql = "SELECT * FROM customer_package_info_table WHERE customer_curr_package='Package 1'";
    if ($result = $link->query($sql)) {
        $p1 = $result->num_rows;
        $result->close();
    }

    $sql = "SELECT * FROM customer_package_info_table WHERE customer_curr_package='Package 2'";
    if ($result = $link->query($sql)) {
        $p2 = $result->num_rows;
        $result->close();
    }

    $sql = "SELECT * FROM customer_package_info_table WHERE customer_curr_package='Package 3'";
    if ($result = $link->query($sql)) {
        $p3 = $result->num_rows;
        $result->close();
    }

    $sql = "SELECT * FROM customer_package_info_table WHERE customer_curr_package='Package 4'";
    if ($result = $link->query($sql)) {
        $p4 = $result->num_rows;
        $result->close();
    }

    $sql = "SELECT * FROM customer_package_info_table WHERE customer_curr_package='Package 5'";
    if ($result = $link->query($sql)) {
        $p5 = $result->num_rows;
        $result->close();
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
    <link rel="stylesheet" type="text/css" href="../css/page_css/quick_look.css">

    <title>Quick look</title>
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
                        <li class="nav-item active" id="dash-board">
                            <a class="nav-link" href="quick_look.php">Quick Look <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item" id="Manage-Customer">
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

        <section id="main-content">
            <div id="unsolved-complain" class="container-fluid">
                <?php
                    include "../backend/dbConnection.php";

                    $sql = "SELECT * FROM customer_complain_table WHERE customer_complain_status='unsolved' ";

                    $result = mysqli_query($link, $sql);

                    if (mysqli_num_rows($result) > 0) {

                        while($row = mysqli_fetch_assoc($result) ) {

                            echo "
                            <div id='todaybookalert' class='alert alert-danger alert-dismissible fade show' role='alert'>
                                Customer ID ".$row['customer_id']." is having a Problem. Problem Details : ".$row['customer_complain_info']."

                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            ";

                        }
                    }

                    
                ?>
            </div>

            <hr>

            <div class="row container-fluid">
                <div class="col-5">
                    <div id='monthname'>
                        <h3> Due payments </h3>
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
                                        echo $sql;
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
                                                <td class='thisbtn'> <a class='btn btn-danger btn-sm' href=\"../backend/update_customer_payment_data2.php?id=$row[customer_id]&year=$row[pay_year]&month=$row[pay_month]\" onClick=\"return confirm('Are you sure This customer Paid?')\" >Update Payment</a> </td>  
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

                <div class="col-7">
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
                                <h3> Month - ".$month_name." </h3>
                            </div>               
                        ";
                    ?>

                   
    
                    <table class="table table-sm table-bordered table-hover">                                    
                        <thead>
                            <tr>
                            <th scope="col" class="table-header1">Expense Name</th>
                            <th scope="col" class="table-header1">Expense Type</th>
                            <th scope="col" class="table-header1">Date</th>
                            <th scope="col" id class="table-header1">Amount</th>
                            <th scope="col" id class="table-header1">Paid Status</th>
                            <th scope="col" id class="table-header1">Additional Info.</th>
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

            <hr>

            <div id="" class="container-fluid row">
                <div class="col-4" id="summary">

                    <div id='monthname'>
                        <h3>Summary</h3>
                    </div>

                    <div>
                        <?php
                            include "../backend/dbConnection.php";
                            
                            // get active customer
                            $sql = "SELECT * FROM customer_package_info_table WHERE customer_status='active' ";

                            if ($result = $link->query($sql)) {
                                $active_customer = $result->num_rows;
                                $result->close();
                            }

                            // get inactive customer
                            $sql = "SELECT * FROM customer_package_info_table WHERE customer_status='inactive' ";
                            if ($result = $link->query($sql)) {
                                $inactive_customer = $result->num_rows;
                                $result->close();
                            }

                            // get active employee
                            $sql = "SELECT * FROM employee_table WHERE emp_status='active' ";
                            if ($result = $link->query($sql)) {
                                $active_emp = $result->num_rows;
                                $result->close();
                            }

                            // get total due payments
                            $sql = "SELECT * FROM customer_payments WHERE payment_status='Due' ";
                            if ($result = $link->query($sql)) {
                                $due_payments = $result->num_rows;
                                $result->close();
                            }

                        ?>

                    </div>
                    <table class="table table-dark table-sm table-bordered table-hover">
                        <tr>
                            <td class='thisbtn'>Total Active Customer</td>
                            <td class='thisbtn'> <?php echo $active_customer ?> </td>
                        </tr>
                        <tr>
                            <td class='thisbtn'>Total Inactive Customer</td>
                            <td class='thisbtn'> <?php echo $inactive_customer ?> </td>
                        </tr>
                        <tr>
                            <td class='thisbtn'>Total Employee</td>
                            <td class='thisbtn'> <?php echo $active_emp ?> </td>
                        </tr>
                        <tr>
                            <td class='thisbtn'>Total Due Payments</td>
                            <td class='thisbtn'> <?php echo $due_payments ?> </td>
                        </tr>
                    </table>
                </div>             
            </div>

            <div class="row container-fluid">
                <div class="col-6" id="piechart" style="width: 700px; height: 500px;"></div>
                <div class="col-6" id="packageChart" style="width: 700px; height: 500px;"></div>
            </div>

        </section>


    </div>

    <!--Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/navBar.js"></script>

    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

           
            var mirpur = '<?php echo $mirpur ?>';
            var dhanmondi = '<?php echo $dhanmondi ?>';
            var banani = '<?php echo $banani ?>';
            var gulshan = '<?php echo $gulshan ?>';
            var mohammadpur = '<?php echo $mohammadpur ?>';

            

            var data = google.visualization.arrayToDataTable([
                ['Area', 'Number of User'],
                ['Mirpur', parseInt(mirpur)],
                ['Dhanmondi', parseInt(dhanmondi)],
                ['Banani', parseInt(banani)],
                ['Gulshan', parseInt(gulshan)],
                ['Mohammadpur', parseInt(mohammadpur)]
            ]);

            var options = {
            title: 'Percentage of Customer Areawise'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
    
            var p1 = '<?php echo $p1 ?>';
            var p2 = '<?php echo $p2 ?>';
            var p3 = '<?php echo $p3 ?>';
            var p4 = '<?php echo $p4 ?>';
            var p5 = '<?php echo $p5 ?>';

        
            var data = google.visualization.arrayToDataTable([
                ['Package', 'Number of User'],
                ['Package 1', parseInt(p1)],
                ['Package 2', parseInt(p2)],
                ['Package 3', parseInt(p3)],
                ['Package 4', parseInt(p4)],
                ['Package 5', parseInt(p5)]
            ]);

            var options = {
            title: 'User of Different Package',
            is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('packageChart'));

            chart.draw(data, options);
        }
    </script>

</body>
</html>