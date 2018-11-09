<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['submit_complainBtn']))
        {
            include "dbConnection.php";

            $error = "";

            if($_POST['myComplain'] == "")
            {
                $error = "Enter your complain information.";
                echo '<script type="text/javascript">alert("' . $error . '")</script>';
            }
            else
            {
                $myComplain = $_POST['myComplain'];
                $customer_id = $_POST['userid'];
    
                $query = "insert into `customer_complain_table` (`customer_id`,`customer_complain_info`,`customer_complain_status`) values ($customer_id, '$myComplain', 'unsolved')";
                
                if(mysqli_query($link, $query) == false)
                {
                    $error = "There is a error Sending Complain. Try Again.";
                    echo '<script type="text/javascript">alert("' . $error . '")</script>';
                }
                else
                {
                    $error = "Complain Sent Successfully.";
                    echo '<script type="text/javascript">alert("' . $error . '")</script>';
                }
            }

            
        }
    }

?>