<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['submitBtn']))
        {
            include "dbConnection.php";

            $error = "";

            $username = $password = $firstName = $lastName = $email = $contactNumber =  $NID = $joinDate = $package = $ipAddress = $area = $address = "";

            $username =     test_input($_POST['data_username']);
            $password =     test_input($_POST['data_password']);
            $firstName =    test_input($_POST['data_firstName']);
            $lastName =     test_input($_POST['data_lastName']);
            $email =        test_input($_POST['data_email']);
            $contactNumber = test_input($_POST['data_contactNumber']);
            $NID =          test_input($_POST['data_NID']);
            $joinDate =     test_input($_POST['data_joinDate']);
            $package =      test_input($_POST['data_package']);
            $ipAddress =    test_input($_POST['data_ipAddress']);
            $area =         test_input($_POST['data_area']);
            $address =      test_input($_POST['data_address']);

            if($username == "")
            {
                $error .= "<p>Username Field can not be blank.</p>"; 
            }
            if($password == "")
            {
                $error .= "<p>Password Field can not be blank.</p>"; 
            }
            if($firstName == "")
            {
                $error .= "<p>First Name Field can not be blank.</p>"; 
            }
            if($lastName == "")
            {
                $error .= "<p>Last Name Field can not be blank.<p>"; 
            }
            if($email == "")
            {
                $error .= "<p>Email Field can not be blank.<p>"; 
            }
            if($contactNumber == "")
            {
                $error .= "<p>Contact Number Field can not be blank.<p>"; 
            }
            if($NID == "")
            {
                $error .= "<p>NID Field can not be blank.</p>"; 
            }
            if($joinDate == "")
            {
                $error .= "<p>Join Date Field can not be blank.</p>"; 
            }
            if($package == "")
            {
                $error .= "<p>Package Field can not be blank.</p>"; 
            }
            if($ipAddress == "")
            {
                $error .= "IP Address Field can not be blank."; 
            }
            if($area == "")
            {
                $error .= "<p>Area Field can not be blank.</p>"; 
            }
            if($address == "")
            {
                $error .= "<p>Address Field can not be blank.</p>"; 
            }

            if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
                $error = "First Name Only letters and white space allowed";
            }

            
            if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
                $error = "Last Name Only letters and white space allowed";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Invalid email format";
            }
            if(is_numeric($contactNumber) == false)
            {
                $error = "Invalid Contact Number format";
            }

            if($error == "")
            {
                
                // Same username check
                $query = "SELECT * FROM customer_login_table WHERE customer_username = '".$username."' ";
                $result = mysqli_query($link, $query);
                $row = mysqli_fetch_array($result);

                if(mysqli_num_rows ($result) > 0)
                { 
                    $error = "<p> Same username Exist !! Use Different Username Please. </p>";
                    echo '<script type="text/javascript">alert("' . $error . '")</script>';
                }
                else
                {
                    $query = "insert into `customer_login_table` (`customer_username`,`customer_password`) values ('$username', '$password')";
                    if(mysqli_query($link, $query) == false)
                    {
                        $error = "<p>There is a error inserting Customer_login_table.</p>";
                        echo '<script type="text/javascript">alert("' . $error . '")</script>';
                    }

                    $query = "insert into `customer_area_table` (`customer_area`,`customer_address`) values ('$area', '$address')";
                    if(mysqli_query($link, $query) == false)
                    {
                        $error = "<p>There is a error inserting customer_area_table.</p>";
                        echo '<script type="text/javascript">alert("' . $error . '")</script>';
                    }

                    $query = "insert into `customer_contact_table` (`customer_first_name`,`customer_last_name`,`customer_email`,`customer_NID`,`customer_contact_number`) values ('$firstName', '$lastName', '$email', '$NID','$contactNumber')";
                    if(mysqli_query($link, $query) == false)
                    {
                        $error = "<p>There is a error inserting customer_contact_table.</p>";
                        echo '<script type="text/javascript">alert("' . $error . '")</script>';
                    }

                    $query = "insert into `customer_package_info_table` (`customer_curr_package`,`customer_ip_address`,`customer_joindate`,`customer_status`) values ('$package', '$ipAddress', '$joinDate', 'active')";
                    if(mysqli_query($link, $query) == false)
                    {
                        $error = "<p>There is a error inserting customer_package_info_table.</p>";
                        echo '<script type="text/javascript">alert("' . $error . '")</script>';
                    }

                    if($error == "")
                    {
                        echo '<script type="text/javascript">alert(" Registration Completed. ")</script>';
                    }
                    
                }
            }
            else
            {
                echo '<script type="text/javascript">alert("' . $error . '")</script>';
            }
     
        }
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>