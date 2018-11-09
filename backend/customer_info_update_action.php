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
        $result1 = mysqli_query($link,"update customer_area_table set customer_area='".$_POST['data_area']."',customer_address='".$_POST['data_address']."' WHERE customer_id='".$_SESSION['data_change_id']."'");
        $result2 = mysqli_query($link,"update customer_contact_table set customer_first_name='".$_POST['data_firstName']."', customer_last_name='".$_POST['data_lastName']."', customer_contact_number='".$_POST['data_contactNumber']."', customer_email='".$_POST['data_email']."', customer_NID='".$_POST['data_NID']."' WHERE customer_id='".$_SESSION['data_change_id']."'");
        $result3 = mysqli_query($link,"update customer_login_table set customer_username='".$_POST['data_username']."',customer_password='".$_POST['data_password']."' WHERE customer_id='".$_SESSION['data_change_id']."'");
        $result4 = mysqli_query($link,"update customer_package_info_table set customer_curr_package='".$_POST['data_package']."',customer_ip_address='".$_POST['data_ipAddress']."' WHERE customer_id='".$_SESSION['data_change_id']."'");

        $message = "Information is Updated.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location: ../page/update_delete_customer_data.php');
    }
?>