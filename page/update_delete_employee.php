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
    <link rel="stylesheet" type="text/css" href="../css/page_css/update_delete_employee.css">

    <title>Manage Employee Information</title>
</head>
<body>
    <div id="full-page" class="row container-fluid">
            <section>
                <!-- NavBar -->
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="employeeList.php">Employee List</a>
                    <a href="add_new_employee.php">New Employee Entry</a>
                    <a id="thispage" href="update_delete_employee.php">Update / Delete Info</a>
                </div>             
            </section>

            <div class="col-1" id="menuBtndiv">
                <button id="menuBtn" type="button" class="btn btn-outline-dark" onclick="openNav()">Menu</button>
            </div>  

            <div id="header" class="col-11">
                <h1>Manage Employee Data</h1>
            </div>

            <section class="container-fluid">            
                <div id="searchBox">                 
                    <form action="update_delete_employee.php" method="GET" class="row">
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
                    <table class="table table-md table-bordered table-hover table-dark">
                        <thead>
                          <tr>
                            <th scope="col" class="table-header">Employee ID</th>
                            <th scope="col" class="table-header">Employee Name</th>
                            <th scope="col" class="table-header">Email</th>
                            <th scope="col" class="table-header">Moderator Access</th>

                            <th scope="col" class="table-header">Update Info</th>
                            <th scope="col" class="table-header">Employee Status</th>
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
                                    while($row = mysqli_fetch_assoc($result)) {
                                        
                                        if( $row['emp_status'] == 'active' )
                                        {
                                            echo "
                                                <tr>
                                                    <td class='thisbtn'> ".$row['employee_id']." </td>
                                                    <td class='thisbtn'> ".$row['employee_name']." </td>
                                                    <td class='thisbtn'> ".$row['employee_email']." </td>
                                                    <td class='thisbtn'> ".$row['employee_moderator_access']." </td>

                                                    <td class='thisbtn'> <a class='btn btn-primary' href=\"update_employee_info.php?id=$row[employee_id]\" onClick=\"return confirm('Are you sure you want to Update?')\" >Update</a> </td>
                                                    <td class='thisbtn'> <a class='btn btn-success' href=\"../backend/delete_inactive_employee.php?id=$row[employee_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" >Inactive Employee</a> </td>                                                                                       
                                                </tr> 
                                            "; 
                                        }
                                        else
                                        {
                                            echo "
                                            <tr>
                                                <td class='thisbtn'> ".$row['employee_id']." </td>
                                                <td class='thisbtn'> ".$row['employee_name']." </td>
                                                <td class='thisbtn'> ".$row['employee_email']." </td>
                                                <td class='thisbtn'> ".$row['employee_moderator_access']." </td>

                                                <td class='thisbtn'> <a class='btn btn-primary' href=\"update_employee_info.php?id=$row[employee_id]\" onClick=\"return confirm('Are you sure you want to Update?')\" >Update</a> </td>
                                                <td class='thisbtn'> <a class='btn btn-danger' href=\"../backend/delete_inactive_employee.php?id=$row[employee_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" >Active Employee</a> </td>                                                                                       
                                            </tr> 
                                            "; 
                                        }
                                                                                                                                                                                                                                                        
                                    }
                                } else {
                                    echo "0 results";
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