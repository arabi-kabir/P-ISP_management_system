<?php

    session_start();

    include "../backend/dbConnection.php";

    $_SESSION['data_change_id'] = $_GET['id'];

    $sql = "SELECT * FROM customer_package_info_table WHERE customer_id='".$_SESSION['data_change_id']."'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);

    if( $row['customer_status'] == 'active' )
    {
        $result = mysqli_query($link,"update customer_package_info_table set customer_status='inactive' WHERE customer_id='".$_SESSION['data_change_id']."'");
    }
    else
    {
        mysqli_query($link,"update customer_package_info_table set customer_status='active' WHERE customer_id='".$_SESSION['data_change_id']."'");
    }


    header('Location: ../page/update_delete_customer_data.php');
?>