<?php
    session_start();

    if(!isset($_SESSION["userid"]))
    {
        header('Location: user_login.php');
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
    <link rel="stylesheet" type="text/css" href="../css/page_css/user_profile.css">

    <title>User Profile.</title>
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
                        <li class="nav-item" >
                            <a class="nav-link" href="customer_payment_info.php">All Payment Info.</a>
                        </li>
                        <li class="nav-item active" id="dash-board">
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

        <section id="main-content" class="container">
            
            <div class="row">                        
                <div id="my-due-payment" class="col-12">
                    <h2>User Profile Information</h2>
                        <div id="data">              
                            <?php
                                include "../backend/dbConnection.php";

                                $customerid = $_SESSION['userid'];

                                $sql1 = "SELECT * FROM customer_area_table WHERE customer_id=$customerid ";
                                $sql2 = "SELECT * FROM customer_contact_table WHERE customer_id=$customerid ";
                                $sql3 = "SELECT * FROM customer_login_table WHERE customer_id=$customerid ";
                                $sql4 = "SELECT * FROM customer_package_info_table WHERE customer_id=$customerid ";

                                $result1 = mysqli_query($link, $sql1);
                                $result2 = mysqli_query($link, $sql2);
                                $result3 = mysqli_query($link, $sql3);                  
                                $result4 = mysqli_query($link, $sql4);

                                $row1 = mysqli_fetch_assoc($result1);
                                $row2 = mysqli_fetch_assoc($result2);
                                $row3 = mysqli_fetch_assoc($result3);
                                $row4 = mysqli_fetch_assoc($result4);

                                echo "

                                    <div class='info_row'> Customer ID : ".$row2['customer_id']." </div>                
                                    <div class='info_row'> First Name : ".$row2['customer_first_name']." </div>

                                    
                                    <div class='info_row'> Last Name : ".$row2['customer_last_name']." </div>
                                    <div class='info_row'> Email : ".$row2['customer_email']." </div>
                                    <div class='info_row'> National ID : ".$row2['customer_NID']." </div>
                                    <div class='info_row'> Contact Number : ".$row2['customer_contact_number']." </div>

                                    <div class='info_row'> Area : ".$row1['customer_area']."  </div>
                                    <div class='info_row'> Address : ".$row1['customer_address']." </div>

                                    <div class='info_row'> Username : ".$row3['customer_username']."  </div>
                                    <div class='info_row'> Password : ".$row3['customer_password']." </div>

                                    <div class='info_row'> Current Package : ".$row4['customer_curr_package']."  </div>
                                    <div class='info_row'> IP Address : ".$row4['customer_ip_address']." </div>
                                    <div class='info_row'> Join Date : ".$row4['customer_joindate']."  </div>
                                    <div class='info_row'> Status : ".$row4['customer_status']." </div>
                                ";

                                
                            ?>  
                        </div>                   
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