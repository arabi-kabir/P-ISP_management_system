<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['submitBtn']))
        {
            include "dbConnection.php";

            $error = "";

            $emp_name = $emp_email = $emp_username = $emp_password = $emp_nid = $emp_joindate =  $emp_salary = $emp_moderatorAccess = $emp_address = $emp_number = "";

            $emp_name = test_input($_POST['emp_name']);
            $emp_email = test_input($_POST['emp_email']);
            $emp_username = test_input($_POST['emp_username']);
            $emp_password = test_input($_POST['emp_password']);
            $emp_nid = test_input($_POST['emp_nid']);
            $emp_joindate = test_input($_POST['emp_joindate']);
            $emp_salary = test_input($_POST['emp_salary']);
            $emp_moderatorAccess = test_input($_POST['emp_moderatorAccess']);
            $emp_address = test_input($_POST['emp_address']);
            $emp_number = test_input($_POST['emp_number']);

            if( $emp_name == "" || $emp_email == "" || $emp_username == "" || $emp_password == "" || $emp_nid == "" || $emp_joindate == "" ||  $emp_salary == "" || $emp_moderatorAccess == "" || $emp_address == "" || $emp_number == "" )
            {
                $error = "Please Fill all the fields. then press add btn. idiot! ";
                echo '<script type="text/javascript">alert("' . $error . '")</script>';
            }
            else
            {
                $query = "insert into `employee_table` (`employee_name`,`employee_email`,`employee_username`,`employee_password`,`employee_nid`,`employee_join_date`,`employee_salary`,`employee_moderator_access`,`employee_address`,`employee_contact_number`, `emp_status`) values ('$emp_name', '$emp_email', '$emp_username', '$emp_password', '$emp_nid', '$emp_joindate', '$emp_salary', '$emp_moderatorAccess', '$emp_address', '$emp_number', 'active')";
                if(mysqli_query($link, $query) == false)
                {
                    $error = "<p>There is a error inserting Data.</p>";
                    echo '<script type="text/javascript">alert("' . $error . '")</script>';
                }
                else
                {
                    $msg = "Data Inserted Successfully.";
                    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
                }
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