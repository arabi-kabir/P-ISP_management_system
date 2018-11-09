<?php

    session_start();

    include "../backend/dbConnection.php";

    $data_change_id = $_GET['id'];
    $year = $_GET['year'];
    $month = $_GET['month'];

    $sql = "SELECT * FROM customer_payments WHERE customer_id='".$data_change_id."' AND pay_year=$year AND pay_month=$month ";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);

    

    
    if( $row['payment_status'] == 'Due' )
    {
        $result = mysqli_query($link,"update customer_payments set payment_status='Paid' WHERE customer_id='".$data_change_id."' AND pay_year=$year AND pay_month=$month ");
    }



    header('Location: ../page/customer_payments.php');
?>