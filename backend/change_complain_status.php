<?php

    session_start();

    include "../backend/dbConnection.php";

    $data_change_id = $_GET['id'];

    $sql = "SELECT * FROM customer_complain_table WHERE customer_complain_number='".$data_change_id."'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);

    
    if( $row['customer_complain_status'] == 'unsolved' )
    {
        $result = mysqli_query($link,"update customer_complain_table set customer_complain_status='solved' WHERE customer_complain_number='".$data_change_id."'");
    }
    else
    {
        mysqli_query($link,"update customer_complain_table set customer_complain_status='unsolved' WHERE customer_complain_number='".$data_change_id."'");
    }


    header('Location: ../page/complain_box.php');
?>