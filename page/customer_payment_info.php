<?php
    session_start();

    if(!isset($_SESSION["id"]))
    {
        //header('Location: user_login.php');
    }

    include "../backend/send_complain.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/page_css/user_payments_info.css">

    <title>User All Payments Info.</title>
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
                            <a class="nav-link" href="customer_home.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active" id="dash-board">
                            <a class="nav-link" href="customer_payment_info.php">All Payment Info.</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_profile.php">Profile</a>
                        </li>
                        
                    </ul>
                    <form class="form-inline" action="../backend/user_logout.php">
                        <button id="logout-btn" class="btn btn-outline-success" type="submit">Logout</button>
                    </form>
                </div>
            </nav>
        </section>

        <div id="header">
            <h1>User : <?php echo $_SESSION["username"] ?> </h1>
        </div>

        <section id="main-content" class="container-fluid">
            
            <div class="row">                        
                <div id="my-due-payment" class="col-12">
                    <h2>All Payment Info</h2>
                    <table class="table table-bordered table-hover">                                    
                        <thead>
                            <tr>
                                <th scope="col" class="table-header">Customer ID</th>
                                <th scope="col" class="table-header">Payment ID</th>
                                <th scope="col" class="table-header">Payment Month</th>
                                <th scope="col" class="table-header">Payment Year</th>
                                <th scope="col" id class="table-header">Payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../backend/dbConnection.php";

                                $customerid = $_SESSION['userid'];

                                $sql = "SELECT * FROM customer_payments WHERE customer_id=$customerid ";
                              
                                $result = mysqli_query($link, $sql);                  
                                
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while( $row = mysqli_fetch_assoc($result) ) {

                                        if($row['payment_status'] == 'Due')
                                        {
                                            echo "
                                            <tr>
                                                <td class='thisbtn due'> ".$row['customer_id']." </td>
                                                <td class='thisbtn due'> ".$row['payment_id']." </td>
                                                <td class='thisbtn due'> ".$row['pay_month']." </td>
                                                <td class='thisbtn due'> ".$row['pay_year']." </td>
                                                <td class='thisbtn due'> ".$row['payment_status']." </td>
                                            </tr> 
                                            ";  
                                        }
                                        else
                                        {
                                            echo "
                                            <tr>
                                                <td class='thisbtn'> ".$row['customer_id']." </td>
                                                <td class='thisbtn'> ".$row['payment_id']." </td>
                                                <td class='thisbtn'> ".$row['pay_month']." </td>
                                                <td class='thisbtn'> ".$row['pay_year']." </td>
                                                <td class='thisbtn'> ".$row['payment_status']." </td>
                                            </tr> 
                                            ";  
                                        }
                                                                                                                                                                                                                                                       
                                    }
                                } else {
                                    echo "<tr>
                                            <td>0 results</td>
                                        </tr>";
                                }
                            ?>                     
                        </tbody>
                    </table>
                </div>
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