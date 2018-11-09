<?php
    session_start();

    if(!isset($_SESSION["id"]))
    {
        header('Location: admin_login.php');
    }

    // Update Query
    include "dbConnection.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $result = mysqli_query($link,"update employee_table set employee_name='".$_POST['emp_name']."',employee_email='".$_POST['emp_email']."',employee_username='".$_POST['emp_username']."',employee_password='".$_POST['emp_password']."',employee_nid='".$_POST['emp_nid']."',employee_salary='".$_POST['emp_salary']."',employee_moderator_access='".$_POST['emp_moderatorAccess']."',employee_address='".$_POST['emp_address']."',employee_contact_number='".$_POST['emp_number']."' WHERE employee_id='".$_SESSION['data_change_id']."'");

        $message = "Information is Updated.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: ../page/update_delete_employee.php');
    }
?>