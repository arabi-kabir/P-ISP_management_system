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
    <link rel="stylesheet" type="text/css" href="../css/page_css/update_delete_customer_data.css">

    <title>Manage Customer</title>
</head>
<body>
    <div id="full-page">
            <section>
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="manage_customer.php">Customer List</a>
                    <a href="customer_registration.php">New Customer Entry</a>
                    <a id="thispage" href="update_delete_customer_data.php">Update / Delete </a>
                </div>
                
                <button id="menuBtn" type="button" class="btn btn-outline-dark" onclick="openNav()">Menu</button>
            </section>

            <section class="container-fluid">
                <form action="update_delete_customer_data.php" method="GET">
                    <div id="searchBox" class="row">                 
                        <div class="col-11">
                            <input type="text" name="search_text" placeholder="Search . . . (Enter Employee ID)"> 
                        </div>
                        <div class="col-1" id="searchBtn">
                            <input type="submit" name="searchBtn" class="btn btn-outline-dark btn-lg" value="Search"> 
                        </div>
                    </div>
                </form>
                

                <br><br>

                <div id="all-customer-list">
                    <table class="table table-bordered table-hover table-dark">
                        <thead>
                          <tr>
                            <th scope="col" class="table-header">Customer ID</th>
                            <th scope="col" class="table-header">First Name</th>
                            <th scope="col" class="table-header">Last Name</th>
                            <th scope="col" class="table-header">Email</th>
                            <th scope="col" class="table-header">Contact Number</th>
                            <th scope="col" class="table-header">Username</th>
                            <th scope="col" class="table-header">Update</th>
                            <th scope="col" class="table-header">Change Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../backend/dbConnection.php";

                                if (isset($_GET['searchBtn']))
                                {
                                    //$sql_2 = "SELECT * FROM customer_contact_table WHERE customer_first_name LIKE '%".$_GET['search_text']."%' OR customer_last_name LIKE '%".$_GET['search_text']."%' OR customer_email LIKE '%".$_GET['search_text']."%' OR customer_contact_number LIKE '%".$_GET['search_text']."%' ";
                                    
                                    $sql_2 = "SELECT * FROM customer_contact_table WHERE customer_id LIKE '%".$_GET['search_text']."%' ";
                                    $sql_3 = "SELECT * FROM customer_login_table";
                                    $sql_4 = "SELECT * FROM customer_package_info_table";

                                    $result_2 = mysqli_query($link, $sql_2);
                                    $result_3 = mysqli_query($link, $sql_3);
                                    $result_4 = mysqli_query($link, $sql_4);
                                }
                                else
                                {
                                    $sql_2 = "SELECT * FROM customer_contact_table";
                                    $sql_3 = "SELECT * FROM customer_login_table";
                                    $sql_4 = "SELECT * FROM customer_package_info_table";

                                    $result_2 = mysqli_query($link, $sql_2);
                                    $result_3 = mysqli_query($link, $sql_3);
                                    $result_4 = mysqli_query($link, $sql_4);
                                }

                                

                                                        
                                if (mysqli_num_rows($result_2) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result_2) AND $row1 = mysqli_fetch_assoc($result_3) AND $row3 = mysqli_fetch_assoc($result_4) ) {
                                        
                                        if( $row3['customer_status'] == 'active' )
                                        {
                                            echo "
                                                <tr>
                                                    <td class='thisbtn'> ".$row['customer_id']." </td>
                                                    <td class='thisbtn'> ".$row['customer_first_name']." </td>
                                                    <td class='thisbtn'> ".$row['customer_last_name']." </td>
                                                    <td class='thisbtn'> ".$row['customer_email']." </td>
                                                    <td class='thisbtn'> ".$row['customer_contact_number']." </td>
                                                    <td class='thisbtn'> ".$row1['customer_username']." </td>
                                                    <td class='thisbtn'> <a class='btn btn-primary' href=\"update_customer_info.php?id=$row[customer_id]\" onClick=\"return confirm('Are you sure you want to Update?')\" >Update</a> </td>
                                                    <td class='thisbtn'> <a class='btn btn-success' href=\"../backend/delete_inactive_customer.php?id=$row[customer_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" >Inactive Customer</a> </td>                                                                                       
                                                </tr> 
                                            "; 
                                        }
                                        else
                                        {
                                            echo "
                                            <tr>
                                                <td class='thisbtn'> ".$row['customer_id']." </td>
                                                <td class='thisbtn'> ".$row['customer_first_name']." </td>
                                                <td class='thisbtn'> ".$row['customer_last_name']." </td>
                                                <td class='thisbtn'> ".$row['customer_email']." </td>
                                                <td class='thisbtn'> ".$row['customer_contact_number']." </td>
                                                <td class='thisbtn'> ".$row1['customer_username']." </td>
                                                <td class='thisbtn'> <a class='btn btn-primary' href=\"update_customer_info.php?id=$row[customer_id]\" onClick=\"return confirm('Are you sure you want to Update?')\" >Update</a> </td>
                                                <td class='thisbtn'> <a class='btn btn-danger' href=\"../backend/delete_inactive_customer.php?id=$row[customer_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" >Active Customer</a> </td> 
                                            </tr> 
                                            "; 
                                        }
                                                                                                                                                                                                                                                        
                                    }
                                } else {
                                    echo "<tr>
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
</body>
</html>